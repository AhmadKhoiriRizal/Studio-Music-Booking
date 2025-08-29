<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: MetronicProduct Version: 8.2.7
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
    <title>Melodi Kreatif Studio</title>
    <meta charset="utf-8">
    <meta name="description"
        content="
            The most advanced Tailwind CSS &amp; Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo,
            Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony &amp; Laravel versions.
            Grab your copy now and get life-time updates for free.
        ">
    <meta name="keywords"
        content="
            tailwind, tailwindcss, metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js,
            Node.js, Flask, Symfony &amp; Laravel starter kits, admin themes, web design, figma, web development, free templates,
            free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button,
            bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon
        ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:title"
        content="Metronic - The World's #1 Selling Tailwind CSS &amp; Bootstrap Admin Template by KeenThemes">
    <meta property="og:url" content="https://keenthemes.com/metronic">
    <meta property="og:site_name" content="Metronic by Keenthemes">
    {{-- <title>{{ $global_option->name }}</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="{{$global_option->description}}" />
    <meta name="keywords"
        content="{{$global_option->keywords}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $global_option->name }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ $global_option->name }}" /> --}}
    <link rel="canonical" href="http://preview.keenthemes.comlanding.html" />
    {{-- <link rel="shortcut icon" href="{{ asset($global_option->favicon) }}" /> --}}
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('plugins/global/plugins_visitor.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style_visitor.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" 
      class="bg-body position-relative app-blank"
      data-kt-scrolltop="on" data-kt-sticky-landing-header="on" data-kt-landing-header="on">

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
    <!--end::Theme mode-->
    <!--end::Theme mode setup on page load-->

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Header Section-->
        <div class="mb-0" id="home">
            <!--begin::Wrapper-->
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                style="background-image: url(/metronic8/demo1/assets/media/svg/illustrations/landing.svg)">
                <!--begin::Header-->
                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}" style="animation-duration: 0.3s; top: 0px;"
                    data-kt-sticky-enabled="true">

                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center justify-content-between">
                            <!--begin::Logo-->
                            <div class="d-flex align-items-center flex-equal">
                                <!--begin::Mobile menu toggle-->
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                                    id="kt_landing_menu_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-2hx"><span class="path1"></span><span
                                            class="path2"></span></i> </button>
                                <!--end::Mobile menu toggle-->

                                <!--begin::Logo image-->
                               <a href="{{ url('/') }}">
                                <img alt="Logo" 
                                src="{{ asset('media/studio/logostudio.png') }}" 
                                class="logo-default" 
                                style="height: 70px;">

                                <img alt="Logo" 
                                src="{{ asset('media/studio/logostudio.png') }}" 
                                class="logo-sticky" 
                                style="height: 50px;">
                                </a>

                                <!--end::Logo image-->
                            </div>
                            <!--end::Logo-->

                            <!--begin::Menu wrapper-->
                            <div class="d-lg-block" id="kt_header_nav_wrapper">
                                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true"
                                    data-kt-drawer-name="landing-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}"
                                    style="">

                                    <!--begin::Menu-->
                                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                                        id="kt_landing_menu">
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#kt_body"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                                Beranda </a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                                Studio </a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#achievements"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                                Galeri </a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#team"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                                Testimoni </a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#portfolio"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                                Kontak Kami </a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#pricing"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                                Riwayat Booking </a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </div>

                            </div>
                            <!--end::Menu wrapper-->

                           <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end gap-2">
             <a href="/metronic8/demo1/authentication/layouts/corporate/sign-in.html"
             class="btn btn-success">Login</a>
            <a href="/metronic8/demo1/authentication/layouts/corporate/sign-up.html"
             class="btn btn-success">Register</a>
        </div>
        <!--end::Toolbar-->

                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->


                <!--begin::Landing hero-->
                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                    <!--begin::Heading-->
                    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                        <!--begin::Title-->
                        <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">
                            Melodi Kreatif Studio <br>
                        

                           <span
        style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);
               -webkit-background-clip: text;
               -webkit-text-fill-color: transparent;
               display: inline-block;
               overflow: hidden;
               white-space: nowrap;
               border-right: 2px solid #FFD80C;
               animation: typing 5s steps(33, end) infinite,
                          blink 0.75s step-end infinite;">
        Berkarya, Bermusik, Berharmoni
      </span>
            <style>
            @keyframes typing {
            0%   { width: 0 }
            40%  { width: 100% }   /* selesai ngetik */
            60%  { width: 100% }   /* tahan sebentar */
            100% { width: 0 }      /* balik ke kosong */
            }

            @keyframes blink {
            from, to { border-color: transparent }
            50% { border-color: #FFD80C }
            }
            </style>
                        </h1>
                        <!--end::Title-->

                        <!--begin::Action-->
                        <a href="/metronic8/demo1/index.html" class="btn btn-primary">Jelajahi</a>
                        <!--end::Action-->
                    </div>
                    <!--end::Heading-->

                    <!--begin::Clients-->
                    <div class="d-flex flex-center flex-wrap position-relative px-5">

                        <!--begin::Client-->
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="Fujifilm"
                            data-bs-original-title="Fujifilm" data-kt-initialized="1">
                            <img src="/metronic8/demo1/assets/media/svg/brand-logos/fujifilm.svg"
                                class="mh-30px mh-lg-40px" alt="">
                        </div>
                        <!--end::Client-->

                        <!--begin::Client-->
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="Vodafone"
                            data-bs-original-title="Vodafone" data-kt-initialized="1">
                            <img src="/metronic8/demo1/assets/media/svg/brand-logos/vodafone.svg"
                                class="mh-30px mh-lg-40px" alt="">
                        </div>
                        <!--end::Client-->

                        <!--begin::Client-->
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip"
                            aria-label="KPMG International" data-bs-original-title="KPMG International"
                            data-kt-initialized="1">
                            <img src="/metronic8/demo1/assets/media/svg/brand-logos/kpmg.svg"
                                class="mh-30px mh-lg-40px" alt="">
                        </div>
                        <!--end::Client-->

                        <!--begin::Client-->
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="Nasa"
                            data-bs-original-title="Nasa" data-kt-initialized="1">
                            <img src="/metronic8/demo1/assets/media/svg/brand-logos/nasa.svg"
                                class="mh-30px mh-lg-40px" alt="">
                        </div>
                        <!--end::Client-->

                        <!--begin::Client-->
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="Aspnetzero"
                            data-bs-original-title="Aspnetzero" data-kt-initialized="1">
                            <img src="/metronic8/demo1/assets/media/svg/brand-logos/aspnetzero.svg"
                                class="mh-30px mh-lg-40px" alt="">
                        </div>
                        <!--end::Client-->

                        <!--begin::Client-->
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip"
                            aria-label="AON - Empower Results" data-bs-original-title="AON - Empower Results"
                            data-kt-initialized="1">
                            <img src="/metronic8/demo1/assets/media/svg/brand-logos/aon.svg"
                                class="mh-30px mh-lg-40px" alt="">
                        </div>
                        <!--end::Client-->

                        <!--begin::Client-->
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip"
                            aria-label="Hewlett-Packard" data-bs-original-title="Hewlett-Packard"
                            data-kt-initialized="1">
                            <img src="/metronic8/demo1/assets/media/svg/brand-logos/hp-3.svg"
                                class="mh-30px mh-lg-40px" alt="">
                        </div>
                        <!--end::Client-->

                        <!--begin::Client-->
                        <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" aria-label="Truman"
                            data-bs-original-title="Truman" data-kt-initialized="1">
                            <img src="/metronic8/demo1/assets/media/svg/brand-logos/truman.svg"
                                class="mh-30px mh-lg-40px" alt="">
                        </div>
                        <!--end::Client-->
                    </div>
                    <!--end::Clients-->
                </div>
                <!--end::Landing hero-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Curve bottom-->
            <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <!--end::Curve bottom-->
        </div>
        <!--end::Header Section-->

        <!--begin::How It Works Section-->
        <div class="mb-n10 mb-lg-n20 z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="text-center mb-17">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-gray-900 mb-5" id="how-it-works"
                        data-kt-scroll-offset="{default: 100, lg: 150}">Tentang Kami</h3>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->

                <!--begin::Row-->
                <div class="row w-100 gy-10 mb-md-20">
                    <!--begin::Col-->
                    <div class="col-md-4 px-5">
                        <!--begin::Story-->
                        <div class="text-center mb-10 mb-md-0">
                            <!--begin::Illustration-->
                            <img src="/metronic8/demo1/assets/media/illustrations/sketchy-1/2.png"
                                class="mh-125px mb-9" alt="">
                            <!--end::Illustration-->

                            <!--begin::Heading-->
                            <div class="d-flex flex-center mb-5">

                                <!--begin::Title-->
                                <div class="fs-5 fs-lg-3 fw-bold text-gray-900">
                                    Alamat </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Description-->
                            <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                                Alamat, Jl. Harmoni Melody, Semarang <br>
                                Jawa tengah, 53333 <br>
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-4 px-5">
                        <!--begin::Story-->
                        <div class="text-center mb-10 mb-md-0">
                            <!--begin::Illustration-->
                            <img src="/metronic8/demo1/assets/media/illustrations/sketchy-1/8.png"
                                class="mh-125px mb-9" alt="">
                            <!--end::Illustration-->

                            <!--begin::Heading-->
                            <div class="d-flex flex-center mb-5">

                                <!--begin::Title-->
                                <div class="fs-5 fs-lg-3 fw-bold text-gray-900">
                                    Jam Kerja </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Description-->
                            <div class="fw-semibold fs-6 fs-lg-4 text-muted">

                                Senin-Jumat: 09.00-22.00 <br>
                                Sabtu-Minggu: Libur <br>
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-4 px-5">
                        <!--begin::Story-->
                        <div class="text-center mb-10 mb-md-0">
                            <!--begin::Illustration-->
                            <img src="/metronic8/demo1/assets/media/illustrations/sketchy-1/12.png"
                                class="mh-125px mb-9" alt="">
                            <!--end::Illustration-->

                            <!--begin::Heading-->
                            <div class="d-flex flex-center mb-5">
                                
                                <!--begin::Title-->
                                <div class="fs-5 fs-lg-3 fw-bold text-gray-900">
                                   Kontak </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Description-->
                            <div class="fw-semibold fs-6 fs-lg-4 text-muted">

                                Phone: 085743645365 <br>
                                email: melodikreatifstudio@gmail.com <br>
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Story-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                </div>
                <!--end::Product slider-->

                <!--Studiooo-->
                <!--begin::Wrapper-->
            <div class="py-20 landing-dark-bg ">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Plans-->
                    <div class="d-flex flex-column container pt-lg-0">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <h1 class="fs-2hx fw-bold text-white mb-5" id="pricing"
                            
                                data-kt-scroll-offset="{default: 100, lg: 100}">Paket Favotit Di Kelasnya</h1>

                            <!--begin::Row-->
                            <div class="row g-10">
                                <!--begin::Col-->
                                <div class="col-xl-4">
                                    <div class="d-flex h-100 align-items-center">
                                        <!--begin::Option-->
                                        <div
                                            class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                                            <!--begin::Heading-->
                                            <div class="mb-7 text-center">
                                                <!--begin::Title-->
                                                <h1 class="text-gray-900 mb-5 fw-boldest">Basic Studio</h1>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="text-gray-500 fw-semibold mb-5">
                                                    Solusi dasar untuk latihan musik.
                                                </div>
                                                <!--end::Description-->

                                                <!--begin::Price-->
                                                <div class="text-center">
                                                    <span class="mb-2 text-primary">Rp</span>

                                                    <span class="fs-3x fw-bold text-primary"
                                                        data-kt-plan-price-month="99" data-kt-plan-price-annual="999">
                                                        75.000 </span>

                                                    <span class="fs-7 fw-semibold opacity-50"
                                                        data-kt-plan-price-month="/ Mon"
                                                        data-kt-plan-price-annual="/ Ann">
                                                        / 1 Jam </span>
                                                </div>
                                                <!--end::Price-->
                                            </div>
                                            <!--end::Heading-->

                                            <!--begin::Features-->
                                            <div class="w-100 mb-10">
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">
                                                        Ruang akustik standar (maks 5 orang) </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-success"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">
                                                        Drum set + 1 gitar amp + 1 bass amp </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-success"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                               <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">
                                                        2 mic vokal + basic mixer </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-success"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">
                                                        Monitor ear/room standar </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-success"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">
                                                        Crew on-site </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-success"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->

                                            </div>
                                            <!--end::Features-->

                                            <!--begin::Select-->
                                            <a href="#" class="btn btn-primary">Booking</a>
                                            <!--end::Select-->
                                        </div>
                                        <!--end::Option-->
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-4">
                                    <div class="d-flex h-100 align-items-center">
                                        <!--begin::Option-->
                                        <div
                                            class="w-100 d-flex flex-column flex-center rounded-3 bg-primary py-20 px-10">
                                            <!--begin::Heading-->
                                            <div class="mb-7 text-center">
                                                <!--begin::Title-->
                                                <h1 class="text-white mb-5 fw-boldest">Advance Studio</h1>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="text-white opacity-75 fw-semibold mb-5">
                                                    Fleksibel dengan kualitas lebih baik
                                                </div>
                                                <!--end::Description-->

                                                <!--begin::Price-->
                                                <div class="text-center">
                                                    <span class="mb-2 text-white">Rp</span>

                                                    <span class="fs-3x fw-bold text-white"
                                                        data-kt-plan-price-month="199"
                                                        data-kt-plan-price-annual="1999">
                                                        120.000 </span>

                                                    <span class="fs-7 fw-semibold text-white opacity-75"
                                                        data-kt-plan-price-month="/ Mon"
                                                        data-kt-plan-price-annual="/ Ann">
                                                        / 1 Jam </span>
                                                </div>
                                                <!--end::Price-->
                                            </div>
                                            <!--end::Heading-->

                                            <!--begin::Features-->
                                            <div class="w-100 mb-10">
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                       Ruang treated (maks 6–8 orang) </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        Drum set + 2 gitar amp + 1 bass amp </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        3–4 mic vokal + mixer 12–16 ch </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        Monitor lebih jernih + DI box </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        Rekam stereo rehearsal (mp3)</span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->

                                            </div>
                                            <!--end::Features-->

                                            <!--begin::Select-->
                                            <a href="#"
                                                class="btn btn-color-primary btn-active-light-primary btn-light">Booking</a>
                                            <!--end::Select-->
                                        </div>
                                        <!--end::Option-->
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-4">
                                    <div class="d-flex h-100 align-items-center">
                                        <!--begin::Option-->
                                        <div
                                            class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
                                            <!--begin::Heading-->
                                            <div class="mb-7 text-center">
                                                <!--begin::Title-->
                                                <h1 class="text-gray-900 mb-5 fw-boldest">Premium Studio</h1>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="text-gray-500 fw-semibold mb-5">
                                                    Perlengkapan premium untuk performa maksimal
                                                </div>
                                                <!--end::Description-->

                                                <!--begin::Price-->
                                                <div class="text-center">
                                                    <span class="mb-2 text-primary">Rp</span>

                                                    <span class="fs-3x fw-bold text-primary"
                                                        data-kt-plan-price-month="999"
                                                        data-kt-plan-price-annual="9999">
                                                        180.000 </span>

                                                    <span class="fs-7 fw-semibold opacity-50"
                                                        data-kt-plan-price-month="/ Mon"
                                                        data-kt-plan-price-annual="/ Ann">
                                                        / 1 Jam </span>
                                                </div>
                                                <!--end::Price-->
                                            </div>
                                            <!--end::Heading-->

                                            <!--begin::Features-->
                                            <div class="w-100 mb-10">
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">
                                                        Ruang premium (maks 8–10 orang) </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-success"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">
                                                        Drum high-end + 2 gitar amp tabung + bass amp premium </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-success"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">
                                                        4–6 mic + condenser utk vokal </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-success"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">
                                                        Monitoring reference + in-ear (terbatas)</span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-success"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack ">
                                                    <span class="fw-semibold fs-6 text-gray-800 text-start pe-3">
                                                        Multitrack rehearsal recording (stems) </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-success"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->

                                            </div>
                                            <!--end::Features-->

                                            <!--begin::Select-->
                                            <a href="#" class="btn btn-primary">Booking</a>
                                            <!--end::Select-->
                                        </div>
                                        <!--end::Option-->
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Pricing-->
                    </div>
                    <!--end::Plans-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->

        <!--begin:: Daftar Paket Section-->
        <div class="mb-lg-n15 position-relative z-index-2">
            <!--begin::Container-->
            {{-- <div class="container"> --}}
                <!--begin::Card-->
                <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                    <!--begin::Card body-->
                    <div class="card-body p-lg-20">
                        <!--begin::Heading-->
                        <div class="text-center mb-5 mb-lg-10">
                            <!--begin::Title-->
                            <h3 class="fs-2hx text-gray-900 mb-5" id="portfolio"
                                data-kt-scroll-offset="{default: 100, lg: 250}">Daftar Paket</h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Tabs wrapper-->
                        <div class="d-flex flex-center mb-5 mb-lg-15">
                            <!--begin::Tabs-->
                            <ul class="nav border-transparent flex-center fs-5 fw-bold" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active"
                                        href="#" data-bs-toggle="tab"
                                        data-bs-target="#kt_landing_projects_latest" aria-selected="true"
                                        role="tab">Semua</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
                                        data-bs-toggle="tab" data-bs-target="#kt_landing_projects_web_design"
                                        aria-selected="false" tabindex="-1" role="tab">Low</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
                                        data-bs-toggle="tab" data-bs-target="#kt_landing_projects_mobile_apps"
                                        aria-selected="false" tabindex="-1" role="tab">Middle</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
                                        data-bs-toggle="tab" data-bs-target="#kt_landing_projects_development"
                                        aria-selected="false" tabindex="-1" role="tab">Max</a>
                                </li>
                            </ul>
                            <!--end::Tabs-->
                        </div>
                        <!--end::Tabs wrapper-->

                         <!--begin::Row-->
                            <div class="row g-10">
                                
                                <!--begin::Col-->
                                <div class="col-xl-4">
                                    <div class="d-flex h-100 align-items-center">
                                        <!--begin::Option-->
                                        <div
                                            class="w-100 d-flex flex-column flex-center rounded-3 bg-primary py-20 px-10">
                                            <!--begin::Heading-->
                                            <!-- Foto dengan ukuran tetap -->
                                <div class="d-flex justify-content-center mb-3" style="margin-top: -20px;">
                              <img src="{{ asset('media/studio/studiom1.jpg') }}" 
                              class="img-fluid" 
                            alt="Paket 1"
                            style="width: 300px; height: 300px; object-fit: cover; border-radius:10px;">
                            </div>


                                            
                    <div class="d-flex justify-content-between align-items-center text-white mb-5">
                     <!-- Left: Nama Paket & Deskripsi -->
                    <div>
                        <h2 class="fw-bold text-white" style="font-size: 20px; margin-bottom: 8px;">Paket 1</h2>
                        <div class="opacity-75" style="font-size: 10px;">
                        Basic Studio
                         </div>
                    </div>

                  <!-- Right: Harga -->
                 <div class="text-end">
                 <span style="font-size: 16px;">Rp</span>
                 <span class="fw-bold" style="font-size: 15px; margin-left: 4px;">120.000</span>
                <div style="font-size: 14px; opacity: 0.7;">/ 1 Jam</div>
                </div>
            </div>


                                            <!--begin::Features-->
                                            <div class="w-100 mb-10">
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                       Ruang treated (maks 6–8 orang) </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        Drum set + 2 gitar amp + 1 bass amp </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        3–4 mic vokal + mixer 12–16 ch </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        Monitor lebih jernih + DI box </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        Rekam stereo rehearsal (mp3)</span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->

                                            </div>
                                            <!--end::Features-->

                                            <!--begin::Select-->
                                            <a href="#"
                                                class="btn btn-color-primary btn-active-light-primary btn-light">Booking</a>
                                            <!--end::Select-->
                                        </div>
                                        <!--end::Option-->
                                    </div>
                                </div>
                                <!--end::Col-->
                                
                                <!--begin::Col-->
                                <div class="col-xl-4">
                                    <div class="d-flex h-100 align-items-center">
                                        <!--begin::Option-->
                                        <div
                                            class="w-100 d-flex flex-column flex-center rounded-3 bg-primary py-20 px-10">
                                            <!--begin::Heading-->

                                            <!-- Foto dengan ukuran tetap -->
                                <div class="d-flex justify-content-center mb-3" style="margin-top: -20px;">
                              <img src="{{ asset('media/studio/studiom1.jpg') }}" 
                              class="img-fluid" 
                            alt="Paket 1"
                            style="width: 300px; height: 300px; object-fit: cover; border-radius:10px;">
                            </div>


                                            
                    <div class="d-flex justify-content-between align-items-center text-white mb-5">
                     <!-- Left: Nama Paket & Deskripsi -->
                    <div>
                        <h2 class="fw-bold text-white" style="font-size: 20px; margin-bottom: 8px;">Paket 1</h2>
                        <div class="opacity-75" style="font-size: 10px;">
                        Basic Studio
                         </div>
                    </div>

                  <!-- Right: Harga -->
                 <div class="text-end">
                 <span style="font-size: 16px;">Rp</span>
                 <span class="fw-bold" style="font-size: 15px; margin-left: 4px;">120.000</span>
                <div style="font-size: 14px; opacity: 0.7;">/ 1 Jam</div>
                </div>
            </div>
                                            

                                            <!--begin::Features-->
                                            <div class="w-100 mb-10">
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                       Ruang treated (maks 6–8 orang) </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        Drum set + 2 gitar amp + 1 bass amp </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        3–4 mic vokal + mixer 12–16 ch </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        Monitor lebih jernih + DI box </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        Rekam stereo rehearsal (mp3)</span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->

                                            </div>
                                            <!--end::Features-->

                                            <!--begin::Select-->
                                            <a href="#"
                                                class="btn btn-color-primary btn-active-light-primary btn-light">Booking</a>
                                            <!--end::Select-->
                                        </div>
                                        <!--end::Option-->
                                    </div>
                                </div>
                                <!--end::Col-->
                                
                                <!--begin::Col-->
                                <div class="col-xl-4">
                                    <div class="d-flex h-100 align-items-center">
                                        <!--begin::Option-->
                                        <div
                                            class="w-100 d-flex flex-column flex-center rounded-3 bg-primary py-20 px-10">
                                            <!--begin::Heading-->
                                            <!-- Foto dengan ukuran tetap -->
                                <div class="d-flex justify-content-center mb-3" style="margin-top: -20px;">
                              <img src="{{ asset('media/studio/studiom1.jpg') }}" 
                              class="img-fluid" 
                            alt="Paket 1"
                            style="width: 300px; height: 300px; object-fit: cover; border-radius:10px;">
                            </div>


                                            
                    <div class="d-flex justify-content-between align-items-center text-white mb-5">
                     <!-- Left: Nama Paket & Deskripsi -->
                    <div>
                        <h2 class="fw-bold text-white" style="font-size: 20px; margin-bottom: 8px;">Paket 1</h2>
                        <div class="opacity-75" style="font-size: 10px;">
                        Basic Studio
                         </div>
                    </div>

                  <!-- Right: Harga -->
                 <div class="text-end">
                 <span style="font-size: 16px;">Rp</span>
                 <span class="fw-bold" style="font-size: 15px; margin-left: 4px;">120.000</span>
                <div style="font-size: 14px; opacity: 0.7;">/ 1 Jam</div>
                </div>
            </div>

                                            <!--begin::Features-->
                                            <div class="w-100 mb-10">
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                       Ruang treated (maks 6–8 orang) </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        Drum set + 2 gitar amp + 1 bass amp </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        3–4 mic vokal + mixer 12–16 ch </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        Monitor lebih jernih + DI box </span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-5">
                                                    <span
                                                        class="fw-semibold fs-6 text-white opacity-75 text-start pe-3">
                                                        Rekam stereo rehearsal (mp3)</span>
                                                    <i class="ki-duotone ki-check-circle fs-1 text-white"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Item-->

                                            </div>
                                            <!--end::Features-->

                                            <!--begin::Select-->
                                            <a href="#"
                                                class="btn btn-color-primary btn-active-light-primary btn-light">Booking</a>
                                            <!--end::Select-->
                                        </div>
                                        <!--end::Option-->
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Pricing-->
                    </div>
                    <!--end::Plans-->
                {{-- </div> --}}
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->


        <!--begin::Galeri Section-->
        <div class="mb-lg-n15 position-relative z-index-2">
            <!--begin::Container-->
            {{-- <div class="container"> --}}
                <!--begin::Card-->
                <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                    <!--begin::Card body-->
                    <div class="card-body p-lg-20">
                        <!--begin::Heading-->
                        <div class="text-center mb-5 mb-lg-10">
                            <!--begin::Title-->
                            <h3 class="fs-2hx text-gray-900 mb-5" id="portfolio"
                                data-kt-scroll-offset="{default: 100, lg: 250}">Galeri</h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Tabs wrapper-->
                        <div class="d-flex flex-center mb-5 mb-lg-15">
                            <!--begin::Tabs-->
                            <ul class="nav border-transparent flex-center fs-5 fw-bold" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active"
                                        href="#" data-bs-toggle="tab"
                                        data-bs-target="#kt_landing_projects_latest" aria-selected="true"
                                        role="tab">Semua</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
                                        data-bs-toggle="tab" data-bs-target="#kt_landing_projects_web_design"
                                        aria-selected="false" tabindex="-1" role="tab">Low</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
                                        data-bs-toggle="tab" data-bs-target="#kt_landing_projects_mobile_apps"
                                        aria-selected="false" tabindex="-1" role="tab">Middle</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
                                        data-bs-toggle="tab" data-bs-target="#kt_landing_projects_development"
                                        aria-selected="false" tabindex="-1" role="tab">Max</a>
                                </li>
                            </ul>
                            <!--end::Tabs-->
                        </div>
                        <!--end::Tabs wrapper-->

                        <!--begin::Tabs content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_landing_projects_latest" role="tabpanel">
                                <!--begin::Row-->
                                <div class="row g-10">
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay h-lg-100"
                                            data-fslightbox="lightbox-projects"
                                            href ="{{ asset('media/studio/studiom1.jpg') }}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                                style="background-image:url('{{ asset('media/studio/studiom1.jpg') }}')">
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Row-->
                                        <div class="row g-10 mb-10">
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay"
                                                    data-fslightbox="lightbox-projects"
                                                    href ="{{ asset('media/studio/studiom2.jpg') }}">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                        style="background-image:url('{{ asset('media/studio/studiom2.jpg') }}')">
                                                    </div>
                                                    <!--end::Image-->

                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay"
                                                    data-fslightbox="lightbox-projects"
                                                    href ="{{ asset('media/studio/studiom3.jpg') }}">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                        style="background-image:url('{{ asset('media/studio/studiom3.jpg') }}')">
                                                    </div>
                                                    <!--end::Image-->

                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                            href ="{{ asset('media/studio/studiom4.jpg') }}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                style="background-image:url('{{ asset('media/studio/studiom4.jpg') }}')">
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Tab pane-->

                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_landing_projects_web_design" role="tabpanel">
                                <!--begin::Row-->
                                <div class="row g-10">
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay h-lg-100"
                                            data-fslightbox="lightbox-projects"
                                            href="/metronic8/demo1/assets/media/stock/600x600/img-11.jpg">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                                style="background-image:url('/metronic8/demo1/assets/media/stock/600x600/img-11.jpg')">
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Row-->
                                        <div class="row g-10 mb-10">
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay"
                                                    data-fslightbox="lightbox-projects"
                                                    href="/metronic8/demo1/assets/media/stock/600x600/img-12.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                        style="background-image:url('/metronic8/demo1/assets/media/stock/600x600/img-12.jpg')">
                                                    </div>
                                                    <!--end::Image-->

                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay"
                                                    data-fslightbox="lightbox-projects"
                                                    href="/metronic8/demo1/assets/media/stock/600x600/img-21.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                        style="background-image:url('/metronic8/demo1/assets/media/stock/600x600/img-21.jpg')">
                                                    </div>
                                                    <!--end::Image-->

                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                            href="/metronic8/demo1/assets/media/stock/600x400/img-20.jpg">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                style="background-image:url('/metronic8/demo1/assets/media/stock/600x600/img-20.jpg')">
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Tab pane-->

                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_landing_projects_mobile_apps" role="tabpanel">
                                <!--begin::Row-->
                                <div class="row g-10">
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Row-->
                                        <div class="row g-10 mb-10">
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay"
                                                    data-fslightbox="lightbox-projects"
                                                    href="/metronic8/demo1/assets/media/stock/600x600/img-16.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                        style="background-image:url('/metronic8/demo1/assets/media/stock/600x600/img-16.jpg')">
                                                    </div>
                                                    <!--end::Image-->

                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay"
                                                    data-fslightbox="lightbox-projects"
                                                    href="/metronic8/demo1/assets/media/stock/600x600/img-12.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                        style="background-image:url('/metronic8/demo1/assets/media/stock/600x600/img-12.jpg')">
                                                    </div>
                                                    <!--end::Image-->

                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                            href="/metronic8/demo1/assets/media/stock/600x400/img-15.jpg">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                style="background-image:url('/metronic8/demo1/assets/media/stock/600x600/img-15.jpg')">
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay h-lg-100"
                                            data-fslightbox="lightbox-projects"
                                            href="/metronic8/demo1/assets/media/stock/600x600/img-23.jpg">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                                style="background-image:url('/metronic8/demo1/assets/media/stock/600x600/img-23.jpg')">
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Tab pane-->

                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_landing_projects_development" role="tabpanel">
                                <!--begin::Row-->
                                <div class="row g-10">
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay h-lg-100"
                                            data-fslightbox="lightbox-projects"
                                            href="/metronic8/demo1/assets/media/stock/600x600/img-15.jpg">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px"
                                                style="background-image:url('/metronic8/demo1/assets/media/stock/600x600/img-15.jpg')">
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Row-->
                                        <div class="row g-10 mb-10">
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay"
                                                    data-fslightbox="lightbox-projects"
                                                    href="/metronic8/demo1/assets/media/stock/600x600/img-22.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                        style="background-image:url('/metronic8/demo1/assets/media/stock/600x600/img-22.jpg')">
                                                    </div>
                                                    <!--end::Image-->

                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay"
                                                    data-fslightbox="lightbox-projects"
                                                    href="/metronic8/demo1/assets/media/stock/600x600/img-21.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                        style="background-image:url('/metronic8/demo1/assets/media/stock/600x600/img-21.jpg')">
                                                    </div>
                                                    <!--end::Image-->

                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span class="path3"></span></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects"
                                            href="/metronic8/demo1/assets/media/stock/600x400/img-14.jpg">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px"
                                                style="background-image:url('/metronic8/demo1/assets/media/stock/600x600/img-14.jpg')">
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-duotone ki-eye fs-3x text-white"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tabs content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            {{-- </div> --}}
            <!--end::Container-->
        </div>
        <!--end::Galeri Section-->

        <!--begin::Testimonials Section-->
        <div class="mt-20 mb-n20 position-relative z-index-2">
            <!--begin::Container-->
            {{-- <div class="container"> --}}
                <!--begin::Heading-->
                <div class="text-center mb-17">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-gray-900 mb-5" id="clients"
                        data-kt-scroll-offset="{default: 125, lg: 150}">Testimoni</h3>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->

                <!--begin::Row-->
                <div class="row justify-content-center g-lg-10 mb-10 mb-lg-20 px-5">
                    <!--begin::Col-->
                    <div class="col-lg-4">
                        <!--begin::Testimonial-->
                        <div
                            class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                            <!--begin::Wrapper-->
                            <div class="fs-2 fw-bold text-gray-900 mb-3">
                                    Andi Pratama <br>
                                    Premium Studio
                                </div>

                            <div class="mb-7">
                                <!--begin::Rating-->
                                <div class="rating mb-6">
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                </div>
                                <!--end::Rating-->

                                <!--begin::Feedback-->
                                <div class="text-gray-500 fw-semibold fs-4">

                                    Pengalaman latihan di studio ini bener-bener luar biasa. 
                                    Alat-alat musiknya lengkap, kualitas sound system sangat baik,
                                    dan ruangan juga kedap suara sehingga latihan jadi lebih fokus tanpa gangguan.
                                </div>
                                <!--end::Feedback-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Author-->
                            <div class="d-flex align-items-center">
                                <!--end::Name-->
                            </div>
                            <!--end::Author-->
                        </div>
                        <!--end::Testimonial-->

                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-lg-4">
                        <!--begin::Testimonial-->
                        <div
                            class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                            <!--begin::Wrapper-->
                             <div class="fs-2 fw-bold text-gray-900 mb-3">
                                    Rizki Hidayat <br>
                                    Basic Studio
                                </div>

                            <div class="mb-7">
                                <!--begin::Rating-->
                                <div class="rating mb-6">
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                </div>
                                <!--end::Rating-->

                                <!--begin::Feedback-->
                                <div class="text-gray-500 fw-semibold fs-4">

                                    Kemarin saya booking studio untuk latihan band secara mendadak.
                                     Untungnya sistem booking di sini cepat banget dan tanpa ribet. 
                                     Pas sampai, semua sudah siap: ruangan rapi, alat musik lengkap, dan sound sudah diatur dengan baik.
                                </div>
                                <!--end::Feedback-->
                            </div>
                            <!--end::Author-->
                        </div>
                        <!--end::Testimonial-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-lg-4">
                        <!--begin::Testimonial-->
                        <div
                            class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                            <!--begin::Wrapper-->
                            <div class="fs-2 fw-bold text-gray-900 mb-3">
                                    Budi Santoso <br>
                                    Advance Studio
                                </div>

                            <div class="mb-7">
                                <!--begin::Rating-->
                                <div class="rating mb-6">
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                    <div class="rating-label me-2 checked">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </div>
                                </div>
                                <!--end::Rating-->
                        
                                <!--begin::Feedback-->
                                <div class="text-gray-500 fw-semibold fs-4">

                                   Sebagai orang yang sering latihan untuk persiapan event, saya bisa bilang kalau studio ini salah satu yang terbaik. 
                                   Sound system benar-benar jernih, ruangan kedap suara, dan tata ruangnya sangat mendukung.
                                </div>
                                <!--end::Feedback-->
                            </div>
                            <!--end::Wrapper-->
                            </div>
                            <!--end::Author-->
                        </div>
                        <!--end::Testimonial-->

    <!-- Footer Section -->
    <footer class="bg-info py-4 w-100">
  <div class="container-fluid d-flex flex-column flex-md-row justify-content-between align-items-center">
    
    <!-- Logo dan Nama -->
    <div class="d-flex align-items-center mb-3 mb-md-0">
      <div class="me-3">
        <img src="{{ asset('media/studio/logostudio.png') }}" 
             alt="logo" 
             {{-- class="rounded-circle"  --}}
             style="height:40px; width:auto;">
      </div>
      <span class="fw-bold text-white fs-5">Melodi Kreatif Studio</span>
    </div>

    <!-- Hak Cipta -->
    <div class="text-white mb-3 mb-md-0 fs-6 text-center">
      © 2025 All Rights Reserved.
    </div>

    <!-- Social Media -->
    <div class="d-flex flex-wrap justify-content-center">
      <a href="#" class="me-3 text-white d-flex align-items-center">
        <i class="bi bi-facebook fs-3 me-1"></i> Facebook
      </a>
      <a href="#" class="me-3 text-white d-flex align-items-center">
        <i class="bi bi-instagram fs-3 me-1"></i> Instagram
      </a>
      <a href="#" class="me-3 text-white d-flex align-items-center">
        <i class="bi bi-tiktok fs-3 me-1"></i> Tiktok
      </a>
      <a href="#" class="text-white d-flex align-items-center">
        <i class="bi bi-whatsapp fs-3 me-1"></i> WhatsApp
      </a>
    </div>
  </div>
</footer>


                <!--begin::Javascript-->
                <script>
                    var hostUrl = "/metronic8/demo1/assets/";
                </script>

                <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
                <script src="{{ asset('js/scripts.bundle.js') }}"></script>
                <!--end::Global Javascript Bundle-->

                <!--begin::Vendors Javascript(used for this page only)-->
                <script src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
                <script src="{{ asset('plugins/custom/typedjs/typedjs.bundle.js') }}"></script>
                <!--end::Vendors Javascript-->

                <!--begin::Custom Javascript(used for this page only)-->
                <script src="{{ asset('js/custom/landing.js') }}"></script>
                <script src="{{ asset('js/custom/pages/pricing/general.js') }}"></script>
                <!--end::Custom Javascript-->
                <!--end::Javascript-->


                <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg"
                    version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                    style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
                    <defs id="SvgjsDefs1002"></defs>
                    <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
                    <path id="SvgjsPath1004" d="M0 0 "></path>
                </svg>
                <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                <script src="{{ asset('plugins/global/plugins_visitor.bundle.js') }}"></script>
                <script src="{{ asset('js/scripts.bundle.js') }}"></script>
                <!--end::Global Javascript Bundle-->
                <!--begin::Vendors Javascript(used for this page only)-->
                <!--end::Vendors Javascript-->
                <!--begin::Custom Javascript(used for this page only)-->
                <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
                <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
                <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
                <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
                <script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>
                <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
                <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
                <!--end::Custom Javascript-->
                <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
