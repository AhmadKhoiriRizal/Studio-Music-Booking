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
    <title>Kelola Ketersedian | Studio Musik</title>
    <meta charset="utf-8" />
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
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8/demo1/apps/calendar.html" />
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
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
                                <div class="card ">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <h2 class="card-title fw-bold">
                                            Calendar
                                        </h2>

                                        <div class="card-toolbar">
                                            <button class="btn btn-flex btn-primary" data-kt-calendar="add">
                                                <i class="ki-duotone ki-plus fs-2"></i>
                                                Add Event
                                            </button>
                                        </div>
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body">
                                        <!--begin::Calendar-->
                                        <div id="kt_calendar_app"></div>
                                        <!--end::Calendar-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->

                                <!--begin::Modals-->
                                <!--begin::Modal - New Product-->
                                <div class="modal fade" id="kt_modal_add_event" tabindex-="1" aria-hidden="true"
                                    data-bs-focus="false">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Form-->
                                            <form class="form" action="#" id="kt_modal_add_event_form">
                                                <!--begin::Modal header-->
                                                <div class="modal-header">
                                                    <!--begin::Modal title-->
                                                    <h2 class="fw-bold" data-kt-calendar="title">Add Event</h2>
                                                    <!--end::Modal title-->

                                                    <!--begin::Close-->
                                                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                        id="kt_modal_add_event_close">
                                                        <i class="ki-duotone ki-cross fs-1"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                    </div>
                                                    <!--end::Close-->
                                                </div>
                                                <!--end::Modal header-->

                                                <!--begin::Modal body-->
                                                <div class="modal-body py-10 px-lg-17">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-9">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold required mb-2">Event Name</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="" name="calendar_event_name" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-9">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold mb-2">Event Description</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="" name="calendar_event_description" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-9">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold mb-2">Event Location</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-solid"
                                                            placeholder="" name="calendar_event_location" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-9">
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="kt_calendar_datepicker_allday" />
                                                            <span class="form-check-label fw-semibold"
                                                                for="kt_calendar_datepicker_allday">
                                                                All Day
                                                            </span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="row row-cols-lg-2 g-10">
                                                        <div class="col">
                                                            <div class="fv-row mb-9">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2 required">Event
                                                                    Start Date</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <input class="form-control form-control-solid"
                                                                    name="calendar_event_start_date"
                                                                    placeholder="Pick a start date"
                                                                    id="kt_calendar_datepicker_start_date" />
                                                                <!--end::Input-->
                                                            </div>
                                                        </div>
                                                        <div class="col" data-kt-calendar="datepicker">
                                                            <div class="fv-row mb-9">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">Event Start
                                                                    Time</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <input class="form-control form-control-solid"
                                                                    name="calendar_event_start_time"
                                                                    placeholder="Pick a start time"
                                                                    id="kt_calendar_datepicker_start_time" />
                                                                <!--end::Input-->
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="row row-cols-lg-2 g-10">
                                                        <div class="col">
                                                            <div class="fv-row mb-9">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2 required">Event End
                                                                    Date</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <input class="form-control form-control-solid"
                                                                    name="calendar_event_end_date"
                                                                    placeholder="Pick a end date"
                                                                    id="kt_calendar_datepicker_end_date" />
                                                                <!--end::Input-->
                                                            </div>
                                                        </div>
                                                        <div class="col" data-kt-calendar="datepicker">
                                                            <div class="fv-row mb-9">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold mb-2">Event End
                                                                    Time</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <input class="form-control form-control-solid"
                                                                    name="calendar_event_end_time"
                                                                    placeholder="Pick a end time"
                                                                    id="kt_calendar_datepicker_end_time" />
                                                                <!--end::Input-->
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Modal body-->

                                                <!--begin::Modal footer-->
                                                <div class="modal-footer flex-center">
                                                    <!--begin::Button-->
                                                    <button type="reset" id="kt_modal_add_event_cancel"
                                                        class="btn btn-light me-3">
                                                        Cancel
                                                    </button>
                                                    <!--end::Button-->

                                                    <!--begin::Button-->
                                                    <button type="button" id="kt_modal_add_event_submit"
                                                        class="btn btn-primary">
                                                        <span class="indicator-label">
                                                            Submit
                                                        </span>
                                                        <span class="indicator-progress">
                                                            Please wait... <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                    <!--end::Button-->
                                                </div>
                                                <!--end::Modal footer-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Modal - New Product-->
                                <!--begin::Modal - New Product-->
                                <div class="modal fade" id="kt_modal_view_event" tabindex="-1" data-bs-focus="false"
                                    aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header border-0 justify-content-end">
                                                <!--begin::Edit-->
                                                <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary me-2"
                                                    data-bs-toggle="tooltip" data-bs-dismiss="click" title="Edit Event"
                                                    id="kt_modal_view_event_edit">
                                                    <i class="ki-duotone ki-pencil fs-2"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Edit-->

                                                <!--begin::Edit-->
                                                <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-danger me-2"
                                                    data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                    title="Delete Event" id="kt_modal_view_event_delete">
                                                    <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span
                                                            class="path2"></span><span class="path3"></span><span
                                                            class="path4"></span><span class="path5"></span></i>
                                                </div>
                                                <!--end::Edit-->

                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary"
                                                    data-bs-dismiss="modal" data-bs-toggle="tooltip"
                                                    data-bs-dismiss="click" title="Hide Event" data-bs-dismiss="modal">
                                                    <i class="ki-duotone ki-cross fs-2x"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->

                                            <!--begin::Modal body-->
                                            <div class="modal-body pt-0 pb-20 px-lg-17">
                                                <!--begin::Row-->
                                                <div class="d-flex">
                                                    <!--begin::Icon-->
                                                    <i class="ki-duotone ki-calendar-8 fs-1 text-muted me-5"><span
                                                            class="path1"></span><span class="path2"></span><span
                                                            class="path3"></span><span class="path4"></span><span
                                                            class="path5"></span><span class="path6"></span></i>
                                                    <!--end::Icon-->

                                                    <div class="mb-9">
                                                        <!--begin::Event name-->
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="fs-3 fw-bold me-3"
                                                                data-kt-calendar="event_name"></span> <span
                                                                class="badge badge-light-success"
                                                                data-kt-calendar="all_day"></span>
                                                        </div>
                                                        <!--end::Event name-->

                                                        <!--begin::Event description-->
                                                        <div class="fs-6" data-kt-calendar="event_description"></div>
                                                        <!--end::Event description-->
                                                    </div>
                                                </div>
                                                <!--end::Row-->

                                                <!--begin::Row-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Bullet-->
                                                    <span
                                                        class="bullet bullet-dot h-10px w-10px bg-success ms-2 me-7"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Event start date/time-->
                                                    <div class="fs-6"><span class="fw-bold">Starts</span> <span
                                                            data-kt-calendar="event_start_date"></span></div>
                                                    <!--end::Event start date/time-->
                                                </div>
                                                <!--end::Row-->

                                                <!--begin::Row-->
                                                <div class="d-flex align-items-center mb-9">
                                                    <!--begin::Bullet-->
                                                    <span
                                                        class="bullet bullet-dot h-10px w-10px bg-danger ms-2 me-7"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Event end date/time-->
                                                    <div class="fs-6"><span class="fw-bold">Ends</span> <span
                                                            data-kt-calendar="event_end_date"></span></div>
                                                    <!--end::Event end date/time-->
                                                </div>
                                                <!--end::Row-->

                                                <!--begin::Row-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Icon-->
                                                    <i class="ki-duotone ki-geolocation fs-1 text-muted me-5"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                    <!--end::Icon-->

                                                    <!--begin::Event location-->
                                                    <div class="fs-6" data-kt-calendar="event_location"></div>
                                                    <!--end::Event location-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Modal - New Product-->
                                <!--end::Modals-->
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


    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
    </div>
    <!--end::Scrolltop-->


    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{ asset('') }}";        </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->

    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('js/custom/apps/calendar/calendar.js') }}"></script>
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
