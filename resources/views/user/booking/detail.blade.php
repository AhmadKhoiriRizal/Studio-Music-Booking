<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PENDAFTARAN ANGGOTA BARU SAKA BHAYANGKARA POLSEK MAYONG</title>

    @include('user.template.metadata')
    {{-- <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets--> --}}

    <style>
        /* Main content styling */
        .main-section {
            padding: 3rem 1rem;
        }

        .package-section {
            padding-left: 2rem;
        }

        .package-section h2 {
            font-weight: 700;
            font-size: 1.75rem;
        }

        .package-section h3 {
            font-weight: 500;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .package-section .subtitle {
            font-weight: 600;
            margin-bottom: 1rem;
        }

        /* Quantity input */
        .quantity-input {
            width: 2.5rem;
            text-align: center;
            font-weight: 600;
        }

        .quantity-btn {
            width: 2.5rem;
            height: 2.5rem;
            font-weight: 700;
            border: 1px solid #00aaff;
            color: #00aaff;
            background: transparent;
            cursor: pointer;
            user-select: none;
        }

        .quantity-btn:hover {
            background-color: #e0f3ff;
        }

        /* Booking Button */
        .btn-booking {
            margin-left: 1rem;
            border: 1px solid #00aaff;
            color: #00aaff;
            background: transparent;
            font-weight: 600;
            padding: 0.4rem 1rem;
        }

        .btn-booking:hover {
            background-color: #00aaff;
            color: white;
        }

        /* Description tabs */
        .nav-tabs .nav-link {
            font-weight: 600;
            color: #000;
        }

        .nav-tabs .nav-link.active {
            border-bottom: 2px solid #00aaff;
            color: #00aaff;
        }
    </style>
</head>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank"
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
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Header Section-->
        <div class="mb-0" id="home">
            <!--begin::Wrapper-->
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg">
                @include('user.template.header')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Header Section-->

        <!--begin::Content Section-->
        <div class="py-20">
            <!--begin::Container-->
            <div class="container">
                <!-- Main Content -->
                <main class="container main-section">
                    <div class="row justify-content-center">
                        <!-- Image Carousel (placeholder) -->
                        <div class="col-lg-8 mb-4">
                            <div id="packageCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" style="height:400px; background:#ddd;">
                                    <div class="carousel-item active d-flex justify-content-center align-items-center">
                                        <!-- Placeholder image -->
                                        <span style="font-size: 2rem; color: #777;">Image Placeholder</span>
                                    </div>
                                    <div class="carousel-item d-flex justify-content-center align-items-center">
                                        <span style="font-size: 2rem; color: #777;">Image 2</span>
                                    </div>
                                    <div class="carousel-item d-flex justify-content-center align-items-center">
                                        <span style="font-size: 2rem; color: #777;">Image 3</span>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#packageCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"
                                        aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#packageCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon bg-dark rounded-circle p-2"
                                        aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                <button class="btn btn-sm btn-outline-dark position-absolute bottom-0 end-0 m-3"
                                    title="Fullscreen">
                                    <i class="bi bi-arrows-fullscreen"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Package Info -->
                        <div class="col-lg-4 package-section">
                            <h2>Paket</h2>
                            <h3>Harga</h3>
                            <div class="subtitle">Subtitle</div>

                            <div class="d-flex align-items-center mb-3">
                                <button class="quantity-btn" id="btn-minus">−</button>
                                <input type="text" value="1" readonly class="quantity-input mx-1" id="quantityInput" />
                                <button class="quantity-btn" id="btn-plus">+</button>
                                <button class="btn btn-success mx-1"><a href="/booking" class="text-white"
                                        style="text-decoration: none">Booking</a></button>
                            </div>

                            <p><strong>Ukuran Ruangan:</strong> meter x meter</p>
                            <p><strong>Nama Paket:</strong> Paket</p>

                            <p><strong>Alat yang didapatkan:</strong></p>
                            <ol>
                                <li>Alat 1</li>
                                <li>Alat 2</li>
                                <li>Alat 3</li>
                                <li>Alat 4</li>
                                <li>dst.</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Tabs for Description and Reviews -->
                    <ul class="nav nav-tabs justify-content-center mt-5" id="descReviewTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews
                                (5)</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="descReviewTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <p>Deskripsi paket</p>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <p>5 Reviews content will be here...</p>
                        </div>
                    </div>
                </main>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Content Section-->

        <!--begin::Footer Section-->
        <div class="mb-0">
            {{-- <!--begin::Curve top-->
            <div class="landing-curve landing-dark-color ">
                <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <!--end::Curve top--> --}}

            <!--begin::Wrapper-->
            <div class="landing-dark-bg">
                @include('user.template.footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Footer Section-->
    </div>
    <!--end::Root-->

    @include('user.template.script')
    {{-- <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('js/custom/apps/calendar/calendar.js') }}"></script>
    <!--end::Custom Javascript--> --}}
    <script>
        const btnMinus = document.getElementById('btn-minus');
        const btnPlus = document.getElementById('btn-plus');
        const quantityInput = document.getElementById('quantityInput');

        btnMinus.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        btnPlus.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });
    </script>
</body>

</html>
