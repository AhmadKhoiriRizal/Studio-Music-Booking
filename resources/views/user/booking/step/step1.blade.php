<!-- Step 1: Data Diri -->

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

<div class="step active" data-step="1" id="step-1">
    <h4 class="mb-4 text-primary">Detail Paket</h4>

    <!-- Main Content -->
    <main class="container main-section py-10">
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

                    {{-- <div class="d-grid gap-2 mb-4">
                        <a href="/"
                            class="btn btn-success btn-lg">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Studio
                        </a>
                        <a href="/" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Studio
                        </a>
                    </div> --}}

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
            </div>
        </div>

        <h5>Detail Peralatan Studio:</h5>
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
    </main>

    <!-- Summary Section -->
    <div class="d-flex flex-stack rounded-3 p-6 gap-3 mt-6 summary">
                <div class="d-flex flex-stack bg-primary rounded-3 p-6 w-100" style="height: -webkit-fill-available; align-items: flex-start;">
            <!--begin::Content-->
            <div class="fs-6 fw-bold text-white summary-font">
                <span class="d-block lh-1 mb-2">Nama User</span>
                <span class="d-block mb-2">Nomer Handphone</span>
                <span class="d-block mb-2">Nama Studio</span>
                <span class="d-block mb-2">Tipe</span>
                <span class="d-block mb-2">Kapasitas</span>
                <span class="d-block mb-2">Equipment</span>
            </div>
            <!--end::Content-->

            <!--begin::Content-->
            <div class="fs-6 fw-bold text-white summary-font">
                <span class="d-block lh-1 mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
            </div>
            <!--end::Content-->

            <!--begin::Content-->
            <div class="fs-6 fw-bold text-white summary-font text-end">
                <span class="d-block lh-1 mb-2" id="summary-studio-name">{{ $currentUser->name }}</span>
                <span class="d-block mb-2" id="summary-studio-type">{{ $currentUser->phone }}</span>
                <span class="d-block mb-2" id="summary-studio-type">{{ $studio->name }}</span>
                <span class="d-block mb-2" id="summary-studio-type">{{ ucfirst($studio->type) }}</span>
                <span class="d-block mb-2" id="summary-studio-capacity">{{ $studio->kapasitas }} Orang</span>
                <span class="d-block mb-2" id="summary-studio-equipment">
                    @if($studio->equipment->count() > 0)
                        <span class="equipment-tooltip-trigger"
                            data-bs-toggle="tooltip"
                            data-bs-html="true"
                            data-bs-custom-class="equipment-tooltip"
                            data-bs-title="
                                <div class='equipment-tooltip-content'>
                                    <h6 class='mb-3'><i class='bi bi-tools me-2'></i>Equipment Tersedia</h6>
                                    <div class='equipment-list'>
                                        @foreach($studio->equipment as $equipment)
                                        <div class='equipment-item d-flex justify-content-between align-items-center mb-2'>
                                            <span class='equipment-name'>{{ $equipment->name }}</span>
                                            <span class='badge bg-primary'>{{ $equipment->pivot->quantity }} unit</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            ">
                            <span class="equipment-badge">
                                <i class="bi bi-tools me-1"></i>
                                {{ $studio->equipment->count() }} Equipment
                            </span>
                        </span>
                    @else
                        <span class="text-white-50">
                            <i class="bi bi-tools me-1"></i>
                            Tidak ada equipment
                        </span>
                    @endif
                </span>
            </div>
            <!--end::Content-->
        </div>

        <div class="d-flex flex-stack bg-primary rounded-3 p-6 w-100" style="height: -webkit-fill-available; align-items: flex-start;">
            <!--begin::Content-->
            <div class="fs-6 fw-bold text-white summary-font">
                <span class="d-block lh-1 mb-2">Harga Perjam</span>
                {{-- <span class="d-block mb-2">Durasi Booking</span> --}}
                <span class="d-block mb-2">Total Pembayaran</span>
            </div>
            <!--end::Content-->

            <!--begin::Content-->
            <div class="fs-6 fw-bold text-white summary-font">
                <span class="d-block lh-1 mb-2">:</span>
                {{-- <span class="d-block mb-2">:</span> --}}
                <span class="d-block mb-2">:</span>
            </div>
            <!--end::Content-->

            <!--begin::Content-->
            <div class="fs-6 fw-bold text-white summary-font text-end">
                <span class="d-block lh-1 mb-2" >Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}</span>
                {{-- <span class="d-block mb-2" id="summary-duration">1 Jam</span> --}}
                <span class="d-block mb-2" >Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}</span>
            </div>
            <!--end::Content-->
        </div>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('user.booking.detail', ['studio_id' => $studio->id]) }}" class="btn btn-secondary">Kembali</a>
        <button type="button" class="btn btn-primary next-btn" onclick="validateStep1()">Lanjut</button>
    </div>
</div>

<script>
    // Quantity functionality
    const btnMinus = document.getElementById('btn-minus');
    const btnPlus = document.getElementById('btn-plus');
    const quantityInput = document.getElementById('quantityInput');
    const pricePerHour = {{ $studio->price_per_hour }};
    const minBookingHours = {{ $studio->min_booking_hours }};
    const maxBookingHours = {{ $studio->max_booking_hours }};

    // Set initial quantity to minimum booking hours
    quantityInput.value = minBookingHours;
    updateSummary();

    btnMinus.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > minBookingHours) {
            quantityInput.value = currentValue - 1;
            updateSummary();
        }
    });

    btnPlus.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue < maxBookingHours) {
            quantityInput.value = currentValue + 1;
            updateSummary();
        }
    });

    // Update summary based on quantity
    function updateSummary() {
        const quantity = parseInt(quantityInput.value);
        const totalPrice = pricePerHour * quantity;

        document.getElementById('summary-duration').textContent = quantity + ' Jam';
        document.getElementById('summary-total-price').textContent = 'Rp ' + formatRupiah(totalPrice);
    }

    // Format number to Rupiah
    function formatRupiah(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Validate step 1 before proceeding
    function validateStep1() {
        const quantity = parseInt(quantityInput.value);

        if (quantity < minBookingHours) {
            alert('Durasi booking minimal ' + minBookingHours + ' jam');
            return;
        }

        if (quantity > maxBookingHours) {
            alert('Durasi booking maksimal ' + maxBookingHours + ' jam');
            return;
        }

        // Store booking data for next steps
        sessionStorage.setItem('booking_data', JSON.stringify({
            studio_id: {{ $studio->id }},
            studio_name: "{{ $studio->name }}",
            studio_type: "{{ $studio->type }}",
            studio_capacity: "{{ $studio->kapasitas }}",
            price_per_hour: pricePerHour,
            duration: quantity,
            total_price: pricePerHour * quantity,
            equipment: {!! $studio->equipment->toJson() !!}
        }));

        // Proceed to next step
        goToStep(2);
    }

    // Function to navigate to next step (assuming you have this function)
    function goToStep(step) {
        // Your existing step navigation logic here
        console.log('Proceeding to step', step);
        // Example: document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
        // document.getElementById('step-' + step).classList.add('active');
    }
    // Di dalam script
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>

<style>
    .quantity-input {
        width: 3rem;
        text-align: center;
        font-weight: 600;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        padding: 0.375rem;
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
        border-radius: 0.375rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .quantity-btn:hover {
        background-color: #e0f3ff;
    }

    .quantity-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .equipment-list ol {
        padding-left: 1.5rem;
        margin-bottom: 0;
    }

    .equipment-list li {
        margin-bottom: 0.25rem;
    }
</style>
