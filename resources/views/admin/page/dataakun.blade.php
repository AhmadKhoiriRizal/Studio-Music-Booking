    <!DOCTYPE html>
    <!--
    Author: Keenthemes
    Product Name: MetronicProduct Version: 8.3.1
    Purchase: https://1.envato.market/EA4JP
    Website: http://www.keenthemes.com
    Contact: support@keenthemes.com
    Follow: www.twitter.com/keenthemes
    Dribbble: www.dribbble.com/keenthemes
    Like: www.facebook.com/keenthemes
    License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
    -->
    <html lang="en">
    <!--begin::Head-->

    <head>
        <title>Metronic - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes</title>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="
                The most advanced Tailwind CSS & Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo,
                Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions.
                Grab your copy now and get life-time updates for free.
            " />
        <meta name="keywords" content="
                tailwind, tailwindcss, metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js,
                Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates,
                free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button,
                bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon
            " />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title"
            content="Metronic - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes" />
        <meta property="og:url" content="https://keenthemes.com/metronic" />
        <meta property="og:site_name" content="Metronic by Keenthemes" />
        <link rel="canonical" href="https://preview.keenthemes.com/metronic8/demo1/apps/user-management/users/list.html" />
        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->

        <!--begin::Vendor Stylesheets(used for this page only)-->
        <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Vendor Stylesheets-->


        <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
        <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-52YZ3XGZJ6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());

            gtag('config', 'G-52YZ3XGZJ6');
        </script>
        <script>
            // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
            if (window.top != window.self) {
                window.top.location.replace(window.self.location.href);
            }
        </script>
        <style>
            .toast {
                min-width: 300px;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
                border-radius: 0.475rem;
            }

            .bg-success { background-color: #50cd89 !important; }
            .bg-danger { background-color: #f1416c !important; }
            .bg-warning { background-color: #ffc700 !important; }
            .bg-info { background-color: #7239ea !important; }
        </style>
    </head>
    <!--end::Head-->

    <!--begin::Body-->

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
            <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">




                <!--begin::Header-->
                @include('admin.layout.header')
                <!--end::Header-->
                <!--begin::Wrapper-->
                <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

                    <!--begin::Sidebar-->
                    @include('admin.layout.sidebar')
                    <!--end::Sidebar-->


                    <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                        <!--begin::Content wrapper-->
                        <div class="d-flex flex-column flex-column-fluid">

                            <!--begin::Toolbar-->
                            <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

                                <!--begin::Toolbar container-->
                                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



                                    <!--begin::Page title-->
                                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                                        <!--begin::Title-->
                                        <h1
                                            class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                                            Users List
                                        </h1>
                                        <!--end::Title-->


                                        <!--begin::Breadcrumb-->
                                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                            <!--begin::Item-->
                                            <li class="breadcrumb-item text-muted">
                                                <a href="/metronic8/demo1/index.html" class="text-muted text-hover-primary">
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
                                                User Management </li>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <li class="breadcrumb-item">
                                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                            </li>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <li class="breadcrumb-item text-muted">
                                                Users </li>
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
                            <div id="kt_app_content" class="app-content  flex-column-fluid ">


                                <!--begin::Content container-->
                                <div id="kt_app_content_container" class="app-container  container-xxl ">
                                    <!--begin::Card-->
                                    <div class="card">
                                        <!--begin::Card header-->
                                        <div class="card-header border-0 pt-6">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <!--begin::Search-->
                                                <div class="d-flex align-items-center position-relative my-1">
                                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span
                                                            class="path1"></span><span class="path2"></span></i> <input
                                                        type="text" data-kt-user-table-filter="search"
                                                        class="form-control form-control-solid w-250px ps-13"
                                                        placeholder="Search user" />
                                                </div>
                                                <!--end::Search-->
                                            </div>
                                            <!--begin::Card title-->

                                            <!--begin::Card toolbar-->
                                            <div class="card-toolbar">
                                                <!--begin::Toolbar-->
                                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                                    <!--begin::Filter-->
                                                    <button type="button" class="btn btn-light-primary me-3"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                        <i class="ki-duotone ki-filter fs-2"><span
                                                                class="path1"></span><span class="path2"></span></i> Filter
                                                    </button>
                                                    <!--begin::Menu 1-->
                                                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px"
                                                        data-kt-menu="true">
                                                        <!--begin::Header-->
                                                        <div class="px-7 py-5">
                                                            <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                                        </div>
                                                        <!--end::Header-->

                                                        <!--begin::Separator-->
                                                        <div class="separator border-gray-200"></div>
                                                        <!--end::Separator-->

                                                        <!--begin::Content-->
                                                        <div class="px-7 py-5" data-kt-user-table-filter="form">
                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <label class="form-label fs-6 fw-semibold">Role:</label>
                                                                <select class="form-select form-select-solid fw-bold"
                                                                    data-kt-select2="true" data-placeholder="Select option"
                                                                    data-allow-clear="true" data-kt-user-table-filter="role"
                                                                    data-hide-search="true">
                                                                    <option></option>
                                                                    @foreach($roles as $role)
                                                                        <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Input group-->
                                                            <div class="mb-10">
                                                                <label class="form-label fs-6 fw-semibold">Status:</label>
                                                                <select class="form-select form-select-solid fw-bold"
                                                                    data-kt-select2="true" data-placeholder="Select option"
                                                                    data-allow-clear="true"
                                                                    data-kt-user-table-filter="status"
                                                                    data-hide-search="true">
                                                                    <option></option>
                                                                    @foreach($statuses as $status)
                                                                        <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <!--end::Input group-->

                                                            <!--begin::Actions-->
                                                            <div class="d-flex justify-content-end">
                                                                <button type="reset"
                                                                    class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                                    data-kt-menu-dismiss="true"
                                                                    data-kt-user-table-filter="reset">Reset</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary fw-semibold px-6"
                                                                    data-kt-menu-dismiss="true"
                                                                    data-kt-user-table-filter="filter">Apply</button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                                    <!--end::Menu 1--> <!--end::Filter-->

                                                    <!--begin::Export-->
                                                    <button type="button" class="btn btn-light-primary me-3"
                                                        data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                                                        <i class="ki-duotone ki-exit-up fs-2"><span
                                                                class="path1"></span><span class="path2"></span></i> Export
                                                    </button>
                                                    <!--end::Export-->

                                                    <!--begin::Add user-->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_add_user">
                                                        <i class="ki-duotone ki-plus fs-2"></i> Add User
                                                    </button>
                                                    <!--end::Add user-->
                                                </div>
                                                <!--end::Toolbar-->

                                                <!--begin::Group actions-->
                                                <div class="d-flex justify-content-end align-items-center d-none"
                                                    data-kt-user-table-toolbar="selected">
                                                    <div class="fw-bold me-5">
                                                        <span class="me-2" data-kt-user-table-select="selected_count"></span> Selected
                                                    </div>
                                                    <button type="button" class="btn btn-danger" id="kt_delete_selected_users">
                                                        Delete Selected
                                                    </button>
                                                </div>
                                                <!--end::Group actions-->

                                                <form id="kt_multiple_delete_form" method="POST" action="{{ route('admin.akun.destroy.multiple') }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="user_ids" id="kt_selected_user_ids">
                                                </form>

                                                <!--begin::Modal - Adjust Balance-->
                                                <div class="modal fade" id="kt_modal_export_users" tabindex="-1"
                                                    aria-hidden="true">
                                                    <!--begin::Modal dialog-->
                                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                                        <!--begin::Modal content-->
                                                        <div class="modal-content">
                                                            <!--begin::Modal header-->
                                                            <div class="modal-header">
                                                                <!--begin::Modal title-->
                                                                <h2 class="fw-bold">Export Users</h2>
                                                                <!--end::Modal title-->

                                                                <!--begin::Close-->
                                                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                                    data-kt-users-modal-action="close">
                                                                    <i class="ki-duotone ki-cross fs-1"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span></i>
                                                                </div>
                                                                <!--end::Close-->
                                                            </div>
                                                            <!--end::Modal header-->

                                                            <!--begin::Modal body-->
                                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                                <!--begin::Form-->
                                                                <form id="kt_modal_export_users_form" class="form"
                                                                    action="#">
                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-10">
                                                                        <!--begin::Label-->
                                                                        <label
                                                                            class="fs-6 fw-semibold form-label mb-2">Select
                                                                            Roles:</label>
                                                                        <!--end::Label-->

                                                                        <!--begin::Input-->
                                                                        <select name="role" data-control="select2"
                                                                            data-placeholder="Select a role"
                                                                            data-hide-search="true"
                                                                            class="form-select form-select-solid fw-bold">
                                                                            <option></option>
                                                                            @foreach($roles as $role)
                                                                                <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <!--end::Input-->
                                                                    </div>
                                                                    <!--end::Input group-->

                                                                    <!--begin::Input group-->
                                                                    <div class="fv-row mb-10">
                                                                        <!--begin::Label-->
                                                                        <label
                                                                            class="required fs-6 fw-semibold form-label mb-2">Select
                                                                            Export Format:</label>
                                                                        <!--end::Label-->

                                                                        <!--begin::Input-->
                                                                        <select name="format" data-control="select2"
                                                                            data-placeholder="Select a format"
                                                                            data-hide-search="true"
                                                                            class="form-select form-select-solid fw-bold">
                                                                            <option></option>
                                                                            <option value="excel">Excel</option>
                                                                            <option value="pdf">PDF</option>
                                                                            <option value="cvs">CVS</option>
                                                                            <option value="zip">ZIP</option>
                                                                        </select>
                                                                        <!--end::Input-->
                                                                    </div>
                                                                    <!--end::Input group-->

                                                                    <!--begin::Actions-->
                                                                    <div class="text-center">
                                                                        <button type="reset" class="btn btn-light me-3"
                                                                            data-kt-users-modal-action="cancel">
                                                                            Discard
                                                                        </button>

                                                                        <button type="submit" class="btn btn-primary"
                                                                            data-kt-users-modal-action="submit">
                                                                            <span class="indicator-label">
                                                                                Submit
                                                                            </span>
                                                                            <span class="indicator-progress">
                                                                                Please wait... <span
                                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                            </span>
                                                                        </button>
                                                                    </div>
                                                                    <!--end::Actions-->
                                                                </form>
                                                                <!--end::Form-->
                                                            </div>
                                                            <!--end::Modal body-->
                                                        </div>
                                                        <!--end::Modal content-->
                                                    </div>
                                                    <!--end::Modal dialog-->
                                                </div>
                                                <!--end::Modal - New Card-->

                                                <!--begin::Modal - Add task-->
                                                <div class="modal fade" id="kt_modal_add_user" tabindex="-1"
                                                    aria-hidden="true">
                                                    <!--begin::Modal dialog-->
                                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                                        <!--begin::Modal content-->
                                                        <div class="modal-content">
                                                            <!--begin::Modal header-->
                                                            <div class="modal-header" id="kt_modal_add_user_header">
                                                                <!--begin::Modal title-->
                                                                <h2 class="fw-bold">Add User</h2>
                                                                <!--end::Modal title-->

                                                                <!--begin::Close-->
                                                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                                    data-kt-users-modal-action="close">
                                                                    <i class="ki-duotone ki-cross fs-1"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span></i>
                                                                </div>
                                                                <!--end::Close-->
                                                            </div>
                                                            <!--end::Modal header-->

                                                            <!--begin::Modal body-->
                                                            <div class="modal-body px-5 my-7">
                                                                <!--begin::Form-->
                                                                <form id="kt_modal_add_user_form" class="form" action="#">
                                                                    <!--begin::Scroll-->
                                                                    <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                                                                        id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                                        data-kt-scroll-activate="true"
                                                                        data-kt-scroll-max-height="auto"
                                                                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                                        data-kt-scroll-offset="300px">
                                                                        <!--begin::Input group-->
                                                                        <div class="fv-row mb-7">
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                                                                            <!--end::Label-->


                                                                            <!--begin::Image placeholder-->
                                                                            <style>
                                                                                .image-input-placeholder {
                                                                                    background-image: url('/metronic8/demo1/assets/media/svg/files/blank-image.svg');
                                                                                }

                                                                                [data-bs-theme="dark"] .image-input-placeholder {
                                                                                    background-image: url('/metronic8/demo1/assets/media/svg/files/blank-image-dark.svg');
                                                                                }
                                                                            </style>
                                                                            <!--end::Image placeholder-->
                                                                            <!--begin::Image input-->
                                                                            <div class="image-input image-input-outline image-input-placeholder"
                                                                                data-kt-image-input="true">
                                                                                <!--begin::Preview existing avatar-->
                                                                                <div class="image-input-wrapper w-125px h-125px"
                                                                                    style="background-image: url(/metronic8/demo1/assets/media/avatars/300-6.jpg);">
                                                                                </div>
                                                                                <!--end::Preview existing avatar-->

                                                                                <!--begin::Label-->
                                                                                <label
                                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                    data-kt-image-input-action="change"
                                                                                    data-bs-toggle="tooltip"
                                                                                    title="Change avatar">
                                                                                    <i class="ki-duotone ki-pencil fs-7"><span
                                                                                            class="path1"></span><span
                                                                                            class="path2"></span></i>
                                                                                    <!--begin::Inputs-->
                                                                                    <input type="file" name="avatar"
                                                                                        accept=".png, .jpg, .jpeg" />
                                                                                    <input type="hidden"
                                                                                        name="avatar_remove" />
                                                                                    <!--end::Inputs-->
                                                                                </label>
                                                                                <!--end::Label-->

                                                                                <!--begin::Cancel-->
                                                                                <span
                                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                    data-kt-image-input-action="cancel"
                                                                                    data-bs-toggle="tooltip"
                                                                                    title="Cancel avatar">
                                                                                    <i class="ki-duotone ki-cross fs-2"><span
                                                                                            class="path1"></span><span
                                                                                            class="path2"></span></i>
                                                                                </span>
                                                                                <!--end::Cancel-->

                                                                                <!--begin::Remove-->
                                                                                <span
                                                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                    data-kt-image-input-action="remove"
                                                                                    data-bs-toggle="tooltip"
                                                                                    title="Remove avatar">
                                                                                    <i class="ki-duotone ki-cross fs-2"><span
                                                                                            class="path1"></span><span
                                                                                            class="path2"></span></i>
                                                                                </span>
                                                                                <!--end::Remove-->
                                                                            </div>
                                                                            <!--end::Image input-->

                                                                            <!--begin::Hint-->
                                                                            <div class="form-text">Allowed file types: png,
                                                                                jpg, jpeg.</div>
                                                                            <!--end::Hint-->
                                                                        </div>
                                                                        <!--end::Input group-->

                                                                        <!--begin::Input group-->
                                                                        <div class="fv-row mb-7">
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="required fw-semibold fs-6 mb-2">Full
                                                                                Name</label>
                                                                            <!--end::Label-->

                                                                            <!--begin::Input-->
                                                                            <input type="text" name="user_name"
                                                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                                                placeholder="Full name"
                                                                                value="Emma Smith" />
                                                                            <!--end::Input-->
                                                                        </div>
                                                                        <!--end::Input group-->

                                                                        <!--begin::Input group-->
                                                                        <div class="fv-row mb-7">
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="required fw-semibold fs-6 mb-2">Email</label>
                                                                            <!--end::Label-->

                                                                            <!--begin::Input-->
                                                                            <input type="email" name="user_email"
                                                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                                                placeholder="example@domain.com"
                                                                                value="smith@kpmg.com" />
                                                                            <!--end::Input-->
                                                                        </div>
                                                                        <!--end::Input group-->

                                                                        <!--begin::Input group-->
                                                                        <div class="fv-row mb-7">
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="required fw-semibold fs-6 mb-2">Full
                                                                                Name</label>
                                                                            <!--end::Label-->

                                                                            <!--begin::Input-->
                                                                            <input type="text" name="user_name"
                                                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                                                placeholder="Full name"
                                                                                value="Emma Smith" />
                                                                            <!--end::Input-->
                                                                        </div>
                                                                        <!--end::Input group-->

                                                                        <!--begin::Input group-->
                                                                        <div class="fv-row mb-7">
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="required fw-semibold fs-6 mb-2">Full
                                                                                Name</label>
                                                                            <!--end::Label-->

                                                                            <!--begin::Input-->
                                                                            <input type="text" name="user_name"
                                                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                                                placeholder="Full name"
                                                                                value="Emma Smith" />
                                                                            <!--end::Input-->
                                                                        </div>
                                                                        <!--end::Input group-->

                                                                        <!--begin::Input group-->
                                                                        <div class="fv-row mb-7">
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="required fw-semibold fs-6 mb-2">Full
                                                                                Name</label>
                                                                            <!--end::Label-->

                                                                            <!--begin::Input-->
                                                                            <input type="text" name="user_name"
                                                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                                                placeholder="Full name"
                                                                                value="Emma Smith" />
                                                                            <!--end::Input-->
                                                                        </div>
                                                                        <!--end::Input group-->

                                                                        <!--begin::Input group-->
                                                                        <div class="mb-5">
                                                                            <!--begin::Label-->
                                                                            <label
                                                                                class="required fw-semibold fs-6 mb-5">Role</label>
                                                                            <!--end::Label-->

                                                                            <!--begin::Roles-->
                                                                            <!--begin::Input row-->
                                                                            <div class="d-flex fv-row">
                                                                                <!--begin::Radio-->
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <!--begin::Input-->
                                                                                    <input class="form-check-input me-3"
                                                                                        name="user_role" type="radio"
                                                                                        value="0"
                                                                                        id="kt_modal_update_role_option_0"
                                                                                        checked='checked' />
                                                                                    <!--end::Input-->

                                                                                    <!--begin::Label-->
                                                                                    <label class="form-check-label"
                                                                                        for="kt_modal_update_role_option_0">
                                                                                        <div class="fw-bold text-gray-800">
                                                                                            Administrator</div>
                                                                                        <div class="text-gray-600">Best for
                                                                                            business owners and company
                                                                                            administrators</div>
                                                                                    </label>
                                                                                    <!--end::Label-->
                                                                                </div>
                                                                                <!--end::Radio-->
                                                                            </div>
                                                                            <!--end::Input row-->

                                                                            <div class='separator separator-dashed my-5'>
                                                                            </div> <!--begin::Input row-->
                                                                            <div class="d-flex fv-row">
                                                                                <!--begin::Radio-->
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <!--begin::Input-->
                                                                                    <input class="form-check-input me-3"
                                                                                        name="user_role" type="radio"
                                                                                        value="1"
                                                                                        id="kt_modal_update_role_option_1" />
                                                                                    <!--end::Input-->

                                                                                    <!--begin::Label-->
                                                                                    <label class="form-check-label"
                                                                                        for="kt_modal_update_role_option_1">
                                                                                        <div class="fw-bold text-gray-800">
                                                                                            Developer</div>
                                                                                        <div class="text-gray-600">Best for
                                                                                            developers or people primarily
                                                                                            using the API</div>
                                                                                    </label>
                                                                                    <!--end::Label-->
                                                                                </div>
                                                                                <!--end::Radio-->
                                                                            </div>
                                                                            <!--end::Input row-->

                                                                            <div class='separator separator-dashed my-5'>
                                                                            </div> <!--begin::Input row-->
                                                                            <div class="d-flex fv-row">
                                                                                <!--begin::Radio-->
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <!--begin::Input-->
                                                                                    <input class="form-check-input me-3"
                                                                                        name="user_role" type="radio"
                                                                                        value="2"
                                                                                        id="kt_modal_update_role_option_2" />
                                                                                    <!--end::Input-->

                                                                                    <!--begin::Label-->
                                                                                    <label class="form-check-label"
                                                                                        for="kt_modal_update_role_option_2">
                                                                                        <div class="fw-bold text-gray-800">
                                                                                            Analyst</div>
                                                                                        <div class="text-gray-600">Best for
                                                                                            people who need full access to
                                                                                            analytics data, but don't need
                                                                                            to update business settings
                                                                                        </div>
                                                                                    </label>
                                                                                    <!--end::Label-->
                                                                                </div>
                                                                                <!--end::Radio-->
                                                                            </div>
                                                                            <!--end::Input row-->

                                                                            <div class='separator separator-dashed my-5'>
                                                                            </div> <!--begin::Input row-->
                                                                            <div class="d-flex fv-row">
                                                                                <!--begin::Radio-->
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <!--begin::Input-->
                                                                                    <input class="form-check-input me-3"
                                                                                        name="user_role" type="radio"
                                                                                        value="3"
                                                                                        id="kt_modal_update_role_option_3" />
                                                                                    <!--end::Input-->

                                                                                    <!--begin::Label-->
                                                                                    <label class="form-check-label"
                                                                                        for="kt_modal_update_role_option_3">
                                                                                        <div class="fw-bold text-gray-800">
                                                                                            Support</div>
                                                                                        <div class="text-gray-600">Best for
                                                                                            employees who regularly refund
                                                                                            payments and respond to disputes
                                                                                        </div>
                                                                                    </label>
                                                                                    <!--end::Label-->
                                                                                </div>
                                                                                <!--end::Radio-->
                                                                            </div>
                                                                            <!--end::Input row-->

                                                                            <div class='separator separator-dashed my-5'>
                                                                            </div> <!--begin::Input row-->
                                                                            <div class="d-flex fv-row">
                                                                                <!--begin::Radio-->
                                                                                <div
                                                                                    class="form-check form-check-custom form-check-solid">
                                                                                    <!--begin::Input-->
                                                                                    <input class="form-check-input me-3"
                                                                                        name="user_role" type="radio"
                                                                                        value="4"
                                                                                        id="kt_modal_update_role_option_4" />
                                                                                    <!--end::Input-->

                                                                                    <!--begin::Label-->
                                                                                    <label class="form-check-label"
                                                                                        for="kt_modal_update_role_option_4">
                                                                                        <div class="fw-bold text-gray-800">
                                                                                            Trial</div>
                                                                                        <div class="text-gray-600">Best for
                                                                                            people who need to preview
                                                                                            content data, but don't need to
                                                                                            make any updates</div>
                                                                                    </label>
                                                                                    <!--end::Label-->
                                                                                </div>
                                                                                <!--end::Radio-->
                                                                            </div>
                                                                            <!--end::Input row-->

                                                                            <!--end::Roles-->
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                    </div>
                                                                    <!--end::Scroll-->

                                                                    <!--begin::Actions-->
                                                                    <div class="text-center pt-10">
                                                                        <button type="reset" class="btn btn-light me-3"
                                                                            data-kt-users-modal-action="cancel">
                                                                            Discard
                                                                        </button>

                                                                        <button type="submit" class="btn btn-primary"
                                                                            data-kt-users-modal-action="submit">
                                                                            <span class="indicator-label">
                                                                                Submit
                                                                            </span>
                                                                            <span class="indicator-progress">
                                                                                Please wait... <span
                                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                            </span>
                                                                        </button>
                                                                    </div>
                                                                    <!--end::Actions-->
                                                                </form>
                                                                <!--end::Form-->
                                                            </div>
                                                            <!--end::Modal body-->
                                                        </div>
                                                        <!--end::Modal content-->
                                                    </div>
                                                    <!--end::Modal dialog-->
                                                </div>
                                                <!--end::Modal - Add task-->
                                            </div>
                                            <!--end::Card toolbar-->
                                        </div>
                                        <!--end::Card header-->

                                        <!--begin::Card body-->
                                        <div class="card-body py-4">

                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed fs-6 gy-5"
                                                id="kt_table_users">
                                                <thead>
                                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="w-10px pe-2">
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    data-kt-check="true"
                                                                    data-kt-check-target="#kt_table_users .form-check-input:not([disabled])"
                                                                    value="1" />
                                                            </div>
                                                        </th>
                                                        <th class="min-w-125px">ID</th>
                                                        <th class="min-w-125px">User</th>
                                                        <th class="min-w-125px">Role</th>
                                                        <th class="min-w-125px">Nomor</th>
                                                        <th class="min-w-125px">Status</th>
                                                        <th class="text-end min-w-100px">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-gray-600 fw-semibold">
                                                    @foreach($users as $user)
                                                    <tr>
                                                        @php
                                                            // Tentukan apakah user bisa dihapus
                                                            $canDelete = true;
                                                            if ($user->id === 'ADMIN@123' || $user->role === 'admin') {
                                                                $canDelete = false;
                                                            }

                                                            // Tentukan apakah user bisa diedit
                                                            $canEdit = true;
                                                            if ($user->id === 'ADMIN@123' && $user->role === 'admin') {
                                                                $canEdit = false;
                                                            }

                                                            // Tentukan photo yang akan ditampilkan
                                                            $userPhoto = $user->photo ? asset($user->photo) : asset('media/avatars/blank.png');
                                                        @endphp

                                                        <td>
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                @if($canDelete)
                                                                <input class="form-check-input" type="checkbox" value="{{ $user->id }}"
                                                                    data-kt-user-table-select="checkbox" />
                                                                @else
                                                                <input class="form-check-input" type="checkbox" value="{{ $user->id }}"
                                                                    disabled data-kt-user-table-select="disabled" />
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $user->id }}
                                                        </td>
                                                        <td class="d-flex align-items-center">
                                                            <!--begin:: Avatar -->
                                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                                <a href="#">
                                                                    <div class="symbol-label">
                                                                        <img src="{{ $userPhoto }}" alt="{{ $user->name }}" class="w-100" />
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::User details-->
                                                            <div class="d-flex flex-column">
                                                                <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $user->name }}</a>
                                                                <span>{{ $user->email }}</span>
                                                            </div>
                                                            <!--begin::User details-->
                                                        </td>
                                                        <td>
                                                            <div class="badge badge-light fw-bold">{{ ucfirst($user->role) }}</div>
                                                        </td>
                                                        <td>
                                                            {{ $user->phone ?? '-' }}
                                                        </td>
                                                        <td>
                                                            <div class="badge badge-light-{{ $user->status == 'aktif' ? 'success' : 'danger' }} fw-bold">{{ ucfirst($user->status) }}</div>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="#"
                                                                class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                                data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">
                                                                Actions
                                                                <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                                            </a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                                data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                @if($canEdit)
                                                                <div class="menu-item px-3">
                                                                    <a href="{{ route('admin.akun.edit', $user->id) }}" class="menu-link px-3">
                                                                        Edit
                                                                    </a>
                                                                </div>
                                                                @else
                                                                <div class="menu-item px-3">
                                                                    <span class="menu-link px-3 text-muted" style="cursor: not-allowed; opacity: 0.6;">
                                                                        Edit
                                                                    </span>
                                                                </div>
                                                                @endif
                                                                <!--end::Menu item-->

                                                                <!--begin::Menu item-->
                                                                @if($canDelete)
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3"
                                                                    data-kt-users-table-filter="delete_row"
                                                                    data-user-id="{{ $user->id }}"
                                                                    data-user-name="{{ $user->name }}">
                                                                        Delete
                                                                    </a>
                                                                </div>
                                                                @else
                                                                <div class="menu-item px-3">
                                                                    <span class="menu-link px-3 text-muted" style="cursor: not-allowed; opacity: 0.6;">
                                                                        Delete
                                                                    </span>
                                                                </div>
                                                                @endif
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
                                <!--end::Content container-->
                            </div>
                            <!--end::Content-->

                        </div>
                        <!--end::Content wrapper-->


                        <!--begin::Footer-->
                        @include('admin.layout.footer')
                        <!--end::Footer-->
                    </div>
                    <!--end:::Main-->


                </div>
                <!--end::Wrapper-->


            </div>
            <!--end::Page-->
        </div>
        <!--end::App-->

        <!--begin::Engage modals-->
        <!--end::Engage modals-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
        </div>
        <!--end::Scrolltop-->

        {{-- <!--begin::Modal - Delete User-->
        <div class="modal fade" id="kt_modal_delete_user" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-500px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Hapus User</h2>
                        <!--end::Modal title-->

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->

                    <!--begin::Modal body-->
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus user <strong id="delete-user-name"></strong>?</p>
                        <p class="text-danger">Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                    <!--end::Modal body-->

                    <!--begin::Modal footer-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <form id="delete-user-form" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                    <!--end::Modal footer-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Delete User-->

        <!--begin::Modal - Delete Multiple Users-->
        <div class="modal fade" id="kt_modal_delete_multiple_users" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-500px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Hapus Multiple Users</h2>
                        <!--end::Modal title-->

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->

                    <!--begin::Modal body-->
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus <strong id="delete-multiple-count"></strong> user yang dipilih?</p>
                        <p class="text-danger">Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                    <!--end::Modal body-->

                    <!--begin::Modal footer-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <form id="delete-multiple-users-form" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus Selected</button>
                        </form>
                    </div>
                    <!--end::Modal footer-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Delete Multiple Users--> --}}

        <!--begin::Javascript-->
        <script>
            var hostUrl = "{{ asset('') }}";        </script>

        <script>
            // Tambahkan script ini di akhir file
            document.addEventListener('DOMContentLoaded', function() {
                // Tunggu hingga DataTables diinisialisasi oleh Metronic
                setTimeout(function() {
                    const searchInput = document.querySelector('[data-kt-user-table-filter="search"]');
                    if (searchInput) {
                        // Dapatkan instance DataTables
                        const table = $('#kt_table_users').DataTable();

                        searchInput.addEventListener('keyup', function() {
                            table.search(this.value).draw();
                        });
                    }
                }, 1500);
            });

            // Tunggu sampai semua script Metronic dimuat
            document.addEventListener('DOMContentLoaded', function() {
                // Tunggu sebentar untuk memastikan Metronic selesai initialize
                setTimeout(function() {
                    initializeMultipleDelete();
                }, 1000);
            });

            // Filter Menu
            function initializeFilters() {
                // Tunggu hingga DataTables ready
                const checkTable = setInterval(function() {
                    if ($.fn.DataTable.isDataTable('#kt_table_users')) {
                        clearInterval(checkTable);

                        const table = $('#kt_table_users').DataTable();
                        console.log('Table initialized successfully');

                        // Setup event listeners
                        setupFilterListeners(table);
                    }
                }, 500);
            }

            function setupFilterListeners(table) {
                // Search
                $('[data-kt-user-table-filter="search"]').on('keyup', function() {
                    table.search(this.value).draw();
                });

                // Role filter
                $('[data-kt-user-table-filter="role"]').on('change', function() {
                    table.column(3).search(this.value).draw();
                });

                // Status filter
                $('[data-kt-user-table-filter="status"]').on('change', function() {
                    table.column(5).search(this.value).draw();
                });

                // Reset
                $('[data-kt-user-table-filter="reset"]').on('click', function() {
                    $('[data-kt-user-table-filter="search"]').val('');
                    $('[data-kt-user-table-filter="role"]').val('').trigger('change');
                    $('[data-kt-user-table-filter="status"]').val('').trigger('change');
                    table.search('').columns().search('').draw();
                });
            }

            // Expore Menu


            // Initialize
            document.addEventListener('DOMContentLoaded', initializeFilters);

            //
            function initializeMultipleDelete() {
                console.log('Initializing Metronic compatible multiple delete...');

                // Cari button delete selected
                const deleteSelectedBtn = document.getElementById('kt_delete_selected_users');
                if (!deleteSelectedBtn) {
                    console.error('Delete selected button not found!');
                    return;
                }

                // Event listener untuk button delete selected
                deleteSelectedBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    console.log('Delete selected button clicked');

                    // Ambil semua checkbox yang ter-select (kecuali master checkbox)
                    const selectedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked:not([data-kt-check="true"])');
                    console.log('Found checkboxes:', selectedCheckboxes.length);

                    // Filter hanya checkbox yang tidak disabled
                    const validCheckboxes = Array.from(selectedCheckboxes).filter(cb => !cb.disabled);
                    const selectedIds = validCheckboxes.map(cb => cb.value).filter(val => val && val !== '1');

                    console.log('Selected user IDs:', selectedIds);

                    if (selectedIds.length === 0) {
                        Swal.fire({
                            title: 'Peringatan!',
                            text: 'Tidak ada user yang dipilih untuk dihapus',
                            icon: 'warning',
                            confirmButtonText: 'OK',
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            }
                        });
                        return;
                    }

                    // Tampilkan konfirmasi delete
                    Swal.fire({
                        title: 'Konfirmasi Penghapusan',
                        text: `Apakah Anda yakin ingin menghapus ${selectedIds.length} user yang dipilih?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal',
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: 'btn btn-danger',
                            cancelButton: 'btn btn-light'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            console.log('User confirmed deletion, proceeding...');

                            // Tampilkan loading
                            Swal.fire({
                                title: 'Menghapus Data...',
                                text: 'Sedang memproses penghapusan user',
                                icon: 'info',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                                willOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            // Set nilai ke form tersembunyi
                            const form = document.getElementById('kt_multiple_delete_form');
                            const userIdsInput = document.getElementById('kt_selected_user_ids');

                            userIdsInput.value = JSON.stringify(selectedIds);

                            console.log('Submitting form with user IDs:', userIdsInput.value);

                            // Submit form
                            form.submit();
                        }
                    });
                });

                // Override fungsi update selected count jika ada
                function updateSelectedCount() {
                    const selectedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked:not([data-kt-check="true"]):not([disabled])');
                    const validSelected = Array.from(selectedCheckboxes).filter(cb => cb.value && cb.value !== '1');
                    const count = validSelected.length;

                    console.log('Updated selected count:', count);

                    // Update counter text
                    const countElement = document.querySelector('[data-kt-user-table-select="selected_count"]');
                    if (countElement) {
                        countElement.textContent = count;
                    }

                    // Show/hide toolbar
                    const toolbar = document.querySelector('[data-kt-user-table-toolbar="selected"]');
                    if (toolbar) {
                        if (count > 0) {
                            toolbar.classList.remove('d-none');
                        } else {
                            toolbar.classList.add('d-none');
                        }
                    }
                }

                // Monitor perubahan checkbox
                function attachCheckboxListeners() {
                    const allCheckboxes = document.querySelectorAll('input[type="checkbox"]');

                    allCheckboxes.forEach(checkbox => {
                        // Hapus listener lama jika ada
                        checkbox.removeEventListener('change', updateSelectedCount);
                        // Tambah listener baru
                        checkbox.addEventListener('change', updateSelectedCount);
                    });

                    console.log('Attached listeners to', allCheckboxes.length, 'checkboxes');
                }

                // Panggil fungsi attach listeners
                attachCheckboxListeners();

                // Update count awal
                updateSelectedCount();

                // Monitor jika ada checkbox baru ditambahkan secara dinamis
                const observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.type === 'childList') {
                            const addedNodes = mutation.addedNodes;
                            for (let i = 0; i < addedNodes.length; i++) {
                                const node = addedNodes[i];
                                if (node.nodeType === 1 && (node.tagName === 'INPUT' || node.querySelector('input[type="checkbox"]'))) {
                                    console.log('New checkbox detected, reattaching listeners');
                                    setTimeout(attachCheckboxListeners, 100);
                                    break;
                                }
                            }
                        }
                    });
                });

                observer.observe(document.body, {
                    childList: true,
                    subtree: true
                });

                console.log('Multiple delete initialization completed');
            }

            // Backup function jika Metronic belum ready
            window.addEventListener('load', function() {
                setTimeout(function() {
                    if (!document.getElementById('kt_delete_selected_users')?.hasAttribute('data-initialized')) {
                        console.log('Reinitializing multiple delete on window load');
                        initializeMultipleDelete();
                    }
                }, 2000);
            });

            // Handle untuk single delete juga
            document.addEventListener('click', function(e) {
                if (e.target.matches('[data-kt-users-table-filter="delete_row"]') ||
                    e.target.closest('[data-kt-users-table-filter="delete_row"]')) {

                    e.preventDefault();

                    const button = e.target.matches('[data-kt-users-table-filter="delete_row"]') ?
                                e.target : e.target.closest('[data-kt-users-table-filter="delete_row"]');

                    const userId = button.getAttribute('data-user-id');
                    const userName = button.getAttribute('data-user-name');

                    console.log('Single delete clicked for:', userId, userName);

                    Swal.fire({
                        title: 'Konfirmasi Penghapusan',
                        text: `Apakah Anda yakin ingin menghapus user "${userName}"?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal',
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: 'btn btn-danger',
                            cancelButton: 'btn btn-light'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Tampilkan loading
                            Swal.fire({
                                title: 'Menghapus Data...',
                                text: 'Sedang memproses penghapusan user',
                                icon: 'info',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                                willOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            // Kirim request delete
                            const baseUrl = window.location.origin;
                            const deleteUrl = `${baseUrl}/admin/akun/destroy/${userId}`;

                            fetch(deleteUrl, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Accept': 'application/json',
                                    'Content-Type': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                Swal.close();
                                if (data.success) {
                                    Swal.fire({
                                        title: 'Berhasil!',
                                        text: data.message,
                                        icon: 'success',
                                        confirmButtonText: 'OK',
                                        buttonsStyling: false,
                                        customClass: {
                                            confirmButton: 'btn btn-success'
                                        }
                                    }).then(() => {
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Gagal!',
                                        text: data.message || 'Terjadi kesalahan',
                                        icon: 'error',
                                        confirmButtonText: 'OK',
                                        buttonsStyling: false,
                                        customClass: {
                                            confirmButton: 'btn btn-primary'
                                        }
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.close();
                                console.error('Error:', error);
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Terjadi kesalahan saat menghapus user',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                    buttonsStyling: false,
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    }
                                });
                            });
                        }
                    });
                }
            });
        </script>

        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->

        <!--begin::Vendors Javascript(used for this page only)-->
        <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <!--end::Vendors Javascript-->

        <!--begin::Custom Javascript(used for this page only)-->
        <script src="{{ asset('js/custom/apps/user-management/users/list/table.js') }}"></script>
        <script src="{{ asset('js/custom/apps/user-management/users/list/export-users.js') }}"></script>
        <script src="{{ asset('js/custom/apps/user-management/users/list/add.js') }}"></script>
        <script src="{{ asset('js/widgets.bundle.js') }}"></script>
        <script src="{{ asset('js/custom/widgets.js') }}"></script>
        <script src="{{ asset('js/custom/apps/chat/chat.js') }}"></script>
        <script src="{{ asset('js/custom/utilities/modals/upgrade-plan.js') }}"></script>
        <script src="{{ asset('js/custom/utilities/modals/create-app.js') }}"></script>
        <script src="{{ asset('js/custom/utilities/modals/users-search.js') }}"></script>
        <!--end::Custom Javascript-->
        <!--end::Javascript-->
    </body>
    <!--end::Body-->

    </html>
