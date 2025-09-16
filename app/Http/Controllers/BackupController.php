<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Exception;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Response;
use PDO;
use PDOException;
use Illuminate\Support\Facades\Hash;

class BackupController extends Controller
{
    protected $backupPath;
    protected $backupDisk;

    public function __construct()
    {
        $this->backupDisk = 'local';
        $this->backupPath = 'backups/';
    }

    /**
     * Display backup management page
     */
    public function index()
    {
        $backups = $this->getBackupFiles();
        return view('admin.page.backupdata', compact('backups'));
    }

    /**
     * API untuk mendapatkan data backup
     */
    public function data()
    {
        try {
            $backups = $this->getBackupFiles();

            return response()->json([
                'success' => true,
                'data' => $backups,
                'message' => 'Data backup berhasil diambil'
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching backup data: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Gagal mengambil data backup: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Create a new database backup
     */
    public function createBackup(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:100',
            'include_media' => 'boolean'
        ]);

        try {
            $backupName = $request->name ?: 'backup_' . Carbon::now()->format('Ymd_His');
            $includeMedia = $request->boolean('include_media', true);

            if ($includeMedia) {
                $result = $this->createFullBackup($backupName);
            } else {
                $result = $this->createDatabaseOnlyBackup($backupName);
            }

            if ($result['success']) {
                return response()->json([
                    'success' => true,
                    'message' => $result['message'],
                    'backup' => $this->getLatestBackup()
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => $result['message']
                ], 500);
            }

        } catch (Exception $e) {
            Log::error('Backup error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat membuat backup: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Create database-only backup using improved method
     */
    private function createDatabaseOnlyBackup($backupName)
    {
        try {
            $filename = $backupName . '.sql';

            // Try mysqldump first (more reliable)
            $mysqldumpResult = $this->createBackupUsingMysqldump($backupName);
            if ($mysqldumpResult['success']) {
                return $mysqldumpResult;
            }

            // Fallback to PDO method if mysqldump fails
            Log::info("Mysqldump failed, falling back to PDO method");

            $storagePath = $this->backupPath . $filename;
            $pdo = DB::connection()->getPdo();

            // Start with SQL header
            $sqlContent = "-- Database Backup Created: " . now() . "\n";
            $sqlContent .= "-- Database: " . env('DB_DATABASE') . "\n";
            $sqlContent .= "-- Host: " . env('DB_HOST') . "\n\n";
            $sqlContent .= "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\n";
            $sqlContent .= "SET AUTOCOMMIT = 0;\n";
            $sqlContent .= "START TRANSACTION;\n";
            $sqlContent .= "SET time_zone = \"+00:00\";\n\n";

            // Disable foreign key checks
            $sqlContent .= "SET FOREIGN_KEY_CHECKS=0;\n\n";

            // Get all tables
            $tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);

            if (empty($tables)) {
                return [
                    'success' => false,
                    'message' => 'Tidak ada tabel di database'
                ];
            }

            Log::info("Found " . count($tables) . " tables to backup");

            // Process each table
            foreach ($tables as $table) {
                Log::info("Backing up table: $table");

                // Drop table if exists
                $sqlContent .= "DROP TABLE IF EXISTS `$table`;\n";

                // Get create table statement
                $createTable = $pdo->query("SHOW CREATE TABLE `$table`")->fetch(PDO::FETCH_ASSOC);
                $sqlContent .= $createTable['Create Table'] . ";\n\n";

                // Get table data
                $stmt = $pdo->prepare("SELECT * FROM `$table`");
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($rows)) {
                    // Get column names for INSERT statement
                    $columns = array_keys($rows[0]);
                    $columnList = '`' . implode('`, `', $columns) . '`';

                    $sqlContent .= "INSERT INTO `$table` ($columnList) VALUES\n";

                    $values = [];
                    foreach ($rows as $row) {
                        $rowValues = array_map(function($value) use ($pdo) {
                            if ($value === null) return 'NULL';
                            return $pdo->quote($value);
                        }, $row);

                        $values[] = '(' . implode(', ', $rowValues) . ')';

                        // Process in chunks to avoid memory issues
                        if (count($values) >= 1000) {
                            $sqlContent .= implode(",\n", $values) . ";\n\n";
                            $values = [];

                            // Add another INSERT statement for next chunk
                            if (count($rows) > 1000) {
                                $sqlContent .= "INSERT INTO `$table` ($columnList) VALUES\n";
                            }
                        }
                    }

                    // Process remaining values
                    if (!empty($values)) {
                        $sqlContent .= implode(",\n", $values) . ";\n\n";
                    }
                }
            }

            // Re-enable foreign key checks and commit
            $sqlContent .= "SET FOREIGN_KEY_CHECKS=1;\n";
            $sqlContent .= "COMMIT;\n";

            // Save to storage
            Storage::disk($this->backupDisk)->put($storagePath, $sqlContent);
            $fileSize = strlen($sqlContent);

            Log::info("Backup file created: $filename, Size: " . $this->formatBytes($fileSize));

            // Log backup
            $this->createBackupLog($filename, $fileSize, false);

            return [
                'success' => true,
                'message' => 'Backup database berhasil dibuat: ' . $filename . ' (' . $this->formatBytes($fileSize) . ')'
            ];

        } catch (Exception $e) {
            Log::error('Database backup error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error saat backup database: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Create backup using mysqldump command
     */
    private function createBackupUsingMysqldump($backupName)
    {
        try {
            $filename = $backupName . '.sql';
            $tempPath = storage_path('app/temp/backup_' . time() . '.sql');
            $tempDir = dirname($tempPath);

            if (!file_exists($tempDir)) {
                mkdir($tempDir, 0755, true);
            }

            // Find mysqldump executable
            $mysqldumpPaths = [
                'D:/Laragon/laragon/bin/mysql/mysql-8.0.30-winx64/bin/mysqldump.exe',
                'D:/Laragon/bin/mysql/mysql-8.0.30/bin/mysqldump.exe',
                'D:/laragon/bin/mysql/mysql-8.0.30/bin/mysqldump.exe',
                'mysqldump' // System PATH
            ];

            $mysqldumpPath = null;
            foreach ($mysqldumpPaths as $path) {
                if (file_exists($path) || $path === 'mysqldump') {
                    $mysqldumpPath = $path;
                    break;
                }
            }

            if (!$mysqldumpPath) {
                return [
                    'success' => false,
                    'message' => 'Mysqldump tidak ditemukan'
                ];
            }

            // Build mysqldump command
            $command = [
                $mysqldumpPath,
                '-u', env('DB_USERNAME', 'root'),
                '--password=' . env('DB_PASSWORD', ''),
                '--host=' . env('DB_HOST', '127.0.0.1'),
                '--port=' . env('DB_PORT', '3306'),
                '--single-transaction',
                '--routines',
                '--triggers',
                '--add-drop-table',
                '--extended-insert',
                '--default-character-set=utf8mb4',
                '--column-statistics=0', // Important for MySQL 8+
                env('DB_DATABASE', ''),
                '--result-file=' . $tempPath
            ];

            Log::info("Executing mysqldump command");

            $process = new Process($command, base_path());
            $process->setTimeout(600); // 10 minutes
            $process->run();

            if ($process->isSuccessful()) {
                // Move file to storage
                $storagePath = $this->backupPath . $filename;
                $fileContent = file_get_contents($tempPath);
                Storage::disk($this->backupDisk)->put($storagePath, $fileContent);

                $fileSize = filesize($tempPath);

                // Cleanup temp file
                unlink($tempPath);

                // Log backup
                $this->createBackupLog($filename, $fileSize, false);

                Log::info("Mysqldump backup successful: $filename");

                return [
                    'success' => true,
                    'message' => 'Backup database berhasil dibuat dengan mysqldump: ' . $filename . ' (' . $this->formatBytes($fileSize) . ')'
                ];
            } else {
                // Cleanup temp file
                if (file_exists($tempPath)) {
                    unlink($tempPath);
                }

                $error = $process->getErrorOutput();
                Log::error('Mysqldump error: ' . $error);

                return [
                    'success' => false,
                    'message' => 'Mysqldump gagal: ' . $error
                ];
            }

        } catch (Exception $e) {
            // Cleanup temp file on exception
            if (isset($tempPath) && file_exists($tempPath)) {
                unlink($tempPath);
            }

            Log::error('Mysqldump backup error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error mysqldump backup: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Create full backup (database + files) using ZIP
     */
    private function createFullBackup($backupName)
    {
        try {
            $filename = $backupName . '.zip';
            $tempPath = storage_path('app/temp');

            if (!file_exists($tempPath)) {
                mkdir($tempPath, 0755, true);
            }

            $zipPath = $tempPath . '/' . $filename;

            // Create ZIP archive
            $zip = new \ZipArchive();
            $result = $zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

            if ($result !== TRUE) {
                return [
                    'success' => false,
                    'message' => 'Gagal membuat file ZIP: ' . $result
                ];
            }

            // 1. Backup database terlebih dahulu
            $dbBackupName = $backupName . '_temp_db';
            $dbBackupResult = $this->createDatabaseOnlyBackup($dbBackupName);

            if ($dbBackupResult['success']) {
                // Ambil SQL content dari storage
                $sqlContent = Storage::disk($this->backupDisk)->get($this->backupPath . $dbBackupName . '.sql');
                $zip->addFromString('database.sql', $sqlContent);

                // Hapus file SQL temporary
                Storage::disk($this->backupDisk)->delete($this->backupPath . $dbBackupName . '.sql');
            }

            // 2. Add important application files
            $this->addDirectoryToZip($zip, storage_path('app/public'), 'storage/app/public/');
            $this->addDirectoryToZip($zip, public_path('uploads'), 'public/uploads/');

            // 3. Add config files
            if (file_exists(base_path('.env'))) {
                $zip->addFile(base_path('.env'), '.env');
            }

            $zip->close();

            // Move to storage disk
            $storagePath = $this->backupPath . $filename;
            Storage::disk($this->backupDisk)->put($storagePath, file_get_contents($zipPath));

            $fileSize = filesize($zipPath);

            // Cleanup temporary files
            unlink($zipPath);

            // Log backup
            $this->createBackupLog($filename, $fileSize, true);

            return [
                'success' => true,
                'message' => 'Backup lengkap berhasil dibuat: ' . $filename . ' (' . $this->formatBytes($fileSize) . ')'
            ];

        } catch (Exception $e) {
            Log::error('Full backup error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error saat backup lengkap: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Add directory to ZIP archive recursively
     */
    private function addDirectoryToZip($zip, $dirPath, $zipPath = '')
    {
        if (!is_dir($dirPath)) {
            return;
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dirPath, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $file) {
            if ($file->isDir()) {
                $zip->addEmptyDir($zipPath . $iterator->getSubPathName() . '/');
            } else {
                $zip->addFile($file->getRealPath(), $zipPath . $iterator->getSubPathName());
            }
        }
    }

    /**
     * Create backup log entry
     */
    private function createBackupLog($filename, $size, $includeMedia = true)
    {
        try {
            if (!Schema::hasTable('backup_logs')) {
                return;
            }

            $filePath = $this->backupPath . $filename;

            $data = [
                'filename' => $filename,
                'admin_id' => auth()->id(),
                'admin_name' => auth()->user()->name ?? 'System',
                'size' => $size,
                'path' => $filePath,
                'backup_date' => now(),
                'notes' => $includeMedia ? 'Backup lengkap (database + media)' : 'Backup database saja',
                'created_at' => now(),
                'updated_at' => now()
            ];

            if (Schema::hasColumn('backup_logs', 'type')) {
                $data['type'] = 'backup';
            }

            DB::table('backup_logs')->insert($data);
        } catch (Exception $e) {
            Log::error('Create backup log error: ' . $e->getMessage());
        }
    }

    /**
     * Test database connection
     */
    public function testConnection()
    {
        try {
            DB::connection()->getPdo();

            // Test mysqldump path
            $mysqldumpPaths = [
                'D:\\Laragon\\bin\\mysql\\mysql-8.0.30\\bin\\mysqldump.exe',
                'D:\\Laragon\\bin\\mysql\\mysql-8.0.30-winx64\\bin\\mysqldump.exe',
                'D:\\laragon\\bin\\mysql\\mysql-8.0.30\\bin\\mysqldump.exe'
            ];

            $foundPath = null;
            foreach ($mysqldumpPaths as $path) {
                if (file_exists($path)) {
                    $foundPath = $path;
                    break;
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Koneksi database berhasil',
                'mysqldump_path' => $foundPath,
                'mysqldump_exists' => $foundPath !== null,
                'db_config' => [
                    'host' => env('DB_HOST'),
                    'database' => env('DB_DATABASE'),
                    'username' => env('DB_USERNAME')
                ]
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Koneksi database gagal: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Download backup file - FIXED VERSION
     */
    public function downloadBackup($filename)
    {
        try {
            $filePath = $this->backupPath . $filename;

            if (!Storage::disk($this->backupDisk)->exists($filePath)) {
                Log::error('File not found for download: ' . $filePath);
                return response()->json(['error' => 'File backup tidak ditemukan!'], 404);
            }

            // Get file content
            $fileContent = Storage::disk($this->backupDisk)->get($filePath);
            $fileSize = Storage::disk($this->backupDisk)->size($filePath);

            // Determine content type
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $contentType = $extension === 'sql' ? 'application/sql' : 'application/zip';

            Log::info('Downloading file: ' . $filename . ' (' . $this->formatBytes($fileSize) . ')');

            // Return download response
            return response($fileContent)
                ->header('Content-Type', $contentType)
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"')
                ->header('Content-Length', $fileSize)
                ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                ->header('Pragma', 'no-cache')
                ->header('Expires', '0');

        } catch (Exception $e) {
            Log::error('Download backup error: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal mengunduh file backup: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Restore database from backup - ENHANCED VERSION
     */
    public function restoreBackup(Request $request)
    {
        $request->validate([
            'filename' => 'required|string',
            'password' => 'required|string'
        ]);

        // Verify admin password
        if (!auth()->validate(['email' => auth()->user()->email, 'password' => $request->password])) {
            return response()->json([
                'success' => false,
                'message' => 'Password admin salah!'
            ], 401);
        }

        try {
            $filename = $request->filename;

            if (!Storage::disk($this->backupDisk)->exists($this->backupPath . $filename)) {
                return response()->json([
                    'success' => false,
                    'message' => 'File backup tidak ditemukan!'
                ], 404);
            }

            $this->createRestoreLog($filename);
            $result = $this->executeRestore($filename);

            if ($result['success']) {
                return response()->json([
                    'success' => true,
                    'message' => 'Restore berhasil! Database telah dikembalikan dari backup: ' . $filename
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal melakukan restore: ' . $result['message']
                ], 500);
            }
        } catch (Exception $e) {
            Log::error('Restore error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat restore: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Enhanced restore method with better error handling and logging
     */
    public function restoreBackupEnhanced(Request $request)
    {
        $request->validate([
            'filename' => 'required|string',
            'password' => 'required|string'
        ]);

        // Verify admin password
        if (!auth()->validate(['email' => auth()->user()->email, 'password' => $request->password])) {
            return response()->json([
                'success' => false,
                'message' => 'Password admin salah!'
            ], 401);
        }

        try {
            $filename = $request->filename;

            Log::info("=== STARTING RESTORE PROCESS ===");
            Log::info("Filename: $filename");
            Log::info("User: " . auth()->user()->name);
            Log::info("Timestamp: " . now());

            if (!Storage::disk($this->backupDisk)->exists($this->backupPath . $filename)) {
                return response()->json([
                    'success' => false,
                    'message' => 'File backup tidak ditemukan!'
                ], 404);
            }

            // Get database state before restore
            $beforeState = $this->getDatabaseState();
            Log::info("Database state before restore: " . json_encode($beforeState));

            // Create restore log
            $this->createRestoreLog($filename);

            // Execute restore
            $result = $this->executeRestore($filename);

            if ($result['success']) {
                // Get database state after restore
                $afterState = $this->getDatabaseState();
                Log::info("Database state after restore: " . json_encode($afterState));

                Log::info("=== RESTORE COMPLETED SUCCESSFULLY ===");

                return response()->json([
                    'success' => true,
                    'message' => $result['message'],
                    'before_state' => $beforeState,
                    'after_state' => $afterState
                ]);
            } else {
                Log::error("=== RESTORE FAILED ===");
                Log::error("Error: " . $result['message']);

                return response()->json([
                    'success' => false,
                    'message' => 'Gagal melakukan restore: ' . $result['message']
                ], 500);
            }
        } catch (Exception $e) {
            Log::error('=== RESTORE EXCEPTION ===');
            Log::error('Exception: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat restore: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Execute restore process - IMPROVED VERSION
     */
    private function executeRestore($filename)
    {
        try {
            $filePath = $this->backupPath . $filename;
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            Log::info("Starting restore process for file: $filename");

            if ($extension === 'sql') {
                // Try the improved PDO method first
                $result = $this->restoreFromSql($filePath);

                // If PDO method fails, try mysql command line as fallback
                if (!$result['success']) {
                    Log::info("PDO restore failed, trying mysql command line method");
                    $result = $this->restoreFromSqlUsingMysql($filePath);
                }

                return $result;
            } elseif ($extension === 'zip') {
                return $this->restoreFromZip($filePath);
            } else {
                return [
                    'success' => false,
                    'message' => 'Format file backup tidak didukung'
                ];
            }

        } catch (Exception $e) {
            Log::error('Execute restore error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Improved restore from SQL file - handles multi-line statements properly
     */
    private function restoreFromSql($filePath)
    {
        $pdo = null;
        $tempSqlPath = null;

        try {
            // Get SQL content
            $sqlContent = Storage::disk($this->backupDisk)->get($filePath);

            if (empty($sqlContent)) {
                return [
                    'success' => false,
                    'message' => 'File SQL kosong atau corrupt'
                ];
            }

            Log::info("SQL Content length: " . strlen($sqlContent) . " characters");

            // Create temporary SQL file
            $tempSqlPath = storage_path('app/temp/restore_' . time() . '.sql');
            $tempDir = dirname($tempSqlPath);

            if (!file_exists($tempDir)) {
                mkdir($tempDir, 0755, true);
            }

            file_put_contents($tempSqlPath, $sqlContent);

            // Get database connection
            $pdo = DB::connection()->getPdo();

            // Start transaction
            $pdo->beginTransaction();

            try {
                // Disable foreign key checks and autocommit
                $pdo->exec('SET FOREIGN_KEY_CHECKS=0');
                $pdo->exec('SET AUTOCOMMIT=0');
                $pdo->exec('SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"');

                // Split SQL into statements
                $statements = $this->splitSqlStatements($sqlContent);

                Log::info("Found " . count($statements) . " SQL statements to execute");

                $successCount = 0;
                $errorCount = 0;

                foreach ($statements as $index => $statement) {
                    $statement = trim($statement);

                    // Skip empty statements and comments
                    if (empty($statement) ||
                        substr($statement, 0, 2) === '--' ||
                        substr($statement, 0, 2) === '/*' ||
                        strtoupper(substr($statement, 0, 3)) === 'USE') {
                        continue;
                    }

                    try {
                        $pdo->exec($statement);
                        $successCount++;

                        if ($successCount % 100 === 0) {
                            Log::info("Processed $successCount statements...");
                        }
                    } catch (PDOException $e) {
                        $errorCount++;
                        $errorMessage = $e->getMessage();

                        Log::error("SQL Error at statement $index: " . $errorMessage . " | Statement: " . substr($statement, 0, 200));

                        // Skip non-critical errors
                        if (strpos($errorMessage, 'already exists') !== false ||
                            strpos($errorMessage, 'Duplicate entry') !== false ||
                            strpos($errorMessage, 'Unknown column') !== false ||
                            strpos($errorMessage, "doesn't exist") !== false) {
                            continue;
                        }

                        // For critical errors, rollback and fail
                        if (strpos($errorMessage, 'syntax error') !== false ||
                            strpos($errorMessage, 'Access denied') !== false) {
                            throw $e;
                        }
                    }
                }

                // Re-enable foreign key checks and autocommit
                $pdo->exec('SET FOREIGN_KEY_CHECKS=1');
                $pdo->exec('SET AUTOCOMMIT=1');

                // Commit transaction
                $pdo->commit();

                // Cleanup temp file
                if (file_exists($tempSqlPath)) {
                    unlink($tempSqlPath);
                }

                Log::info("Database restore completed. Success: $successCount, Errors: $errorCount");

                return [
                    'success' => true,
                    'message' => $errorCount > 0
                        ? "Database berhasil dikembalikan dengan $errorCount error minor (statements: $successCount berhasil)"
                        : "Database berhasil dikembalikan sepenuhnya ($successCount statements)"
                ];

            } catch (Exception $e) {
                // Rollback transaction on error
                $pdo->rollback();
                throw $e;
            }

        } catch (Exception $e) {
            // Ensure connection state is restored
            if ($pdo) {
                try {
                    $pdo->exec('SET FOREIGN_KEY_CHECKS=1');
                    $pdo->exec('SET AUTOCOMMIT=1');
                    if ($pdo->inTransaction()) {
                        $pdo->rollback();
                    }
                } catch (Exception $e2) {
                    Log::error('Error resetting connection state: ' . $e2->getMessage());
                }
            }

            // Cleanup temp file
            if ($tempSqlPath && file_exists($tempSqlPath)) {
                unlink($tempSqlPath);
            }

            Log::error('SQL restore error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error saat restore: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Split SQL content into individual statements properly
     */
    private function splitSqlStatements($sqlContent)
    {
        $statements = [];
        $current = '';

        // Remove BOM if present
        $sqlContent = preg_replace('/^\xEF\xBB\xBF/', '', $sqlContent);

        $lines = explode("\n", $sqlContent);

        foreach ($lines as $line) {
            $line = rtrim($line);

            // Skip empty lines and comment lines
            if (empty($line) ||
                substr(ltrim($line), 0, 2) === '--' ||
                substr(ltrim($line), 0, 1) === '#') {
                continue;
            }

            // Handle multi-line comments
            if (substr(ltrim($line), 0, 2) === '/*') {
                continue;
            }

            $current .= $line . "\n";

            // Simple check for statement end
            if (substr(rtrim($line), -1) === ';') {
                $statement = trim($current);
                if (!empty($statement)) {
                    $statements[] = $statement;
                }
                $current = '';
            }
        }

        // Add any remaining content
        if (!empty(trim($current))) {
            $statements[] = trim($current);
        }

        return array_filter($statements); // Remove empty statements
    }

    /**
     * Alternative method using mysql command line (more reliable for large dumps)
     */
    private function restoreFromSqlUsingMysql($filePath)
    {
        try {
            $tempSqlPath = storage_path('app/temp/restore_' . time() . '.sql');
            $tempDir = dirname($tempSqlPath);

            if (!file_exists($tempDir)) {
                mkdir($tempDir, 0755, true);
            }

            // Get SQL content and save to temporary file
            $sqlContent = Storage::disk($this->backupDisk)->get($filePath);
            file_put_contents($tempSqlPath, $sqlContent);

            Log::info("Using mysql command line restore with temp file: $tempSqlPath");

            // Build mysql command
            $mysqlPath = 'D:/Laragon/laragon/bin/mysql/mysql-8.0.30-winx64/bin/mysql.exe';

            // Check if mysql exists
            if (!file_exists($mysqlPath)) {
                // Try alternative paths
                $altPaths = [
                    'D:/Laragon/bin/mysql/mysql-8.0.30/bin/mysql.exe',
                    'D:/laragon/bin/mysql/mysql-8.0.30/bin/mysql.exe',
                    'mysql' // System PATH
                ];

                foreach ($altPaths as $altPath) {
                    if (file_exists($altPath) || $altPath === 'mysql') {
                        $mysqlPath = $altPath;
                        break;
                    }
                }
            }

            $command = [
                $mysqlPath,
                '-u', env('DB_USERNAME', 'root'),
                '--password=' . env('DB_PASSWORD', ''),
                '--host=' . env('DB_HOST', '127.0.0.1'),
                '--port=' . env('DB_PORT', '3306'),
                '--default-character-set=utf8mb4',
                env('DB_DATABASE', ''),
                '--execute=source ' . str_replace('\\', '/', $tempSqlPath)
            ];

            Log::info("Executing mysql command: " . implode(' ', array_slice($command, 0, -2)) . " [password hidden] [database] [source file]");

            $process = new Process($command, base_path());
            $process->setTimeout(1200); // 20 minutes timeout
            $process->run();

            // Cleanup temp file
            if (file_exists($tempSqlPath)) {
                unlink($tempSqlPath);
            }

            if ($process->isSuccessful()) {
                Log::info("MySQL command line restore successful");
                return [
                    'success' => true,
                    'message' => 'Database berhasil dikembalikan menggunakan mysql command'
                ];
            } else {
                $error = $process->getErrorOutput();
                Log::error('MySQL restore error output: ' . $error);
                Log::error('MySQL restore standard output: ' . $process->getOutput());

                return [
                    'success' => false,
                    'message' => 'Error mysql restore: ' . ($error ?: 'Unknown error')
                ];
            }

        } catch (Exception $e) {
            // Cleanup temp file on exception
            if (isset($tempSqlPath) && file_exists($tempSqlPath)) {
                unlink($tempSqlPath);
            }

            Log::error('MySQL restore exception: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Exception mysql restore: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Restore from ZIP file - IMPROVED VERSION
     */
    private function restoreFromZip($filePath)
    {
        try {
            $fileContent = Storage::disk($this->backupDisk)->get($filePath);
            $tempZipPath = storage_path('app/temp/restore_' . time() . '.zip');
            $tempDir = dirname($tempZipPath);

            if (!file_exists($tempDir)) {
                mkdir($tempDir, 0755, true);
            }

            file_put_contents($tempZipPath, $fileContent);

            Log::info("Extracting ZIP file: $tempZipPath");

            // Extract ZIP
            $zip = new \ZipArchive();
            $result = $zip->open($tempZipPath);

            if ($result !== TRUE) {
                return [
                    'success' => false,
                    'message' => 'Gagal membuka file ZIP: ' . $result
                ];
            }

            $extractPath = storage_path('app/temp/extract_' . time());
            $zip->extractTo($extractPath);
            $zip->close();

            // Look for database.sql in extracted files
            $sqlFile = $extractPath . '/database.sql';
            if (file_exists($sqlFile)) {
                Log::info("Found database.sql in ZIP, file size: " . filesize($sqlFile));

                // Create temporary storage path for SQL
                $tempSqlStorage = 'temp/database_restore_' . time() . '.sql';
                Storage::disk($this->backupDisk)->put($tempSqlStorage, file_get_contents($sqlFile));

                // Try to restore the database
                $result = $this->restoreFromSql($tempSqlStorage);

                // If PDO method fails, try mysql command line
                if (!$result['success']) {
                    Log::info("PDO method failed for ZIP restore, trying mysql command line");
                    $result = $this->restoreFromSqlUsingMysql($tempSqlStorage);
                }

                // Cleanup
                Storage::disk($this->backupDisk)->delete($tempSqlStorage);
            } else {
                $result = [
                    'success' => false,
                    'message' => 'File database.sql tidak ditemukan dalam backup ZIP'
                ];
            }

            // Cleanup temp files
            $this->deleteDirectory($extractPath);
            if (file_exists($tempZipPath)) {
                unlink($tempZipPath);
            }

            return $result;

        } catch (Exception $e) {
            Log::error('ZIP restore error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error saat restore ZIP: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Delete directory recursively
     */
    private function deleteDirectory($dir)
    {
        if (!is_dir($dir)) {
            return;
        }

        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            $path = $dir . '/' . $file;
            if (is_dir($path)) {
                $this->deleteDirectory($path);
            } else {
                unlink($path);
            }
        }
        rmdir($dir);
    }

    /**
     * Delete backup file
     */
    public function deleteBackup($filename)
    {
        try {
            $filePath = $this->backupPath . $filename;

            if (!Storage::disk($this->backupDisk)->exists($filePath)) {
                return response()->json([
                    'success' => false,
                    'message' => 'File backup tidak ditemukan!'
                ], 404);
            }

            Storage::disk($this->backupDisk)->delete($filePath);

            return response()->json([
                'success' => true,
                'message' => 'Backup berhasil dihapus: ' . $filename
            ]);
        } catch (Exception $e) {
            Log::error('Delete backup error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus backup: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get list of backup files
     */
    public function listBackups()
    {
        $backups = $this->getBackupFiles();

        return response()->json([
            'success' => true,
            'backups' => $backups
        ]);
    }

    /**
     * Get backup files from storage
     */
    private function getBackupFiles()
    {
        $files = [];

        try {
            if (!Storage::disk($this->backupDisk)->exists($this->backupPath)) {
                Storage::disk($this->backupDisk)->makeDirectory($this->backupPath);
            }

            $backupFiles = Storage::disk($this->backupDisk)->files($this->backupPath);

            foreach ($backupFiles as $file) {
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                if (in_array($extension, ['zip', 'sql'])) {
                    $filename = basename($file);
                    $size = Storage::disk($this->backupDisk)->size($file);
                    $lastModified = Storage::disk($this->backupDisk)->lastModified($file);

                    $backupLog = null;
                    if (Schema::hasTable('backup_logs')) {
                        $query = DB::table('backup_logs')->where('filename', $filename);
                        if (Schema::hasColumn('backup_logs', 'type')) {
                            $query->where('type', 'backup');
                        }
                        $backupLog = $query->first();
                    }

                    $files[] = [
                        'filename' => $filename,
                        'size' => $this->formatBytes($size),
                        'size_raw' => $size,
                        'date' => $backupLog && isset($backupLog->backup_date)
                                 ? Carbon::parse($backupLog->backup_date)->format('d M Y H:i')
                                 : Carbon::createFromTimestamp($lastModified)->format('d M Y H:i'),
                        'date_raw' => $backupLog && isset($backupLog->backup_date)
                                 ? Carbon::parse($backupLog->backup_date)->timestamp
                                 : $lastModified,
                        'download_url' => route('admin.backup.download', $filename),
                        'delete_url' => route('admin.backup.delete', $filename),
                        'log_id' => $backupLog ? $backupLog->id : null,
                        'admin_name' => $backupLog ? $backupLog->admin_name : 'System'
                    ];
                }
            }

            usort($files, function($a, $b) {
                return $b['date_raw'] - $a['date_raw'];
            });

        } catch (Exception $e) {
            Log::error('Get backup files error: ' . $e->getMessage());
        }

        return $files;
    }

    /**
     * Get the latest backup file
     */
    private function getLatestBackup()
    {
        $backups = $this->getBackupFiles();
        return count($backups) > 0 ? $backups[0] : null;
    }

    /**
     * Format bytes to human readable format
     */
    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        if ($bytes <= 0) return '0 B';
        $pow = floor(log($bytes) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    /**
     * Create restore log entry
     */
    private function createRestoreLog($filename)
    {
        try {
            if (!Schema::hasTable('backup_logs')) {
                return;
            }

            $data = [
                'filename' => $filename,
                'admin_id' => auth()->id(),
                'admin_name' => auth()->user()->name ?? 'System',
                'restored_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ];

            if (Schema::hasColumn('backup_logs', 'type')) {
                $data['type'] = 'restore';
            }

            DB::table('backup_logs')->insert($data);
        } catch (Exception $e) {
            Log::error('Create restore log error: ' . $e->getMessage());
        }
    }

    /**
     * Get current database state for comparison
     */
    private function getDatabaseState()
    {
        try {
            $pdo = DB::connection()->getPdo();
            $tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);

            $state = [
                'table_count' => count($tables),
                'tables' => []
            ];

            foreach ($tables as $table) {
                $countResult = $pdo->query("SELECT COUNT(*) as count FROM `$table`")->fetch(PDO::FETCH_ASSOC);
                $state['tables'][$table] = (int)$countResult['count'];
            }

            return $state;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Debug method to check backup file content
     */
    public function debugBackup($filename)
    {
        try {
            $filePath = $this->backupPath . $filename;

            if (!Storage::disk($this->backupDisk)->exists($filePath)) {
                return response()->json([
                    'success' => false,
                    'message' => 'File tidak ditemukan'
                ]);
            }

            $content = Storage::disk($this->backupDisk)->get($filePath);
            $fileSize = Storage::disk($this->backupDisk)->size($filePath);

            // Get first 2000 characters for preview
            $preview = substr($content, 0, 2000);

            // Count lines
            $lineCount = substr_count($content, "\n");

            // Check for common SQL patterns
            $hasCreateTable = strpos($content, 'CREATE TABLE') !== false;
            $hasInsertInto = strpos($content, 'INSERT INTO') !== false;
            $hasDrop = strpos($content, 'DROP TABLE') !== false;

            return response()->json([
                'success' => true,
                'debug_info' => [
                    'filename' => $filename,
                    'file_size' => $this->formatBytes($fileSize),
                    'file_size_bytes' => $fileSize,
                    'line_count' => $lineCount,
                    'has_create_table' => $hasCreateTable,
                    'has_insert_into' => $hasInsertInto,
                    'has_drop_table' => $hasDrop,
                    'content_preview' => $preview,
                    'encoding' => mb_detect_encoding($content, ['UTF-8', 'ISO-8859-1', 'ASCII']),
                ]
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Test restore without actually executing (dry run)
     */
    public function testRestore(Request $request)
    {
        $request->validate([
            'filename' => 'required|string',
        ]);

        try {
            $filename = $request->filename;
            $filePath = $this->backupPath . $filename;

            if (!Storage::disk($this->backupDisk)->exists($filePath)) {
                return response()->json([
                    'success' => false,
                    'message' => 'File backup tidak ditemukan!'
                ]);
            }

            // Get SQL content
            $sqlContent = Storage::disk($this->backupDisk)->get($filePath);

            if (empty($sqlContent)) {
                return response()->json([
                    'success' => false,
                    'message' => 'File SQL kosong'
                ]);
            }

            // Parse SQL content
            $statements = $this->splitSqlStatements($sqlContent);

            $analysis = [
                'total_statements' => count($statements),
                'create_table_count' => 0,
                'insert_count' => 0,
                'drop_table_count' => 0,
                'other_count' => 0,
                'tables_found' => [],
                'potential_issues' => []
            ];

            foreach ($statements as $statement) {
                $statement = trim($statement);
                $upperStatement = strtoupper($statement);

                if (strpos($upperStatement, 'CREATE TABLE') !== false) {
                    $analysis['create_table_count']++;
                    // Extract table name
                    if (preg_match('/CREATE TABLE[^`]*`([^`]+)`/', $statement, $matches)) {
                        $analysis['tables_found'][] = $matches[1];
                    }
                } elseif (strpos($upperStatement, 'INSERT INTO') !== false) {
                    $analysis['insert_count']++;
                } elseif (strpos($upperStatement, 'DROP TABLE') !== false) {
                    $analysis['drop_table_count']++;
                } else {
                    $analysis['other_count']++;
                }
            }

            // Check for potential issues
            if ($analysis['create_table_count'] === 0) {
                $analysis['potential_issues'][] = 'Tidak ada CREATE TABLE statement ditemukan';
            }

            if ($analysis['drop_table_count'] === 0) {
                $analysis['potential_issues'][] = 'Tidak ada DROP TABLE statement - data mungkin akan duplicate';
            }

            return response()->json([
                'success' => true,
                'message' => 'Analisis backup berhasil',
                'analysis' => $analysis
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error analisis: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Verify database state before and after restore
     */
    public function verifyDatabaseState()
    {
        try {
            $pdo = DB::connection()->getPdo();

            // Get all tables
            $tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);

            $tableInfo = [];
            foreach ($tables as $table) {
                // Get row count
                $countResult = $pdo->query("SELECT COUNT(*) as count FROM `$table`")->fetch(PDO::FETCH_ASSOC);

                // Get table structure info
                $columnsResult = $pdo->query("SHOW COLUMNS FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);

                $tableInfo[$table] = [
                    'row_count' => $countResult['count'],
                    'column_count' => count($columnsResult),
                    'columns' => array_column($columnsResult, 'Field')
                ];
            }

            return response()->json([
                'success' => true,
                'database_state' => [
                    'total_tables' => count($tables),
                    'tables' => $tableInfo,
                    'timestamp' => now()->toDateTimeString()
                ]
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error getting database state: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Create custom backup using mysqldump
     */
    public function createCustomBackup(Request $request)
    {
        try {
            $backupName = $request->name ?: 'backup_' . Carbon::now()->format('Ymd_His');
            $filename = $backupName . '.sql';
            $filePath = $this->backupPath . $filename;

            // Use mysqldump command
            $command = [
                'D:\\Laragon\\laragon\\bin\\mysql\\mysql-8.0.30-winx64\\bin\\mysqldump.exe',
                '-u', env('DB_USERNAME', 'root'),
                '-p' . env('DB_PASSWORD', ''),
                '--socket=D:/Laragon/tmp/mysql.sock',
                env('DB_DATABASE', 'webstudiomusik'),
                '--result-file=' . storage_path('app/' . $filePath)
            ];

            $process = new Process($command, base_path());
            $process->setTimeout(300);
            $process->run();

            if ($process->isSuccessful()) {
                $size = Storage::disk($this->backupDisk)->size($filePath);
                $this->createBackupLog($filename, $size, false);

                return response()->json([
                    'success' => true,
                    'message' => 'Backup custom berhasil dibuat: ' . $filename
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal backup custom: ' . $process->getErrorOutput()
                ], 500);
            }

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
