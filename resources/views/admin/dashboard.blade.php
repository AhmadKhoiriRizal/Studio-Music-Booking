<html lang="en" data-bs-theme="light"><!--begin::Head-->

<head>
    <title>Dashboard Admin | Studio Musik</title>
    <meta charset="utf-8">
    <meta name="description" content="
            The most advanced Tailwind CSS &amp; Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo,
            Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony &amp; Laravel versions.
            Grab your copy now and get life-time updates for free.
        ">
    <meta name="keywords" content="
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
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8/demo1/index.html">
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}">

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"> <!--end::Fonts-->

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css">
    <!--end::Vendor Stylesheets-->


    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css">
    <!--end::Global Stylesheets Bundle-->

    <!-- Google tag (gtag.js) -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-52YZ3XGZJ6"></script>
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
    <style id="apexcharts-css">
        @keyframes opaque {
            0% {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        @keyframes resizeanim {

            0%,
            to {
                opacity: 0
            }
        }

        .apexcharts-canvas {
            position: relative;
            direction: ltr !important;
            user-select: none
        }

        .apexcharts-canvas ::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 6px
        }

        .apexcharts-canvas ::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: rgba(0, 0, 0, .5);
            box-shadow: 0 0 1px rgba(255, 255, 255, .5);
            -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5)
        }

        .apexcharts-inner {
            position: relative
        }

        .apexcharts-text tspan {
            font-family: inherit
        }

        rect.legend-mouseover-inactive,
        .legend-mouseover-inactive rect,
        .legend-mouseover-inactive path,
        .legend-mouseover-inactive circle,
        .legend-mouseover-inactive line,
        .legend-mouseover-inactive text.apexcharts-yaxis-title-text,
        .legend-mouseover-inactive text.apexcharts-yaxis-label {
            transition: .15s ease all;
            opacity: .2
        }

        .apexcharts-legend-text {
            padding-left: 15px;
            margin-left: -15px;
        }

        .apexcharts-series-collapsed {
            opacity: 0
        }

        .apexcharts-tooltip {
            border-radius: 5px;
            box-shadow: 2px 2px 6px -4px #999;
            cursor: default;
            font-size: 14px;
            left: 62px;
            opacity: 0;
            pointer-events: none;
            position: absolute;
            top: 20px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            white-space: nowrap;
            z-index: 12;
            transition: .15s ease all
        }

        .apexcharts-tooltip.apexcharts-active {
            opacity: 1;
            transition: .15s ease all
        }

        .apexcharts-tooltip.apexcharts-theme-light {
            border: 1px solid #e3e3e3;
            background: rgba(255, 255, 255, .96)
        }

        .apexcharts-tooltip.apexcharts-theme-dark {
            color: #fff;
            background: rgba(30, 30, 30, .8)
        }

        .apexcharts-tooltip * {
            font-family: inherit
        }

        .apexcharts-tooltip-title {
            padding: 6px;
            font-size: 15px;
            margin-bottom: 4px
        }

        .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
            background: #eceff1;
            border-bottom: 1px solid #ddd
        }

        .apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
            background: rgba(0, 0, 0, .7);
            border-bottom: 1px solid #333
        }

        .apexcharts-tooltip-text-goals-value,
        .apexcharts-tooltip-text-y-value,
        .apexcharts-tooltip-text-z-value {
            display: inline-block;
            margin-left: 5px;
            font-weight: 600
        }

        .apexcharts-tooltip-text-goals-label:empty,
        .apexcharts-tooltip-text-goals-value:empty,
        .apexcharts-tooltip-text-y-label:empty,
        .apexcharts-tooltip-text-y-value:empty,
        .apexcharts-tooltip-text-z-value:empty,
        .apexcharts-tooltip-title:empty {
            display: none
        }

        .apexcharts-tooltip-text-goals-label,
        .apexcharts-tooltip-text-goals-value {
            padding: 6px 0 5px
        }

        .apexcharts-tooltip-goals-group,
        .apexcharts-tooltip-text-goals-label,
        .apexcharts-tooltip-text-goals-value {
            display: flex
        }

        .apexcharts-tooltip-text-goals-label:not(:empty),
        .apexcharts-tooltip-text-goals-value:not(:empty) {
            margin-top: -6px
        }

        .apexcharts-tooltip-marker {
            width: 12px;
            height: 12px;
            position: relative;
            top: 0;
            margin-right: 10px;
            border-radius: 50%
        }

        .apexcharts-tooltip-series-group {
            padding: 0 10px;
            display: none;
            text-align: left;
            justify-content: left;
            align-items: center
        }

        .apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
            opacity: 1
        }

        .apexcharts-tooltip-series-group.apexcharts-active,
        .apexcharts-tooltip-series-group:last-child {
            padding-bottom: 4px
        }

        .apexcharts-tooltip-y-group {
            padding: 6px 0 5px
        }

        .apexcharts-custom-tooltip,
        .apexcharts-tooltip-box {
            padding: 4px 8px
        }

        .apexcharts-tooltip-boxPlot {
            display: flex;
            flex-direction: column-reverse
        }

        .apexcharts-tooltip-box>div {
            margin: 4px 0
        }

        .apexcharts-tooltip-box span.value {
            font-weight: 700
        }

        .apexcharts-tooltip-rangebar {
            padding: 5px 8px
        }

        .apexcharts-tooltip-rangebar .category {
            font-weight: 600;
            color: #777
        }

        .apexcharts-tooltip-rangebar .series-name {
            font-weight: 700;
            display: block;
            margin-bottom: 5px
        }

        .apexcharts-xaxistooltip,
        .apexcharts-yaxistooltip {
            opacity: 0;
            pointer-events: none;
            color: #373d3f;
            font-size: 13px;
            text-align: center;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
            background: #eceff1;
            border: 1px solid #90a4ae
        }

        .apexcharts-xaxistooltip {
            padding: 9px 10px;
            transition: .15s ease all
        }

        .apexcharts-xaxistooltip.apexcharts-theme-dark {
            background: rgba(0, 0, 0, .7);
            border: 1px solid rgba(0, 0, 0, .5);
            color: #fff
        }

        .apexcharts-xaxistooltip:after,
        .apexcharts-xaxistooltip:before {
            left: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none
        }

        .apexcharts-xaxistooltip:after {
            border-color: transparent;
            border-width: 6px;
            margin-left: -6px
        }

        .apexcharts-xaxistooltip:before {
            border-color: transparent;
            border-width: 7px;
            margin-left: -7px
        }

        .apexcharts-xaxistooltip-bottom:after,
        .apexcharts-xaxistooltip-bottom:before {
            bottom: 100%
        }

        .apexcharts-xaxistooltip-top:after,
        .apexcharts-xaxistooltip-top:before {
            top: 100%
        }

        .apexcharts-xaxistooltip-bottom:after {
            border-bottom-color: #eceff1
        }

        .apexcharts-xaxistooltip-bottom:before {
            border-bottom-color: #90a4ae
        }

        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after,
        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
            border-bottom-color: rgba(0, 0, 0, .5)
        }

        .apexcharts-xaxistooltip-top:after {
            border-top-color: #eceff1
        }

        .apexcharts-xaxistooltip-top:before {
            border-top-color: #90a4ae
        }

        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:after,
        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
            border-top-color: rgba(0, 0, 0, .5)
        }

        .apexcharts-xaxistooltip.apexcharts-active {
            opacity: 1;
            transition: .15s ease all
        }

        .apexcharts-yaxistooltip {
            padding: 4px 10px
        }

        .apexcharts-yaxistooltip.apexcharts-theme-dark {
            background: rgba(0, 0, 0, .7);
            border: 1px solid rgba(0, 0, 0, .5);
            color: #fff
        }

        .apexcharts-yaxistooltip:after,
        .apexcharts-yaxistooltip:before {
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none
        }

        .apexcharts-yaxistooltip:after {
            border-color: transparent;
            border-width: 6px;
            margin-top: -6px
        }

        .apexcharts-yaxistooltip:before {
            border-color: transparent;
            border-width: 7px;
            margin-top: -7px
        }

        .apexcharts-yaxistooltip-left:after,
        .apexcharts-yaxistooltip-left:before {
            left: 100%
        }

        .apexcharts-yaxistooltip-right:after,
        .apexcharts-yaxistooltip-right:before {
            right: 100%
        }

        .apexcharts-yaxistooltip-left:after {
            border-left-color: #eceff1
        }

        .apexcharts-yaxistooltip-left:before {
            border-left-color: #90a4ae
        }

        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:after,
        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
            border-left-color: rgba(0, 0, 0, .5)
        }

        .apexcharts-yaxistooltip-right:after {
            border-right-color: #eceff1
        }

        .apexcharts-yaxistooltip-right:before {
            border-right-color: #90a4ae
        }

        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:after,
        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
            border-right-color: rgba(0, 0, 0, .5)
        }

        .apexcharts-yaxistooltip.apexcharts-active {
            opacity: 1
        }

        .apexcharts-yaxistooltip-hidden {
            display: none
        }

        .apexcharts-xcrosshairs,
        .apexcharts-ycrosshairs {
            pointer-events: none;
            opacity: 0;
            transition: .15s ease all
        }

        .apexcharts-xcrosshairs.apexcharts-active,
        .apexcharts-ycrosshairs.apexcharts-active {
            opacity: 1;
            transition: .15s ease all
        }

        .apexcharts-ycrosshairs-hidden {
            opacity: 0
        }

        .apexcharts-selection-rect {
            cursor: move
        }

        .svg_select_boundingRect,
        .svg_select_points_rot {
            pointer-events: none;
            opacity: 0;
            visibility: hidden
        }

        .apexcharts-selection-rect+g .svg_select_boundingRect,
        .apexcharts-selection-rect+g .svg_select_points_rot {
            opacity: 0;
            visibility: hidden
        }

        .apexcharts-selection-rect+g .svg_select_points_l,
        .apexcharts-selection-rect+g .svg_select_points_r {
            cursor: ew-resize;
            opacity: 1;
            visibility: visible
        }

        .svg_select_points {
            fill: #efefef;
            stroke: #333;
            rx: 2
        }

        .apexcharts-svg.apexcharts-zoomable.hovering-zoom {
            cursor: crosshair
        }

        .apexcharts-svg.apexcharts-zoomable.hovering-pan {
            cursor: move
        }

        .apexcharts-menu-icon,
        .apexcharts-pan-icon,
        .apexcharts-reset-icon,
        .apexcharts-selection-icon,
        .apexcharts-toolbar-custom-icon,
        .apexcharts-zoom-icon,
        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon {
            cursor: pointer;
            width: 20px;
            height: 20px;
            line-height: 24px;
            color: #6e8192;
            text-align: center
        }

        .apexcharts-menu-icon svg,
        .apexcharts-reset-icon svg,
        .apexcharts-zoom-icon svg,
        .apexcharts-zoomin-icon svg,
        .apexcharts-zoomout-icon svg {
            fill: #6e8192
        }

        .apexcharts-selection-icon svg {
            fill: #444;
            transform: scale(.76)
        }

        .apexcharts-theme-dark .apexcharts-menu-icon svg,
        .apexcharts-theme-dark .apexcharts-pan-icon svg,
        .apexcharts-theme-dark .apexcharts-reset-icon svg,
        .apexcharts-theme-dark .apexcharts-selection-icon svg,
        .apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg,
        .apexcharts-theme-dark .apexcharts-zoom-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomin-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomout-icon svg {
            fill: #f3f4f5
        }

        .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg {
            fill: #008ffb
        }

        .apexcharts-theme-light .apexcharts-menu-icon:hover svg,
        .apexcharts-theme-light .apexcharts-reset-icon:hover svg,
        .apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,
        .apexcharts-theme-light .apexcharts-zoomout-icon:hover svg {
            fill: #333
        }

        .apexcharts-menu-icon,
        .apexcharts-selection-icon {
            position: relative
        }

        .apexcharts-reset-icon {
            margin-left: 5px
        }

        .apexcharts-menu-icon,
        .apexcharts-reset-icon,
        .apexcharts-zoom-icon {
            transform: scale(.85)
        }

        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon {
            transform: scale(.7)
        }

        .apexcharts-zoomout-icon {
            margin-right: 3px
        }

        .apexcharts-pan-icon {
            transform: scale(.62);
            position: relative;
            left: 1px;
            top: 0
        }

        .apexcharts-pan-icon svg {
            fill: #fff;
            stroke: #6e8192;
            stroke-width: 2
        }

        .apexcharts-pan-icon.apexcharts-selected svg {
            stroke: #008ffb
        }

        .apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
            stroke: #333
        }

        .apexcharts-toolbar {
            position: absolute;
            z-index: 11;
            max-width: 176px;
            text-align: right;
            border-radius: 3px;
            padding: 0 6px 2px;
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .apexcharts-menu {
            background: #fff;
            position: absolute;
            top: 100%;
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 3px;
            right: 10px;
            opacity: 0;
            min-width: 110px;
            transition: .15s ease all;
            pointer-events: none
        }

        .apexcharts-menu.apexcharts-menu-open {
            opacity: 1;
            pointer-events: all;
            transition: .15s ease all
        }

        .apexcharts-menu-item {
            padding: 6px 7px;
            font-size: 12px;
            cursor: pointer
        }

        .apexcharts-theme-light .apexcharts-menu-item:hover {
            background: #eee
        }

        .apexcharts-theme-dark .apexcharts-menu {
            background: rgba(0, 0, 0, .7);
            color: #fff
        }

        @media screen and (min-width:768px) {
            .apexcharts-canvas:hover .apexcharts-toolbar {
                opacity: 1
            }
        }

        .apexcharts-canvas .apexcharts-element-hidden,
        .apexcharts-datalabel.apexcharts-element-hidden,
        .apexcharts-hide .apexcharts-series-points {
            opacity: 0;
        }

        .apexcharts-hidden-element-shown {
            opacity: 1;
            transition: 0.25s ease all;
        }

        .apexcharts-datalabel,
        .apexcharts-datalabel-label,
        .apexcharts-datalabel-value,
        .apexcharts-datalabels,
        .apexcharts-pie-label {
            cursor: default;
            pointer-events: none
        }

        .apexcharts-pie-label-delay {
            opacity: 0;
            animation-name: opaque;
            animation-duration: .3s;
            animation-fill-mode: forwards;
            animation-timing-function: ease
        }

        .apexcharts-radialbar-label {
            cursor: pointer;
        }

        .apexcharts-annotation-rect,
        .apexcharts-area-series .apexcharts-area,
        .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-gridline,
        .apexcharts-line,
        .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-point-annotation-label,
        .apexcharts-radar-series path:not(.apexcharts-marker),
        .apexcharts-radar-series polygon,
        .apexcharts-toolbar svg,
        .apexcharts-tooltip .apexcharts-marker,
        .apexcharts-xaxis-annotation-label,
        .apexcharts-yaxis-annotation-label,
        .apexcharts-zoom-rect {
            pointer-events: none
        }

        .apexcharts-tooltip-active .apexcharts-marker {
            transition: .15s ease all
        }

        .resize-triggers {
            animation: 1ms resizeanim;
            visibility: hidden;
            opacity: 0;
            height: 100%;
            width: 100%;
            overflow: hidden
        }

        .contract-trigger:before,
        .resize-triggers,
        .resize-triggers>div {
            content: " ";
            display: block;
            position: absolute;
            top: 0;
            left: 0
        }

        .resize-triggers>div {
            height: 100%;
            width: 100%;
            background: #eee;
            overflow: auto
        }

        .contract-trigger:before {
            overflow: hidden;
            width: 200%;
            height: 200%
        }

        .apexcharts-bar-goals-markers {
            pointer-events: none
        }

        .apexcharts-bar-shadows {
            pointer-events: none
        }

        .apexcharts-rangebar-goals-markers {
            pointer-events: none
        }
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
            <!--end::Header container-->
        </div>
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
                        <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack ">



                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                                    Dashboard
                                </h1>
                                <!--end::Title-->


                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="/metronic8/demo1/index.html" class="text-muted text-hover-primary">
                                            Dashboards </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        Admin </li>
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
                        <div id="kt_app_content_container" class="app-container  container-fluid ">
                            <!--begin::Row-->
                            <div class="row g-5 g-xl-8">
                                <div class="col-xl-4">

                                    <!--begin::Statistics Widget 4-->
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body p-0">
                                            <div class="d-flex flex-stack card-p flex-grow-1">
                                                <span class="symbol  symbol-50px me-2">
                                                    <span class="symbol-label bg-light-info">
                                                        <i class="ki-duotone ki-basket fs-2x text-info"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>                </span>
                                                </span>

                                                <div class="d-flex flex-column text-end">
                                                    <span class="text-gray-900 fw-bold fs-2">+256</span>

                                                    <span class="text-muted fw-semibold mt-1">Sales Change</span>
                                                </div>
                                            </div>

                                            <div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="info" style="height: 150px"></div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Statistics Widget 4-->
                                </div>

                                <div class="col-xl-4">

                                    <!--begin::Statistics Widget 4-->
                                    <div class="card card-xl-stretch mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body p-0">
                                            <div class="d-flex flex-stack card-p flex-grow-1">
                                                <span class="symbol  symbol-50px me-2">
                                                    <span class="symbol-label bg-light-success">
                                                        <i class="ki-duotone ki-bank fs-2x text-success"><span class="path1"></span><span class="path2"></span></i>                </span>
                                                </span>

                                                <div class="d-flex flex-column text-end">
                                                    <span class="text-gray-900 fw-bold fs-2">750$</span>

                                                    <span class="text-muted fw-semibold mt-1">Weekly Income</span>
                                                </div>
                                            </div>

                                            <div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="success" style="height: 150px"></div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Statistics Widget 4-->
                                </div>

                                <div class="col-xl-4">

                                    <!--begin::Statistics Widget 4-->
                                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                                        <!--begin::Body-->
                                        <div class="card-body p-0">
                                            <div class="d-flex flex-stack card-p flex-grow-1">
                                                <span class="symbol  symbol-50px me-2">
                                                    <span class="symbol-label bg-light-primary">
                                                        <i class="ki-duotone ki-briefcase fs-2x text-primary"><span class="path1"></span><span class="path2"></span></i>                </span>
                                                </span>

                                                <div class="d-flex flex-column text-end">
                                                    <span class="text-gray-900 fw-bold fs-2">+6.6K</span>

                                                    <span class="text-muted fw-semibold mt-1">New Users</span>
                                                </div>
                                            </div>

                                            <div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 150px"></div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Statistics Widget 4-->
                                </div>
                            </div>
                            <!--end::Row-->

                            <!--begin::Row-->
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

                                <!--begin::Col-->
                                <div class="col-xl-12">

                                    <!--begin::Table widget 14-->
                                    <div class="card card-flush h-md-100">
                                        <!--begin::Header-->
                                        <div class="card-header pt-7">
                                            <!--begin::Title-->
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold text-gray-800">Projects Stats</span>

                                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Updated 37 minutes
                                                    ago</span>
                                            </h3>
                                            <!--end::Title-->

                                            <!--begin::Toolbar-->
                                            <div class="card-toolbar">
                                                <a href="/metronic8/demo1/apps/ecommerce/catalog/add-product.html"
                                                    class="btn btn-sm btn-light">History</a>
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Header-->

                                        <!--begin::Body-->
                                        <div class="card-body pt-6">
                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                            <th class="p-0 pb-3 min-w-175px text-start">ITEM</th>
                                                            <th class="p-0 pb-3 min-w-100px text-end">BUDGET</th>
                                                            <th class="p-0 pb-3 min-w-100px text-end">PROGRESS</th>
                                                            <th class="p-0 pb-3 min-w-175px text-end pe-12">STATUS</th>
                                                            <th class="p-0 pb-3 w-125px text-end pe-7">CHART</th>
                                                            <th class="p-0 pb-3 w-50px text-end">VIEW</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->

                                                    <!--begin::Table body-->
                                                    <tbody>

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="symbol symbol-50px me-3">
                                                                        <img src="{{ asset('media/stock/600x600/img-49.jpg') }}"
                                                                            class="" alt="">
                                                                    </div>

                                                                    <div
                                                                        class="d-flex justify-content-start flex-column">
                                                                        <a href="#"
                                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Mivy
                                                                            App</a>
                                                                        <span
                                                                            class="text-gray-500 fw-semibold d-block fs-7">Jane
                                                                            Cooper</span>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <span class="text-gray-600 fw-bold fs-6">$32,400</span>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <!--begin::Label-->
                                                                <span class="badge badge-light-success fs-base">
                                                                    <i
                                                                        class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span></i>
                                                                    9.2%
                                                                </span>
                                                                <!--end::Label-->

                                                            </td>

                                                            <td class="text-end pe-12">
                                                                <span
                                                                    class="badge py-3 px-4 fs-7 badge-light-primary">In
                                                                    Process</span>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <div id="kt_table_widget_14_chart_1"
                                                                    class="h-50px mt-n8 pe-7"
                                                                    data-kt-chart-color="success"
                                                                    style="min-height: 50px;">
                                                                    <div id="apexcharts675bxbb5"
                                                                        class="apexcharts-canvas apexcharts675bxbb5 apexcharts-theme-"
                                                                        style="width: 92.25px; height: 50px;"><svg
                                                                            id="SvgjsSvg5487" width="92.25" height="50"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xmlns:svgjs="http://svgjs.dev"
                                                                            class="apexcharts-svg"
                                                                            xmlns:data="ApexChartsNS"
                                                                            transform="translate(0, 0)">
                                                                            <foreignObject x="0" y="0" width="92.25"
                                                                                height="50">
                                                                                <div class="apexcharts-legend"
                                                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                                                    style="max-height: 25px;"></div>
                                                                                <style type="text/css">
                                                                                    .apexcharts-flip-y {
                                                                                        transform: scaleY(-1) translateY(-100%);
                                                                                        transform-origin: top;
                                                                                        transform-box: fill-box;
                                                                                    }

                                                                                    .apexcharts-flip-x {
                                                                                        transform: scaleX(-1);
                                                                                        transform-origin: center;
                                                                                        transform-box: fill-box;
                                                                                    }

                                                                                    .apexcharts-legend {
                                                                                        display: flex;
                                                                                        overflow: auto;
                                                                                        padding: 0 10px;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom,
                                                                                    .apexcharts-legend.apx-legend-position-top {
                                                                                        flex-wrap: wrap
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                                        flex-direction: column;
                                                                                        bottom: 0;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                                        justify-content: flex-start;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                                        justify-content: center;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                                        justify-content: flex-end;
                                                                                    }

                                                                                    .apexcharts-legend-series {
                                                                                        cursor: pointer;
                                                                                        line-height: normal;
                                                                                        display: flex;
                                                                                        align-items: center;
                                                                                    }

                                                                                    .apexcharts-legend-text {
                                                                                        position: relative;
                                                                                        font-size: 14px;
                                                                                    }

                                                                                    .apexcharts-legend-text *,
                                                                                    .apexcharts-legend-marker * {
                                                                                        pointer-events: none;
                                                                                    }

                                                                                    .apexcharts-legend-marker {
                                                                                        position: relative;
                                                                                        display: flex;
                                                                                        align-items: center;
                                                                                        justify-content: center;
                                                                                        cursor: pointer;
                                                                                        margin-right: 1px;
                                                                                    }

                                                                                    .apexcharts-legend-series.apexcharts-no-click {
                                                                                        cursor: auto;
                                                                                    }

                                                                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                                                                        display: none !important;
                                                                                    }

                                                                                    .apexcharts-inactive-legend {
                                                                                        opacity: 0.45;
                                                                                    }
                                                                                </style>
                                                                            </foreignObject>
                                                                            <g id="SvgjsG5495"
                                                                                class="apexcharts-datalabels-group"
                                                                                transform="translate(0, 0) scale(1)">
                                                                            </g>
                                                                            <g id="SvgjsG5496"
                                                                                class="apexcharts-datalabels-group"
                                                                                transform="translate(0, 0) scale(1)">
                                                                            </g>
                                                                            <g id="SvgjsG5530" class="apexcharts-yaxis"
                                                                                rel="0" transform="translate(-18, 0)">
                                                                            </g>
                                                                            <g id="SvgjsG5489"
                                                                                class="apexcharts-inner apexcharts-graphical"
                                                                                transform="translate(0, 1)">
                                                                                <defs id="SvgjsDefs5488">
                                                                                    <clipPath id="gridRectMask675bxbb5">
                                                                                        <rect id="SvgjsRect5492"
                                                                                            width="92.25" height="48"
                                                                                            x="0" y="0" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="gridRectBarMask675bxbb5">
                                                                                        <rect id="SvgjsRect5493"
                                                                                            width="98.25" height="54"
                                                                                            x="-3" y="-3" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="gridRectMarkerMask675bxbb5">
                                                                                        <rect id="SvgjsRect5494"
                                                                                            width="92.25" height="48"
                                                                                            x="0" y="0" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath id="forecastMask675bxbb5">
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="nonForecastMask675bxbb5">
                                                                                    </clipPath>
                                                                                </defs>
                                                                                <g id="SvgjsG5503"
                                                                                    class="apexcharts-grid">
                                                                                    <g id="SvgjsG5504"
                                                                                        class="apexcharts-gridlines-horizontal"
                                                                                        style="display: none;">
                                                                                        <line id="SvgjsLine5507" x1="0"
                                                                                            y1="0" x2="92.25" y2="0"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                        <line id="SvgjsLine5508" x1="0"
                                                                                            y1="24" x2="92.25" y2="24"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                        <line id="SvgjsLine5509" x1="0"
                                                                                            y1="48" x2="92.25" y2="48"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                    </g>
                                                                                    <g id="SvgjsG5505"
                                                                                        class="apexcharts-gridlines-vertical"
                                                                                        style="display: none;"></g>
                                                                                    <line id="SvgjsLine5511" x1="0"
                                                                                        y1="48" x2="92.25" y2="48"
                                                                                        stroke="transparent"
                                                                                        stroke-dasharray="0"
                                                                                        stroke-linecap="butt"></line>
                                                                                    <line id="SvgjsLine5510" x1="0"
                                                                                        y1="1" x2="0" y2="48"
                                                                                        stroke="transparent"
                                                                                        stroke-dasharray="0"
                                                                                        stroke-linecap="butt"></line>
                                                                                </g>
                                                                                <g id="SvgjsG5506"
                                                                                    class="apexcharts-grid-borders"
                                                                                    style="display: none;"></g>
                                                                                <g id="SvgjsG5497"
                                                                                    class="apexcharts-area-series apexcharts-plot-series">
                                                                                    <g id="SvgjsG5498"
                                                                                        class="apexcharts-series"
                                                                                        zIndex="0"
                                                                                        seriesName="NetxProfit"
                                                                                        data:longestSeries="true"
                                                                                        rel="1" data:realIndex="0">
                                                                                        <path id="SvgjsPath5501"
                                                                                            d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z"
                                                                                            fill="rgba(255,255,255,1)"
                                                                                            fill-opacity="1"
                                                                                            stroke-opacity="1"
                                                                                            stroke-linecap="butt"
                                                                                            stroke-width="0"
                                                                                            stroke-dasharray="0"
                                                                                            class="apexcharts-area"
                                                                                            index="0"
                                                                                            clip-path="url(#gridRectMask675bxbb5)"
                                                                                            pathTo="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6C 92.25 37.6 92.25 37.6 92.25 48 L 0 48z"
                                                                                            pathFrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48z">
                                                                                        </path>
                                                                                        <path id="SvgjsPath5502"
                                                                                            d="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6"
                                                                                            fill="none" fill-opacity="1"
                                                                                            stroke="#17c653"
                                                                                            stroke-opacity="1"
                                                                                            stroke-linecap="butt"
                                                                                            stroke-width="2"
                                                                                            stroke-dasharray="0"
                                                                                            class="apexcharts-area"
                                                                                            index="0"
                                                                                            clip-path="url(#gridRectMask675bxbb5)"
                                                                                            pathTo="M 0 42.4C 2.483653846153846 42.4 4.612500000000001 40 7.096153846153847 40C 9.579807692307693 40 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 31.2 21.28846153846154 31.2C 23.772115384615386 31.2 25.90096153846154 43.2 28.384615384615387 43.2C 30.868269230769233 43.2 32.997115384615384 39.2 35.48076923076923 39.2C 37.96442307692308 39.2 40.09326923076924 44 42.57692307692308 44C 45.06057692307692 44 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 39.2 63.86538461538462 39.2C 66.34903846153847 39.2 68.47788461538462 33.6 70.96153846153847 33.6C 73.44519230769231 33.6 75.57403846153846 42.4 78.0576923076923 42.4C 80.54134615384615 42.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 37.6 92.25 37.6"
                                                                                            pathFrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48"
                                                                                            fill-rule="evenodd"></path>
                                                                                        <g id="SvgjsG5499"
                                                                                            class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                                            data:realIndex="0"></g>
                                                                                    </g>
                                                                                    <g id="SvgjsG5500"
                                                                                        class="apexcharts-datalabels"
                                                                                        data:realIndex="0"></g>
                                                                                </g>
                                                                                <line id="SvgjsLine5512" x1="0" y1="0"
                                                                                    x2="92.25" y2="0" stroke="#b6b6b6"
                                                                                    stroke-dasharray="0"
                                                                                    stroke-width="1"
                                                                                    stroke-linecap="butt"
                                                                                    class="apexcharts-ycrosshairs">
                                                                                </line>
                                                                                <line id="SvgjsLine5513" x1="0" y1="0"
                                                                                    x2="92.25" y2="0"
                                                                                    stroke-dasharray="0"
                                                                                    stroke-width="0"
                                                                                    stroke-linecap="butt"
                                                                                    class="apexcharts-ycrosshairs-hidden">
                                                                                </line>
                                                                                <g id="SvgjsG5514"
                                                                                    class="apexcharts-xaxis"
                                                                                    transform="translate(0, 0)">
                                                                                    <g id="SvgjsG5515"
                                                                                        class="apexcharts-xaxis-texts-g"
                                                                                        transform="translate(0, 4)"></g>
                                                                                </g>
                                                                                <g id="SvgjsG5531"
                                                                                    class="apexcharts-yaxis-annotations">
                                                                                </g>
                                                                                <g id="SvgjsG5532"
                                                                                    class="apexcharts-xaxis-annotations">
                                                                                </g>
                                                                                <g id="SvgjsG5533"
                                                                                    class="apexcharts-point-annotations">
                                                                                </g>
                                                                            </g>
                                                                        </svg></div>
                                                                </div>
                                                            </td>

                                                            <td class="text-end">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                                    <i
                                                                        class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="symbol symbol-50px me-3">
                                                                        <img src="{{ asset('media/stock/600x600/img-40.jpg') }}"
                                                                            class="" alt="">
                                                                    </div>

                                                                    <div
                                                                        class="d-flex justify-content-start flex-column">
                                                                        <a href="#"
                                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Avionica</a>
                                                                        <span
                                                                            class="text-gray-500 fw-semibold d-block fs-7">Esther
                                                                            Howard</span>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <span class="text-gray-600 fw-bold fs-6">$256,910</span>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <!--begin::Label-->
                                                                <span class="badge badge-light-danger fs-base">
                                                                    <i
                                                                        class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span></i>
                                                                    0.4%
                                                                </span>
                                                                <!--end::Label-->

                                                            </td>

                                                            <td class="text-end pe-12">
                                                                <span
                                                                    class="badge py-3 px-4 fs-7 badge-light-warning">On
                                                                    Hold</span>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <div id="kt_table_widget_14_chart_2"
                                                                    class="h-50px mt-n8 pe-7"
                                                                    data-kt-chart-color="danger"
                                                                    style="min-height: 50px;">
                                                                    <div id="apexchartsz5wlz3h8j"
                                                                        class="apexcharts-canvas apexchartsz5wlz3h8j apexcharts-theme-"
                                                                        style="width: 92.25px; height: 50px;"><svg
                                                                            id="SvgjsSvg5534" width="92.25" height="50"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xmlns:svgjs="http://svgjs.dev"
                                                                            class="apexcharts-svg"
                                                                            xmlns:data="ApexChartsNS"
                                                                            transform="translate(0, 0)">
                                                                            <foreignObject x="0" y="0" width="92.25"
                                                                                height="50">
                                                                                <div class="apexcharts-legend"
                                                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                                                    style="max-height: 25px;"></div>
                                                                                <style type="text/css">
                                                                                    .apexcharts-flip-y {
                                                                                        transform: scaleY(-1) translateY(-100%);
                                                                                        transform-origin: top;
                                                                                        transform-box: fill-box;
                                                                                    }

                                                                                    .apexcharts-flip-x {
                                                                                        transform: scaleX(-1);
                                                                                        transform-origin: center;
                                                                                        transform-box: fill-box;
                                                                                    }

                                                                                    .apexcharts-legend {
                                                                                        display: flex;
                                                                                        overflow: auto;
                                                                                        padding: 0 10px;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom,
                                                                                    .apexcharts-legend.apx-legend-position-top {
                                                                                        flex-wrap: wrap
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                                        flex-direction: column;
                                                                                        bottom: 0;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                                        justify-content: flex-start;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                                        justify-content: center;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                                        justify-content: flex-end;
                                                                                    }

                                                                                    .apexcharts-legend-series {
                                                                                        cursor: pointer;
                                                                                        line-height: normal;
                                                                                        display: flex;
                                                                                        align-items: center;
                                                                                    }

                                                                                    .apexcharts-legend-text {
                                                                                        position: relative;
                                                                                        font-size: 14px;
                                                                                    }

                                                                                    .apexcharts-legend-text *,
                                                                                    .apexcharts-legend-marker * {
                                                                                        pointer-events: none;
                                                                                    }

                                                                                    .apexcharts-legend-marker {
                                                                                        position: relative;
                                                                                        display: flex;
                                                                                        align-items: center;
                                                                                        justify-content: center;
                                                                                        cursor: pointer;
                                                                                        margin-right: 1px;
                                                                                    }

                                                                                    .apexcharts-legend-series.apexcharts-no-click {
                                                                                        cursor: auto;
                                                                                    }

                                                                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                                                                        display: none !important;
                                                                                    }

                                                                                    .apexcharts-inactive-legend {
                                                                                        opacity: 0.45;
                                                                                    }
                                                                                </style>
                                                                            </foreignObject>
                                                                            <g id="SvgjsG5542"
                                                                                class="apexcharts-datalabels-group"
                                                                                transform="translate(0, 0) scale(1)">
                                                                            </g>
                                                                            <g id="SvgjsG5543"
                                                                                class="apexcharts-datalabels-group"
                                                                                transform="translate(0, 0) scale(1)">
                                                                            </g>
                                                                            <g id="SvgjsG5577" class="apexcharts-yaxis"
                                                                                rel="0" transform="translate(-18, 0)">
                                                                            </g>
                                                                            <g id="SvgjsG5536"
                                                                                class="apexcharts-inner apexcharts-graphical"
                                                                                transform="translate(0, 1)">
                                                                                <defs id="SvgjsDefs5535">
                                                                                    <clipPath
                                                                                        id="gridRectMaskz5wlz3h8j">
                                                                                        <rect id="SvgjsRect5539"
                                                                                            width="92.25" height="48"
                                                                                            x="0" y="0" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="gridRectBarMaskz5wlz3h8j">
                                                                                        <rect id="SvgjsRect5540"
                                                                                            width="98.25" height="54"
                                                                                            x="-3" y="-3" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="gridRectMarkerMaskz5wlz3h8j">
                                                                                        <rect id="SvgjsRect5541"
                                                                                            width="92.25" height="48"
                                                                                            x="0" y="0" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="forecastMaskz5wlz3h8j">
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="nonForecastMaskz5wlz3h8j">
                                                                                    </clipPath>
                                                                                </defs>
                                                                                <g id="SvgjsG5550"
                                                                                    class="apexcharts-grid">
                                                                                    <g id="SvgjsG5551"
                                                                                        class="apexcharts-gridlines-horizontal"
                                                                                        style="display: none;">
                                                                                        <line id="SvgjsLine5554" x1="0"
                                                                                            y1="0" x2="92.25" y2="0"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                        <line id="SvgjsLine5555" x1="0"
                                                                                            y1="24" x2="92.25" y2="24"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                        <line id="SvgjsLine5556" x1="0"
                                                                                            y1="48" x2="92.25" y2="48"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                    </g>
                                                                                    <g id="SvgjsG5552"
                                                                                        class="apexcharts-gridlines-vertical"
                                                                                        style="display: none;"></g>
                                                                                    <line id="SvgjsLine5558" x1="0"
                                                                                        y1="48" x2="92.25" y2="48"
                                                                                        stroke="transparent"
                                                                                        stroke-dasharray="0"
                                                                                        stroke-linecap="butt"></line>
                                                                                    <line id="SvgjsLine5557" x1="0"
                                                                                        y1="1" x2="0" y2="48"
                                                                                        stroke="transparent"
                                                                                        stroke-dasharray="0"
                                                                                        stroke-linecap="butt"></line>
                                                                                </g>
                                                                                <g id="SvgjsG5553"
                                                                                    class="apexcharts-grid-borders"
                                                                                    style="display: none;"></g>
                                                                                <g id="SvgjsG5544"
                                                                                    class="apexcharts-area-series apexcharts-plot-series">
                                                                                    <g id="SvgjsG5545"
                                                                                        class="apexcharts-series"
                                                                                        zIndex="0"
                                                                                        seriesName="NetxProfit"
                                                                                        data:longestSeries="true"
                                                                                        rel="1" data:realIndex="0">
                                                                                        <path id="SvgjsPath5548"
                                                                                            d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z"
                                                                                            fill="rgba(255,255,255,1)"
                                                                                            fill-opacity="1"
                                                                                            stroke-opacity="1"
                                                                                            stroke-linecap="butt"
                                                                                            stroke-width="0"
                                                                                            stroke-dasharray="0"
                                                                                            class="apexcharts-area"
                                                                                            index="0"
                                                                                            clip-path="url(#gridRectMaskz5wlz3h8j)"
                                                                                            pathTo="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z"
                                                                                            pathFrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48z">
                                                                                        </path>
                                                                                        <path id="SvgjsPath5549"
                                                                                            d="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4"
                                                                                            fill="none" fill-opacity="1"
                                                                                            stroke="#f8285a"
                                                                                            stroke-opacity="1"
                                                                                            stroke-linecap="butt"
                                                                                            stroke-width="2"
                                                                                            stroke-dasharray="0"
                                                                                            class="apexcharts-area"
                                                                                            index="0"
                                                                                            clip-path="url(#gridRectMaskz5wlz3h8j)"
                                                                                            pathTo="M 0 34.4C 2.483653846153846 34.4 4.612500000000001 44 7.096153846153847 44C 9.579807692307693 44 11.708653846153847 29.6 14.192307692307693 29.6C 16.67596153846154 29.6 18.804807692307694 46.4 21.28846153846154 46.4C 23.772115384615386 46.4 25.90096153846154 31.2 28.384615384615387 31.2C 30.868269230769233 31.2 32.997115384615384 40.8 35.48076923076923 40.8C 37.96442307692308 40.8 40.09326923076924 34.4 42.57692307692308 34.4C 45.06057692307692 34.4 47.18942307692308 29.6 49.67307692307693 29.6C 52.156730769230776 29.6 54.28557692307693 44.8 56.769230769230774 44.8C 59.252884615384616 44.8 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 40.8 70.96153846153847 40.8C 73.44519230769231 40.8 75.57403846153846 34.4 78.0576923076923 34.4C 80.54134615384615 34.4 82.67019230769232 31.2 85.15384615384616 31.2C 87.6375 31.2 89.76634615384616 42.4 92.25 42.4"
                                                                                            pathFrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48"
                                                                                            fill-rule="evenodd"></path>
                                                                                        <g id="SvgjsG5546"
                                                                                            class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                                            data:realIndex="0"></g>
                                                                                    </g>
                                                                                    <g id="SvgjsG5547"
                                                                                        class="apexcharts-datalabels"
                                                                                        data:realIndex="0"></g>
                                                                                </g>
                                                                                <line id="SvgjsLine5559" x1="0" y1="0"
                                                                                    x2="92.25" y2="0" stroke="#b6b6b6"
                                                                                    stroke-dasharray="0"
                                                                                    stroke-width="1"
                                                                                    stroke-linecap="butt"
                                                                                    class="apexcharts-ycrosshairs">
                                                                                </line>
                                                                                <line id="SvgjsLine5560" x1="0" y1="0"
                                                                                    x2="92.25" y2="0"
                                                                                    stroke-dasharray="0"
                                                                                    stroke-width="0"
                                                                                    stroke-linecap="butt"
                                                                                    class="apexcharts-ycrosshairs-hidden">
                                                                                </line>
                                                                                <g id="SvgjsG5561"
                                                                                    class="apexcharts-xaxis"
                                                                                    transform="translate(0, 0)">
                                                                                    <g id="SvgjsG5562"
                                                                                        class="apexcharts-xaxis-texts-g"
                                                                                        transform="translate(0, 4)"></g>
                                                                                </g>
                                                                                <g id="SvgjsG5578"
                                                                                    class="apexcharts-yaxis-annotations">
                                                                                </g>
                                                                                <g id="SvgjsG5579"
                                                                                    class="apexcharts-xaxis-annotations">
                                                                                </g>
                                                                                <g id="SvgjsG5580"
                                                                                    class="apexcharts-point-annotations">
                                                                                </g>
                                                                            </g>
                                                                        </svg></div>
                                                                </div>
                                                            </td>

                                                            <td class="text-end">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                                    <i
                                                                        class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="symbol symbol-50px me-3">
                                                                        <img src="{{ asset('media/stock/600x600/img-39.jpg') }}"
                                                                            class="" alt="">
                                                                    </div>

                                                                    <div
                                                                        class="d-flex justify-content-start flex-column">
                                                                        <a href="#"
                                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Charto
                                                                            CRM</a>
                                                                        <span
                                                                            class="text-gray-500 fw-semibold d-block fs-7">Jenny
                                                                            Wilson</span>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <span class="text-gray-600 fw-bold fs-6">$8,220</span>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <!--begin::Label-->
                                                                <span class="badge badge-light-success fs-base">
                                                                    <i
                                                                        class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span></i>
                                                                    9.2%
                                                                </span>
                                                                <!--end::Label-->

                                                            </td>

                                                            <td class="text-end pe-12">
                                                                <span
                                                                    class="badge py-3 px-4 fs-7 badge-light-primary">In
                                                                    Process</span>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <div id="kt_table_widget_14_chart_3"
                                                                    class="h-50px mt-n8 pe-7"
                                                                    data-kt-chart-color="success"
                                                                    style="min-height: 50px;">
                                                                    <div id="apexchartsu5gt4y7f"
                                                                        class="apexcharts-canvas apexchartsu5gt4y7f apexcharts-theme-"
                                                                        style="width: 92.25px; height: 50px;"><svg
                                                                            id="SvgjsSvg5581" width="92.25" height="50"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xmlns:svgjs="http://svgjs.dev"
                                                                            class="apexcharts-svg"
                                                                            xmlns:data="ApexChartsNS"
                                                                            transform="translate(0, 0)">
                                                                            <foreignObject x="0" y="0" width="92.25"
                                                                                height="50">
                                                                                <div class="apexcharts-legend"
                                                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                                                    style="max-height: 25px;"></div>
                                                                                <style type="text/css">
                                                                                    .apexcharts-flip-y {
                                                                                        transform: scaleY(-1) translateY(-100%);
                                                                                        transform-origin: top;
                                                                                        transform-box: fill-box;
                                                                                    }

                                                                                    .apexcharts-flip-x {
                                                                                        transform: scaleX(-1);
                                                                                        transform-origin: center;
                                                                                        transform-box: fill-box;
                                                                                    }

                                                                                    .apexcharts-legend {
                                                                                        display: flex;
                                                                                        overflow: auto;
                                                                                        padding: 0 10px;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom,
                                                                                    .apexcharts-legend.apx-legend-position-top {
                                                                                        flex-wrap: wrap
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                                        flex-direction: column;
                                                                                        bottom: 0;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                                        justify-content: flex-start;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                                        justify-content: center;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                                        justify-content: flex-end;
                                                                                    }

                                                                                    .apexcharts-legend-series {
                                                                                        cursor: pointer;
                                                                                        line-height: normal;
                                                                                        display: flex;
                                                                                        align-items: center;
                                                                                    }

                                                                                    .apexcharts-legend-text {
                                                                                        position: relative;
                                                                                        font-size: 14px;
                                                                                    }

                                                                                    .apexcharts-legend-text *,
                                                                                    .apexcharts-legend-marker * {
                                                                                        pointer-events: none;
                                                                                    }

                                                                                    .apexcharts-legend-marker {
                                                                                        position: relative;
                                                                                        display: flex;
                                                                                        align-items: center;
                                                                                        justify-content: center;
                                                                                        cursor: pointer;
                                                                                        margin-right: 1px;
                                                                                    }

                                                                                    .apexcharts-legend-series.apexcharts-no-click {
                                                                                        cursor: auto;
                                                                                    }

                                                                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                                                                        display: none !important;
                                                                                    }

                                                                                    .apexcharts-inactive-legend {
                                                                                        opacity: 0.45;
                                                                                    }
                                                                                </style>
                                                                            </foreignObject>
                                                                            <g id="SvgjsG5589"
                                                                                class="apexcharts-datalabels-group"
                                                                                transform="translate(0, 0) scale(1)">
                                                                            </g>
                                                                            <g id="SvgjsG5590"
                                                                                class="apexcharts-datalabels-group"
                                                                                transform="translate(0, 0) scale(1)">
                                                                            </g>
                                                                            <g id="SvgjsG5624" class="apexcharts-yaxis"
                                                                                rel="0" transform="translate(-18, 0)">
                                                                            </g>
                                                                            <g id="SvgjsG5583"
                                                                                class="apexcharts-inner apexcharts-graphical"
                                                                                transform="translate(0, 1)">
                                                                                <defs id="SvgjsDefs5582">
                                                                                    <clipPath id="gridRectMasku5gt4y7f">
                                                                                        <rect id="SvgjsRect5586"
                                                                                            width="92.25" height="48"
                                                                                            x="0" y="0" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="gridRectBarMasku5gt4y7f">
                                                                                        <rect id="SvgjsRect5587"
                                                                                            width="98.25" height="54"
                                                                                            x="-3" y="-3" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="gridRectMarkerMasku5gt4y7f">
                                                                                        <rect id="SvgjsRect5588"
                                                                                            width="92.25" height="48"
                                                                                            x="0" y="0" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath id="forecastMasku5gt4y7f">
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="nonForecastMasku5gt4y7f">
                                                                                    </clipPath>
                                                                                </defs>
                                                                                <g id="SvgjsG5597"
                                                                                    class="apexcharts-grid">
                                                                                    <g id="SvgjsG5598"
                                                                                        class="apexcharts-gridlines-horizontal"
                                                                                        style="display: none;">
                                                                                        <line id="SvgjsLine5601" x1="0"
                                                                                            y1="0" x2="92.25" y2="0"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                        <line id="SvgjsLine5602" x1="0"
                                                                                            y1="24" x2="92.25" y2="24"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                        <line id="SvgjsLine5603" x1="0"
                                                                                            y1="48" x2="92.25" y2="48"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                    </g>
                                                                                    <g id="SvgjsG5599"
                                                                                        class="apexcharts-gridlines-vertical"
                                                                                        style="display: none;"></g>
                                                                                    <line id="SvgjsLine5605" x1="0"
                                                                                        y1="48" x2="92.25" y2="48"
                                                                                        stroke="transparent"
                                                                                        stroke-dasharray="0"
                                                                                        stroke-linecap="butt"></line>
                                                                                    <line id="SvgjsLine5604" x1="0"
                                                                                        y1="1" x2="0" y2="48"
                                                                                        stroke="transparent"
                                                                                        stroke-dasharray="0"
                                                                                        stroke-linecap="butt"></line>
                                                                                </g>
                                                                                <g id="SvgjsG5600"
                                                                                    class="apexcharts-grid-borders"
                                                                                    style="display: none;"></g>
                                                                                <g id="SvgjsG5591"
                                                                                    class="apexcharts-area-series apexcharts-plot-series">
                                                                                    <g id="SvgjsG5592"
                                                                                        class="apexcharts-series"
                                                                                        zIndex="0"
                                                                                        seriesName="NetxProfit"
                                                                                        data:longestSeries="true"
                                                                                        rel="1" data:realIndex="0">
                                                                                        <path id="SvgjsPath5595"
                                                                                            d="M 0 46.4C 2.483653846153846 46.4 4.612500000000001 28.8 7.096153846153847 28.8C 9.579807692307693 28.8 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 34.4 21.28846153846154 34.4C 23.772115384615386 34.4 25.90096153846154 42.4 28.384615384615387 42.4C 30.868269230769233 42.4 32.997115384615384 46.4 35.48076923076923 46.4C 37.96442307692308 46.4 40.09326923076924 38.4 42.57692307692308 38.4C 45.06057692307692 38.4 47.18942307692308 28.8 49.67307692307693 28.8C 52.156730769230776 28.8 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 46.4 70.96153846153847 46.4C 73.44519230769231 46.4 75.57403846153846 41.6 78.0576923076923 41.6C 80.54134615384615 41.6 82.67019230769232 38.4 85.15384615384616 38.4C 87.6375 38.4 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z"
                                                                                            fill="rgba(255,255,255,1)"
                                                                                            fill-opacity="1"
                                                                                            stroke-opacity="1"
                                                                                            stroke-linecap="butt"
                                                                                            stroke-width="0"
                                                                                            stroke-dasharray="0"
                                                                                            class="apexcharts-area"
                                                                                            index="0"
                                                                                            clip-path="url(#gridRectMasku5gt4y7f)"
                                                                                            pathTo="M 0 46.4C 2.483653846153846 46.4 4.612500000000001 28.8 7.096153846153847 28.8C 9.579807692307693 28.8 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 34.4 21.28846153846154 34.4C 23.772115384615386 34.4 25.90096153846154 42.4 28.384615384615387 42.4C 30.868269230769233 42.4 32.997115384615384 46.4 35.48076923076923 46.4C 37.96442307692308 46.4 40.09326923076924 38.4 42.57692307692308 38.4C 45.06057692307692 38.4 47.18942307692308 28.8 49.67307692307693 28.8C 52.156730769230776 28.8 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 46.4 70.96153846153847 46.4C 73.44519230769231 46.4 75.57403846153846 41.6 78.0576923076923 41.6C 80.54134615384615 41.6 82.67019230769232 38.4 85.15384615384616 38.4C 87.6375 38.4 89.76634615384616 42.4 92.25 42.4C 92.25 42.4 92.25 42.4 92.25 48 L 0 48z"
                                                                                            pathFrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48z">
                                                                                        </path>
                                                                                        <path id="SvgjsPath5596"
                                                                                            d="M 0 46.4C 2.483653846153846 46.4 4.612500000000001 28.8 7.096153846153847 28.8C 9.579807692307693 28.8 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 34.4 21.28846153846154 34.4C 23.772115384615386 34.4 25.90096153846154 42.4 28.384615384615387 42.4C 30.868269230769233 42.4 32.997115384615384 46.4 35.48076923076923 46.4C 37.96442307692308 46.4 40.09326923076924 38.4 42.57692307692308 38.4C 45.06057692307692 38.4 47.18942307692308 28.8 49.67307692307693 28.8C 52.156730769230776 28.8 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 46.4 70.96153846153847 46.4C 73.44519230769231 46.4 75.57403846153846 41.6 78.0576923076923 41.6C 80.54134615384615 41.6 82.67019230769232 38.4 85.15384615384616 38.4C 87.6375 38.4 89.76634615384616 42.4 92.25 42.4"
                                                                                            fill="none" fill-opacity="1"
                                                                                            stroke="#17c653"
                                                                                            stroke-opacity="1"
                                                                                            stroke-linecap="butt"
                                                                                            stroke-width="2"
                                                                                            stroke-dasharray="0"
                                                                                            class="apexcharts-area"
                                                                                            index="0"
                                                                                            clip-path="url(#gridRectMasku5gt4y7f)"
                                                                                            pathTo="M 0 46.4C 2.483653846153846 46.4 4.612500000000001 28.8 7.096153846153847 28.8C 9.579807692307693 28.8 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 34.4 21.28846153846154 34.4C 23.772115384615386 34.4 25.90096153846154 42.4 28.384615384615387 42.4C 30.868269230769233 42.4 32.997115384615384 46.4 35.48076923076923 46.4C 37.96442307692308 46.4 40.09326923076924 38.4 42.57692307692308 38.4C 45.06057692307692 38.4 47.18942307692308 28.8 49.67307692307693 28.8C 52.156730769230776 28.8 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 28.8 63.86538461538462 28.8C 66.34903846153847 28.8 68.47788461538462 46.4 70.96153846153847 46.4C 73.44519230769231 46.4 75.57403846153846 41.6 78.0576923076923 41.6C 80.54134615384615 41.6 82.67019230769232 38.4 85.15384615384616 38.4C 87.6375 38.4 89.76634615384616 42.4 92.25 42.4"
                                                                                            pathFrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48"
                                                                                            fill-rule="evenodd"></path>
                                                                                        <g id="SvgjsG5593"
                                                                                            class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                                            data:realIndex="0"></g>
                                                                                    </g>
                                                                                    <g id="SvgjsG5594"
                                                                                        class="apexcharts-datalabels"
                                                                                        data:realIndex="0"></g>
                                                                                </g>
                                                                                <line id="SvgjsLine5606" x1="0" y1="0"
                                                                                    x2="92.25" y2="0" stroke="#b6b6b6"
                                                                                    stroke-dasharray="0"
                                                                                    stroke-width="1"
                                                                                    stroke-linecap="butt"
                                                                                    class="apexcharts-ycrosshairs">
                                                                                </line>
                                                                                <line id="SvgjsLine5607" x1="0" y1="0"
                                                                                    x2="92.25" y2="0"
                                                                                    stroke-dasharray="0"
                                                                                    stroke-width="0"
                                                                                    stroke-linecap="butt"
                                                                                    class="apexcharts-ycrosshairs-hidden">
                                                                                </line>
                                                                                <g id="SvgjsG5608"
                                                                                    class="apexcharts-xaxis"
                                                                                    transform="translate(0, 0)">
                                                                                    <g id="SvgjsG5609"
                                                                                        class="apexcharts-xaxis-texts-g"
                                                                                        transform="translate(0, 4)"></g>
                                                                                </g>
                                                                                <g id="SvgjsG5625"
                                                                                    class="apexcharts-yaxis-annotations">
                                                                                </g>
                                                                                <g id="SvgjsG5626"
                                                                                    class="apexcharts-xaxis-annotations">
                                                                                </g>
                                                                                <g id="SvgjsG5627"
                                                                                    class="apexcharts-point-annotations">
                                                                                </g>
                                                                            </g>
                                                                        </svg></div>
                                                                </div>
                                                            </td>

                                                            <td class="text-end">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                                    <i
                                                                        class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="symbol symbol-50px me-3">
                                                                        <img src="{{ asset('media/stock/600x600/img-47.jpg') }}"
                                                                            class="" alt="">
                                                                    </div>

                                                                    <div
                                                                        class="d-flex justify-content-start flex-column">
                                                                        <a href="#"
                                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Tower
                                                                            Hill</a>
                                                                        <span
                                                                            class="text-gray-500 fw-semibold d-block fs-7">Cody
                                                                            Fisher</span>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <span class="text-gray-600 fw-bold fs-6">$74,000</span>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <!--begin::Label-->
                                                                <span class="badge badge-light-success fs-base">
                                                                    <i
                                                                        class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span></i>
                                                                    9.2%
                                                                </span>
                                                                <!--end::Label-->

                                                            </td>

                                                            <td class="text-end pe-12">
                                                                <span
                                                                    class="badge py-3 px-4 fs-7 badge-light-success">Complated</span>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <div id="kt_table_widget_14_chart_4"
                                                                    class="h-50px mt-n8 pe-7"
                                                                    data-kt-chart-color="success"
                                                                    style="min-height: 50px;">
                                                                    <div id="apexchartsbd6c0gxt"
                                                                        class="apexcharts-canvas apexchartsbd6c0gxt apexcharts-theme-"
                                                                        style="width: 92.25px; height: 50px;"><svg
                                                                            id="SvgjsSvg5628" width="92.25" height="50"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xmlns:svgjs="http://svgjs.dev"
                                                                            class="apexcharts-svg"
                                                                            xmlns:data="ApexChartsNS"
                                                                            transform="translate(0, 0)">
                                                                            <foreignObject x="0" y="0" width="92.25"
                                                                                height="50">
                                                                                <div class="apexcharts-legend"
                                                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                                                    style="max-height: 25px;"></div>
                                                                                <style type="text/css">
                                                                                    .apexcharts-flip-y {
                                                                                        transform: scaleY(-1) translateY(-100%);
                                                                                        transform-origin: top;
                                                                                        transform-box: fill-box;
                                                                                    }

                                                                                    .apexcharts-flip-x {
                                                                                        transform: scaleX(-1);
                                                                                        transform-origin: center;
                                                                                        transform-box: fill-box;
                                                                                    }

                                                                                    .apexcharts-legend {
                                                                                        display: flex;
                                                                                        overflow: auto;
                                                                                        padding: 0 10px;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom,
                                                                                    .apexcharts-legend.apx-legend-position-top {
                                                                                        flex-wrap: wrap
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                                        flex-direction: column;
                                                                                        bottom: 0;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                                        justify-content: flex-start;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                                        justify-content: center;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                                        justify-content: flex-end;
                                                                                    }

                                                                                    .apexcharts-legend-series {
                                                                                        cursor: pointer;
                                                                                        line-height: normal;
                                                                                        display: flex;
                                                                                        align-items: center;
                                                                                    }

                                                                                    .apexcharts-legend-text {
                                                                                        position: relative;
                                                                                        font-size: 14px;
                                                                                    }

                                                                                    .apexcharts-legend-text *,
                                                                                    .apexcharts-legend-marker * {
                                                                                        pointer-events: none;
                                                                                    }

                                                                                    .apexcharts-legend-marker {
                                                                                        position: relative;
                                                                                        display: flex;
                                                                                        align-items: center;
                                                                                        justify-content: center;
                                                                                        cursor: pointer;
                                                                                        margin-right: 1px;
                                                                                    }

                                                                                    .apexcharts-legend-series.apexcharts-no-click {
                                                                                        cursor: auto;
                                                                                    }

                                                                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                                                                        display: none !important;
                                                                                    }

                                                                                    .apexcharts-inactive-legend {
                                                                                        opacity: 0.45;
                                                                                    }
                                                                                </style>
                                                                            </foreignObject>
                                                                            <g id="SvgjsG5636"
                                                                                class="apexcharts-datalabels-group"
                                                                                transform="translate(0, 0) scale(1)">
                                                                            </g>
                                                                            <g id="SvgjsG5637"
                                                                                class="apexcharts-datalabels-group"
                                                                                transform="translate(0, 0) scale(1)">
                                                                            </g>
                                                                            <g id="SvgjsG5671" class="apexcharts-yaxis"
                                                                                rel="0" transform="translate(-18, 0)">
                                                                            </g>
                                                                            <g id="SvgjsG5630"
                                                                                class="apexcharts-inner apexcharts-graphical"
                                                                                transform="translate(0, 1)">
                                                                                <defs id="SvgjsDefs5629">
                                                                                    <clipPath id="gridRectMaskbd6c0gxt">
                                                                                        <rect id="SvgjsRect5633"
                                                                                            width="92.25" height="48"
                                                                                            x="0" y="0" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="gridRectBarMaskbd6c0gxt">
                                                                                        <rect id="SvgjsRect5634"
                                                                                            width="98.25" height="54"
                                                                                            x="-3" y="-3" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="gridRectMarkerMaskbd6c0gxt">
                                                                                        <rect id="SvgjsRect5635"
                                                                                            width="92.25" height="48"
                                                                                            x="0" y="0" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath id="forecastMaskbd6c0gxt">
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="nonForecastMaskbd6c0gxt">
                                                                                    </clipPath>
                                                                                </defs>
                                                                                <g id="SvgjsG5644"
                                                                                    class="apexcharts-grid">
                                                                                    <g id="SvgjsG5645"
                                                                                        class="apexcharts-gridlines-horizontal"
                                                                                        style="display: none;">
                                                                                        <line id="SvgjsLine5648" x1="0"
                                                                                            y1="0" x2="92.25" y2="0"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                        <line id="SvgjsLine5649" x1="0"
                                                                                            y1="24" x2="92.25" y2="24"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                        <line id="SvgjsLine5650" x1="0"
                                                                                            y1="48" x2="92.25" y2="48"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                    </g>
                                                                                    <g id="SvgjsG5646"
                                                                                        class="apexcharts-gridlines-vertical"
                                                                                        style="display: none;"></g>
                                                                                    <line id="SvgjsLine5652" x1="0"
                                                                                        y1="48" x2="92.25" y2="48"
                                                                                        stroke="transparent"
                                                                                        stroke-dasharray="0"
                                                                                        stroke-linecap="butt"></line>
                                                                                    <line id="SvgjsLine5651" x1="0"
                                                                                        y1="1" x2="0" y2="48"
                                                                                        stroke="transparent"
                                                                                        stroke-dasharray="0"
                                                                                        stroke-linecap="butt"></line>
                                                                                </g>
                                                                                <g id="SvgjsG5647"
                                                                                    class="apexcharts-grid-borders"
                                                                                    style="display: none;"></g>
                                                                                <g id="SvgjsG5638"
                                                                                    class="apexcharts-area-series apexcharts-plot-series">
                                                                                    <g id="SvgjsG5639"
                                                                                        class="apexcharts-series"
                                                                                        zIndex="0"
                                                                                        seriesName="NetxProfit"
                                                                                        data:longestSeries="true"
                                                                                        rel="1" data:realIndex="0">
                                                                                        <path id="SvgjsPath5642"
                                                                                            d="M 0 28.8C 2.483653846153846 28.8 4.612500000000001 45.6 7.096153846153847 45.6C 9.579807692307693 45.6 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 32.8 21.28846153846154 32.8C 23.772115384615386 32.8 25.90096153846154 45.6 28.384615384615387 45.6C 30.868269230769233 45.6 32.997115384615384 42.4 35.48076923076923 42.4C 37.96442307692308 42.4 40.09326923076924 28 42.57692307692308 28C 45.06057692307692 28 47.18942307692308 36.8 49.67307692307693 36.8C 52.156730769230776 36.8 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 36.8 63.86538461538462 36.8C 66.34903846153847 36.8 68.47788461538462 46.4 70.96153846153847 46.4C 73.44519230769231 46.4 75.57403846153846 41.6 78.0576923076923 41.6C 80.54134615384615 41.6 82.67019230769232 44 85.15384615384616 44C 87.6375 44 89.76634615384616 34.4 92.25 34.4C 92.25 34.4 92.25 34.4 92.25 48 L 0 48z"
                                                                                            fill="rgba(255,255,255,1)"
                                                                                            fill-opacity="1"
                                                                                            stroke-opacity="1"
                                                                                            stroke-linecap="butt"
                                                                                            stroke-width="0"
                                                                                            stroke-dasharray="0"
                                                                                            class="apexcharts-area"
                                                                                            index="0"
                                                                                            clip-path="url(#gridRectMaskbd6c0gxt)"
                                                                                            pathTo="M 0 28.8C 2.483653846153846 28.8 4.612500000000001 45.6 7.096153846153847 45.6C 9.579807692307693 45.6 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 32.8 21.28846153846154 32.8C 23.772115384615386 32.8 25.90096153846154 45.6 28.384615384615387 45.6C 30.868269230769233 45.6 32.997115384615384 42.4 35.48076923076923 42.4C 37.96442307692308 42.4 40.09326923076924 28 42.57692307692308 28C 45.06057692307692 28 47.18942307692308 36.8 49.67307692307693 36.8C 52.156730769230776 36.8 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 36.8 63.86538461538462 36.8C 66.34903846153847 36.8 68.47788461538462 46.4 70.96153846153847 46.4C 73.44519230769231 46.4 75.57403846153846 41.6 78.0576923076923 41.6C 80.54134615384615 41.6 82.67019230769232 44 85.15384615384616 44C 87.6375 44 89.76634615384616 34.4 92.25 34.4C 92.25 34.4 92.25 34.4 92.25 48 L 0 48z"
                                                                                            pathFrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48z">
                                                                                        </path>
                                                                                        <path id="SvgjsPath5643"
                                                                                            d="M 0 28.8C 2.483653846153846 28.8 4.612500000000001 45.6 7.096153846153847 45.6C 9.579807692307693 45.6 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 32.8 21.28846153846154 32.8C 23.772115384615386 32.8 25.90096153846154 45.6 28.384615384615387 45.6C 30.868269230769233 45.6 32.997115384615384 42.4 35.48076923076923 42.4C 37.96442307692308 42.4 40.09326923076924 28 42.57692307692308 28C 45.06057692307692 28 47.18942307692308 36.8 49.67307692307693 36.8C 52.156730769230776 36.8 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 36.8 63.86538461538462 36.8C 66.34903846153847 36.8 68.47788461538462 46.4 70.96153846153847 46.4C 73.44519230769231 46.4 75.57403846153846 41.6 78.0576923076923 41.6C 80.54134615384615 41.6 82.67019230769232 44 85.15384615384616 44C 87.6375 44 89.76634615384616 34.4 92.25 34.4"
                                                                                            fill="none" fill-opacity="1"
                                                                                            stroke="#17c653"
                                                                                            stroke-opacity="1"
                                                                                            stroke-linecap="butt"
                                                                                            stroke-width="2"
                                                                                            stroke-dasharray="0"
                                                                                            class="apexcharts-area"
                                                                                            index="0"
                                                                                            clip-path="url(#gridRectMaskbd6c0gxt)"
                                                                                            pathTo="M 0 28.8C 2.483653846153846 28.8 4.612500000000001 45.6 7.096153846153847 45.6C 9.579807692307693 45.6 11.708653846153847 44 14.192307692307693 44C 16.67596153846154 44 18.804807692307694 32.8 21.28846153846154 32.8C 23.772115384615386 32.8 25.90096153846154 45.6 28.384615384615387 45.6C 30.868269230769233 45.6 32.997115384615384 42.4 35.48076923076923 42.4C 37.96442307692308 42.4 40.09326923076924 28 42.57692307692308 28C 45.06057692307692 28 47.18942307692308 36.8 49.67307692307693 36.8C 52.156730769230776 36.8 54.28557692307693 44 56.769230769230774 44C 59.252884615384616 44 61.38173076923077 36.8 63.86538461538462 36.8C 66.34903846153847 36.8 68.47788461538462 46.4 70.96153846153847 46.4C 73.44519230769231 46.4 75.57403846153846 41.6 78.0576923076923 41.6C 80.54134615384615 41.6 82.67019230769232 44 85.15384615384616 44C 87.6375 44 89.76634615384616 34.4 92.25 34.4"
                                                                                            pathFrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48"
                                                                                            fill-rule="evenodd"></path>
                                                                                        <g id="SvgjsG5640"
                                                                                            class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                                            data:realIndex="0"></g>
                                                                                    </g>
                                                                                    <g id="SvgjsG5641"
                                                                                        class="apexcharts-datalabels"
                                                                                        data:realIndex="0"></g>
                                                                                </g>
                                                                                <line id="SvgjsLine5653" x1="0" y1="0"
                                                                                    x2="92.25" y2="0" stroke="#b6b6b6"
                                                                                    stroke-dasharray="0"
                                                                                    stroke-width="1"
                                                                                    stroke-linecap="butt"
                                                                                    class="apexcharts-ycrosshairs">
                                                                                </line>
                                                                                <line id="SvgjsLine5654" x1="0" y1="0"
                                                                                    x2="92.25" y2="0"
                                                                                    stroke-dasharray="0"
                                                                                    stroke-width="0"
                                                                                    stroke-linecap="butt"
                                                                                    class="apexcharts-ycrosshairs-hidden">
                                                                                </line>
                                                                                <g id="SvgjsG5655"
                                                                                    class="apexcharts-xaxis"
                                                                                    transform="translate(0, 0)">
                                                                                    <g id="SvgjsG5656"
                                                                                        class="apexcharts-xaxis-texts-g"
                                                                                        transform="translate(0, 4)"></g>
                                                                                </g>
                                                                                <g id="SvgjsG5672"
                                                                                    class="apexcharts-yaxis-annotations">
                                                                                </g>
                                                                                <g id="SvgjsG5673"
                                                                                    class="apexcharts-xaxis-annotations">
                                                                                </g>
                                                                                <g id="SvgjsG5674"
                                                                                    class="apexcharts-point-annotations">
                                                                                </g>
                                                                            </g>
                                                                        </svg></div>
                                                                </div>
                                                            </td>

                                                            <td class="text-end">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                                    <i
                                                                        class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="symbol symbol-50px me-3">
                                                                        <img src="{{ asset('media/stock/600x600/img-48.jpg') }}"
                                                                            class="" alt="">
                                                                    </div>

                                                                    <div
                                                                        class="d-flex justify-content-start flex-column">
                                                                        <a href="#"
                                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">9
                                                                            Degree</a>
                                                                        <span
                                                                            class="text-gray-500 fw-semibold d-block fs-7">Savannah
                                                                            Nguyen</span>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <span class="text-gray-600 fw-bold fs-6">$183,300</span>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <!--begin::Label-->
                                                                <span class="badge badge-light-danger fs-base">
                                                                    <i
                                                                        class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span></i>
                                                                    0.4%
                                                                </span>
                                                                <!--end::Label-->

                                                            </td>

                                                            <td class="text-end pe-12">
                                                                <span
                                                                    class="badge py-3 px-4 fs-7 badge-light-primary">In
                                                                    Process</span>
                                                            </td>

                                                            <td class="text-end pe-0">
                                                                <div id="kt_table_widget_14_chart_5"
                                                                    class="h-50px mt-n8 pe-7"
                                                                    data-kt-chart-color="danger"
                                                                    style="min-height: 50px;">
                                                                    <div id="apexchartsy83ad1s5"
                                                                        class="apexcharts-canvas apexchartsy83ad1s5 apexcharts-theme-"
                                                                        style="width: 92.25px; height: 50px;"><svg
                                                                            id="SvgjsSvg5675" width="92.25" height="50"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xmlns:svgjs="http://svgjs.dev"
                                                                            class="apexcharts-svg"
                                                                            xmlns:data="ApexChartsNS"
                                                                            transform="translate(0, 0)">
                                                                            <foreignObject x="0" y="0" width="92.25"
                                                                                height="50">
                                                                                <div class="apexcharts-legend"
                                                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                                                    style="max-height: 25px;"></div>
                                                                                <style type="text/css">
                                                                                    .apexcharts-flip-y {
                                                                                        transform: scaleY(-1) translateY(-100%);
                                                                                        transform-origin: top;
                                                                                        transform-box: fill-box;
                                                                                    }

                                                                                    .apexcharts-flip-x {
                                                                                        transform: scaleX(-1);
                                                                                        transform-origin: center;
                                                                                        transform-box: fill-box;
                                                                                    }

                                                                                    .apexcharts-legend {
                                                                                        display: flex;
                                                                                        overflow: auto;
                                                                                        padding: 0 10px;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom,
                                                                                    .apexcharts-legend.apx-legend-position-top {
                                                                                        flex-wrap: wrap
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                                        flex-direction: column;
                                                                                        bottom: 0;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                                    .apexcharts-legend.apx-legend-position-right,
                                                                                    .apexcharts-legend.apx-legend-position-left {
                                                                                        justify-content: flex-start;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                                        justify-content: center;
                                                                                    }

                                                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                                        justify-content: flex-end;
                                                                                    }

                                                                                    .apexcharts-legend-series {
                                                                                        cursor: pointer;
                                                                                        line-height: normal;
                                                                                        display: flex;
                                                                                        align-items: center;
                                                                                    }

                                                                                    .apexcharts-legend-text {
                                                                                        position: relative;
                                                                                        font-size: 14px;
                                                                                    }

                                                                                    .apexcharts-legend-text *,
                                                                                    .apexcharts-legend-marker * {
                                                                                        pointer-events: none;
                                                                                    }

                                                                                    .apexcharts-legend-marker {
                                                                                        position: relative;
                                                                                        display: flex;
                                                                                        align-items: center;
                                                                                        justify-content: center;
                                                                                        cursor: pointer;
                                                                                        margin-right: 1px;
                                                                                    }

                                                                                    .apexcharts-legend-series.apexcharts-no-click {
                                                                                        cursor: auto;
                                                                                    }

                                                                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                                                                        display: none !important;
                                                                                    }

                                                                                    .apexcharts-inactive-legend {
                                                                                        opacity: 0.45;
                                                                                    }
                                                                                </style>
                                                                            </foreignObject>
                                                                            <g id="SvgjsG5683"
                                                                                class="apexcharts-datalabels-group"
                                                                                transform="translate(0, 0) scale(1)">
                                                                            </g>
                                                                            <g id="SvgjsG5684"
                                                                                class="apexcharts-datalabels-group"
                                                                                transform="translate(0, 0) scale(1)">
                                                                            </g>
                                                                            <g id="SvgjsG5718" class="apexcharts-yaxis"
                                                                                rel="0" transform="translate(-18, 0)">
                                                                            </g>
                                                                            <g id="SvgjsG5677"
                                                                                class="apexcharts-inner apexcharts-graphical"
                                                                                transform="translate(0, 1)">
                                                                                <defs id="SvgjsDefs5676">
                                                                                    <clipPath id="gridRectMasky83ad1s5">
                                                                                        <rect id="SvgjsRect5680"
                                                                                            width="92.25" height="48"
                                                                                            x="0" y="0" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="gridRectBarMasky83ad1s5">
                                                                                        <rect id="SvgjsRect5681"
                                                                                            width="98.25" height="54"
                                                                                            x="-3" y="-3" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="gridRectMarkerMasky83ad1s5">
                                                                                        <rect id="SvgjsRect5682"
                                                                                            width="92.25" height="48"
                                                                                            x="0" y="0" rx="0" ry="0"
                                                                                            opacity="1" stroke-width="0"
                                                                                            stroke="none"
                                                                                            stroke-dasharray="0"
                                                                                            fill="#fff"></rect>
                                                                                    </clipPath>
                                                                                    <clipPath id="forecastMasky83ad1s5">
                                                                                    </clipPath>
                                                                                    <clipPath
                                                                                        id="nonForecastMasky83ad1s5">
                                                                                    </clipPath>
                                                                                </defs>
                                                                                <g id="SvgjsG5691"
                                                                                    class="apexcharts-grid">
                                                                                    <g id="SvgjsG5692"
                                                                                        class="apexcharts-gridlines-horizontal"
                                                                                        style="display: none;">
                                                                                        <line id="SvgjsLine5695" x1="0"
                                                                                            y1="0" x2="92.25" y2="0"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                        <line id="SvgjsLine5696" x1="0"
                                                                                            y1="24" x2="92.25" y2="24"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                        <line id="SvgjsLine5697" x1="0"
                                                                                            y1="48" x2="92.25" y2="48"
                                                                                            stroke="#e0e0e0"
                                                                                            stroke-dasharray="0"
                                                                                            stroke-linecap="butt"
                                                                                            class="apexcharts-gridline">
                                                                                        </line>
                                                                                    </g>
                                                                                    <g id="SvgjsG5693"
                                                                                        class="apexcharts-gridlines-vertical"
                                                                                        style="display: none;"></g>
                                                                                    <line id="SvgjsLine5699" x1="0"
                                                                                        y1="48" x2="92.25" y2="48"
                                                                                        stroke="transparent"
                                                                                        stroke-dasharray="0"
                                                                                        stroke-linecap="butt"></line>
                                                                                    <line id="SvgjsLine5698" x1="0"
                                                                                        y1="1" x2="0" y2="48"
                                                                                        stroke="transparent"
                                                                                        stroke-dasharray="0"
                                                                                        stroke-linecap="butt"></line>
                                                                                </g>
                                                                                <g id="SvgjsG5694"
                                                                                    class="apexcharts-grid-borders"
                                                                                    style="display: none;"></g>
                                                                                <g id="SvgjsG5685"
                                                                                    class="apexcharts-area-series apexcharts-plot-series">
                                                                                    <g id="SvgjsG5686"
                                                                                        class="apexcharts-series"
                                                                                        zIndex="0"
                                                                                        seriesName="NetxProfit"
                                                                                        data:longestSeries="true"
                                                                                        rel="1" data:realIndex="0">
                                                                                        <path id="SvgjsPath5689"
                                                                                            d="M 0 45.6C 2.483653846153846 45.6 4.612500000000001 29.6 7.096153846153847 29.6C 9.579807692307693 29.6 11.708653846153847 47.2 14.192307692307693 47.2C 16.67596153846154 47.2 18.804807692307694 32.8 21.28846153846154 32.8C 23.772115384615386 32.8 25.90096153846154 45.6 28.384615384615387 45.6C 30.868269230769233 45.6 32.997115384615384 34.4 35.48076923076923 34.4C 37.96442307692308 34.4 40.09326923076924 45.6 42.57692307692308 45.6C 45.06057692307692 45.6 47.18942307692308 40.8 49.67307692307693 40.8C 52.156730769230776 40.8 54.28557692307693 28 56.769230769230774 28C 59.252884615384616 28 61.38173076923077 44.8 63.86538461538462 44.8C 66.34903846153847 44.8 68.47788461538462 46.4 70.96153846153847 46.4C 73.44519230769231 46.4 75.57403846153846 33.6 78.0576923076923 33.6C 80.54134615384615 33.6 82.67019230769232 28 85.15384615384616 28C 87.6375 28 89.76634615384616 45.6 92.25 45.6C 92.25 45.6 92.25 45.6 92.25 48 L 0 48z"
                                                                                            fill="rgba(255,255,255,1)"
                                                                                            fill-opacity="1"
                                                                                            stroke-opacity="1"
                                                                                            stroke-linecap="butt"
                                                                                            stroke-width="0"
                                                                                            stroke-dasharray="0"
                                                                                            class="apexcharts-area"
                                                                                            index="0"
                                                                                            clip-path="url(#gridRectMasky83ad1s5)"
                                                                                            pathTo="M 0 45.6C 2.483653846153846 45.6 4.612500000000001 29.6 7.096153846153847 29.6C 9.579807692307693 29.6 11.708653846153847 47.2 14.192307692307693 47.2C 16.67596153846154 47.2 18.804807692307694 32.8 21.28846153846154 32.8C 23.772115384615386 32.8 25.90096153846154 45.6 28.384615384615387 45.6C 30.868269230769233 45.6 32.997115384615384 34.4 35.48076923076923 34.4C 37.96442307692308 34.4 40.09326923076924 45.6 42.57692307692308 45.6C 45.06057692307692 45.6 47.18942307692308 40.8 49.67307692307693 40.8C 52.156730769230776 40.8 54.28557692307693 28 56.769230769230774 28C 59.252884615384616 28 61.38173076923077 44.8 63.86538461538462 44.8C 66.34903846153847 44.8 68.47788461538462 46.4 70.96153846153847 46.4C 73.44519230769231 46.4 75.57403846153846 33.6 78.0576923076923 33.6C 80.54134615384615 33.6 82.67019230769232 28 85.15384615384616 28C 87.6375 28 89.76634615384616 45.6 92.25 45.6C 92.25 45.6 92.25 45.6 92.25 48 L 0 48z"
                                                                                            pathFrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48z">
                                                                                        </path>
                                                                                        <path id="SvgjsPath5690"
                                                                                            d="M 0 45.6C 2.483653846153846 45.6 4.612500000000001 29.6 7.096153846153847 29.6C 9.579807692307693 29.6 11.708653846153847 47.2 14.192307692307693 47.2C 16.67596153846154 47.2 18.804807692307694 32.8 21.28846153846154 32.8C 23.772115384615386 32.8 25.90096153846154 45.6 28.384615384615387 45.6C 30.868269230769233 45.6 32.997115384615384 34.4 35.48076923076923 34.4C 37.96442307692308 34.4 40.09326923076924 45.6 42.57692307692308 45.6C 45.06057692307692 45.6 47.18942307692308 40.8 49.67307692307693 40.8C 52.156730769230776 40.8 54.28557692307693 28 56.769230769230774 28C 59.252884615384616 28 61.38173076923077 44.8 63.86538461538462 44.8C 66.34903846153847 44.8 68.47788461538462 46.4 70.96153846153847 46.4C 73.44519230769231 46.4 75.57403846153846 33.6 78.0576923076923 33.6C 80.54134615384615 33.6 82.67019230769232 28 85.15384615384616 28C 87.6375 28 89.76634615384616 45.6 92.25 45.6"
                                                                                            fill="none" fill-opacity="1"
                                                                                            stroke="#f8285a"
                                                                                            stroke-opacity="1"
                                                                                            stroke-linecap="butt"
                                                                                            stroke-width="2"
                                                                                            stroke-dasharray="0"
                                                                                            class="apexcharts-area"
                                                                                            index="0"
                                                                                            clip-path="url(#gridRectMasky83ad1s5)"
                                                                                            pathTo="M 0 45.6C 2.483653846153846 45.6 4.612500000000001 29.6 7.096153846153847 29.6C 9.579807692307693 29.6 11.708653846153847 47.2 14.192307692307693 47.2C 16.67596153846154 47.2 18.804807692307694 32.8 21.28846153846154 32.8C 23.772115384615386 32.8 25.90096153846154 45.6 28.384615384615387 45.6C 30.868269230769233 45.6 32.997115384615384 34.4 35.48076923076923 34.4C 37.96442307692308 34.4 40.09326923076924 45.6 42.57692307692308 45.6C 45.06057692307692 45.6 47.18942307692308 40.8 49.67307692307693 40.8C 52.156730769230776 40.8 54.28557692307693 28 56.769230769230774 28C 59.252884615384616 28 61.38173076923077 44.8 63.86538461538462 44.8C 66.34903846153847 44.8 68.47788461538462 46.4 70.96153846153847 46.4C 73.44519230769231 46.4 75.57403846153846 33.6 78.0576923076923 33.6C 80.54134615384615 33.6 82.67019230769232 28 85.15384615384616 28C 87.6375 28 89.76634615384616 45.6 92.25 45.6"
                                                                                            pathFrom="M 0 48 L 0 48 L 7.096153846153847 48 L 14.192307692307693 48 L 21.28846153846154 48 L 28.384615384615387 48 L 35.48076923076923 48 L 42.57692307692308 48 L 49.67307692307693 48 L 56.769230769230774 48 L 63.86538461538462 48 L 70.96153846153847 48 L 78.0576923076923 48 L 85.15384615384616 48 L 92.25 48"
                                                                                            fill-rule="evenodd"></path>
                                                                                        <g id="SvgjsG5687"
                                                                                            class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                                            data:realIndex="0"></g>
                                                                                    </g>
                                                                                    <g id="SvgjsG5688"
                                                                                        class="apexcharts-datalabels"
                                                                                        data:realIndex="0"></g>
                                                                                </g>
                                                                                <line id="SvgjsLine5700" x1="0" y1="0"
                                                                                    x2="92.25" y2="0" stroke="#b6b6b6"
                                                                                    stroke-dasharray="0"
                                                                                    stroke-width="1"
                                                                                    stroke-linecap="butt"
                                                                                    class="apexcharts-ycrosshairs">
                                                                                </line>
                                                                                <line id="SvgjsLine5701" x1="0" y1="0"
                                                                                    x2="92.25" y2="0"
                                                                                    stroke-dasharray="0"
                                                                                    stroke-width="0"
                                                                                    stroke-linecap="butt"
                                                                                    class="apexcharts-ycrosshairs-hidden">
                                                                                </line>
                                                                                <g id="SvgjsG5702"
                                                                                    class="apexcharts-xaxis"
                                                                                    transform="translate(0, 0)">
                                                                                    <g id="SvgjsG5703"
                                                                                        class="apexcharts-xaxis-texts-g"
                                                                                        transform="translate(0, 4)"></g>
                                                                                </g>
                                                                                <g id="SvgjsG5719"
                                                                                    class="apexcharts-yaxis-annotations">
                                                                                </g>
                                                                                <g id="SvgjsG5720"
                                                                                    class="apexcharts-xaxis-annotations">
                                                                                </g>
                                                                                <g id="SvgjsG5721"
                                                                                    class="apexcharts-point-annotations">
                                                                                </g>
                                                                            </g>
                                                                        </svg></div>
                                                                </div>
                                                            </td>

                                                            <td class="text-end">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                                    <i
                                                                        class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                        </div>
                                        <!--end: Card Body-->
                                    </div>
                                    <!--end::Table widget 14-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

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

    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{ asset('')}}";        </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->

    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('js/custom/widgets.js') }}"></script>
    <script src="{{ asset('js/custom/apps/chat/chat.js') }}"></script>
    {{--
    <script src="{{ asset('js/custom/apps/user-management/users/list/table.js') }}"></script> --}}
    <script src="{{ asset('js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/new-target.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

    <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>
    <div class="daterangepicker ltr show-ranges opensleft">
        <div class="ranges">
            <ul>
                <li data-range-key="Today">Today</li>
                <li data-range-key="Yesterday">Yesterday</li>
                <li data-range-key="Last 7 Days">Last 7 Days</li>
                <li data-range-key="Last 30 Days">Last 30 Days</li>
                <li data-range-key="This Month">This Month</li>
                <li data-range-key="Last Month">Last Month</li>
                <li data-range-key="Custom Range">Custom Range</li>
            </ul>
        </div>
        <div class="drp-calendar left">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-calendar right">
            <div class="calendar-table"></div>
            <div class="calendar-time" style="display: none;"></div>
        </div>
        <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default"
                type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled"
                type="button">Apply</button> </div>
    </div>
    <div class="flatpickr-calendar hasTime animate" tabindex="-1">
        <div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                    <g></g>
                    <path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z">
                    </path>
                </svg></span>
            <div class="flatpickr-month">
                <div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month"
                        tabindex="-1">
                        <option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option>
                        <option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option>
                        <option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option>
                        <option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option>
                        <option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option>
                        <option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option>
                        <option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option>
                        <option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option>
                        <option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option>
                        <option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option>
                        <option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option>
                        <option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option>
                    </select>
                    <div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1"
                            aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div>
                </div>
            </div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                    <g></g>
                    <path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z">
                    </path>
                </svg></span>
        </div>
        <div class="flatpickr-innerContainer">
            <div class="flatpickr-rContainer">
                <div class="flatpickr-weekdays">
                    <div class="flatpickr-weekdaycontainer">
                        <span class="flatpickr-weekday">
                            Sun</span><span class="flatpickr-weekday">Mon</span><span
                            class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span
                            class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span
                            class="flatpickr-weekday">Sat
                        </span>
                    </div>
                </div>
                <div class="flatpickr-days" tabindex="-1">
                    <div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="July 27, 2025"
                            tabindex="-1">27</span><span class="flatpickr-day prevMonthDay" aria-label="July 28, 2025"
                            tabindex="-1">28</span><span class="flatpickr-day prevMonthDay" aria-label="July 29, 2025"
                            tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="July 30, 2025"
                            tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="July 31, 2025"
                            tabindex="-1">31</span><span class="flatpickr-day" aria-label="August 1, 2025"
                            tabindex="-1">1</span><span class="flatpickr-day" aria-label="August 2, 2025"
                            tabindex="-1">2</span><span class="flatpickr-day" aria-label="August 3, 2025"
                            tabindex="-1">3</span><span class="flatpickr-day" aria-label="August 4, 2025"
                            tabindex="-1">4</span><span class="flatpickr-day" aria-label="August 5, 2025"
                            tabindex="-1">5</span><span class="flatpickr-day" aria-label="August 6, 2025"
                            tabindex="-1">6</span><span class="flatpickr-day" aria-label="August 7, 2025"
                            tabindex="-1">7</span><span class="flatpickr-day" aria-label="August 8, 2025"
                            tabindex="-1">8</span><span class="flatpickr-day" aria-label="August 9, 2025"
                            tabindex="-1">9</span><span class="flatpickr-day" aria-label="August 10, 2025"
                            tabindex="-1">10</span><span class="flatpickr-day" aria-label="August 11, 2025"
                            tabindex="-1">11</span><span class="flatpickr-day" aria-label="August 12, 2025"
                            tabindex="-1">12</span><span class="flatpickr-day" aria-label="August 13, 2025"
                            tabindex="-1">13</span><span class="flatpickr-day" aria-label="August 14, 2025"
                            tabindex="-1">14</span><span class="flatpickr-day" aria-label="August 15, 2025"
                            tabindex="-1">15</span><span class="flatpickr-day" aria-label="August 16, 2025"
                            tabindex="-1">16</span><span class="flatpickr-day" aria-label="August 17, 2025"
                            tabindex="-1">17</span><span class="flatpickr-day" aria-label="August 18, 2025"
                            tabindex="-1">18</span><span class="flatpickr-day" aria-label="August 19, 2025"
                            tabindex="-1">19</span><span class="flatpickr-day" aria-label="August 20, 2025"
                            tabindex="-1">20</span><span class="flatpickr-day" aria-label="August 21, 2025"
                            tabindex="-1">21</span><span class="flatpickr-day" aria-label="August 22, 2025"
                            tabindex="-1">22</span><span class="flatpickr-day" aria-label="August 23, 2025"
                            tabindex="-1">23</span><span class="flatpickr-day" aria-label="August 24, 2025"
                            tabindex="-1">24</span><span class="flatpickr-day" aria-label="August 25, 2025"
                            tabindex="-1">25</span><span class="flatpickr-day today" aria-label="August 26, 2025"
                            aria-current="date" tabindex="-1">26</span><span class="flatpickr-day"
                            aria-label="August 27, 2025" tabindex="-1">27</span><span class="flatpickr-day"
                            aria-label="August 28, 2025" tabindex="-1">28</span><span class="flatpickr-day"
                            aria-label="August 29, 2025" tabindex="-1">29</span><span class="flatpickr-day"
                            aria-label="August 30, 2025" tabindex="-1">30</span><span class="flatpickr-day"
                            aria-label="August 31, 2025" tabindex="-1">31</span><span class="flatpickr-day nextMonthDay"
                            aria-label="September 1, 2025" tabindex="-1">1</span><span
                            class="flatpickr-day nextMonthDay" aria-label="September 2, 2025"
                            tabindex="-1">2</span><span class="flatpickr-day nextMonthDay"
                            aria-label="September 3, 2025" tabindex="-1">3</span><span
                            class="flatpickr-day nextMonthDay" aria-label="September 4, 2025"
                            tabindex="-1">4</span><span class="flatpickr-day nextMonthDay"
                            aria-label="September 5, 2025" tabindex="-1">5</span><span
                            class="flatpickr-day nextMonthDay" aria-label="September 6, 2025" tabindex="-1">6</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flatpickr-time" tabindex="-1">
            <div class="numInputWrapper"><input class="numInput flatpickr-hour" type="number" aria-label="Hour"
                    tabindex="-1" step="1" min="1" max="12" maxlength="2"><span class="arrowUp"></span><span
                    class="arrowDown"></span></div><span class="flatpickr-time-separator">:</span>
            <div class="numInputWrapper"><input class="numInput flatpickr-minute" type="number" aria-label="Minute"
                    tabindex="-1" step="5" min="0" max="59" maxlength="2"><span class="arrowUp"></span><span
                    class="arrowDown"></span></div><span class="flatpickr-am-pm" title="Click to toggle"
                tabindex="-1">PM</span>
        </div>
    </div>
</body><!--end::Body-->

</html>
