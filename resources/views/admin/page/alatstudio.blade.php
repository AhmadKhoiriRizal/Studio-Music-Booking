<!DOCTYPE html>
<html lang="en">
<head>
    <title>StudioKu - Data Alat Studio</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
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
        .equipment-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
        .badge-success {
            background-color: #4cc9f0;
        }
        .badge-warning {
            background-color: #f9c74f;
        }
        .badge-danger {
            background-color: #f94144;
        }
        .progress-bar {
            transition: width 0.5s ease-in-out;
        }
        #current_image_preview {
            border-top: 1px solid #e4e6ef;
            padding-top: 15px;
            margin-top: 15px;
        }

        #allocated_quantity_warning {
            display: none;
            margin-top: 5px;
            font-weight: 500;
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
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                                        Data Alat Studio
                                    </h1>
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <li class="breadcrumb-item text-muted">
                                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                        </li>
                                        <li class="breadcrumb-item text-muted">Studio Management</li>
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                        </li>
                                        <li class="breadcrumb-item text-muted">Data Alat Studio</li>
                                    </ul>
                                </div>
                                <!--end::Page title-->

                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    <a href="#" class="btn btn-flex btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_equipment">
                                        <i class="ki-duotone ki-plus fs-2"></i>Tambah Alat
                                    </a>
                                </div>
                                <!--end::Actions-->
                            </div>
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 pt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <!--begin::Search-->
                                            <div class="d-flex align-items-center position-relative my-1">
                                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                                    <span class="path1"></span><span class="path2"></span>
                                                </i>
                                                <input type="text" id="kt_search"
                                                    class="form-control form-control-solid w-250px ps-13"
                                                    placeholder="Cari alat..." />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--end::Card title-->

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end" data-kt-equipment-table-toolbar="base">
                                                <!--begin::Filter-->
                                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <i class="ki-duotone ki-filter fs-2">
                                                        <span class="path1"></span><span class="path2"></span>
                                                    </i> Filter
                                                </button>
                                                <!--begin::Menu 1-->
                                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                                    <div class="px-7 py-5">
                                                        <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                                    </div>
                                                    <div class="separator border-gray-200"></div>
                                                    <div class="px-7 py-5">
                                                        <div class="mb-10">
                                                            <label class="form-label fs-6 fw-semibold">Kategori:</label>
                                                            <select class="form-select form-select-solid fw-bold" id="filter_category">
                                                                <option value="">Semua Kategori</option>
                                                                <option value="guitar">Gitar</option>
                                                                <option value="bass">Bass</option>
                                                                <option value="drum">Drum</option>
                                                                <option value="keyboard">Keyboard</option>
                                                                <option value="amplifier">Amplifier</option>
                                                                <option value="microphone">Microphone</option>
                                                                <option value="accessories">Aksesoris</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-10">
                                                            <label class="form-label fs-6 fw-semibold">Studio:</label>
                                                            <select class="form-select form-select-solid fw-bold" id="filter_studio">
                                                                <option value="">Semua Studio</option>
                                                                @foreach($studios as $studio)
                                                                    <option value="{{ $studio->id }}">{{ $studio->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                                id="reset_filter">Reset</button>
                                                            <button type="button" class="btn btn-primary fw-semibold px-6"
                                                                id="apply_filter">Apply</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Menu 1-->
                                                <!--end::Filter-->

                                                <!--begin::Export-->
                                                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_equipment">
                                                    <i class="ki-duotone ki-exit-up fs-2">
                                                        <span class="path1"></span><span class="path2"></span>
                                                    </i> Export
                                                </button>
                                                <!--end::Export-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body py-4">
                                        <!-- Updated Equipment Table with Stock Management -->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_equipment">
                                            <thead>
                                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="w-10px pe-2">
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                                data-kt-check-target="#kt_table_equipment .form-check-input" value="1" />
                                                        </div>
                                                    </th>
                                                    <th class="min-w-125px">Equipment</th>
                                                    <th class="min-w-100px">Kategori</th>
                                                    <th class="min-w-100px">Stock Status</th>
                                                    <th class="min-w-100px">Alokasi Studio</th>
                                                    <th class="min-w-100px">Harga/Jam</th>
                                                    <th class="text-end min-w-100px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 fw-semibold">
                                                @foreach($equipment as $item)
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                                @if($item->foto)
                                                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->name }}" class="w-100" />
                                                                @else
                                                                <div class="symbol-label fs-3 bg-light-info text-info">
                                                                    {{ substr($item->name, 0, 1) }}
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $item->name }}</a>
                                                                <span class="text-muted fs-7">{{ Str::limit($item->description, 30) }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-secondary">{{ $item->category }}</span>
                                                    </td>
                                                    <td>
                                                        <!-- Stock Status dengan Progress Bar -->
                                                        <div class="d-flex flex-column w-100">
                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                <span class="text-gray-800 fw-bold fs-6">{{ $item->available_stock }}/{{ $item->quantity }}</span>
                                                                @if($item->available_stock > 0)
                                                                    <span class="badge badge-light-success badge-sm">Tersedia</span>
                                                                @else
                                                                    <span class="badge badge-light-danger badge-sm">Habis</span>
                                                                @endif
                                                            </div>
                                                            <div class="progress h-6px bg-light-primary">
                                                                <div class="progress-bar bg-primary" role="progressbar"
                                                                    style="width: {{ $item->quantity > 0 ? (($item->quantity - $item->available_stock) / $item->quantity) * 100 : 0 }}%">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-1">
                                                                <small class="text-muted">Teralokasi: {{ $item->allocated_quantity }}</small>
                                                                <small class="text-muted">{{ $item->usage_stats['allocation_percentage'] }}%</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!-- Studios that use this equipment -->
                                                        @if($item->studios->count() > 0)
                                                            <div class="d-flex flex-column">
                                                                @foreach($item->studios->take(3) as $studio)
                                                                    <span class="badge badge-light-info mb-1">
                                                                        {{ $studio->name }} (x{{ $studio->pivot->quantity }})
                                                                    </span>
                                                                @endforeach
                                                                @if($item->studios->count() > 3)
                                                                    <small class="text-muted">+{{ $item->studios->count() - 3 }} studio lainnya</small>
                                                                @endif
                                                            </div>
                                                        @else
                                                            <span class="text-muted">Belum dialokasi</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="fw-bold">Rp {{ number_format($item->price_per_hours, 0, ',', '.') }}</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm btn-flex"
                                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                            Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                                        </a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3" onclick="showStockDetails('{{ $item->id }}')">
                                                                    Lihat Detail Stock
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3" onclick="adjustStock('{{ $item->id }}', '{{ $item->name }}', {{ $item->available_stock }})">
                                                                    Sesuaikan Stock
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3" onclick="editEquipment('{{ $item->id }}')">
                                                                    Edit
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            @if($item->allocated_quantity == 0)
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <form action="{{ route('admin.equipment.destroy', $item->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="menu-link px-3 bg-transparent border-0 text-danger"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus equipment ini?')">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            @else
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <span class="menu-link px-3 text-muted" title="Tidak dapat dihapus karena sedang digunakan">
                                                                    Delete (Tidak tersedia)
                                                                </span>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            @endif
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
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

    <!-- Modal untuk Stock Details -->
    <div class="modal fade" id="stockDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">Detail Stock Equipment</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body" id="stockDetailsContent">
                    <!-- Content will be loaded via AJAX -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Stock Adjustment -->
    <div class="modal fade" id="adjustStockModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-500px">
            <div class="modal-content">
                <form id="adjustStockForm" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h2 class="fw-bold">Sesuaikan Stock</h2>
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-5">
                            <label class="form-label fw-semibold">Equipment</label>
                            <input type="text" id="equipmentNameDisplay" class="form-control" readonly>
                        </div>
                        <div class="mb-5">
                            <label class="form-label fw-semibold">Stock Tersedia Saat Ini</label>
                            <input type="text" id="currentStockDisplay" class="form-control" readonly>
                        </div>
                        <div class="mb-5">
                            <label class="form-label required fw-semibold">Jenis Penyesuaian</label>
                            <select name="adjustment_type" class="form-select" required>
                                <option value="">Pilih Jenis</option>
                                <option value="increase">Tambah Stock</option>
                                <option value="decrease">Kurangi Stock</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label class="form-label required fw-semibold">Jumlah</label>
                            <input type="number" name="adjustment_quantity" class="form-control" min="1" required>
                        </div>
                        <div class="mb-5">
                            <label class="form-label required fw-semibold">Alasan Penyesuaian</label>
                            <textarea name="reason" class="form-control" rows="3" placeholder="Masukkan alasan penyesuaian stock..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Penyesuaian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--begin::Modal - Add Equipment-->
    <div class="modal fade" id="kt_modal_add_equipment" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">Tambah Alat Baru</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <form action="{{ route('admin.equipment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Nama Alat</label>
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Masukkan nama alat" required />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Kategori</label>
                            <select name="category" class="form-select form-select-solid" required>
                                <option value="">Pilih Kategori</option>
                                <option value="guitar">Gitar</option>
                                <option value="bass">Bass</option>
                                <option value="drum">Drum</option>
                                <option value="keyboard">Keyboard</option>
                                <option value="amplifier">Amplifier</option>
                                <option value="microphone">Microphone</option>
                                <option value="accessories">Aksesoris</option>
                            </select>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Deskripsi</label>
                            <textarea name="description" class="form-control form-control-solid" rows="3"
                                placeholder="Masukkan deskripsi alat"></textarea>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Jumlah Stok</label>
                            <input type="number" name="quantity" class="form-control form-control-solid"
                                placeholder="Masukkan jumlah stok" min="0" required />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Harga/Jam</label>
                            <input type="number" name="price_per_hours" class="form-control form-control-solid"
                                placeholder="Masukkan harga perjam" min="0" required />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Foto Alat</label>
                            <input type="file" name="foto" class="form-control form-control-solid"
                                accept="image/*" />
                            <div class="form-text">Format: jpg, jpeg, png (max 2MB)</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal - Add Equipment-->

    <!--begin::Modal - Export Equipment-->
    <div class="modal fade" id="kt_modal_export_equipment" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">Export Data Alat</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_export_equipment_form" class="form" action="#">
                        <div class="fv-row mb-10">
                            <label class="required fs-6 fw-semibold form-label mb-2">Format Export:</label>
                            <select name="format" class="form-select form-select-solid fw-bold" required>
                                <option value="">Pilih Format</option>
                                <option value="excel">Excel</option>
                                <option value="pdf">PDF</option>
                                <option value="csv">CSV</option>
                            </select>
                        </div>
                        <div class="fv-row mb-10">
                            <label class="fs-6 fw-semibold form-label mb-2">Kategori:</label>
                            <select name="category" class="form-select form-select-solid fw-bold">
                                <option value="">Semua Kategori</option>
                                <option value="guitar">Gitar</option>
                                <option value="bass">Bass</option>
                                <option value="drum">Drum</option>
                                <option value="keyboard">Keyboard</option>
                                <option value="amplifier">Amplifier</option>
                                <option value="microphone">Microphone</option>
                                <option value="accessories">Aksesoris</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Export</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal - Export Equipment-->

    <!--begin::Modal - Edit Equipment-->
<div class="modal fade" id="kt_modal_edit_equipment" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Edit Equipment</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <form id="editEquipmentForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <input type="hidden" id="edit_equipment_id" name="id">

                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Nama Equipment</label>
                        <input type="text" id="edit_name" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                            placeholder="Masukkan nama equipment" required />
                    </div>

                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Kategori</label>
                        <select id="edit_category" name="category" class="form-select form-select-solid" required>
                            <option value="">Pilih Kategori</option>
                            <option value="guitar">Gitar</option>
                            <option value="bass">Bass</option>
                            <option value="drum">Drum</option>
                            <option value="keyboard">Keyboard</option>
                            <option value="amplifier">Amplifier</option>
                            <option value="microphone">Microphone</option>
                            <option value="accessories">Aksesoris</option>
                        </select>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Deskripsi</label>
                        <textarea id="edit_description" name="description" class="form-control form-control-solid" rows="3"
                            placeholder="Masukkan deskripsi equipment"></textarea>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Jumlah Stok</label>
                        <input type="number" id="edit_quantity" name="quantity" class="form-control form-control-solid"
                            placeholder="Masukkan jumlah stok" min="0" required />
                        <div class="form-text text-warning" id="allocated_quantity_warning"></div>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Harga/Jam</label>
                        <input type="number" id="edit_price_per_hours" name="price_per_hours" class="form-control form-control-solid"
                            placeholder="Masukkan harga perjam" min="0" required />
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Foto Equipment</label>
                        <input type="file" name="foto" class="form-control form-control-solid"
                            accept="image/*" />
                        <div class="form-text">Format: jpg, jpeg, png (max 2MB)</div>

                        <!-- Current image preview -->
                        <div class="mt-3" id="current_image_preview">
                            <label class="fw-semibold fs-6 mb-2">Foto Saat Ini:</label>
                            <div class="symbol symbol-100px mt-2" id="current_image_container">
                                <!-- Image will be loaded via JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal - Edit Equipment-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
    </div>
    <!--end::Scrolltop-->

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

    <!--begin::Custom Javascript-->
    <script>
        // Initialize datatable
        $(document).ready(function() {
            var table = $('#kt_table_equipment').DataTable({
                language: {
                    lengthMenu: "Show _MENU_",
                    search: "Cari:",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    },
                },
                dom: "<'row'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                    ">" +
                    "<'table-responsive'tr>" +
                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">"
            });

            // Search functionality
            $('#kt_search').on('keyup', function() {
                table.search(this.value).draw();
            });

            // Filter functionality
            $('#apply_filter').on('click', function() {
                var category = $('#filter_category').val();
                var studio = $('#filter_studio').val();

                table.column(2).search(category).column(3).search(studio).draw();
            });

            // Reset filter
            $('#reset_filter').on('click', function() {
                $('#filter_category').val('');
                $('#filter_studio').val('');
                table.columns().search('').draw();
            });

            // Export form handling
            $('#kt_modal_export_equipment_form').on('submit', function(e) {
                e.preventDefault();
                var format = $('select[name="format"]').val();
                var category = $('select[name="category"]').val();

                // Implement export functionality here
                console.log('Exporting:', format, category);
                // You can redirect to export URL or use AJAX here
            });
        });

        // Function untuk show stock details
        function showStockDetails(equipmentId) {
            fetch(`/admin/equipment/allocation-details/${equipmentId}`)
                .then(response => response.json())
                .then(data => {
                    let content = `
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <h5>Equipment: ${data.equipment.name}</h5>
                                <p class="text-muted">${data.equipment.category}</p>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-flush bg-light-primary">
                                    <div class="card-body text-center">
                                        <div class="fs-2hx fw-bold text-primary">${data.available_stock}</div>
                                        <div class="fs-6 fw-semibold text-gray-400">Stock Tersedia</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-4">
                                <div class="card card-flush bg-light-info">
                                    <div class="card-body text-center">
                                        <div class="fs-2hx fw-bold text-info">${data.equipment.quantity}</div>
                                        <div class="fs-6 fw-semibold text-gray-400">Total Stock</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-flush bg-light-warning">
                                    <div class="card-body text-center">
                                        <div class="fs-2hx fw-bold text-warning">${data.equipment.allocated_quantity}</div>
                                        <div class="fs-6 fw-semibold text-gray-400">Teralokasi</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-flush bg-light-success">
                                    <div class="card-body text-center">
                                        <div class="fs-2hx fw-bold text-success">${data.usage_stats.allocation_percentage}%</div>
                                        <div class="fs-6 fw-semibold text-gray-400">Utilizasi</div>
                                    </div>
                                </div>
                            </div>
                        </div>`;

                    if (data.allocations.length > 0) {
                        content += `
                            <h6 class="mb-3">Alokasi ke Studio:</h6>
                            <div class="table-responsive">
                                <table class="table table-row-bordered table-row-gray-100">
                                    <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800">
                                            <th>Studio</th>
                                            <th>Tipe</th>
                                            <th>Quantity</th>
                                            <th>Tanggal Alokasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;

                        data.allocations.forEach(allocation => {
                            content += `
                                <tr>
                                    <td>${allocation.studio_name}</td>
                                    <td><span class="badge badge-light-info">${allocation.studio_type}</span></td>
                                    <td><span class="badge badge-primary">${allocation.quantity}</span></td>
                                    <td>${new Date(allocation.allocated_at).toLocaleDateString('id-ID')}</td>
                                </tr>`;
                        });

                        content += `
                                    </tbody>
                                </table>
                            </div>`;
                    } else {
                        content += `<div class="alert alert-info">Equipment ini belum dialokasi ke studio manapun.</div>`;
                    }

                    document.getElementById('stockDetailsContent').innerHTML = content;
                    const modal = new bootstrap.Modal(document.getElementById('stockDetailsModal'));
                    modal.show();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal memuat detail stock');
                });
        }

        // Function untuk adjust stock
        function adjustStock(equipmentId, equipmentName, availableStock) {
            document.getElementById('equipmentNameDisplay').value = equipmentName;
            document.getElementById('currentStockDisplay').value = `${availableStock} unit`;
            document.getElementById('adjustStockForm').action = `/admin/equipment/adjust-stock/${equipmentId}`;

            const modal = new bootstrap.Modal(document.getElementById('adjustStockModal'));
            modal.show();
        }

        // Handle stock adjustment form submission
        document.getElementById('adjustStockForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const adjustmentType = formData.get('adjustment_type');
            const quantity = parseInt(formData.get('adjustment_quantity'));

            if (!adjustmentType || !quantity || quantity <= 0) {
                alert('Mohon lengkapi semua field');
                return;
            }

            // Submit form
            this.submit();
        });

        // Function untuk edit equipment
function editEquipment(equipmentId) {
    // Fetch equipment data via AJAX
    fetch(`/admin/equipment/edit-data/${equipmentId}`)
        .then(response => response.json())
        .then(data => {
            // Fill the form with equipment data
            document.getElementById('edit_equipment_id').value = data.id;
            document.getElementById('edit_name').value = data.name;
            document.getElementById('edit_category').value = data.category;
            document.getElementById('edit_description').value = data.description || '';
            document.getElementById('edit_quantity').value = data.quantity;
            document.getElementById('edit_quantity').min = data.allocated_quantity;
            document.getElementById('edit_price_per_hours').value = data.price_per_hours;

            // Show allocated quantity warning
            const warningElement = document.getElementById('allocated_quantity_warning');
            if (data.allocated_quantity > 0) {
                warningElement.textContent = `Minimal quantity: ${data.allocated_quantity} (sudah teralokasi ke studio)`;
                warningElement.style.display = 'block';
            } else {
                warningElement.style.display = 'none';
            }

            // Handle current image preview
            const imageContainer = document.getElementById('current_image_container');
            imageContainer.innerHTML = ''; // Clear previous content

            if (data.foto) {
                const img = document.createElement('img');
                img.src = `/storage/${data.foto}`;
                img.alt = data.name;
                img.className = 'w-100';
                imageContainer.appendChild(img);
            } else {
                const placeholder = document.createElement('div');
                placeholder.className = 'symbol-label fs-1 bg-light-info text-info';
                placeholder.textContent = data.name.charAt(0).toUpperCase();
                imageContainer.appendChild(placeholder);
            }

            // Set form action
            document.getElementById('editEquipmentForm').action = `/admin/equipment/update/${data.id}`;

            // Show the modal
            const modal = new bootstrap.Modal(document.getElementById('kt_modal_edit_equipment'));
            modal.show();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal memuat data equipment');
        });
}

// Validasi form edit
document.getElementById('editEquipmentForm').addEventListener('submit', function(e) {
    const quantity = parseInt(document.getElementById('edit_quantity').value);
    const minQuantity = parseInt(document.getElementById('edit_quantity').min);

    if (quantity < minQuantity) {
        e.preventDefault();
        alert(`Quantity tidak boleh kurang dari ${minQuantity} (sudah teralokasi ke studio)`);
        return false;
    }
});
        // Auto-refresh table setiap 60 detik untuk update real-time
        setInterval(() => {
            // Only refresh if no modal is open
            if (!document.querySelector('.modal.show')) {
                location.reload();
            }
        }, 60000);
    </script>
    <!--end::Custom Javascript-->
</body>
</html>
