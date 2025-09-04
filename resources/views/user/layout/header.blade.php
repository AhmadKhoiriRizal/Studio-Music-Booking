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
                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                    <i class="ki-duotone ki-abstract-14 fs-2hx"><span class="path1"></span><span
                            class="path2"></span></i> </button>
                <!--end::Mobile menu toggle-->

                <!--begin::Logo image-->
                <a href="{{ url('/') }}">
                    <img alt="Logo" src="{{ asset('media/studio/logostudio.png') }}" class="logo-default"
                        style="height: 70px;">

                    <img alt="Logo" src="{{ asset('media/studio/logostudio.png') }}" class="logo-sticky"
                        style="height: 50px;">
                </a>

                <!--end::Logo image-->
            </div>
            <!--end::Logo-->

            <!--begin::Menu wrapper-->
            <div class="d-lg-block" id="kt_header_nav_wrapper">
                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}" style="">

                    <!--begin::Menu-->
                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                        id="kt_landing_menu">
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="/"
                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                Beranda </a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="/"
                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                Tentang Kami </a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="/"
                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                Paket Favorit </a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="/" data-kt-scroll-toggle="true"
                                data-kt-drawer-dismiss="true">
                                Paket </a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="/"
                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                Galeri </a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="/"
                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                Testimoni </a>
                            <!--end::Menu link-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <!--begin::Menu link-->
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="/riwayat-booking"
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
                <a href="/signin"
                    class="btn btn-success">Login</a>
                <a href="/signup"
                    class="btn btn-success">Register</a>
            </div>
            <!--end::Toolbar-->

        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
