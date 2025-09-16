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
    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_equipment">
        <thead>
            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                <th class="w-10px pe-2">
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                            data-kt-check-target="#kt_table_equipment .form-check-input" value="1" />
                    </div>
                </th>
                <th class="min-w-150px">Alat</th>
                <th class="min-w-100px">Kategori</th>
                <th class="min-w-150px">Studio yang Memiliki</th> <!-- Diubah -->
                <th class="min-w-100px">Stok</th>
                <th class="min-w-100px">Status</th>
                <th class="min-w-100px">Dibuat Pada</th>
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
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->name }}" class="equipment-img" />
                            @else
                            <div class="symbol-label fs-3 bg-light-primary text-primary">
                                {{ substr($item->name, 0, 1) }}
                            </div>
                            @endif
                        </div>
                        <div class="d-flex flex-column">
                            <span class="text-gray-800 text-hover-primary mb-1">{{ $item->name }}</span>
                            <span>{{ Str::limit($item->description, 30) }}</span>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="badge badge-light-info">{{ ucfirst($item->category) }}</span>
                </td>
                <td>
                    @if($item->studios->count() > 0)
                        <div class="d-flex flex-column">
                            @foreach($item->studios as $studio)
                                <span class="badge badge-light-primary mb-1">
                                    {{ $studio->name }} (x{{ $studio->pivot->quantity }})
                                </span>
                            @endforeach
                        </div>
                    @else
                        <span class="text-muted">Belum dialokasikan</span>
                    @endif
                </td>
                <td>
                    <span class="fw-bold">{{ $item->quantity }}</span>
                </td>
                <td>
                    @if($item->quantity > 5)
                    <span class="badge badge-light-success">Tersedia</span>
                    @elseif($item->quantity > 0)
                    <span class="badge badge-light-warning">Terbatas</span>
                    @else
                    <span class="badge badge-light-danger">Habis</span>
                    @endif
                </td>
                <td>{{ $item->created_at->format('d M Y') }}</td>
                <td class="text-end">
                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm btn-flex"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        Actions
                        <i class="ki-duotone ki-down fs-5 ms-1"></i>
                    </a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_edit_equipment_{{ $item->id }}">
                                Edit
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <form action="{{ route('admin.equipment.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="menu-link px-3 bg-transparent border-0"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus alat ini?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!--end::Table-->
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
                        {{-- <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Studio</label>
                            <select name="studio_id" class="form-select form-select-solid">
                                <option value="">Pilih Studio (Opsional)</option>
                                @foreach($studios as $studio)
                                    <option value="{{ $studio->id }}">{{ $studio->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
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
    </script>
    <!--end::Custom Javascript-->
</body>
</html>
