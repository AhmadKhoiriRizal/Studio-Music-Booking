<!-- Step 3: Data Tambahan -->
<div class="step" data-step="3" id="step-3">
    <h4 class="mb-4 text-primary">Pilih Alat Tambahan</h4>

    <!--begin::Layout-->
    <div class="d-flex flex-column flex-xl-row p-6">
        <!--begin::Content-->
        <div class="d-flex flex-row-fluid me-xl-9 mb-10 mb-xl-0">
            <!--begin::Pos equipment-->
            <div class="card card-flush card-p-0 bg-transparent border-0">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Nav - Equipment Categories-->
                    <ul class="nav nav-pills d-flex justify-content-between nav-pills-custom gap-3 mb-6" id="equipment-categories">
                        <li class="nav-item mb-3 me-0">
                            <div class="d-flex align-items-center">
                                <div class="spinner-border spinner-border-sm text-primary me-2" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <span class="text-muted">Memuat kategori...</span>
                            </div>
                        </li>
                    </ul>
                    <!--end::Nav-->

                    <!--begin::Tab Content-->
                    <div class="tab-content" id="equipment-tab-content">
                        <div class="text-center py-10">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading equipment...</span>
                            </div>
                            <div class="mt-3 text-muted">Memuat equipment...</div>
                        </div>
                    </div>
                    <!--end::Tab Content-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end::Pos equipment-->
        </div>
        <!--end::Content-->

        <!--begin::Sidebar-->
        <div class="flex-row-auto w-xl-450px">
            <!--begin::Pos order-->
            <div class="card card-flush bg-body" id="kt_pos_form">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <h3 class="card-title fw-bold text-gray-800 fs-2qx">Alat Tambahan Dipilih</h3>
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-light-danger fs-4 fw-bold py-4" id="clear-all-equipment">
                            <i class="ki-duotone ki-trash fs-2 me-2"></i>Clear All
                        </button>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body pt-0">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4 my-0" id="selected-equipment-table">
                            <!--begin::Table head-->
                            <thead>
                                <tr>
                                    <th class="min-w-135px">Alat</th>
                                    <th class="w-125px">Jumlah</th>
                                    <th class="w-125px">Durasi</th>
                                    <th class="w-100px">Total</th>
                                    <th class="w-60px">Action</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody id="selected-equipment-body">
                                <tr id="no-equipment-row">
                                    <td colspan="5" class="text-center text-muted py-6">
                                        <i class="ki-duotone ki-information-5 fs-2x text-gray-400"></i>
                                        <div class="mt-2">Belum ada alat yang dipilih</div>
                                    </td>
                                </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->

                    <!--begin::Summary-->
                    <div class="border-top pt-4 mt-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-gray-600">Subtotal Studio:</span>
                            <span class="fw-bold text-gray-800" id="studio-subtotal">Rp 0</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-gray-600">Subtotal Equipment:</span>
                            <span class="fw-bold text-gray-800" id="equipment-subtotal">Rp 0</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-top pt-2">
                            <span class="text-gray-800 fw-bold fs-5">Total:</span>
                            <span class="text-primary fw-bold fs-3" id="grand-total">Rp 0</span>
                        </div>
                    </div>
                    <!--end::Summary-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end::Pos order-->
        </div>
        <!--end::Sidebar-->
    </div>
    <!--end::Layout-->

    <!--begin::Content Section - PERBAIKAN: Gunakan ID yang unik -->
    <div class="d-flex flex-stack rounded-3 p-6 gap-3 mt-6">
        <!-- Summary Box 1 -->
        <div class="d-flex flex-stack bg-primary rounded-3 p-6 w-100" style="height: -webkit-fill-available; align-items: flex-start;">
            <div class="fs-6 fw-bold text-white">
                <span class="d-block lh-1 mb-2">Nama User</span>
                <span class="d-block mb-2">Nomer Handphone</span>
                <span class="d-block mb-2">Nama Studio</span>
                <span class="d-block mb-2">Tipe</span>
                <span class="d-block mb-2">Kapasitas</span>
                <span class="d-block mb-2">Tanggal Booking</span>
                <span class="d-block mb-2">Waktu Booking</span>
                <span class="d-block mb-2">Equipment</span>
            </div>
            <div class="fs-6 fw-bold text-white text-center" style="margin-left: -25%">
                <span class="d-block lh-1 mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
            </div>
            <div class="fs-6 fw-bold text-white text-end">
                <!-- PERBAIKAN: Gunakan ID yang unik untuk step 3 -->
                <span class="d-block lh-1 mb-2" id="summary-studio-name-step3">{{ $currentUser->name }}</span>
                <span class="d-block mb-2" id="summary-studio-phone-step3">{{ $currentUser->phone }}</span>
                <span class="d-block mb-2" id="summary-studio-name-studio-step3">{{ $studio->name }}</span>
                <span class="d-block mb-2" id="summary-studio-type-step3">{{ ucfirst($studio->type) }}</span>
                <span class="d-block mb-2" id="summary-studio-capacity-step3">{{ $studio->kapasitas }} Orang</span>
                <span class="d-block mb-2" id="summary-booking-date-step3">-</span>
                <span class="d-block mb-2" id="summary-booking-time-step3">-</span>
                <span class="d-block mb-2" id="summary-studio-equipment-step3">
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
        </div>

        <!-- Summary Box 2 - PERBAIKAN: Gunakan ID yang unik -->
        <div class="d-flex flex-stack bg-primary rounded-3 p-6 w-100" style="height: -webkit-fill-available; align-items: flex-start;">
            <div class="fs-6 fw-bold text-white">
                <span class="d-block lh-1 mb-2">Harga Perjam</span>
                <span class="d-block mb-2">Durasi Booking</span>
                <span class="d-block mb-2">Subtotal Equipment</span>
                <span class="d-block mb-2">Total Pembayaran</span>
            </div>
            <div class="fs-6 fw-bold text-white text-center" style="margin-left: -25%">
                <span class="d-block lh-1 mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
            </div>
            <div class="fs-6 fw-bold text-white text-end">
                <!-- PERBAIKAN: ID unik untuk step 3 -->
                <span class="d-block lh-1 mb-2" id="summary-price-per-hour-step3" data-price="{{ $studio->price_per_hour }}">
                    Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}
                </span>
                <span class="d-block mb-2" id="summary-duration-step3">1 Jam</span>
                <span class="d-block mb-2" id="summary-equipment-total-step3">Rp 0</span>
                <span class="d-block mb-2" id="summary-total-price-step3">
                    Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}
                </span>
            </div>
        </div>
    </div>
    <!--end::Content Section-->

    <div class="d-flex justify-content-between mt-4">
        <button type="button" class="btn btn-secondary prev-btn">Kembali</button>
        <button type="button" class="btn btn-primary next-btn">Lanjut</button>
    </div>
</div>

<!-- JavaScript untuk menangani equipment - VERSI DIPERBAIKI -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    let selectedEquipment = [];
    let studioPricePerHour = {{ $studio->price_per_hour }};
    let bookingDuration = 1;

    console.log('=== Step 3 Initialization ===');

    // Function untuk save equipment data ke localStorage
    function saveEquipmentData() {
        const equipmentData = {
            selectedEquipment: selectedEquipment,
            studioPricePerHour: studioPricePerHour,
            bookingDuration: bookingDuration,
            lastUpdated: new Date().toISOString()
        };

        localStorage.setItem('bookingEquipmentData', JSON.stringify(equipmentData));
        console.log('💾 Equipment data saved:', equipmentData);
    }

    // Function untuk load equipment data dari localStorage
    function loadEquipmentData() {
        try {
            const savedData = localStorage.getItem('bookingEquipmentData');
            if (savedData) {
                const equipmentData = JSON.parse(savedData);

                selectedEquipment = equipmentData.selectedEquipment || [];
                studioPricePerHour = equipmentData.studioPricePerHour || {{ $studio->price_per_hour }};
                bookingDuration = equipmentData.bookingDuration || 1;

                console.log('📥 Equipment data loaded:', equipmentData);

                updateSelectedEquipmentTable();
                updateSummary();

                return true;
            }
        } catch (error) {
            console.error('Error loading equipment data:', error);
        }
        return false;
    }

    // ⭐ FUNCTION BARU: Sync data dari Step 2 dengan cara yang lebih reliable
    function syncDataFromStep2() {
        console.log('🔄 Syncing data from Step 2...');

        // Coba ambil data dari localStorage Step 2
        const bookingDataStep2 = localStorage.getItem('bookingDataStep2');
        if (bookingDataStep2) {
            try {
                const data = JSON.parse(bookingDataStep2);
                console.log('📥 Data from Step 2 localStorage:', data);

                // Update duration
                if (data.duration) {
                    bookingDuration = Number(data.duration) || 1;
                    console.log('✅ Updated bookingDuration from localStorage:', bookingDuration);
                }

                // Update studio price
                if (data.studioPrice) {
                    studioPricePerHour = Number(data.studioPrice) || {{ $studio->price_per_hour }};
                    console.log('✅ Updated studioPricePerHour from localStorage:', studioPricePerHour);
                }

                // Update tanggal dan waktu
                if (data.startDate && data.startTime && data.endTime) {
                    window.bookingDate = data.startDate;
                    window.bookingTime = {
                        start: data.startTime,
                        end: data.endTime
                    };
                    console.log('✅ Updated date/time from localStorage:', window.bookingDate, window.bookingTime);
                }
            } catch (error) {
                console.error('Error parsing Step 2 data:', error);
            }
        }

        // Fallback: Coba ambil dari summary Step 2 yang terlihat
        syncFromVisibleStep2Summary();

        // Update semua tampilan
        updateAllStep3Displays();
    }

    // ⭐ FUNCTION BARU: Sync dari summary Step 2 yang terlihat di halaman
    function syncFromVisibleStep2Summary() {
        console.log('🔍 Checking visible Step 2 summary...');

        // Cari element Step 2 (mungkin masih ada di DOM tapi hidden)
        const step2Element = document.getElementById('step-2');
        if (step2Element && !step2Element.classList.contains('d-none')) {
            console.log('✅ Step 2 is visible, syncing directly...');

            const durationElement = step2Element.querySelector('#summary-duration');
            const priceElement = step2Element.querySelector('#summary-price-per-hour');
            const dateElement = step2Element.querySelector('#summary-booking-date');
            const timeElement = step2Element.querySelector('#summary-booking-time');

            if (durationElement && durationElement.textContent !== '-') {
                const durationMatch = durationElement.textContent.match(/(\d+)\s*Jam/);
                if (durationMatch) {
                    bookingDuration = parseInt(durationMatch[1]) || 1;
                    console.log('📅 Duration from visible Step 2:', bookingDuration);
                }
            }

            if (priceElement) {
                const priceText = priceElement.textContent.replace(/[^\d]/g, '');
                if (priceText) {
                    studioPricePerHour = parseInt(priceText) || {{ $studio->price_per_hour }};
                    console.log('💰 Price from visible Step 2:', studioPricePerHour);
                }
            }

            if (dateElement && dateElement.textContent !== '-') {
                window.bookingDate = dateElement.textContent;
                console.log('📅 Date from visible Step 2:', window.bookingDate);
            }

            if (timeElement && timeElement.textContent !== '-') {
                const timeParts = timeElement.textContent.split(' - ');
                if (timeParts.length === 2) {
                    window.bookingTime = {
                        start: timeParts[0].trim(),
                        end: timeParts[1].trim()
                    };
                    console.log('⏰ Time from visible Step 2:', window.bookingTime);
                }
            }
        }
    }

    // ⭐ FUNCTION BARU: Update semua tampilan Step 3
    function updateAllStep3Displays() {
        console.log('🎨 Updating all Step 3 displays...');

        updateBookingDateInStep3();
        updateDurationDisplay();
        updatePriceDisplay();
        updateSummary();

        console.log('✅ All Step 3 displays updated');
    }

    // Function untuk menerima data dari step 2
    window.setBookingDataFromStep2 = function(bookingData) {
        console.log('🔄 setBookingDataFromStep2 called with:', bookingData);

        // Update semua data dari Step 2
        if (bookingData.duration) {
            bookingDuration = Number(bookingData.duration) || 1;
        }

        if (bookingData.studioPrice) {
            studioPricePerHour = Number(bookingData.studioPrice) || {{ $studio->price_per_hour }};
        }

        if (bookingData.startDate) {
            window.bookingDate = bookingData.startDate;
        }

        if (bookingData.startTime && bookingData.endTime) {
            window.bookingTime = {
                start: bookingData.startTime,
                end: bookingData.endTime
            };
        }

        // Update semua tampilan
        updateAllStep3Displays();
        saveEquipmentData();

        console.log('🔄 Step 3 data synchronized successfully');
    };

    // ⭐ FUNCTION DIPERBAIKI: Update tanggal dan waktu di Step 3
    function updateBookingDateInStep3() {
        console.log('📅 Updating booking date in Step 3...');
        console.log('window.bookingDate:', window.bookingDate);
        console.log('window.bookingTime:', window.bookingTime);

        const dateElement = document.getElementById('summary-booking-date-step3');
        const timeElement = document.getElementById('summary-booking-time-step3');

        if (dateElement) {
            if (window.bookingDate) {
                try {
                    // Coba parse sebagai Date object jika format ISO
                    let formattedDate = window.bookingDate;
                    if (window.bookingDate.includes('-')) {
                        const dateObj = new Date(window.bookingDate);
                        if (!isNaN(dateObj.getTime())) {
                            formattedDate = dateObj.toLocaleDateString('id-ID', {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            });
                        }
                    }
                    dateElement.textContent = formattedDate;
                    console.log('✅ Date updated in Step 3:', formattedDate);
                } catch (error) {
                    dateElement.textContent = window.bookingDate;
                    console.log('✅ Date updated (raw):', window.bookingDate);
                }
            } else {
                dateElement.textContent = '-';
                console.log('⚠️ No booking date available');
            }
        }

        if (timeElement) {
            if (window.bookingTime && window.bookingTime.start && window.bookingTime.end) {
                timeElement.textContent = `${window.bookingTime.start} - ${window.bookingTime.end}`;
                console.log('✅ Time updated in Step 3:', timeElement.textContent);
            } else {
                timeElement.textContent = '-';
                console.log('⚠️ No booking time available');
            }
        }
    }

    function updateDurationDisplay() {
        const durationElement = document.getElementById('summary-duration-step3');
        if (durationElement) {
            durationElement.textContent = bookingDuration + ' Jam';
            console.log('⏱️ Duration updated:', bookingDuration + ' Jam');
        }
    }

    function updatePriceDisplay() {
        const priceElement = document.getElementById('summary-price-per-hour-step3');
        if (priceElement) {
            priceElement.textContent = formatRupiah(studioPricePerHour);
            priceElement.setAttribute('data-price', studioPricePerHour);
            console.log('💰 Price updated:', formatRupiah(studioPricePerHour));
        }
    }

    // Load equipment data dari server
    function loadEquipmentFromServer() {
        console.log('📦 Loading equipment data from server...');
        showLoadingState();

        fetch('{{ route("user.booking.equipment") }}', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Network error');
            return response.json();
        })
        .then(data => {
            if (data.success) {
                renderEquipmentCategories(data.categories || []);
                renderEquipmentContent(data.equipment || []);
                loadEquipmentData();
            } else {
                throw new Error(data.message || 'Failed to load equipment');
            }
        })
        .catch(error => {
            console.error('❌ Error loading equipment:', error);
            showErrorState('Gagal memuat data equipment');
        });
    }

    // Show loading state
    function showLoadingState() {
        const categoriesContainer = document.getElementById('equipment-categories');
        const tabContent = document.getElementById('equipment-tab-content');

        if (categoriesContainer) {
            categoriesContainer.innerHTML = `
                <li class="nav-item mb-3 me-0">
                    <div class="d-flex align-items-center">
                        <div class="spinner-border spinner-border-sm text-primary me-2" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span class="text-muted">Memuat kategori...</span>
                    </div>
                </li>
            `;
        }

        if (tabContent) {
            tabContent.innerHTML = `
                <div class="text-center py-10">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading equipment...</span>
                    </div>
                    <div class="mt-3 text-muted">Memuat equipment...</div>
                </div>
            `;
        }
    }

    // Show error state
    function showErrorState(message) {
        const tabContent = document.getElementById('equipment-tab-content');
        if (tabContent) {
            tabContent.innerHTML = `
                <div class="text-center py-10">
                    <i class="ki-duotone ki-information-5 fs-2x text-danger mb-3"></i>
                    <div class="text-danger fw-bold">${message}</div>
                    <button class="btn btn-primary mt-3" onclick="loadEquipmentFromServer()">
                        <i class="ki-duotone ki-reload fs-2 me-2"></i>Coba Lagi
                    </button>
                </div>
            `;
        }
    }

    // Render equipment categories
    function renderEquipmentCategories(categories) {
        const categoriesContainer = document.getElementById('equipment-categories');
        if (!categoriesContainer) return;

        if (categories.length === 0) {
            categoriesContainer.innerHTML = `
                <li class="nav-item mb-3 me-0">
                    <span class="text-muted">Tidak ada kategori</span>
                </li>
            `;
            return;
        }

        let html = '';
        categories.forEach((category, index) => {
            const isActive = index === 0 ? 'show active' : '';
            const categoryId = `equipment-category-${category.toLowerCase().replace(/\s+/g, '-')}`;

            html += `
                <li class="nav-item mb-3 me-0">
                    <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-3 pb-2 page-bg ${isActive}"
                       data-bs-toggle="pill" href="#${categoryId}" style="width: 90px;height: 90px">
                        <div class="nav-icon mb-2">
                            <img src="{{ asset('media/svg/food-icons/spaghetti.svg') }}" class="w-30px" alt="${category}" />
                        </div>
                        <div class="">
                            <span class="text-gray-800 fw-bold fs-6 d-block">${category}</span>
                            <span class="text-gray-500 fw-semibold fs-8" id="${categoryId}-count">0 Item</span>
                        </div>
                    </a>
                </li>
            `;
        });

        categoriesContainer.innerHTML = html;
    }

    // Render equipment content
    function renderEquipmentContent(equipment) {
        const tabContent = document.getElementById('equipment-tab-content');
        if (!tabContent) return;

        if (equipment.length === 0) {
            tabContent.innerHTML = `
                <div class="text-center py-10">
                    <i class="ki-duotone ki-information-5 fs-2x text-muted mb-3"></i>
                    <div class="text-muted fw-bold">Tidak ada equipment tersedia</div>
                </div>
            `;
            return;
        }

        // Group by category
        const equipmentByCategory = {};
        equipment.forEach(item => {
            if (!equipmentByCategory[item.category]) {
                equipmentByCategory[item.category] = [];
            }
            equipmentByCategory[item.category].push(item);
        });

        let html = '';
        Object.keys(equipmentByCategory).forEach((category, index) => {
            const isActive = index === 0 ? 'show active' : '';
            const categoryId = `equipment-category-${category.toLowerCase().replace(/\s+/g, '-')}`;

            let equipmentCards = '';
            equipmentByCategory[category].forEach(item => {
                equipmentCards += createEquipmentCard(item);
            });

            html += `
                <div class="tab-pane fade ${isActive}" id="${categoryId}">
                    <div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">
                        ${equipmentCards}
                    </div>
                </div>
            `;

            // Update category count
            const countElement = document.getElementById(`${categoryId}-count`);
            if (countElement) {
                countElement.textContent = `${equipmentByCategory[category].length} Item`;
            }
        });

        tabContent.innerHTML = html;
    }

    // Create equipment card
    function createEquipmentCard(equipment) {
        const isAvailable = equipment.available > 0;
        const priceFormatted = formatRupiah(equipment.price_per_hours);

        // Check if this equipment is already in selectedEquipment
        const existingItem = selectedEquipment.find(item => item.id == equipment.id);
        const isSelected = existingItem !== undefined;

        return `
            <div class="card card-flush flex-row-fluid p-2 pb-4 mw-100 equipment-card ${!isAvailable ? 'opacity-50' : ''} ${isSelected ? 'border border-primary' : ''}"
                 data-equipment-id="${equipment.id}"
                 data-price="${equipment.price_per_hours}"
                 data-available="${equipment.available}">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/') }}/${equipment.foto || 'media/stock/food/img-2.jpg'}"
                         class="rounded-3 mb-4 w-70px h-70px"
                         alt="${equipment.name}"
                         onerror="this.src='{{ asset('media/stock/food/img-2.jpg') }}'" />
                    <div class="mb-2">
                        <div class="text-center">
                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6">
                                ${equipment.name}
                            </span>
                            <span class="text-gray-500 fw-semibold d-block fs-7 mt-1">
                                ${isAvailable ? `${equipment.available} tersedia` : 'Stok habis'}
                                ${isSelected ? '• Dipilih' : ''}
                            </span>
                        </div>
                    </div>
                    <span class="text-success fw-bold fs-6">${priceFormatted}/jam</span>

                    ${isAvailable ? `
                    <div class="mt-3">
                        <button type="button" class="btn btn-sm ${isSelected ? 'btn-success' : 'btn-primary'} add-equipment-btn"
                                data-equipment-id="${equipment.id}">
                            <i class="ki-duotone ki-${isSelected ? 'check' : 'plus'} fs-4"></i>
                            ${isSelected ? 'Ditambahkan' : 'Tambah'}
                        </button>
                    </div>
                    ` : `
                    <div class="mt-3">
                        <span class="badge badge-light-danger">Stok Habis</span>
                    </div>
                    `}
                </div>
            </div>
        `;
    }

    // Add equipment to cart
    function addEquipmentToCart(equipmentId) {
        const equipmentCard = document.querySelector(`[data-equipment-id="${equipmentId}"]`);
        if (!equipmentCard) return;

        const equipmentName = equipmentCard.querySelector('.fw-bold')?.textContent || 'Unknown';
        const equipmentPrice = Number(equipmentCard.dataset.price) || 0;
        const equipmentAvailable = Number(equipmentCard.dataset.available) || 0;
        const equipmentImage = equipmentCard.querySelector('img')?.src || '';

        // Check if already in cart
        const existingIndex = selectedEquipment.findIndex(item => item.id === equipmentId);
        if (existingIndex > -1) {
            if (selectedEquipment[existingIndex].quantity < equipmentAvailable) {
                selectedEquipment[existingIndex].quantity++;
            } else {
                showAlert('error', 'Stok tidak mencukupi');
                return;
            }
        } else {
            selectedEquipment.push({
                id: equipmentId,
                name: equipmentName,
                price: equipmentPrice,
                available: equipmentAvailable,
                image: equipmentImage,
                quantity: 1
            });
        }

        updateSelectedEquipmentTable();
        updateSummary();
        saveEquipmentData();

        // Update button state
        updateEquipmentCardButton(equipmentId, true);

        showAlert('success', `${equipmentName} ditambahkan ke keranjang`);
    }

    // Update equipment card button state
    function updateEquipmentCardButton(equipmentId, isSelected) {
        const button = document.querySelector(`[data-equipment-id="${equipmentId}"] .add-equipment-btn`);
        const card = document.querySelector(`[data-equipment-id="${equipmentId}"]`);

        if (button && card) {
            if (isSelected) {
                button.classList.remove('btn-primary');
                button.classList.add('btn-success');
                button.innerHTML = '<i class="ki-duotone ki-check fs-4"></i> Ditambahkan';
                card.classList.add('border', 'border-primary');
            } else {
                button.classList.remove('btn-success');
                button.classList.add('btn-primary');
                button.innerHTML = '<i class="ki-duotone ki-plus fs-4"></i> Tambah';
                card.classList.remove('border', 'border-primary');
            }
        }
    }

    // Update selected equipment table
    function updateSelectedEquipmentTable() {
        const tbody = document.getElementById('selected-equipment-body');
        const noEquipmentRow = document.getElementById('no-equipment-row');

        if (!tbody) return;

        if (selectedEquipment.length === 0) {
            tbody.innerHTML = `
                <tr id="no-equipment-row">
                    <td colspan="5" class="text-center text-muted py-6">
                        <i class="ki-duotone ki-information-5 fs-2x text-gray-400"></i>
                        <div class="mt-2">Belum ada alat yang dipilih</div>
                    </td>
                </tr>
            `;
            return;
        }

        let html = '';
        selectedEquipment.forEach((item, index) => {
            const itemTotal = item.price * item.quantity * bookingDuration;

            html += `
                <tr data-equipment-id="${item.id}" class="equipment-row">
                    <td class="pe-0">
                        <div class="d-flex align-items-center">
                            <img src="${item.image}" class="w-50px h-50px rounded-3 me-3" alt="${item.name}" />
                            <span class="fw-bold text-gray-800 fs-6">${item.name}</span>
                        </div>
                    </td>
                    <td class="pe-0">
                        <div class="position-relative d-flex align-items-center">
                            <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-500 decrease-quantity"
                                    data-index="${index}">
                                <i class="ki-duotone ki-minus fs-3"></i>
                            </button>
                            <input type="text" class="form-control border-0 text-center px-0 fs-6 fw-bold text-gray-800 w-30px equipment-quantity"
                                   value="${item.quantity}" readonly
                                   data-index="${index}"
                                   data-max="${item.available}" />
                            <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-500 increase-quantity"
                                    data-index="${index}">
                                <i class="ki-duotone ki-plus fs-3"></i>
                            </button>
                        </div>
                    </td>
                    <td class="pe-0">
                        <span class="fw-bold text-gray-800 fs-6 equipment-duration">${bookingDuration} Jam</span>
                    </td>
                    <td class="text-end">
                        <span class="fw-bold text-primary fs-5 equipment-total">${formatRupiah(itemTotal)}</span>
                    </td>
                    <td class="text-end">
                        <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-500 remove-equipment"
                                data-index="${index}">
                            <i class="bi bi-trash fs-2 text-danger"></i>
                        </button>
                    </td>
                </tr>
            `;
        });

        tbody.innerHTML = html;
        addQuantityEventListeners();
    }

    // Add quantity event listeners
    function addQuantityEventListeners() {
        document.querySelectorAll('.increase-quantity').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = parseInt(this.dataset.index);
                increaseQuantity(index);
            });
        });

        document.querySelectorAll('.decrease-quantity').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = parseInt(this.dataset.index);
                decreaseQuantity(index);
            });
        });

        document.querySelectorAll('.remove-equipment').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = parseInt(this.dataset.index);
                removeEquipment(index);
            });
        });
    }

    // Quantity controls
    function increaseQuantity(index) {
        if (selectedEquipment[index].quantity < selectedEquipment[index].available) {
            selectedEquipment[index].quantity++;
            updateSelectedEquipmentTable();
            updateSummary();
            saveEquipmentData();
        } else {
            showAlert('error', 'Stok tidak mencukupi');
        }
    }

    function decreaseQuantity(index) {
        if (selectedEquipment[index].quantity > 1) {
            selectedEquipment[index].quantity--;
            updateSelectedEquipmentTable();
            updateSummary();
            saveEquipmentData();
        } else {
            removeEquipment(index);
        }
    }

    function removeEquipment(index) {
        const equipmentId = selectedEquipment[index].id;
        const equipmentName = selectedEquipment[index].name;

        selectedEquipment.splice(index, 1);
        updateSelectedEquipmentTable();
        updateSummary();
        saveEquipmentData();

        // Update button state
        updateEquipmentCardButton(equipmentId, false);

        showAlert('info', `${equipmentName} dihapus dari keranjang`);
    }

    // Calculation functions
    function calculateEquipmentSubtotal() {
        return selectedEquipment.reduce((total, item) => {
            return total + (item.price * item.quantity * bookingDuration);
        }, 0);
    }

    function calculateStudioSubtotal() {
        return studioPricePerHour * bookingDuration;
    }

    function calculateGrandTotal() {
        return calculateStudioSubtotal() + calculateEquipmentSubtotal();
    }

    // Update summary
    function updateSummary() {
        const equipmentSubtotal = calculateEquipmentSubtotal();
        const studioSubtotal = calculateStudioSubtotal();
        const grandTotal = calculateGrandTotal();

        console.log('🧮 Summary results:', {
            equipmentSubtotal,
            studioSubtotal,
            grandTotal,
            bookingDuration,
            studioPricePerHour,
            equipmentCount: selectedEquipment.length
        });

        // Update sidebar summary
        updateElementText('studio-subtotal', formatRupiah(studioSubtotal));
        updateElementText('equipment-subtotal', formatRupiah(equipmentSubtotal));
        updateElementText('grand-total', formatRupiah(grandTotal));

        // Update main summary
        updateElementText('summary-equipment-total-step3', formatRupiah(equipmentSubtotal));
        updateElementText('summary-total-price-step3', formatRupiah(grandTotal));
    }

    // Helper function untuk update element text
    function updateElementText(elementId, text) {
        const element = document.getElementById(elementId);
        if (element) {
            element.textContent = text;
        }
    }

    // Utility functions
    function formatRupiah(amount) {
        const validAmount = Number(amount) || 0;
        return 'Rp ' + validAmount.toLocaleString('id-ID');
    }

    function showAlert(type, message) {
        console.log(`${type.toUpperCase()}: ${message}`);
        if (typeof Swal !== 'undefined') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: type,
                title: message
            });
        }
    }

    // Event listeners
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-equipment-btn') || e.target.closest('.add-equipment-btn')) {
            const button = e.target.classList.contains('add-equipment-btn') ?
                e.target : e.target.closest('.add-equipment-btn');

            if (button && button.dataset.equipmentId) {
                addEquipmentToCart(button.dataset.equipmentId);
            }
        }
    });

    document.getElementById('clear-all-equipment')?.addEventListener('click', function() {
        if (selectedEquipment.length > 0 && confirm('Hapus semua equipment dari keranjang?')) {
            // Reset semua button state
            selectedEquipment.forEach(item => {
                updateEquipmentCardButton(item.id, false);
            });

            selectedEquipment = [];
            updateSelectedEquipmentTable();
            updateSummary();
            saveEquipmentData();
            showAlert('info', 'Semua equipment dihapus dari keranjang');
        }
    });

    // ⭐ INITIALIZATION YANG DIPERBAIKI
    console.log('🚀 Initializing Step 3 Equipment System...');

    // Load equipment data dari server
    loadEquipmentFromServer();

    // ⭐ PERBAIKAN: Sync data dengan delay yang lebih optimal
    setTimeout(() => {
        syncDataFromStep2();
    }, 800);

    // ⭐ PERBAIKAN: Juga sync ketika step 3 menjadi aktif
    document.addEventListener('stepChanged', function(e) {
        if (e.detail.step === 3) {
            console.log('🎯 Step 3 activated, syncing data...');
            setTimeout(syncDataFromStep2, 300);
        }
    });

    // Auto-save ketika meninggalkan halaman
    window.addEventListener('beforeunload', function() {
        saveEquipmentData();
    });
});
</script>

<style>
.equipment-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.equipment-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.equipment-card.opacity-50 {
    cursor: not-allowed;
}

.equipment-card .btn {
    transition: all 0.3s ease;
}

.equipment-card:hover:not(.opacity-50) {
    border-color: #009ef7;
}

#no-equipment-row {
    display: table-row;
}

.equipment-row {
    display: table-row;
}
</style>
