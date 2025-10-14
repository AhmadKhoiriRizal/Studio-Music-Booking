<!DOCTYPE html>
<html lang="en">
<head>
    <title>StudioKu - Data Studio</title>
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
        .remove-equipment {
            border: none;
            background: none;
            font-size: 16px;
            line-height: 1;
            padding: 0;
            cursor: pointer;
        }
        .remove-equipment:hover {
            color: #dc3545 !important;
        }
        .badge-light-primary {
            background-color: #f1faff;
            color: #3699ff;
            padding: 0.5rem 1rem;
            border-radius: 0.475rem;
            display: inline-flex;
            align-items: center;
            margin: 0.25rem;
        }
        .equipment-quantity {
            width: 80px;
        }
        #current_image_preview_studio {
            border-top: 1px solid #e4e6ef;
            padding-top: 15px;
            margin-top: 15px;
        }

        .remove-equipment-edit {
            border: none;
            background: none;
            font-size: 16px;
            line-height: 1;
            padding: 0;
            cursor: pointer;
        }

        .remove-equipment-edit:hover {
            color: #dc3545 !important;
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
                                        Data Studio
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
                                        <li class="breadcrumb-item text-muted">Data Studio</li>
                                    </ul>
                                </div>
                                <!--end::Page title-->

                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    <a href="#" class="btn btn-flex btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_studio">
                                        <i class="ki-duotone ki-plus fs-2"></i>Tambah Studio
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
                                                    placeholder="Cari studio..." />
                                            </div>
                                            <!--end::Search-->
                                        </div>
                                        <!--end::Card title-->

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            <div class="d-flex justify-content-end" data-kt-studio-table-toolbar="base">
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
                                                            <label class="form-label fs-6 fw-semibold">Tipe Studio:</label>
                                                            <select class="form-select form-select-solid fw-bold" id="filter_type">
                                                                <option value="">Semua Tipe</option>
                                                                <option value="small">Small</option>
                                                                <option value="medium">Medium</option>
                                                                <option value="large">Large</option>
                                                                <option value="vip">VIP</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-10">
                                                            <label class="form-label fs-6 fw-semibold">Status:</label>
                                                            <select class="form-select form-select-solid fw-bold" id="filter_status">
                                                                <option value="">Semua Status</option>
                                                                <option value="available">Available</option>
                                                                <option value="maintenance">Maintenance</option>
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
                                            </div>
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body py-4">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_studios">
                                            <thead>
                                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="w-10px pe-2">
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                                data-kt-check-target="#kt_table_studios .form-check-input" value="1" />
                                                        </div>
                                                    </th>
                                                    <th class="min-w-100px">Studio</th>
                                                    <th class="min-w-100px">Tipe</th>
                                                    <th class="min-w-100px">kapasitas</th>
                                                    <th class="min-w-100px">Harga/Jam</th>
                                                    <th class="min-w-150px">Equipment Included</th>
                                                    <th class="min-w-100px">Status</th>
                                                    <th class="min-w-100px">Dibuat Pada</th>
                                                    <th class="text-end min-w-100px">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 fw-semibold">
                                                @foreach($studios as $studio)
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="{{ $studio->id }}" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                                @if($studio->foto)
                                                                <img src="{{ asset('storage/' . $studio->foto) }}" alt="{{ $studio->name }}" class="w-100" />
                                                                @else
                                                                <div class="symbol-label fs-3 bg-light-primary text-primary">
                                                                    {{ substr($studio->name, 0, 1) }}
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $studio->name }}</a>
                                                                <span>{{ Str::limit($studio->description, 30) }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-info">{{ ucfirst($studio->type) }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-info">{{ ucfirst($studio->kapasitas . ' Orang')}}</span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-bold">Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}</span>
                                                    </td>
                                                    <td>
                                                        @if($studio->equipment->count() > 0)
                                                            <div class="d-flex flex-column">
                                                                @foreach($studio->equipment as $equip)
                                                                    <span class="badge badge-light-primary mb-1">
                                                                        {{ $equip->name }} (x{{ $equip->pivot->quantity }})
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <span class="text-muted">Tidak ada equipment</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($studio->status == 'available')
                                                        <span class="badge badge-light-success">available</span>
                                                        @else
                                                        <span class="badge badge-light-danger">Maintenance</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $studio->created_at->format('d M Y') }}</td>
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
                                                                <a href="#" class="menu-link px-3" onclick="editStudio('{{ $studio->id }}')">
                                                                    Edit
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <form action="{{ route('admin.studio.destroy', $studio->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="menu-link px-3 bg-transparent border-0"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus studio ini?')">
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

    <!--begin::Modal - Add Studio-->
    <div class="modal fade" id="kt_modal_add_studio" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">Tambah Studio Baru</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <form action="{{ route('admin.studio.store') }}" method="POST" enctype="multipart/form-data" id="studioForm">
                    @csrf
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Nama Studio</label>
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Masukkan nama studio" required />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Tipe Studio</label>
                            <select name="type" class="form-select form-select-solid" required>
                                <option value="">Pilih Tipe</option>
                                <option value="small">Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                                <option value="vip">VIP</option>
                            </select>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">kapasitas</label>
                            <input type="number" name="kapasitas" class="form-control form-control-solid"
                                placeholder="Masukkan kapasitas" min="0" required />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Deskripsi</label>
                            <textarea name="description" class="form-control form-control-solid" rows="3"
                                placeholder="Masukkan deskripsi studio"></textarea>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Harga per Jam (Rp)</label>
                            <input type="number" name="price_per_hour" class="form-control form-control-solid"
                                placeholder="Masukkan harga" min="0" required />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Min. Booking (Jam)</label>
                            <input type="number" name="min_booking_hours" class="form-control form-control-solid"
                                value="1" min="1" required />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Max. Booking (Jam)</label>
                            <input type="number" name="max_booking_hours" class="form-control form-control-solid"
                                value="8" min="1" required />
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Foto Studio</label>
                            <input type="file" name="foto" class="form-control form-control-solid"
                                accept="image/*" />
                            <div class="form-text">Format: jpg, jpeg, png (max 2MB)</div>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Status</label>
                            <select name="status" class="form-select form-select-solid" required>
                                <option value="available">Available</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
                        </div>

                        <!-- Equipment Selection Section -->
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-3">Peralatan yang Termasuk</label>

                            <!-- Selected Equipment Display -->
                            <div id="selectedEquipmentContainer" class="mb-3 p-4 border rounded bg-light d-none">
                                <h6 class="mb-3">Peralatan Terpilih:</h6>
                                <div id="selectedEquipmentList" class="d-flex flex-wrap gap-2"></div>
                            </div>

                            <!-- Button to open modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#equipmentModal">
                                <i class="ki-duotone ki-plus fs-3"></i> Pilih Peralatan
                            </button>
                        </div>

                        <!-- Hidden input untuk menyimpan equipment data -->
                        <div id="equipmentDataContainer"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal - Add Studio-->

    <!-- Equipment Selection Modal -->
    <div class="modal fade" id="equipmentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">Pilih Peralatan Studio</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="50px">Pilih</th>
                                    <th>Peralatan</th>
                                    <th>Kategori</th>
                                    <th>Stok Tersedia</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                    $equipment = $equipment ?? \App\Models\Equipment::all"();
                                @endphp --}}
                                @foreach($equipment as $item)
                                @if($item->exists)
                                <tr>
                                    <td class="text-center">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input equipment-checkbox" type="checkbox"
                                                value="{{ $item->id }}" data-name="{{ $item->name }}"
                                                data-category="{{ $item->category }}" data-max="{{ $item->quantity }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->name }}"
                                                class="w-40px h-40px rounded me-3">
                                            @endif
                                            <span>{{ $item->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm equipment-quantity"
                                            data-equipment-id="{{ $item->id }}" min="1"
                                            max="{{ $item->quantity }}" value="1" disabled>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="saveEquipmentSelection">Simpan Pilihan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Equipment Selection Modal -->

    <!--begin::Modal - Edit Studio-->
<div class="modal fade" id="kt_modal_edit_studio" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Edit Studio</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <form id="editStudioForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <input type="hidden" id="edit_studio_id" name="id">

                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Nama Studio</label>
                        <input type="text" id="edit_name" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                            placeholder="Masukkan nama studio" required />
                    </div>

                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Tipe Studio</label>
                        <select id="edit_type" name="type" class="form-select form-select-solid" required>
                            <option value="">Pilih Tipe</option>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                            <option value="vip">VIP</option>
                        </select>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">kapasitas</label>
                        <input type="number" id="edit_kapasitas" name="kapasitas" class="form-control form-control-solid" rows="3"
                            placeholder="Masukkan Kapasitas"></input>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Deskripsi</label>
                        <textarea id="edit_description" name="description" class="form-control form-control-solid" rows="3"
                            placeholder="Masukkan deskripsi studio"></textarea>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Harga per Jam (Rp)</label>
                        <input type="number" id="edit_price_per_hour" name="price_per_hour" class="form-control form-control-solid"
                            placeholder="Masukkan harga" min="0" required />
                    </div>

                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Min. Booking (Jam)</label>
                        <input type="number" id="edit_min_booking_hours" name="min_booking_hours" class="form-control form-control-solid"
                            value="1" min="1" required />
                    </div>

                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Max. Booking (Jam)</label>
                        <input type="number" id="edit_max_booking_hours" name="max_booking_hours" class="form-control form-control-solid"
                            value="8" min="1" required />
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Foto Studio</label>
                        <input type="file" name="foto" class="form-control form-control-solid"
                            accept="image/*" />
                        <div class="form-text">Format: jpg, jpeg, png (max 2MB)</div>

                        <!-- Current image preview -->
                        <div class="mt-3" id="current_image_preview_studio">
                            <label class="fw-semibold fs-6 mb-2">Foto Saat Ini:</label>
                            <div class="symbol symbol-100px mt-2" id="current_image_container_studio">
                                <!-- Image will be loaded via JavaScript -->
                            </div>
                        </div>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Status</label>
                        <select id="edit_status" name="status" class="form-select form-select-solid" required>
                            <option value="available">Available</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>

                    <!-- Equipment Selection Section -->
                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-3">Peralatan yang Termasuk</label>

                        <!-- Selected Equipment Display -->
                        <div id="selectedEquipmentContainerEdit" class="mb-3 p-4 border rounded bg-light d-none">
                            <h6 class="mb-3">Peralatan Terpilih:</h6>
                            <div id="selectedEquipmentListEdit" class="d-flex flex-wrap gap-2"></div>
                        </div>

                        <!-- Button to open modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#equipmentModalEdit">
                            <i class="ki-duotone ki-plus fs-3"></i> Pilih Peralatan
                        </button>
                    </div>

                    <!-- Hidden input untuk menyimpan equipment data -->
                    <div id="equipmentDataContainerEdit"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal - Edit Studio-->

<!-- Equipment Selection Modal for Edit -->
<div class="modal fade" id="equipmentModalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Pilih Peralatan Studio</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="50px">Pilih</th>
                                <th>Peralatan</th>
                                <th>Kategori</th>
                                <th>Stok Tersedia</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($equipment as $item)
                            @if($item->exists)
                            <tr>
                                <td class="text-center">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input equipment-checkbox-edit" type="checkbox"
                                            value="{{ $item->id }}" data-name="{{ $item->name }}"
                                            data-category="{{ $item->category }}" data-max="{{ $item->quantity }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->name }}"
                                            class="w-40px h-40px rounded me-3">
                                        @endif
                                        <span>{{ $item->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <input type="number" class="form-control form-control-sm equipment-quantity-edit"
                                        data-equipment-id="{{ $item->id }}" min="1"
                                        max="{{ $item->quantity }}" value="1" disabled>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="saveEquipmentSelectionEdit">Simpan Pilihan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Equipment Selection Modal for Edit -->

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
            var table = $('#kt_table_studios').DataTable({
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

            // Filter functionality - VERSI CUSTOM
            $('#apply_filter').on('click', function() {
                var type = $('#filter_type').val();
                var status = $('#filter_status').val();

                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var rowType = data[2]; // Kolom tipe (index 2)
                        var rowStatus = data[6]; // Kolom status (index 6)

                        var typeMatch = true;
                        var statusMatch = true;

                        // Filter tipe
                        if (type) {
                            typeMatch = rowType.toLowerCase().includes(type.toLowerCase());
                        }

                        // Filter status
                        if (status) {
                            if (status === 'available') {
                                statusMatch = rowStatus.includes('Tersedia') || rowStatus.includes('available');
                            } else if (status === 'maintenance') {
                                statusMatch = rowStatus.includes('Maintenance') || rowStatus.includes('maintenance');
                            }
                        }

                        return typeMatch && statusMatch;
                    }
                );

                table.draw();

                // Hapus filter function setelah draw
                $.fn.dataTable.ext.search.pop();
            });

            // Reset filter
            $('#reset_filter').on('click', function() {
                $('#filter_type').val('');
                $('#filter_status').val('');
                table.draw();
            });
        });

        // Equipment Selection Modal Functionality
document.addEventListener('DOMContentLoaded', function() {
    const equipmentModal = document.getElementById('equipmentModal');
    const addStudioModal = document.getElementById('kt_modal_add_studio');
    const selectedEquipmentContainer = document.getElementById('selectedEquipmentContainer');
    const selectedEquipmentList = document.getElementById('selectedEquipmentList');
    const equipmentDataContainer = document.getElementById('equipmentDataContainer');
    const studioForm = document.getElementById('studioForm');

    let selectedEquipment = {};

    // Enable quantity input when checkbox is checked
    equipmentModal.addEventListener('change', function(e) {
        if (e.target.classList.contains('equipment-checkbox')) {
            const equipmentId = e.target.value;
            const quantityInput = equipmentModal.querySelector(`.equipment-quantity[data-equipment-id="${equipmentId}"]`);

            if (e.target.checked) {
                quantityInput.removeAttribute('disabled');
            } else {
                quantityInput.setAttribute('disabled', 'disabled');
                quantityInput.value = '1';
            }
        }
    });

    // Save equipment selection
    document.getElementById('saveEquipmentSelection').addEventListener('click', function() {
        selectedEquipment = {};
        equipmentDataContainer.innerHTML = '';
        selectedEquipmentList.innerHTML = '';

        // Collect selected equipment
        equipmentModal.querySelectorAll('.equipment-checkbox:checked').forEach(checkbox => {
            const equipmentId = checkbox.value;
            const quantityInput = equipmentModal.querySelector(`.equipment-quantity[data-equipment-id="${equipmentId}"]`);
            const quantity = parseInt(quantityInput.value) || 1;
            const equipmentName = checkbox.getAttribute('data-name');
            const category = checkbox.getAttribute('data-category');
            const maxQuantity = parseInt(checkbox.getAttribute('data-max'));

            // Validate quantity
            const validQuantity = Math.min(Math.max(1, quantity), maxQuantity);

            selectedEquipment[equipmentId] = {
                quantity: validQuantity,
                name: equipmentName,
                category: category
            };

            // Create hidden inputs for form submission
            const quantityInputHidden = document.createElement('input');
            quantityInputHidden.type = 'hidden';
            quantityInputHidden.name = `equipment[${equipmentId}][quantity]`;
            quantityInputHidden.value = validQuantity;
            equipmentDataContainer.appendChild(quantityInputHidden);

            // Add to selected equipment display
            const badge = document.createElement('span');
            badge.className = 'badge badge-light-primary';
            badge.innerHTML = `${equipmentName} (x${validQuantity}) <button type="button" class="btn btn-sm btn-icon btn-light-danger ms-2 remove-equipment" data-id="${equipmentId}">×</button>`;
            selectedEquipmentList.appendChild(badge);
        });

        // Show/hide selected equipment container
        if (Object.keys(selectedEquipment).length > 0) {
            selectedEquipmentContainer.classList.remove('d-none');
        } else {
            selectedEquipmentContainer.classList.add('d-none');
        }

        // Close equipment modal and show add studio modal
        const equipmentBootstrapModal = bootstrap.Modal.getInstance(equipmentModal);
        equipmentBootstrapModal.hide();

        // Show add studio modal after equipment modal is closed
        setTimeout(() => {
            const addStudioBootstrapModal = new bootstrap.Modal(addStudioModal);
            addStudioBootstrapModal.show();
        }, 500);
    });

    // Remove equipment from selection
    selectedEquipmentList.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-equipment')) {
            const equipmentId = e.target.getAttribute('data-id');

            // Remove from selected equipment
            delete selectedEquipment[equipmentId];

            // Remove hidden input
            const hiddenInput = equipmentDataContainer.querySelector(`input[name="equipment[${equipmentId}][quantity]"]`);
            if (hiddenInput) {
                equipmentDataContainer.removeChild(hiddenInput);
            }

            // Remove from display
            e.target.closest('.badge').remove();

            // Uncheck checkbox in modal
            const checkbox = equipmentModal.querySelector(`.equipment-checkbox[value="${equipmentId}"]`);
            if (checkbox) {
                checkbox.checked = false;
                const quantityInput = equipmentModal.querySelector(`.equipment-quantity[data-equipment-id="${equipmentId}"]`);
                quantityInput.setAttribute('disabled', 'disabled');
                quantityInput.value = '1';
            }

            // Hide container if no equipment selected
            if (Object.keys(selectedEquipment).length === 0) {
                selectedEquipmentContainer.classList.add('d-none');
            }
        }
    });

    // Handle when equipment modal is hidden
    equipmentModal.addEventListener('hidden.bs.modal', function () {
        // Show add studio modal when equipment modal is closed
        const addStudioBootstrapModal = new bootstrap.Modal(addStudioModal);
        addStudioBootstrapModal.show();
    });

    // Handle when add studio modal is shown
    addStudioModal.addEventListener('shown.bs.modal', function () {
        // Keep the selected equipment but reset the modal checkboxes
        equipmentModal.querySelectorAll('.equipment-checkbox').forEach(checkbox => {
            const equipmentId = checkbox.value;
            if (!selectedEquipment[equipmentId]) {
                checkbox.checked = false;
                const quantityInput = equipmentModal.querySelector(`.equipment-quantity[data-equipment-id="${equipmentId}"]`);
                quantityInput.setAttribute('disabled', 'disabled');
                quantityInput.value = '1';
            }
        });
    });

    // Form validation before submission
    studioForm.addEventListener('submit', function(e) {
        // You can add additional validation here if needed
        console.log('Submitting form with equipment:', selectedEquipment);
    });
});

// Equipment Selection Modal dengan Stock Validation
document.addEventListener('DOMContentLoaded', function() {
    const equipmentModal = document.getElementById('equipmentModal');
    const addStudioModal = document.getElementById('kt_modal_add_studio');
    const selectedEquipmentContainer = document.getElementById('selectedEquipmentContainer');
    const selectedEquipmentList = document.getElementById('selectedEquipmentList');
    const equipmentDataContainer = document.getElementById('equipmentDataContainer');

    let selectedEquipment = {};
    let equipmentStockData = {};

    // Load stock data saat modal dibuka
    equipmentModal.addEventListener('show.bs.modal', function() {
        loadEquipmentStock();
    });

    // Load equipment stock data dari server
    function loadEquipmentStock() {
    return fetch('/admin/studio/equipment-stock')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Check if data is an array
            if (!Array.isArray(data)) {
                console.warn('Equipment stock data is not an array, using fallback data');
                return loadBasicEquipmentData();
            }

            equipmentStockData = {};
            data.forEach(equipment => {
                if (equipment && equipment.id) {
                    equipmentStockData[equipment.id] = equipment;
                    updateStockDisplay(equipment.id, equipment.available_stock);
                }
            });

            console.log('Equipment stock loaded successfully:', Object.keys(equipmentStockData).length, 'items');
        })
        .catch(error => {
            console.error('Error loading equipment stock:', error);
            showAlert('Gagal memuat data stock equipment. Menggunakan data dasar.', 'warning');
            // Fallback: use basic equipment data without stock validation
            return loadBasicEquipmentData();
        });
}

// Fallback function jika endpoint gagal
function loadBasicEquipmentData() {
    const equipmentModal = document.getElementById('equipmentModal');
    let loadedCount = 0;

    equipmentModal.querySelectorAll('tr').forEach(row => {
        const checkbox = row.querySelector('.equipment-checkbox');
        if (checkbox) {
            const equipmentId = checkbox.value;
            const quantityInput = row.querySelector('.equipment-quantity');
            const stockCell = row.querySelector('td:nth-child(4)');

            if (stockCell && quantityInput) {
                const maxStock = parseInt(quantityInput.getAttribute('data-max')) || 1;
                stockCell.innerHTML = `<span class="fw-bold text-success">${maxStock}</span>`;

                // Initialize basic equipment data
                equipmentStockData[equipmentId] = {
                    id: equipmentId,
                    name: checkbox.getAttribute('data-name'),
                    category: checkbox.getAttribute('data-category'),
                    total_quantity: maxStock,
                    allocated_quantity: 0,
                    available_stock: maxStock
                };

                loadedCount++;
            }
        }
    });

    console.log('Basic equipment data loaded:', loadedCount, 'items');
    return Promise.resolve();
}


    // Update stock display di tabel
    function updateStockDisplay(equipmentId, availableStock) {
        const row = equipmentModal.querySelector(`tr:has(.equipment-checkbox[value="${equipmentId}"])`);
        if (row) {
            const stockCell = row.querySelector('td:nth-child(4)');
            const quantityInput = row.querySelector('.equipment-quantity');

            if (stockCell) {
                stockCell.innerHTML = `
                    <span class="fw-bold ${availableStock > 0 ? 'text-success' : 'text-danger'}">
                        ${availableStock}
                    </span>
                    <small class="text-muted d-block">dari ${equipmentStockData[equipmentId]?.total_quantity || 0}</small>
                `;
            }

            if (quantityInput) {
                quantityInput.max = availableStock;
                if (availableStock === 0) {
                    quantityInput.disabled = true;
                    const checkbox = row.querySelector('.equipment-checkbox');
                    if (checkbox) {
                        checkbox.disabled = true;
                        checkbox.checked = false;
                    }
                }
            }
        }
    }

    // Real-time stock validation saat quantity berubah
    equipmentModal.addEventListener('input', function(e) {
        if (e.target.classList.contains('equipment-quantity')) {
            const equipmentId = e.target.getAttribute('data-equipment-id');
            const requestedQuantity = parseInt(e.target.value) || 0;
            const checkbox = equipmentModal.querySelector(`.equipment-checkbox[value="${equipmentId}"]`);

            if (requestedQuantity > 0 && checkbox && checkbox.checked) {
                validateStock(equipmentId, requestedQuantity, e.target);
            }
        }
    });

    // Validate stock availability
    function validateStock(equipmentId, quantity, inputElement) {
        const data = {
            equipment_id: equipmentId,
            quantity: quantity,
            studio_id: null // Set this if editing existing studio
        };

        fetch('/admin/studio/check-equipment-availability', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            const row = inputElement.closest('tr');
            let messageElement = row.querySelector('.stock-message');

            if (!messageElement) {
                messageElement = document.createElement('div');
                messageElement.className = 'stock-message small mt-1';
                inputElement.parentNode.appendChild(messageElement);
            }

            if (result.available) {
                inputElement.classList.remove('is-invalid');
                inputElement.classList.add('is-valid');
                messageElement.className = 'stock-message small mt-1 text-success';
                messageElement.textContent = result.message;
            } else {
                inputElement.classList.remove('is-valid');
                inputElement.classList.add('is-invalid');
                messageElement.className = 'stock-message small mt-1 text-danger';
                messageElement.textContent = result.message;

                // Auto-correct quantity to maximum available
                if (result.available_stock > 0) {
                    inputElement.value = result.available_stock;
                    setTimeout(() => validateStock(equipmentId, result.available_stock, inputElement), 100);
                }
            }
        })
        // .catch(error => {
        //     console.error('Error validating stock:', error);
        //     showAlert('Gagal memvalidasi stock', 'error');
        // })
        ;
    }

    // Enable quantity input when checkbox is checked dengan stock validation
    equipmentModal.addEventListener('change', function(e) {
        if (e.target.classList.contains('equipment-checkbox')) {
            const equipmentId = e.target.value;
            const quantityInput = equipmentModal.querySelector(`.equipment-quantity[data-equipment-id="${equipmentId}"]`);
            const row = e.target.closest('tr');

            if (e.target.checked) {
                // Check if equipment has available stock
                const stockData = equipmentStockData[equipmentId];
                if (!stockData || stockData.available_stock === 0) {
                    e.target.checked = false;
                    showAlert(`${stockData?.name || 'Equipment'} tidak memiliki stock tersedia`, 'warning');
                    return;
                }

                quantityInput.removeAttribute('disabled');
                quantityInput.max = stockData.available_stock;
                quantityInput.value = Math.min(1, stockData.available_stock);

                // Auto validate initial quantity
                validateStock(equipmentId, parseInt(quantityInput.value), quantityInput);

                // Add stock info
                let stockInfo = row.querySelector('.stock-info');
                if (!stockInfo) {
                    stockInfo = document.createElement('div');
                    stockInfo.className = 'stock-info small text-info mt-1';
                    quantityInput.parentNode.appendChild(stockInfo);
                }
                stockInfo.textContent = `Stock tersedia: ${stockData.available_stock}`;

            } else {
                quantityInput.setAttribute('disabled', 'disabled');
                quantityInput.value = '1';
                quantityInput.classList.remove('is-valid', 'is-invalid');

                // Remove messages
                const messages = row.querySelectorAll('.stock-message, .stock-info');
                messages.forEach(msg => msg.remove());
            }
        }
    });

    // Save equipment selection dengan final validation
    document.getElementById('saveEquipmentSelection').addEventListener('click', function() {
        const checkedEquipment = equipmentModal.querySelectorAll('.equipment-checkbox:checked');
        let hasErrors = false;
        let totalSelected = 0;

        // Final validation sebelum save
        checkedEquipment.forEach(checkbox => {
            const equipmentId = checkbox.value;
            const quantityInput = equipmentModal.querySelector(`.equipment-quantity[data-equipment-id="${equipmentId}"]`);
            const quantity = parseInt(quantityInput.value) || 0;

            if (quantityInput.classList.contains('is-invalid') || quantity === 0) {
                hasErrors = true;
            } else {
                totalSelected++;
            }
        });

        if (hasErrors) {
            showAlert('Masih ada equipment dengan quantity tidak valid. Mohon periksa kembali.', 'error');
            return;
        }

        // Clear previous selections
        selectedEquipment = {};
        equipmentDataContainer.innerHTML = '';
        selectedEquipmentList.innerHTML = '';

        // Process valid selections
        checkedEquipment.forEach(checkbox => {
            const equipmentId = checkbox.value;
            const quantityInput = equipmentModal.querySelector(`.equipment-quantity[data-equipment-id="${equipmentId}"]`);
            const quantity = parseInt(quantityInput.value) || 1;
            const equipmentName = checkbox.getAttribute('data-name');
            const category = checkbox.getAttribute('data-category');
            const stockData = equipmentStockData[equipmentId];

            selectedEquipment[equipmentId] = {
                quantity: quantity,
                name: equipmentName,
                category: category,
                available_stock: stockData?.available_stock || 0
            };

            // Create hidden inputs for form submission
            const quantityInputHidden = document.createElement('input');
            quantityInputHidden.type = 'hidden';
            quantityInputHidden.name = `equipment[${equipmentId}][quantity]`;
            quantityInputHidden.value = quantity;
            equipmentDataContainer.appendChild(quantityInputHidden);

            // Add to selected equipment display
            const badge = document.createElement('span');
            badge.className = 'badge badge-light-primary';
            badge.innerHTML = `
                ${equipmentName} (x${quantity})
                <small class="text-muted">/ ${stockData?.available_stock || 0} tersisa</small>
                <button type="button" class="btn btn-sm btn-icon btn-light-danger ms-2 remove-equipment" data-id="${equipmentId}">×</button>
            `;
            selectedEquipmentList.appendChild(badge);
        });

        // Show/hide selected equipment container
        if (Object.keys(selectedEquipment).length > 0) {
            selectedEquipmentContainer.classList.remove('d-none');
        } else {
            selectedEquipmentContainer.classList.add('d-none');
        }

        // Close equipment modal and show add studio modal
        const equipmentBootstrapModal = bootstrap.Modal.getInstance(equipmentModal);
        equipmentBootstrapModal.hide();

        setTimeout(() => {
            const addStudioBootstrapModal = new bootstrap.Modal(addStudioModal);
            addStudioBootstrapModal.show();
        }, 500);

        showAlert(`${totalSelected} equipment berhasil dipilih dengan validasi stock`, 'success');
    });

    // Remove equipment from selection dan update stock
    selectedEquipmentList.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-equipment')) {
            const equipmentId = e.target.getAttribute('data-id');

            // Remove from selected equipment
            delete selectedEquipment[equipmentId];

            // Remove hidden input
            const hiddenInput = equipmentDataContainer.querySelector(`input[name="equipment[${equipmentId}][quantity]"]`);
            if (hiddenInput) {
                equipmentDataContainer.removeChild(hiddenInput);
            }

            // Remove from display
            e.target.closest('.badge').remove();

            // Uncheck checkbox in modal dan reset
            const checkbox = equipmentModal.querySelector(`.equipment-checkbox[value="${equipmentId}"]`);
            if (checkbox) {
                checkbox.checked = false;
                const quantityInput = equipmentModal.querySelector(`.equipment-quantity[data-equipment-id="${equipmentId}"]`);
                const row = checkbox.closest('tr');

                quantityInput.setAttribute('disabled', 'disabled');
                quantityInput.value = '1';
                quantityInput.classList.remove('is-valid', 'is-invalid');

                // Remove messages
                const messages = row.querySelectorAll('.stock-message, .stock-info');
                messages.forEach(msg => msg.remove());
            }

            // Hide container if no equipment selected
            if (Object.keys(selectedEquipment).length === 0) {
                selectedEquipmentContainer.classList.add('d-none');
            }
        }
    });

    // Auto-refresh stock data setiap 30 detik untuk data real-time
    setInterval(() => {
        if (equipmentModal.classList.contains('show')) {
            loadEquipmentStock();
        }
    }, 30000);

    // Form submission validation
    document.getElementById('studioForm').addEventListener('submit', function(e) {
        const selectedCount = Object.keys(selectedEquipment).length;

        if (selectedCount > 0) {
            // Final check sebelum submit
            let validEquipment = true;
            Object.entries(selectedEquipment).forEach(([equipmentId, data]) => {
                if (data.quantity <= 0 || data.quantity > data.available_stock) {
                    validEquipment = false;
                }
            });

            if (!validEquipment) {
                e.preventDefault();
                showAlert('Ada equipment dengan quantity tidak valid. Mohon periksa kembali.', 'error');
                return false;
            }
        }

        console.log('Submitting studio with equipment:', selectedEquipment);
        return true;
    });

    // Utility function untuk show alert
    function showAlert(message, type = 'info') {
        // Remove existing alerts
        const existingAlerts = document.querySelectorAll('.custom-alert');
        existingAlerts.forEach(alert => alert.remove());

        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type === 'error' ? 'danger' : type} alert-dismissible fade show custom-alert`;
        alertDiv.style.position = 'fixed';
        alertDiv.style.top = '20px';
        alertDiv.style.right = '20px';
        alertDiv.style.zIndex = '9999';
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        document.body.appendChild(alertDiv);

        // Auto remove after 5 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    }
});

// Function untuk edit studio
// Global variables untuk edit
let selectedEquipmentEdit = {};
let currentStudioId = null;

// Function untuk edit studio
// Function untuk edit studio
function editStudio(studioId) {
    currentStudioId = studioId;

    fetch(`/admin/studio/edit-data/${studioId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Studio data loaded:', data);

            // Fill form data
            document.getElementById('edit_studio_id').value = data.id;
            document.getElementById('edit_name').value = data.name;
            document.getElementById('edit_type').value = data.type;
            document.getElementById('edit_kapasitas').value = data.kapasitas;
            document.getElementById('edit_description').value = data.description || '';
            document.getElementById('edit_price_per_hour').value = data.price_per_hour;
            document.getElementById('edit_min_booking_hours').value = data.min_booking_hours;
            document.getElementById('edit_max_booking_hours').value = data.max_booking_hours;
            document.getElementById('edit_status').value = data.status;

            // Handle image preview
            const imageContainer = document.getElementById('current_image_container_studio');
            imageContainer.innerHTML = '';

            if (data.foto) {
                const img = document.createElement('img');
                img.src = `/storage/${data.foto}`;
                img.alt = data.name;
                img.className = 'w-100';
                img.style.borderRadius = '0.475rem';
                imageContainer.appendChild(img);
            } else {
                const placeholder = document.createElement('div');
                placeholder.className = 'symbol-label fs-1 bg-light-primary text-primary d-flex align-items-center justify-content-center w-100 h-100';
                placeholder.style.borderRadius = '0.475rem';
                placeholder.textContent = data.name.charAt(0).toUpperCase();
                imageContainer.appendChild(placeholder);
            }

            // Load equipment data
            loadStudioEquipmentData(data.equipment);

            // PERBAIKAN: Gunakan route yang sesuai dengan web.php
            document.getElementById('editStudioForm').action = `/admin/studio/update/${data.id}`;

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('kt_modal_edit_studio'));
            modal.show();
        })
        .catch(error => {
            console.error('Error loading studio data:', error);
            showAlert('Gagal memuat data studio: ' + error.message, 'error');
        });
}

// Pastikan form memiliki CSRF token dan method PUT
document.addEventListener('DOMContentLoaded', function() {
    const editStudioForm = document.getElementById('editStudioForm');
    if (editStudioForm) {
        editStudioForm.addEventListener('submit', function(e) {
            // Validasi equipment sebelum submit
            const selectedCount = Object.keys(selectedEquipmentEdit).length;
            let validEquipment = true;

            Object.entries(selectedEquipmentEdit).forEach(([equipmentId, data]) => {
                if (data.quantity <= 0) {
                    validEquipment = false;
                }
            });

            if (!validEquipment) {
                e.preventDefault();
                showAlert('Ada equipment dengan quantity tidak valid.', 'error');
                return false;
            }

            console.log('Submitting edit form with equipment:', selectedEquipmentEdit);
            return true;
        });
    }
});

function loadStudioEquipmentData(equipmentData) {
    const selectedEquipmentListEdit = document.getElementById('selectedEquipmentListEdit');
    const equipmentDataContainerEdit = document.getElementById('equipmentDataContainerEdit');
    const selectedEquipmentContainerEdit = document.getElementById('selectedEquipmentContainerEdit');

    // Reset
    selectedEquipmentEdit = {};
    selectedEquipmentListEdit.innerHTML = '';
    equipmentDataContainerEdit.innerHTML = '';

    if (equipmentData && Object.keys(equipmentData).length > 0) {
        Object.entries(equipmentData).forEach(([equipmentId, equipmentItem]) => {
            const quantity = equipmentItem.quantity;

            selectedEquipmentEdit[equipmentId] = {
                quantity: quantity,
                name: `Equipment ${equipmentId}`, // Nanti akan diganti dengan nama sebenarnya
                equipmentId: equipmentId
            };

            // Create hidden inputs untuk form submission
            const quantityInputHidden = document.createElement('input');
            quantityInputHidden.type = 'hidden';
            quantityInputHidden.name = `equipment[${equipmentId}][quantity]`;
            quantityInputHidden.value = quantity;
            equipmentDataContainerEdit.appendChild(quantityInputHidden);

            // Add to display
            const badge = document.createElement('span');
            badge.className = 'badge badge-light-primary mb-1 me-1';
            badge.innerHTML = `Equipment ${equipmentId} (x${quantity})
                <button type="button" class="btn btn-sm btn-icon btn-light-danger ms-2 remove-equipment-edit" data-id="${equipmentId}">
                    ×
                </button>`;
            selectedEquipmentListEdit.appendChild(badge);
        });

        selectedEquipmentContainerEdit.classList.remove('d-none');

        // Load nama equipment yang sebenarnya
        loadEquipmentNames();
    } else {
        selectedEquipmentContainerEdit.classList.add('d-none');
    }
}

// Load nama equipment dari server
function loadEquipmentNames() {
    fetch('/admin/studio/equipment-stock')
        .then(response => response.json())
        .then(equipmentList => {
            equipmentList.forEach(equipment => {
                if (selectedEquipmentEdit[equipment.id]) {
                    selectedEquipmentEdit[equipment.id].name = equipment.name;

                    // Update display name
                    const badge = document.querySelector(`.remove-equipment-edit[data-id="${equipment.id}"]`)?.closest('.badge');
                    if (badge) {
                        badge.innerHTML = badge.innerHTML.replace(
                            `Equipment ${equipment.id}`,
                            equipment.name
                        );
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error loading equipment names:', error);
        });
}

// Initialize edit equipment modal
function initializeEditEquipmentModal() {
    const equipmentModalEdit = document.getElementById('equipmentModalEdit');

    if (!equipmentModalEdit) return;

    // Load stock data saat modal edit dibuka
    equipmentModalEdit.addEventListener('show.bs.modal', function() {
        loadEquipmentStockForEdit();
        prefillEditEquipmentSelection();
    });

    // Enable quantity input when checkbox is checked
    equipmentModalEdit.addEventListener('change', function(e) {
        if (e.target.classList.contains('equipment-checkbox-edit')) {
            const equipmentId = e.target.value;
            const quantityInput = equipmentModalEdit.querySelector(`.equipment-quantity-edit[data-equipment-id="${equipmentId}"]`);

            if (e.target.checked) {
                quantityInput.removeAttribute('disabled');
                // Validate initial quantity dengan studio_id untuk edit mode
                validateStockForEdit(equipmentId, parseInt(quantityInput.value) || 1, quantityInput);
            } else {
                quantityInput.setAttribute('disabled', 'disabled');
                quantityInput.value = '1';
                quantityInput.classList.remove('is-valid', 'is-invalid');

                // Remove validation messages
                const row = e.target.closest('tr');
                const messages = row.querySelectorAll('.stock-message, .stock-info');
                messages.forEach(msg => msg.remove());
            }
        }
    });

    // Real-time stock validation untuk edit
    equipmentModalEdit.addEventListener('input', function(e) {
        if (e.target.classList.contains('equipment-quantity-edit')) {
            const equipmentId = e.target.getAttribute('data-equipment-id');
            const requestedQuantity = parseInt(e.target.value) || 0;
            const checkbox = equipmentModalEdit.querySelector(`.equipment-checkbox-edit[value="${equipmentId}"]`);

            if (requestedQuantity > 0 && checkbox && checkbox.checked) {
                validateStockForEdit(equipmentId, requestedQuantity, e.target);
            }
        }
    });

    // Save equipment selection untuk edit
    document.getElementById('saveEquipmentSelectionEdit').addEventListener('click', function() {
        saveEquipmentSelectionEdit();
    });
}

// Load equipment stock untuk edit mode
function loadEquipmentStockForEdit() {
    return fetch('/admin/studio/equipment-stock')
        .then(response => {
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            return response.json();
        })
        .then(data => {
            if (!Array.isArray(data)) {
                console.warn('Equipment stock data is not an array');
                return loadBasicEquipmentDataForEdit();
            }

            // Update stock display di modal edit
            data.forEach(equipment => {
                if (equipment && equipment.id) {
                    updateStockDisplayForEdit(equipment.id, equipment.available_stock);
                }
            });
        })
        .catch(error => {
            console.error('Error loading equipment stock for edit:', error);
            return loadBasicEquipmentDataForEdit();
        });
}

function loadBasicEquipmentDataForEdit() {
    const equipmentModalEdit = document.getElementById('equipmentModalEdit');
    if (!equipmentModalEdit) return;

    equipmentModalEdit.querySelectorAll('tr').forEach(row => {
        const checkbox = row.querySelector('.equipment-checkbox-edit');
        if (checkbox) {
            const equipmentId = checkbox.value;
            const quantityInput = row.querySelector('.equipment-quantity-edit');
            const stockCell = row.querySelector('td:nth-child(4)');

            if (stockCell && quantityInput) {
                const maxStock = parseInt(quantityInput.getAttribute('data-max')) || 1;
                stockCell.innerHTML = `<span class="fw-bold text-success">${maxStock}</span>`;
            }
        }
    });

    return Promise.resolve();
}

function updateStockDisplayForEdit(equipmentId, availableStock) {
    const equipmentModalEdit = document.getElementById('equipmentModalEdit');
    if (!equipmentModalEdit) return;

    const row = equipmentModalEdit.querySelector(`tr:has(.equipment-checkbox-edit[value="${equipmentId}"])`);
    if (row) {
        const stockCell = row.querySelector('td:nth-child(4)');
        const quantityInput = row.querySelector('.equipment-quantity-edit');

        if (stockCell) {
            stockCell.innerHTML = `
                <span class="fw-bold ${availableStock > 0 ? 'text-success' : 'text-danger'}">
                    ${availableStock}
                </span>
            `;
        }

        if (quantityInput) {
            quantityInput.max = availableStock;
            if (availableStock === 0) {
                quantityInput.disabled = true;
                const checkbox = row.querySelector('.equipment-checkbox-edit');
                if (checkbox) {
                    checkbox.disabled = true;
                    checkbox.checked = false;
                }
            }
        }
    }
}

function validateStockForEdit(equipmentId, quantity, inputElement) {
    const data = {
        equipment_id: equipmentId,
        quantity: quantity,
        studio_id: currentStudioId // Penting untuk edit mode
    };

    fetch('/admin/studio/check-equipment-availability', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        const row = inputElement.closest('tr');
        let messageElement = row.querySelector('.stock-message');

        if (!messageElement) {
            messageElement = document.createElement('div');
            messageElement.className = 'stock-message small mt-1';
            inputElement.parentNode.appendChild(messageElement);
        }

        if (result.available) {
            inputElement.classList.remove('is-invalid');
            inputElement.classList.add('is-valid');
            messageElement.className = 'stock-message small mt-1 text-success';
            messageElement.textContent = result.message;
        } else {
            inputElement.classList.remove('is-valid');
            inputElement.classList.add('is-invalid');
            messageElement.className = 'stock-message small mt-1 text-danger';
            messageElement.textContent = result.message;

            // Auto-correct quantity to maximum available
            if (result.available_stock > 0) {
                inputElement.value = result.available_stock;
                setTimeout(() => validateStockForEdit(equipmentId, result.available_stock, inputElement), 100);
            }
        }
    })
    .catch(error => {
        console.error('Error validating stock for edit:', error);
    });
}

function prefillEditEquipmentSelection() {
    const equipmentModalEdit = document.getElementById('equipmentModalEdit');
    if (!equipmentModalEdit) return;

    // Reset semua checkbox terlebih dahulu
    equipmentModalEdit.querySelectorAll('.equipment-checkbox-edit').forEach(checkbox => {
        checkbox.checked = false;
        const equipmentId = checkbox.value;
        const quantityInput = equipmentModalEdit.querySelector(`.equipment-quantity-edit[data-equipment-id="${equipmentId}"]`);
        if (quantityInput) {
            quantityInput.disabled = true;
            quantityInput.value = '1';
            quantityInput.classList.remove('is-valid', 'is-invalid');

            // Remove validation messages
            const row = checkbox.closest('tr');
            const messages = row.querySelectorAll('.stock-message, .stock-info');
            messages.forEach(msg => msg.remove());
        }
    });

    // Prefill berdasarkan selectedEquipmentEdit
    Object.keys(selectedEquipmentEdit).forEach(equipmentId => {
        const checkbox = equipmentModalEdit.querySelector(`.equipment-checkbox-edit[value="${equipmentId}"]`);
        if (checkbox) {
            checkbox.checked = true;
            const quantityInput = equipmentModalEdit.querySelector(`.equipment-quantity-edit[data-equipment-id="${equipmentId}"]`);
            if (quantityInput) {
                quantityInput.disabled = false;
                quantityInput.value = selectedEquipmentEdit[equipmentId].quantity;
                // Validate the quantity
                validateStockForEdit(equipmentId, selectedEquipmentEdit[equipmentId].quantity, quantityInput);
            }
        }
    });
}

function saveEquipmentSelectionEdit() {
    const equipmentModalEdit = document.getElementById('equipmentModalEdit');
    const selectedEquipmentListEdit = document.getElementById('selectedEquipmentListEdit');
    const equipmentDataContainerEdit = document.getElementById('equipmentDataContainerEdit');
    const selectedEquipmentContainerEdit = document.getElementById('selectedEquipmentContainerEdit');

    // Reset
    selectedEquipmentEdit = {};
    equipmentDataContainerEdit.innerHTML = '';
    selectedEquipmentListEdit.innerHTML = '';

    const checkedEquipment = equipmentModalEdit.querySelectorAll('.equipment-checkbox-edit:checked');
    let hasErrors = false;

    checkedEquipment.forEach(checkbox => {
        const equipmentId = checkbox.value;
        const quantityInput = equipmentModalEdit.querySelector(`.equipment-quantity-edit[data-equipment-id="${equipmentId}"]`);
        const quantity = parseInt(quantityInput.value) || 0;

        if (quantityInput.classList.contains('is-invalid') || quantity === 0) {
            hasErrors = true;
            return;
        }

        const equipmentName = checkbox.getAttribute('data-name');

        selectedEquipmentEdit[equipmentId] = {
            quantity: quantity,
            name: equipmentName,
            equipmentId: equipmentId
        };

        // Create hidden inputs untuk form submission
        const quantityInputHidden = document.createElement('input');
        quantityInputHidden.type = 'hidden';
        quantityInputHidden.name = `equipment[${equipmentId}][quantity]`;
        quantityInputHidden.value = quantity;
        equipmentDataContainerEdit.appendChild(quantityInputHidden);

        // Add to display
        const badge = document.createElement('span');
        badge.className = 'badge badge-light-primary mb-1 me-1';
        badge.innerHTML = `${equipmentName} (x${quantity})
            <button type="button" class="btn btn-sm btn-icon btn-light-danger ms-2 remove-equipment-edit" data-id="${equipmentId}">
                ×
            </button>`;
        selectedEquipmentListEdit.appendChild(badge);
    });

    if (hasErrors) {
        showAlert('Masih ada equipment dengan quantity tidak valid.', 'error');
        return;
    }

    // Show/hide container
    if (Object.keys(selectedEquipmentEdit).length > 0) {
        selectedEquipmentContainerEdit.classList.remove('d-none');
    } else {
        selectedEquipmentContainerEdit.classList.add('d-none');
    }

    // Close modal
    const equipmentBootstrapModal = bootstrap.Modal.getInstance(equipmentModalEdit);
    equipmentBootstrapModal.hide();

    showAlert('Equipment berhasil dipilih', 'success');
}

// Event listeners untuk remove equipment di edit mode
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-equipment-edit')) {
        const equipmentId = e.target.getAttribute('data-id');
        removeEquipmentEdit(equipmentId);
    }
});

function removeEquipmentEdit(equipmentId) {
    delete selectedEquipmentEdit[equipmentId];

    const equipmentDataContainerEdit = document.getElementById('equipmentDataContainerEdit');
    const hiddenInput = equipmentDataContainerEdit.querySelector(`input[name="equipment[${equipmentId}][quantity]"]`);
    if (hiddenInput) {
        equipmentDataContainerEdit.removeChild(hiddenInput);
    }

    const selectedEquipmentContainerEdit = document.getElementById('selectedEquipmentContainerEdit');
    const selectedEquipmentListEdit = document.getElementById('selectedEquipmentListEdit');
    const badge = selectedEquipmentListEdit.querySelector(`.badge:has(button[data-id="${equipmentId}"])`);
    if (badge) {
        badge.remove();
    }

    // Hide container jika tidak ada equipment
    if (Object.keys(selectedEquipmentEdit).length === 0) {
        selectedEquipmentContainerEdit.classList.add('d-none');
    }
}

// Initialize ketika document ready
document.addEventListener('DOMContentLoaded', function() {
    initializeEditEquipmentModal();

    // Form validation untuk edit
    const editStudioForm = document.getElementById('editStudioForm');
    if (editStudioForm) {
        editStudioForm.addEventListener('submit', function(e) {
            const selectedCount = Object.keys(selectedEquipmentEdit).length;
            let validEquipment = true;

            Object.entries(selectedEquipmentEdit).forEach(([equipmentId, data]) => {
                if (data.quantity <= 0) {
                    validEquipment = false;
                }
            });

            if (!validEquipment) {
                e.preventDefault();
                showAlert('Ada equipment dengan quantity tidak valid.', 'error');
                return false;
            }

            console.log('Submitting edit form with equipment:', selectedEquipmentEdit);
            return true;
        });
    }
});

// Utility function untuk show alert
function showAlert(message, type = 'info') {
    // Remove existing alerts
    const existingAlerts = document.querySelectorAll('.custom-alert');
    existingAlerts.forEach(alert => alert.remove());

    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type === 'error' ? 'danger' : type} alert-dismissible fade show custom-alert`;
    alertDiv.style.position = 'fixed';
    alertDiv.style.top = '20px';
    alertDiv.style.right = '20px';
    alertDiv.style.zIndex = '9999';
    alertDiv.style.minWidth = '300px';
    alertDiv.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="ki-duotone ki-${type === 'success' ? 'check' : 'information'} fs-2 me-2"></i>
            <div>${message}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

    document.body.appendChild(alertDiv);

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 5000);
}

// Equipment Selection for Edit Modal
document.addEventListener('DOMContentLoaded', function() {
    const equipmentModalEdit = document.getElementById('equipmentModalEdit');
    const editStudioModal = document.getElementById('kt_modal_edit_studio');
    const selectedEquipmentContainerEdit = document.getElementById('selectedEquipmentContainerEdit');
    const selectedEquipmentListEdit = document.getElementById('selectedEquipmentListEdit');
    const equipmentDataContainerEdit = document.getElementById('equipmentDataContainerEdit');

    let selectedEquipmentEdit = {};

    // Enable quantity input when checkbox is checked
    equipmentModalEdit.addEventListener('change', function(e) {
        if (e.target.classList.contains('equipment-checkbox-edit')) {
            const equipmentId = e.target.value;
            const quantityInput = equipmentModalEdit.querySelector(`.equipment-quantity-edit[data-equipment-id="${equipmentId}"]`);

            if (e.target.checked) {
                quantityInput.removeAttribute('disabled');
            } else {
                quantityInput.setAttribute('disabled', 'disabled');
                quantityInput.value = '1';
            }
        }
    });

    // Save equipment selection for edit
    document.getElementById('saveEquipmentSelectionEdit').addEventListener('click', function() {
        selectedEquipmentEdit = {};
        equipmentDataContainerEdit.innerHTML = '';
        selectedEquipmentListEdit.innerHTML = '';

        // Collect selected equipment
        equipmentModalEdit.querySelectorAll('.equipment-checkbox-edit:checked').forEach(checkbox => {
            const equipmentId = checkbox.value;
            const quantityInput = equipmentModalEdit.querySelector(`.equipment-quantity-edit[data-equipment-id="${equipmentId}"]`);
            const quantity = parseInt(quantityInput.value) || 1;
            const equipmentName = checkbox.getAttribute('data-name');
            const category = checkbox.getAttribute('data-category');
            const maxQuantity = parseInt(checkbox.getAttribute('data-max'));

            // Validate quantity
            const validQuantity = Math.min(Math.max(1, quantity), maxQuantity);

            selectedEquipmentEdit[equipmentId] = {
                quantity: validQuantity,
                name: equipmentName,
                category: category
            };

            // Create hidden inputs for form submission
            const quantityInputHidden = document.createElement('input');
            quantityInputHidden.type = 'hidden';
            quantityInputHidden.name = `equipment[${equipmentId}][quantity]`;
            quantityInputHidden.value = validQuantity;
            equipmentDataContainerEdit.appendChild(quantityInputHidden);

            // Add to selected equipment display
            const badge = document.createElement('span');
            badge.className = 'badge badge-light-primary';
            badge.innerHTML = `${equipmentName} (x${validQuantity}) <button type="button" class="btn btn-sm btn-icon btn-light-danger ms-2 remove-equipment-edit" data-id="${equipmentId}">×</button>`;
            selectedEquipmentListEdit.appendChild(badge);
        });

        // Show/hide selected equipment container
        if (Object.keys(selectedEquipmentEdit).length > 0) {
            selectedEquipmentContainerEdit.classList.remove('d-none');
        } else {
            selectedEquipmentContainerEdit.classList.add('d-none');
        }

        // Close equipment modal and show edit studio modal
        const equipmentBootstrapModal = bootstrap.Modal.getInstance(equipmentModalEdit);
        equipmentBootstrapModal.hide();

        // Show edit studio modal after equipment modal is closed
        setTimeout(() => {
            const editStudioBootstrapModal = new bootstrap.Modal(editStudioModal);
            editStudioBootstrapModal.show();
        }, 500);
    });

    // Remove equipment from selection in edit mode
    selectedEquipmentListEdit.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-equipment-edit')) {
            const equipmentId = e.target.getAttribute('data-id');

            // Remove from selected equipment
            delete selectedEquipmentEdit[equipmentId];

            // Remove hidden input
            const hiddenInput = equipmentDataContainerEdit.querySelector(`input[name="equipment[${equipmentId}][quantity]"]`);
            if (hiddenInput) {
                equipmentDataContainerEdit.removeChild(hiddenInput);
            }

            // Remove from display
            e.target.closest('.badge').remove();

            // Uncheck checkbox in modal
            const checkbox = equipmentModalEdit.querySelector(`.equipment-checkbox-edit[value="${equipmentId}"]`);
            if (checkbox) {
                checkbox.checked = false;
                const quantityInput = equipmentModalEdit.querySelector(`.equipment-quantity-edit[data-equipment-id="${equipmentId}"]`);
                quantityInput.setAttribute('disabled', 'disabled');
                quantityInput.value = '1';
            }

            // Hide container if no equipment selected
            if (Object.keys(selectedEquipmentEdit).length === 0) {
                selectedEquipmentContainerEdit.classList.add('d-none');
            }
        }
    });
});
    </script>
    <!--end::Custom Javascript-->
</body>
</html>
