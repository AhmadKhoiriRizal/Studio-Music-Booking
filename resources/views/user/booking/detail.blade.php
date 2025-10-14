<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Studio - {{ $studio->name ?? 'Studio' }}</title>

    @include('user.layout.metadata')

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

        /* Equipment list */
        .equipment-list {
            max-height: 200px;
            overflow-y: auto;
        }

        .equipment-item {
            padding: 0.5rem 0;
            border-bottom: 1px solid #eee;
        }

        .equipment-item:last-child {
            border-bottom: none;
        }

        /* Carousel styling */
        .carousel-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .carousel-placeholder {
            width: 100%;
            height: 400px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 1.5rem;
        }

        /* Booking info */
        .booking-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
        }

        .price-display {
            font-size: 1.5rem;
            font-weight: 700;
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
                @include('user.layout.header')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Header Section-->

        <!--begin::Content Section-->
        <div class="py-10">
            <!--begin::Container-->
            <div class="container">
                <!-- Main Content -->
                <main class="container main-section">
                    @if(isset($studio))
                    <!-- Breadcrumb -->
                    {{-- <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.booking.index') }}">Booking</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $studio->name }}</li>
                        </ol>
                    </nav> --}}

                    <div class="row justify-content-center">
                        <!-- Image Carousel -->
                        <div class="col-lg-8 mb-4">
                            <div id="packageCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @if($studio->foto)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/' . $studio->foto) }}"
                                             class="carousel-image"
                                             alt="{{ $studio->name }}">
                                    </div>
                                    @else
                                    <!-- Default images if no studio photo -->
                                    <div class="carousel-item active">
                                        <div class="carousel-placeholder">
                                            <i class="bi bi-camera fs-1"></i>
                                            <span class="ms-2">Studio Image</span>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="carousel-placeholder">
                                            <i class="bi bi-music-note-list fs-1"></i>
                                            <span class="ms-2">Equipment Preview</span>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="carousel-placeholder">
                                            <i class="bi bi-house-door fs-1"></i>
                                            <span class="ms-2">Room Overview</span>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                @if(!$studio->foto)
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
                                @endif
                            </div>
                        </div>

                        <!-- Package Info -->
                        <div class="col-lg-4 package-section">
                            <div class="booking-info">
                                <h2>{{ $studio->name }}</h2>
                                <div class="price-display mb-3">
                                    Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }} <small class="fs-6 text-muted">/jam</small>
                                </div>

                                <div class="subtitle mb-3">
                                    <i class="bi bi-tag me-2"></i>{{ ucfirst($studio->type) }} Studio
                                </div>

                                <div class="d-grid gap-2 mb-4">
                                    <a href="{{ route('user.booking.create', ['studio_id' => $studio->id]) }}"
                                       class="btn btn-success btn-lg">
                                        <i class="bi bi-calendar-check me-2"></i>Booking Sekarang
                                    </a>
                                    <a href="/" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Studio
                                    </a>
                                </div>

                                <div class="studio-details">
                                    <p><strong><i class="bi bi-people me-2"></i>Kapasitas:</strong> {{ $studio->kapasitas. ' Orang'}}</p>
                                    <p><strong><i class="bi bi-grid me-2"></i>Tipe:</strong> {{ ucfirst($studio->type) }}</p>
                                    <p><strong><i class="bi bi-info-circle me-2"></i>Status:</strong>
                                        <span class="badge {{ $studio->status == 'available' ? 'bg-success' : 'bg-warning' }}">
                                            {{ $studio->status == 'available' ? 'Tersedia' : 'Maintenance' }}
                                        </span>
                                    </p>
                                    <p><strong><i class="bi bi-clock me-2"></i>Durasi Booking:</strong>
                                        {{ $studio->min_booking_hours }} - {{ $studio->max_booking_hours }} jam
                                    </p>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h5><i class="bi bi-tools me-2"></i>Equipment Tersedia:</h5>
                                <div class="equipment-list">
                                    @forelse($studio->equipment as $equipment)
                                    <div class="equipment-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $equipment->name }}</strong>
                                                @if($equipment->category)
                                                <br><small class="text-muted">{{ $equipment->category }}</small>
                                                @endif
                                            </div>
                                            <span class="badge bg-primary">{{ $equipment->pivot->quantity }} unit</span>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="equipment-item text-muted text-center">
                                        <i class="bi bi-inbox me-2"></i>
                                        Tidak ada equipment tersedia
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabs for Description and Equipment -->
                    <ul class="nav nav-tabs justify-content-center mt-5" id="descReviewTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">
                                <i class="bi bi-file-text me-2"></i>Deskripsi
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="equipment-tab" data-bs-toggle="tab" data-bs-target="#equipment"
                                type="button" role="tab" aria-controls="equipment" aria-selected="false">
                                <i class="bi bi-tools me-2"></i>Detail Equipment
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="terms-tab" data-bs-toggle="tab" data-bs-target="#terms"
                                type="button" role="tab" aria-controls="terms" aria-selected="false">
                                <i class="bi bi-shield-check me-2"></i>Syarat & Ketentuan
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="descReviewTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5>Deskripsi Studio</h5>
                                    <p class="lead">{{ $studio->description ?? 'Studio profesional dengan peralatan lengkap untuk latihan band dan rekaman. Ruangan yang nyaman dengan akustik yang baik, dilengkapi dengan peralatan musik berkualitas tinggi.' }}</p>

                                    <h5 class="mt-4"><i class="bi bi-star me-2"></i>Fasilitas Utama</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li><i class="bi bi-check-circle text-success me-2"></i>Ruang soundproof profesional</li>
                                                <li><i class="bi bi-check-circle text-success me-2"></i>Akustik teroptimasi</li>
                                                <li><i class="bi bi-check-circle text-success me-2"></i>Peralatan musik lengkap</li>
                                                <li><i class="bi bi-check-circle text-success me-2"></i>Monitoring system</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li><i class="bi bi-check-circle text-success me-2"></i>Area istirahat nyaman</li>
                                                <li><i class="bi bi-check-circle text-success me-2"></i>Free WiFi</li>
                                                <li><i class="bi bi-check-circle text-success me-2"></i>Parkir aman</li>
                                                <li><i class="bi bi-check-circle text-success me-2"></i>Toilet bersih</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header align-items-center bg-primary text-white">
                                            <h6 class="mb-0 text-white"><i class="bi bi-info-circle me-2 text-white"></i>Informasi Booking</h6>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Tipe Studio:</strong><br>{{ ucfirst($studio->type) }}</p>
                                            <p><strong>Kapasitas Maksimal:</strong><br>{{ $studio->kapasitas }}</p>
                                            <p><strong>Harga per Jam:</strong><br>Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}</p>
                                            <p><strong>Minimal Booking:</strong><br>{{ $studio->min_booking_hours }} jam</p>
                                            <p><strong>Maksimal Booking:</strong><br>{{ $studio->max_booking_hours }} jam</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="equipment" role="tabpanel" aria-labelledby="equipment-tab">
                            <h5>Detail Peralatan Studio</h5>
                            <div class="row">
                                @forelse($studio->equipment as $equipment)
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <i class="bi bi-gear me-2"></i>{{ $equipment->name }}
                                            </h6>
                                            <div class="mb-2">
                                                <span class="badge bg-primary">Quantity: {{ $equipment->pivot->quantity }}</span>
                                                @if($equipment->category)
                                                <span class="badge bg-secondary ms-1">{{ $equipment->category }}</span>
                                                @endif
                                            </div>
                                            @if($equipment->description)
                                            <p class="card-text small text-muted">{{ $equipment->description }}</p>
                                            @else
                                            <p class="card-text small text-muted">Peralatan standar studio</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="alert alert-info text-center">
                                        <i class="bi bi-info-circle me-2"></i>
                                        Tidak ada equipment yang tersedia untuk studio ini.
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="tab-pane fade" id="terms" role="tabpanel" aria-labelledby="terms-tab">
                            <h5>Syarat & Ketentuan Booking</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header align-items-center">
                                            <h6 class="mb-0">Persyaratan Umum</h6>
                                        </div>
                                        <div class="card-body">
                                            <ul>
                                                <li>Booking minimal {{ $studio->min_booking_hours }} jam</li>
                                                <li>DP 50% untuk booking lebih dari 4 jam</li>
                                                <li>Show ID card/KTP saat check-in</li>
                                                <li>Dilarang membawa makanan dan minuman ke dalam studio</li>
                                                <li>Dilarang merokok di dalam studio</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header align-items-center">
                                            <h6 class="mb-0">Kebijakan Pembatalan</h6>
                                        </div>
                                        <div class="card-body">
                                            <ul>
                                                <li>Pembatalan 24 jam sebelum booking: DP dikembalikan 100%</li>
                                                <li>Pembatalan 12 jam sebelum booking: DP dikembalikan 50%</li>
                                                <li>Pembatalan kurang dari 12 jam: DP hangus</li>
                                                <li>No show: DP hangus dan dikenakan denda</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <!-- Studio not found -->
                    <div class="text-center py-10">
                        <i class="bi bi-exclamation-triangle fs-1 text-danger mb-3"></i>
                        <h4 class="text-danger">Studio tidak ditemukan</h4>
                        <p class="text-muted">Studio yang Anda cari tidak tersedia atau telah dihapus.</p>
                        <a href="/" class="btn btn-primary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Studio
                        </a>
                    </div>
                    @endif
                </main>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Content Section-->

        <!--begin::Footer Section-->
        <div class="mb-0">
            <!--begin::Wrapper-->
            <div class="landing-dark-bg">
                @include('user.layout.footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Footer Section-->
    </div>
    <!--end::Root-->

    @include('user.layout.script')
</body>

</html>
