<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class SyncExistingBackups extends Command
{
    protected $signature = 'backup:sync';
    protected $description = 'Sync existing backup files to database';

    public function handle()
    {
        if (!Schema::hasTable('backup_logs')) {
            $this->error('Table backup_logs does not exist!');
            return;
        }

        $backupDisk = config('backup.backup.destination.disks')[0] ?? 'local';
        $backupPath = config('backup.backup.name', 'Laravel') . '/';

        if (!Storage::disk($backupDisk)->exists($backupPath)) {
            $this->info('No backup directory found.');
            return;
        }

        $backupFiles = Storage::disk($backupDisk)->files($backupPath);
        $count = 0;

        foreach ($backupFiles as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'zip') {
                $filename = basename($file);

                // Cek apakah kolom 'type' ada di tabel
                $hasTypeColumn = Schema::hasColumn('backup_logs', 'type');

                // Cek apakah sudah ada di database
                $query = DB::table('backup_logs')->where('filename', $filename);

                if ($hasTypeColumn) {
                    $query->where('type', 'backup');
                }

                $exists = $query->exists();

                if (!$exists) {
                    $size = Storage::disk($backupDisk)->size($file);
                    $lastModified = Storage::disk($backupDisk)->lastModified($file);

                    $data = [
                        'filename' => $filename,
                        'admin_id' => null,
                        'admin_name' => 'System (Sync)',
                        'size' => $size,
                        'path' => $file,
                        'backup_date' => Carbon::createFromTimestamp($lastModified),
                        'notes' => 'Backup existing yang disinkronisasi',
                        'created_at' => now(),
                        'updated_at' => now()
                    ];

                    // Tambahkan kolom type jika ada
                    if ($hasTypeColumn) {
                        $data['type'] = 'backup';
                    }

                    DB::table('backup_logs')->insert($data);

                    $count++;
                    $this->info("Added: $filename");
                }
            }
        }

        $this->info("Synced $count backup files to database.");
    }
}
