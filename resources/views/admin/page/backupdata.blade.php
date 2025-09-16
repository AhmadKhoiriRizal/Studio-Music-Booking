<!DOCTYPE html>
<html lang="id">
<head>
    <title>Backup Database | Studio Musik</title>
    <meta charset="utf-8" />
    <!-- Add this meta tag in your head section if not already present -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sistem backup dan restore database untuk Studio Musik" />
    <meta name="keywords" content="backup, restore, database, studio musik" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Backup Database | Studio Musik" />
    <link rel="canonical" href="#" />
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Vendor Stylesheets-->
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->

    <!--begin::Global Stylesheets Bundle-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <style>
        .card-backup {
            border-left: 4px solid #50cd89;
        }
        .card-restore {
            border-left: 4px solid #f1416c;
        }
        .backup-item {
            transition: all 0.3s ease;
        }
        .backup-item:hover {
            background-color: #f5f8fa;
        }
        .progress {
            height: 10px;
        }
        .backup-icon {
            color: #50cd89;
        }
        .restore-icon {
            color: #f1416c;
        }
    </style>
</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">

    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->

    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            @include('admin.layout.header')
            <!--end::Header-->

            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                @include('admin.layout.sidebar')
                <!--end::Sidebar-->

                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                                        Backup Database
                                    </h1>
                                    <!--end::Title-->

                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="/" class="text-muted text-hover-primary">
                                                Home </a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            Sistem </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->

                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            Backup Database </li>
                                        <!--end::Item-->
                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <!--begin::Row-->
                                <div class="row g-6 g-xl-9 mb-8">
                                    <div class="col-md-6">
                                        <div class="card card-backup h-100">
                                            <div class="card-header">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold text-dark">Backup Database</span>
                                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Buat cadangan database saat ini</span>
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <form id="backupForm">
                                                    @csrf
                                                    <div class="d-flex flex-column">
                                                        <div class="d-flex align-items-center mb-7">
                                                            <span class="backup-icon me-5">
                                                                <i class="ki-duotone ki-database fs-2hx">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i>
                                                            </span>
                                                            <div class="flex-grow-1">
                                                                <span class="text-gray-800 fw-bold fs-6">Backup Lengkap</span>
                                                                <span class="text-gray-400 fw-semibold d-block">Database & file media</span>
                                                            </div>
                                                        </div>

                                                        <div class="separator separator-dashed my-5"></div>

                                                        <div class="mb-5">
                                                            <label for="backupName" class="form-label fw-semibold">Nama Backup (opsional)</label>
                                                            <input type="text" class="form-control form-control-solid" id="backupName" name="name" placeholder="Masukkan nama backup">
                                                        </div>

                                                        <div class="form-check form-check-custom form-check-solid mb-5">
                                                            <input class="form-check-input" type="checkbox" value="1" id="includeMedia" name="include_media" checked />
                                                            <label class="form-check-label fw-semibold" for="includeMedia">
                                                                Sertakan file media (gambar, dokumen, dll.)
                                                            </label>
                                                        </div>

                                                        <button type="button" class="btn btn-primary w-100" id="backupBtn">
                                                            <i class="ki-duotone ki-download fs-2 me-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            Buat Backup Sekarang
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card card-restore h-100">
                                            <div class="card-header">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold text-dark">Restore Database</span>
                                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Kembalikan database dari cadangan</span>
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <form id="restoreForm">
                                                    @csrf
                                                    <div class="d-flex flex-column">
                                                        <div class="d-flex align-items-center mb-7">
                                                            <span class="restore-icon me-5">
                                                                <i class="ki-duotone ki-reset fs-2hx">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i>
                                                            </span>
                                                            <div class="flex-grow-1">
                                                                <span class="text-gray-800 fw-bold fs-6">Pulihkan Sistem</span>
                                                                <span class="text-gray-400 fw-semibold d-block">Gunakan backup sebelumnya</span>
                                                            </div>
                                                        </div>

                                                        <div class="separator separator-dashed my-5"></div>

                                                        <div class="mb-5">
                                                            <label for="restoreFile" class="form-label fw-semibold">Pilih File Backup</label>
                                                            <select class="form-select form-select-solid" id="restoreFile" name="filename" data-control="select2" data-placeholder="Pilih backup yang akan dikembalikan">
                                                                <option></option>
                                                                @foreach($backups as $backup)
                                                                    <option value="{{ $backup['filename'] }}">{{ $backup['filename'] }} ({{ $backup['size'] }}) - {{ $backup['date'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-4 mb-5">
                                                            <i class="ki-duotone ki-information fs-2hx text-warning me-4">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                            <div class="d-flex flex-stack flex-grow-1">
                                                                <div class="fw-semibold">
                                                                    <div class="fs-6 text-gray-700">
                                                                        <strong>Peringatan:</strong> Proses restore akan menggantikan data saat ini dengan data dari backup. Pastikan Anda telah membuat backup terbaru sebelum melanjutkan.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn btn-danger w-100" id="restoreBtn">
                                                            <i class="ki-duotone ki-reload fs-2 me-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                            Restore Database
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Row-->

                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 pt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Riwayat Backup</h2>
                                        </div>
                                        <!--end::Card title-->

                                        <!--begin::Card toolbar-->
                                        <!-- Update the card toolbar section -->
<div class="card-toolbar">
    <div class="d-flex justify-content-end" data-kt-backup-table-toolbar="base">
        <!-- Verify Database button -->
        <button type="button" class="btn btn-light-info me-3" onclick="verifyDatabaseState()">
            <i class="ki-duotone ki-shield-tick fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            Verify Database
        </button>

        <!-- Refresh button -->
        <button type="button" class="btn btn-light-primary me-3" id="refreshBackupsBtn">
            <i class="ki-duotone ki-reload fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            Refresh
        </button>
    </div>
</div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body py-4">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_backup">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="min-w-100px">Nama File</th>
                                                    <th class="min-w-80px">Ukuran</th>
                                                    <th class="min-w-100px">Tanggal</th>
                                                    <th class="min-w-100px">Dibuat Oleh</th>
                                                    <th class="min-w-80px">Status</th>
                                                    <th class="min-w-100px text-end">Aksi</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                                @foreach($backups as $backup)
                                                <tr class="backup-item">
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-40px me-3">
                                                                <span class="symbol-label bg-light-primary">
                                                                    <i class="ki-duotone ki-file-sql text-primary fs-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <span class="text-gray-800 fw-bold">{{ $backup['filename'] }}</span>
                                                                <span class="text-gray-400">Backup lengkap</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $backup['size'] }}</td>
                                                    <td>{{ $backup['date'] }}</td>
                                                    <td>{{ $backup['admin_name'] }}</td>
                                                    <td>
                                                        <span class="badge badge-light-success">Selesai</span>
                                                    </td>
                                                    <!-- Update the action buttons in your backup table -->
<td class="text-end">
    <!-- Download button -->
    <a href="{{ route('admin.backup.download', $backup['filename']) }}"
       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
       title="Download">
        <i class="ki-duotone ki-download fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </a>

    <!-- Debug button -->
    <button class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1 debug-btn"
            data-filename="{{ $backup['filename'] }}"
            title="Debug Backup"
            onclick="debugBackupFile('{{ $backup['filename'] }}')">
        <i class="ki-duotone ki-code fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
            <span class="path4"></span>
        </i>
    </button>

    <!-- Test Restore button -->
    <button class="btn btn-icon btn-bg-light btn-active-color-warning btn-sm me-1 test-restore-btn"
            data-filename="{{ $backup['filename'] }}"
            title="Test Restore"
            onclick="testRestoreBackup('{{ $backup['filename'] }}')">
        <i class="ki-duotone ki-shield-search fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </button>

    <!-- Restore button -->
    <button class="btn btn-icon btn-bg-light btn-active-color-success btn-sm me-1 restore-btn"
            data-filename="{{ $backup['filename'] }}"
            title="Restore">
        <i class="ki-duotone ki-reload fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
        </i>
    </button>

    <!-- Delete button -->
    <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm delete-btn"
            data-filename="{{ $backup['filename'] }}"
            title="Hapus">
        <i class="ki-duotone ki-trash fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
            <span class="path4"></span>
            <span class="path5"></span>
        </i>
    </button>
</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->

                    <!--begin::Footer-->
                    @include('admin.layout.footer')
                    <!--end::Footer-->
                </div>
                <!--end::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
    </div>
    <!--end::Scrolltop-->

    <!--begin::Modals-->
    <!--begin::Modal - Backup Progress-->
    <div class="modal fade" id="kt_modal_backup" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">Membuat Backup Database</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="text-center mb-10">
                        <i class="ki-duotone ki-database fs-2hx text-primary">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </div>

                    <div class="fs-5 fw-semibold text-gray-600 mb-5 text-center">Sedang membuat backup database. Harap tunggu...</div>

                    <div class="progress mb-5">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%"></div>
                    </div>

                    <div class="backup-status text-center"></div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal - Backup Progress-->

    <!--begin::Modal - Restore Confirmation-->
<div class="modal fade" id="kt_modal_restore" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Konfirmasi Restore Database</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body py-10 px-lg-17">
                <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6 mb-10">
                    <i class="ki-duotone ki-information fs-2hx text-danger me-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                    <div class="d-flex flex-stack flex-grow-1">
                        <div class="fw-semibold">
                            <div class="fs-6 text-gray-700">
                                <strong>PERINGATAN:</strong> Ini akan menggantikan semua data saat ini dengan data dari backup.
                                Proses ini tidak dapat dibatalkan. Yakin ingin melanjutkan?
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="adminPassword" class="form-label fw-semibold">Password Admin untuk Konfirmasi</label>
                    <input type="password" class="form-control form-control-solid" id="adminPassword" placeholder="Masukkan password admin">
                </div>
            </div>
            <div class="modal-footer flex-center">
                <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmRestoreBtn">Ya, Restore Database</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal - Restore Confirmation-->

<!--begin::Modal - Delete Confirmation-->
<div class="modal fade" id="kt_modal_delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-500px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Konfirmasi Hapus Backup</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body py-10 px-lg-17">
                <div class="text-center mb-10">
                    <i class="ki-duotone ki-trash fs-2hx text-danger">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>
                </div>

                <div class="fs-5 fw-semibold text-gray-600 mb-5 text-center">
                    Apakah Anda yakin ingin menghapus backup <span id="deleteFileName" class="fw-bold text-danger"></span>?
                    File yang dihapus tidak dapat dikembalikan.
                </div>
            </div>
            <div class="modal-footer flex-center">
                <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Ya, Hapus Backup</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal - Delete Confirmation-->
<!--end::Modals-->

<!--begin::Javascript-->
<script>
    var hostUrl = "{{ asset('') }}";
</script>

<!--begin::Global Javascript Bundle-->
<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Vendors Javascript-->
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Vendors Javascript-->

<!-- Alternative: if you prefer to keep it inline, replace the existing script section with: -->
<script src="{{ asset('js/backup-management.js') }}"></script>

<script>
// Include the complete JavaScript here


// Complete Enhanced JavaScript for Backup Management

document.addEventListener("DOMContentLoaded", function() {
    console.log("Backup Management JavaScript loaded");

    // Initialize all event handlers
    initializeBackupHandlers();
    initializeRestoreHandlers();
    initializeDebugHandlers();
    initializeDeleteHandlers();
    initializeRefreshHandler();
});

// Initialize backup handlers
function initializeBackupHandlers() {
    const backupBtn = document.getElementById('backupBtn');
    if (backupBtn) {
        backupBtn.addEventListener('click', function() {
            const backupName = document.getElementById('backupName').value;
            const includeMedia = document.getElementById('includeMedia').checked;

            // Tampilkan modal backup
            const backupModal = new bootstrap.Modal(document.getElementById('kt_modal_backup'));
            backupModal.show();

            // Kirim request backup
            createBackup(backupName, includeMedia);
        });
    }
}

// Initialize restore handlers
function initializeRestoreHandlers() {
    const restoreBtn = document.getElementById('restoreBtn');
    if (restoreBtn) {
        restoreBtn.addEventListener('click', function() {
            const selectedFile = document.getElementById('restoreFile').value;
            if (!selectedFile) {
                Swal.fire({
                    text: "Harap pilih file backup terlebih dahulu!",
                    icon: "warning",
                    buttonsStyling: false,
                    confirmButtonText: "Mengerti",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
                return;
            }

            const restoreModal = new bootstrap.Modal(document.getElementById('kt_modal_restore'));
            restoreModal.show();
        });
    }

    // Enhanced restore confirmation
    const confirmRestoreBtn = document.getElementById('confirmRestoreBtn');
    if (confirmRestoreBtn) {
        confirmRestoreBtn.addEventListener('click', function() {
            const password = document.getElementById('adminPassword').value;
            const filename = document.getElementById('restoreFile').value;

            if (!password) {
                Swal.fire({
                    text: "Harap masukkan password admin!",
                    icon: "warning",
                    buttonsStyling: false,
                    confirmButtonText: "Mengerti",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
                return;
            }

            // Close modal
            const restoreModal = bootstrap.Modal.getInstance(document.getElementById('kt_modal_restore'));
            restoreModal.hide();

            // Use enhanced restore
            enhancedRestoreBackup(filename, password);
        });
    }

    // Handle restore from table buttons
    document.querySelectorAll('.restore-btn').forEach(button => {
        button.addEventListener('click', function() {
            const filename = this.getAttribute('data-filename');
            document.getElementById('restoreFile').value = filename;

            const restoreModal = new bootstrap.Modal(document.getElementById('kt_modal_restore'));
            restoreModal.show();
        });
    });
}

// Initialize debug handlers
function initializeDebugHandlers() {
    // Add debug buttons to backup table rows
    document.querySelectorAll('.backup-item').forEach(row => {
        const filename = row.querySelector('.restore-btn')?.getAttribute('data-filename');
        if (filename) {
            // Add debug button (you can customize this placement)
            const actionsTd = row.querySelector('td:last-child');
            if (actionsTd) {
                const debugBtn = document.createElement('button');
                debugBtn.className = 'btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1';
                debugBtn.title = 'Debug Backup';
                debugBtn.innerHTML = '<i class="ki-duotone ki-code fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>';
                debugBtn.addEventListener('click', () => debugBackupFile(filename));

                const testBtn = document.createElement('button');
                testBtn.className = 'btn btn-icon btn-bg-light btn-active-color-warning btn-sm me-1';
                testBtn.title = 'Test Restore';
                testBtn.innerHTML = '<i class="ki-duotone ki-shield-search fs-2"><span class="path1"></span><span class="path2"></span></i>';
                testBtn.addEventListener('click', () => testRestoreBackup(filename));

                // Insert before the existing first button
                const firstBtn = actionsTd.querySelector('.btn');
                if (firstBtn) {
                    actionsTd.insertBefore(debugBtn, firstBtn);
                    actionsTd.insertBefore(testBtn, firstBtn);
                }
            }
        }
    });

    // Add verify database button to toolbar
    const toolbar = document.querySelector('[data-kt-backup-table-toolbar="base"]');
    if (toolbar) {
        const verifyBtn = document.createElement('button');
        verifyBtn.type = 'button';
        verifyBtn.className = 'btn btn-light-info me-3';
        verifyBtn.innerHTML = '<i class="ki-duotone ki-shield-tick fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Verify Database';
        verifyBtn.addEventListener('click', verifyDatabaseState);

        toolbar.appendChild(verifyBtn);
    }
}

// Initialize delete handlers
function initializeDeleteHandlers() {
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    let currentDeleteFilename = '';

    // Handle delete buttons from table
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const filename = this.getAttribute('data-filename');
            currentDeleteFilename = filename;

            document.getElementById('deleteFileName').textContent = filename;
            const deleteModal = new bootstrap.Modal(document.getElementById('kt_modal_delete'));
            deleteModal.show();
        });
    });

    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener('click', function() {
            const deleteModal = bootstrap.Modal.getInstance(document.getElementById('kt_modal_delete'));
            deleteModal.hide();
            deleteBackup(currentDeleteFilename);
        });
    }
}

// Initialize refresh handler
function initializeRefreshHandler() {
    const refreshBtn = document.getElementById('refreshBackupsBtn');
    if (refreshBtn) {
        refreshBtn.addEventListener('click', function() {
            refreshBackupsList();
        });
    }
}

// Enhanced backup creation function
function createBackup(name, includeMedia) {
    const formData = new FormData();
    formData.append('_token', document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}');
    if (name) formData.append('name', name);
    formData.append('include_media', includeMedia ? 1 : 0);

    // Simulate progress bar
    simulateBackupProgress();

    // Send AJAX request
    fetch('/admin/backup/create', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.querySelector('.backup-status').innerHTML =
                '<div class="alert alert-success mt-3">' +
                '<i class="ki-duotone ki-check-circle fs-2 me-2">' +
                '<span class="path1"></span><span class="path2"></span>' +
                '</i>' + data.message + '</div>';

            setTimeout(() => {
                refreshBackupsList();
                const backupModal = bootstrap.Modal.getInstance(document.getElementById('kt_modal_backup'));
                backupModal.hide();

                Swal.fire({
                    text: data.message,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Mengerti",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }, 2000);
        } else {
            document.querySelector('.backup-status').innerHTML =
                '<div class="alert alert-danger mt-3">' +
                '<i class="ki-duotone ki-cross-circle fs-2 me-2">' +
                '<span class="path1"></span><span class="path2"></span>' +
                '</i>' + data.message + '</div>';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.querySelector('.backup-status').innerHTML =
            '<div class="alert alert-danger mt-3">' +
            '<i class="ki-duotone ki-cross-circle fs-2 me-2">' +
            '<span class="path1"></span><span class="path2"></span>' +
            '</i>Terjadi kesalahan saat membuat backup</div>';
    });
}

// Enhanced restore function with debugging
function enhancedRestoreBackup(filename, password) {
    const formData = new FormData();
    formData.append('_token', document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}');
    formData.append('filename', filename);
    formData.append('password', password);

    // Show loading with debug info
    Swal.fire({
        title: 'Memulihkan database...',
        html: `
            <div class="text-left">
                <p><strong>File:</strong> ${filename}</p>
                <p><strong>Status:</strong> <span id="restore-status">Memulai proses...</span></p>
                <div class="progress mt-3" style="height: 20px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                         role="progressbar" style="width: 10%" id="restore-progress"></div>
                </div>
                <div class="mt-3">
                    <small><strong>Tips:</strong> Proses ini mungkin memakan waktu beberapa menit tergantung ukuran backup.</small>
                </div>
            </div>
        `,
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Update progress periodically
    const progressInterval = setInterval(() => {
        const progressBar = document.getElementById('restore-progress');
        const statusSpan = document.getElementById('restore-status');

        if (progressBar && statusSpan) {
            const currentWidth = parseInt(progressBar.style.width);
            if (currentWidth < 90) {
                progressBar.style.width = (currentWidth + 5) + '%';

                if (currentWidth < 30) {
                    statusSpan.textContent = 'Membaca file backup...';
                } else if (currentWidth < 60) {
                    statusSpan.textContent = 'Memproses SQL statements...';
                } else {
                    statusSpan.textContent = 'Menerapkan perubahan ke database...';
                }
            }
        }
    }, 800);

    // Send request
    fetch('/admin/backup/restore-enhanced', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        clearInterval(progressInterval);

        if (data.success) {
            const beforeTables = data.before_state?.table_count || 'N/A';
            const afterTables = data.after_state?.table_count || 'N/A';

            // Calculate changes
            let changesText = '';
            if (data.before_state && data.after_state) {
                const beforeTotal = Object.values(data.before_state.tables || {}).reduce((sum, count) => sum + count, 0);
                const afterTotal = Object.values(data.after_state.tables || {}).reduce((sum, count) => sum + count, 0);
                changesText = `<p><strong>Total Records:</strong> ${beforeTotal.toLocaleString()} → ${afterTotal.toLocaleString()}</p>`;
            }

            Swal.fire({
                title: 'Restore Berhasil!',
                html: `
                    <div class="text-left">
                        <p><strong>File:</strong> ${filename}</p>
                        <p><strong>Pesan:</strong> ${data.message}</p>
                        <hr>
                        <h6>Perbandingan Database:</h6>
                        <p><strong>Tabel Sebelum:</strong> ${beforeTables}</p>
                        <p><strong>Tabel Sesudah:</strong> ${afterTables}</p>
                        ${changesText}
                        <div class="alert alert-success mt-3">
                            <small><i class="ki-duotone ki-information-5 fs-2 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                            Database telah berhasil dikembalikan ke kondisi saat backup dibuat.</small>
                        </div>
                    </div>
                `,
                icon: 'success',
                confirmButtonText: 'Mengerti',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            }).then(() => {
                window.location.reload();
            });
        } else {
            Swal.fire({
                title: 'Restore Gagal!',
                html: `
                    <div class="text-left">
                        <p><strong>File:</strong> ${filename}</p>
                        <p><strong>Error:</strong> ${data.message}</p>
                        <hr>
                        <div class="alert alert-danger">
                            <small><i class="ki-duotone ki-information-4 fs-2 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                            Silakan cek log aplikasi untuk detail error atau coba dengan file backup yang berbeda.</small>
                        </div>
                    </div>
                `,
                icon: 'error',
                confirmButtonText: 'Mengerti',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        }
    })
    .catch(error => {
        clearInterval(progressInterval);
        console.error('Error:', error);
        Swal.fire({
            title: 'Error!',
            html: `
                <div class="text-left">
                    <p>Terjadi kesalahan saat memulihkan database:</p>
                    <p><strong>File:</strong> ${filename}</p>
                    <div class="alert alert-warning mt-3">
                        <small>Silakan periksa koneksi internet dan coba lagi.</small>
                    </div>
                </div>
            `,
            icon: 'error',
            confirmButtonText: 'Mengerti',
            customClass: {
                confirmButton: 'btn btn-primary'
            }
        });
    });
}

// Debug backup file function
function debugBackupFile(filename) {
    Swal.fire({
        title: 'Menganalisis file backup...',
        text: 'Sedang memeriksa isi file backup',
        icon: 'info',
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    fetch(`/admin/backup/debug/${filename}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const info = data.debug_info;
            const hasIssues = !info.has_create_table || !info.has_insert_into;

            Swal.fire({
                title: 'Analisis File Backup',
                html: `
                    <div class="text-left">
                        <h6>Informasi File:</h6>
                        <p><strong>Nama:</strong> ${info.filename}</p>
                        <p><strong>Ukuran:</strong> ${info.file_size} (${info.file_size_bytes.toLocaleString()} bytes)</p>
                        <p><strong>Baris:</strong> ${info.line_count.toLocaleString()}</p>
                        <p><strong>Encoding:</strong> ${info.encoding}</p>

                        <hr>
                        <h6>Isi SQL:</h6>
                        <p><strong>CREATE TABLE:</strong> ${info.has_create_table ? '<span class="text-success">✓ Ada</span>' : '<span class="text-danger">✗ Tidak ada</span>'}</p>
                        <p><strong>INSERT INTO:</strong> ${info.has_insert_into ? '<span class="text-success">✓ Ada</span>' : '<span class="text-warning">✗ Tidak ada</span>'}</p>
                        <p><strong>DROP TABLE:</strong> ${info.has_drop_table ? '<span class="text-success">✓ Ada</span>' : '<span class="text-warning">✗ Tidak ada</span>'}</p>

                        ${hasIssues ? '<div class="alert alert-warning mt-3"><small><strong>Peringatan:</strong> File ini mungkin tidak lengkap atau corrupt.</small></div>' : ''}

                        <hr>
                        <h6>Preview Konten:</h6>
                        <pre style="max-height: 200px; overflow-y: auto; font-size: 10px; text-align: left; background: #f5f5f5; padding: 10px; border-radius: 4px;">${info.content_preview}</pre>
                    </div>
                `,
                icon: hasIssues ? 'warning' : 'info',
                confirmButtonText: 'Tutup',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        } else {
            Swal.fire({
                title: 'Error!',
                text: data.message,
                icon: 'error',
                confirmButtonText: 'Tutup'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error!',
            text: 'Gagal menganalisis file backup',
            icon: 'error',
            confirmButtonText: 'Tutup'
        });
    });
}

// Test restore function (dry run)
function testRestoreBackup(filename) {
    Swal.fire({
        title: 'Menguji file restore...',
        text: 'Sedang menganalisis kemungkinan restore',
        icon: 'info',
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    const formData = new FormData();
    formData.append('_token', document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}');
    formData.append('filename', filename);

    fetch('/admin/backup/test-restore', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const analysis = data.analysis;
            const hasIssues = analysis.potential_issues.length > 0;
            const issues = hasIssues
                ? `<div class="alert alert-warning"><small>${analysis.potential_issues.join('<br>')}</small></div>`
                : '<div class="alert alert-success"><small>Tidak ada masalah yang terdeteksi</small></div>';

            Swal.fire({
                title: 'Analisis Test Restore',
                html: `
                    <div class="text-left">
                        <h6>Statistik SQL:</h6>
                        <p><strong>Total Statements:</strong> ${analysis.total_statements}</p>
                        <p><strong>CREATE TABLE:</strong> ${analysis.create_table_count}</p>
                        <p><strong>INSERT INTO:</strong> ${analysis.insert_count}</p>
                        <p><strong>DROP TABLE:</strong> ${analysis.drop_table_count}</p>
                        <p><strong>Lainnya:</strong> ${analysis.other_count}</p>

                        <hr>
                        <h6>Tabel yang Akan Dibuat:</h6>
                        <div style="max-height: 100px; overflow-y: auto;">
                            <p><small>${analysis.tables_found.length > 0 ? analysis.tables_found.join(', ') : 'Tidak ada'}</small></p>
                        </div>

                        <hr>
                        <h6>Evaluasi:</h6>
                        ${issues}

                        ${!hasIssues ? '<div class="alert alert-success mt-2"><small><i class="ki-duotone ki-shield-tick fs-3 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>File backup terlihat valid dan siap untuk restore.</small></div>' : ''}
                    </div>
                `,
                icon: hasIssues ? 'warning' : 'success',
                confirmButtonText: 'Tutup',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        } else {
            Swal.fire({
                title: 'Error!',
                text: data.message,
                icon: 'error',
                confirmButtonText: 'Tutup'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error!',
            text: 'Gagal menguji file restore',
            icon: 'error',
            confirmButtonText: 'Tutup'
        });
    });
}

// Verify current database state
function verifyDatabaseState() {
    Swal.fire({
        title: 'Memeriksa status database...',
        text: 'Sedang menganalisis kondisi database saat ini',
        icon: 'info',
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    fetch('/admin/backup/verify-database', {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const state = data.database_state;
            let tablesList = '';
            let totalRecords = 0;

            for (const [tableName, tableInfo] of Object.entries(state.tables)) {
                totalRecords += parseInt(tableInfo.row_count);
                tablesList += `<tr>
                    <td>${tableName}</td>
                    <td class="text-end">${tableInfo.row_count.toLocaleString()}</td>
                    <td class="text-center">${tableInfo.column_count}</td>
                </tr>`;
            }

            Swal.fire({
                title: 'Status Database Saat Ini',
                html: `
                    <div class="text-left">
                        <div class="row mb-4">
                            <div class="col-4 text-center">
                                <div class="card card-flush">
                                    <div class="card-body p-3">
                                        <div class="fs-2hx fw-bold text-primary">${state.total_tables}</div>
                                        <div class="fs-6 text-gray-400">Total Tabel</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="card card-flush">
                                    <div class="card-body p-3">
                                        <div class="fs-2hx fw-bold text-success">${totalRecords.toLocaleString()}</div>
                                        <div class="fs-6 text-gray-400">Total Record</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="card card-flush">
                                    <div class="card-body p-3">
                                        <div class="fs-2hx fw-bold text-info">⚡</div>
                                        <div class="fs-6 text-gray-400">Status: OK</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p><small><strong>Waktu Pemeriksaan:</strong> ${state.timestamp}</small></p>

                        <hr>
                        <h6>Detail Tabel:</h6>
                        <div style="max-height: 300px; overflow-y: auto;">
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th>Nama Tabel</th>
                                        <th class="text-end">Jumlah Baris</th>
                                        <th class="text-center">Kolom</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${tablesList}
                                </tbody>
                            </table>
                        </div>
                    </div>
                `,
                icon: 'info',
                confirmButtonText: 'Tutup',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        } else {
            Swal.fire({
                title: 'Error!',
                text: data.message,
                icon: 'error',
                confirmButtonText: 'Tutup'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error!',
            text: 'Gagal memeriksa status database',
            icon: 'error',
            confirmButtonText: 'Tutup'
        });
    });
}

// Delete backup function
function deleteBackup(filename) {
    Swal.fire({
        title: 'Menghapus backup...',
        text: 'Sedang memproses permintaan Anda',
        icon: 'info',
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    fetch(`/admin/backup/delete/${filename}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: 'Terhapus!',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'Mengerti',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            }).then(() => {
                refreshBackupsList();
            });
        } else {
            Swal.fire({
                title: 'Gagal!',
                text: data.message,
                icon: 'error',
                confirmButtonText: 'Mengerti',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error!',
            text: 'Terjadi kesalahan saat menghapus backup',
            icon: 'error',
            confirmButtonText: 'Mengerti',
            customClass: {
                confirmButton: 'btn btn-primary'
            }
        });
    });
}

// Refresh backups list
function refreshBackupsList() {
    Swal.fire({
        title: 'Memperbarui data...',
        text: 'Sedang memuat daftar backup terbaru',
        icon: 'info',
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    fetch('/admin/backup/data', {
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        Swal.close();
        if (data.success) {
            // Reload halaman untuk update data
            window.location.reload();
        } else {
            Swal.fire({
                title: 'Error!',
                text: 'Gagal memuat data backup',
                icon: 'error',
                confirmButtonText: 'Mengerti'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error!',
            text: 'Terjadi kesalahan saat memuat data',
            icon: 'error',
            confirmButtonText: 'Mengerti'
        });
    });
}

// Simulate backup progress
function simulateBackupProgress() {
    let progress = 0;
    const progressBar = document.querySelector('#kt_modal_backup .progress-bar');
    const backupStatus = document.querySelector('#kt_modal_backup .backup-status');

    if (progressBar && backupStatus) {
        progressBar.style.width = '0%';
        backupStatus.innerHTML = '';

        const interval = setInterval(function() {
            progress += Math.random() * 10 + 2;
            if (progress > 90) progress = 90;

            progressBar.style.width = progress + '%';

            if (progress >= 90) {
                clearInterval(interval);
            }
        }, 200);
    }
}

// Initialize Select2 if available
document.addEventListener("DOMContentLoaded", function() {
    if (typeof $ !== 'undefined' && $.fn.select2) {
        $('#restoreFile').select2({
            placeholder: "Pilih backup yang akan dikembalikan",
            allowClear: true,
            width: '100%'
        });
    }
});

// Utility functions
function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]')?.content ||
           document.querySelector('input[name="_token"]')?.value ||
           '{{ csrf_token() }}';
}

// Add CSS for enhanced UI
const style = document.createElement('style');
style.textContent = `
    .swal2-html-container {
        max-height: 500px;
        overflow-y: auto;
    }
    .backup-debug-btn, .backup-test-btn {
        transition: all 0.2s ease;
    }
    .backup-debug-btn:hover, .backup-test-btn:hover {
        transform: scale(1.05);
    }
`;
document.head.appendChild(style);
</script>
</body>
</html>
