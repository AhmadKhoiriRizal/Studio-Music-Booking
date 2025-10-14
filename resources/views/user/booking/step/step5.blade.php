<!-- Step 5: Konfirmasi Pesanan -->
<div class="step" data-step="5" id="step-5">
    <!-- Header Success -->
    <div class="text-center mb-8">
        <div class="mb-4">
            <i class="ki-duotone ki-check-circle text-success fs-2hx">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <h2 class="text-success mb-2">Pembayaran Berhasil!</h2>
        <p class="text-muted">Pesanan Anda telah dikonfirmasi dan sedang diproses</p>
    </div>

    <div class="row g-6">
        <!-- Kolom Kiri: Detail Pesanan -->
        <div class="col-lg-8">
            <!-- Card: Informasi Booking -->
            <div class="card card-flush mb-6">
                <div class="card-header">
                    <h3 class="card-title fw-bold">
                        <i class="ki-duotone ki-calendar-8 text-primary fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                            <span class="path6"></span>
                        </i>
                        Informasi Booking
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="ki-duotone ki-user text-primary fs-3 me-3"></i>
                                <div>
                                    <small class="text-muted d-block">Nama User</small>
                                    <span class="fw-bold fs-6" id="confirm-user-name">{{ auth()->user()->name }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="ki-duotone ki-phone text-primary fs-3 me-3"></i>
                                <div>
                                    <small class="text-muted d-block">No. Handphone</small>
                                    <span class="fw-bold fs-6" id="confirm-user-phone">{{ auth()->user()->phone }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="ki-duotone ki-home-3 text-primary fs-3 me-3"></i>
                                <div>
                                    <small class="text-muted d-block">Studio</small>
                                    <span class="fw-bold fs-6" id="confirm-studio-name">{{ $studio->name }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="ki-duotone ki-calendar text-primary fs-3 me-3"></i>
                                <div>
                                    <small class="text-muted d-block">Tanggal Booking</small>
                                    <span class="fw-bold fs-6" id="confirm-booking-date">-</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="ki-duotone ki-clock text-primary fs-3 me-3"></i>
                                <div>
                                    <small class="text-muted d-block">Waktu Booking</small>
                                    <span class="fw-bold fs-6" id="confirm-booking-time">-</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <i class="ki-duotone ki-watch text-primary fs-3 me-3"></i>
                                <div>
                                    <small class="text-muted d-block">Durasi</small>
                                    <span class="fw-bold fs-6" id="confirm-booking-duration">-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card: Detail Pembayaran -->
            <div class="card card-flush mb-6">
                <div class="card-header">
                    <h3 class="card-title fw-bold">
                        <i class="ki-duotone ki-dollar text-primary fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Detail Pembayaran
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="ps-0">
                                        <span class="text-gray-600">Subtotal Studio</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="fw-bold" id="confirm-studio-subtotal">-</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-0">
                                        <span class="text-gray-600">Subtotal Equipment</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="fw-bold" id="confirm-equipment-subtotal">-</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-0">
                                        <span class="text-gray-600">Biaya Admin</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="fw-bold" id="confirm-admin-fee">-</span>
                                    </td>
                                </tr>
                                <tr class="border-top">
                                    <td class="ps-0 pt-4">
                                        <span class="text-gray-800 fw-bold fs-5">Total Pembayaran</span>
                                    </td>
                                    <td class="text-end pe-0 pt-4">
                                        <span class="text-primary fw-bold fs-4" id="confirm-total-payment">-</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-0">
                                        <span class="text-gray-600">Metode Pembayaran</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="fw-bold" id="confirm-payment-method">-</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-0">
                                        <span class="text-gray-600">Status Pembayaran</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="badge badge-success" id="confirm-payment-status">Berhasil</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-0">
                                        <span class="text-gray-600">Waktu Pembayaran</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="fw-bold" id="confirm-payment-time">-</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Card: Equipment yang Disewa -->
            <div class="card card-flush" id="equipment-confirmation-section">
                <div class="card-header">
                    <h3 class="card-title fw-bold">
                        <i class="ki-duotone ki-tools text-primary fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Equipment yang Disewa
                    </h3>
                </div>
                <div class="card-body">
                    <div id="no-equipment-confirm" class="text-center py-4">
                        <i class="ki-duotone ki-information-5 fs-2x text-muted mb-3"></i>
                        <div class="text-muted">Tidak ada equipment tambahan</div>
                    </div>
                    <div id="equipment-confirm-list" class="d-none">
                        <div class="table-responsive">
                            <table class="table table-borderless align-middle">
                                <thead>
                                    <tr>
                                        <th class="ps-0">Nama Equipment</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Harga/Jam</th>
                                        <th class="text-end pe-0">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="equipment-confirm-body">
                                    <!-- Equipment list akan diisi oleh JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Ringkasan & Aksi -->
        <div class="col-lg-4">
            <div class="card card-flush sticky-top" style="top: 2rem;">
                <div class="card-header">
                    <h3 class="card-title fw-bold">Ringkasan Pesanan</h3>
                </div>
                <div class="card-body">
                    <!-- Kode Booking -->
                    <div class="text-center mb-4 p-4 bg-light-primary rounded">
                        <small class="text-muted d-block mb-2">Kode Booking</small>
                        <div class="fw-bold fs-2 text-primary" id="confirm-booking-code">-</div>
                        <small class="text-muted">Simpan kode ini untuk keperluan check-in</small>
                    </div>

                    <!-- Status Pesanan -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-gray-600">Status Pesanan</span>
                            <span class="badge badge-success" id="confirm-order-status">Dikonfirmasi</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-gray-600">Estimasi Selesai</span>
                            <span class="fw-bold" id="confirm-processing-time">1-2 menit</span>
                        </div>
                    </div>

                    <!-- Informasi Penting -->
                    <div class="alert alert-info mb-4">
                        <div class="d-flex">
                            <i class="ki-duotone ki-information-2 fs-2 text-info me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <div class="d-flex flex-column">
                                <h6 class="text-info mb-1">Informasi Penting</h6>
                                <span class="fs-7">• Datang 15 menit sebelum waktu booking</span>
                                <span class="fs-7">• Bawa bukti pembayaran & identitas</span>
                                <span class="fs-7">• Kode booking wajib ditunjukkan</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-grid gap-3">
                        <button type="button" class="btn btn-primary" id="download-invoice">
                            <i class="ki-duotone ki-download fs-2 me-2"></i>
                            Download Invoice
                        </button>
                        <button type="button" class="btn btn-light-primary" id="view-booking">
                            <i class="ki-duotone ki-eye fs-2 me-2"></i>
                            Lihat Detail Booking
                        </button>

                        <!-- TOMBOL BOOKING LAGI YANG DIPERBAIKI -->
                        <button type="button" class="btn btn-warning" id="new-booking-btn">
                            <i class="ki-duotone ki-plus fs-2 me-2"></i>
                            Booking Lagi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Kembali ke Beranda & Cetak Ringkasan -->
    <div class="d-flex justify-content-between mt-4">
        <button type="button" class="btn btn-secondary" id="back-to-home">
            <i class="ki-duotone ki-home me-2"></i>
            Kembali ke Beranda
        </button>
        <button type="button" class="btn btn-primary" id="print-summary">
            <i class="ki-duotone ki-printer me-2"></i>
            Cetak Ringkasan
        </button>
    </div>
</div>

<!-- JavaScript untuk Konfirmasi dan Reset State -->
<!-- JavaScript untuk Konfirmasi dan Reset State -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ Step 5: Confirmation System Initialized');

    // =============================================
    // FUNGSI RESET YANG LEBIH KOMPREHENSIF
    // =============================================
    function resetBookingFormCompletely() {
        console.log('🔄 Starting COMPLETE form reset...');

        // 1. CLEAR LOCALSTORAGE - Hapus semua data tersimpan
        localStorage.removeItem('bookingFormState');
        localStorage.removeItem('lastBooking');
        console.log('🧹 localStorage cleared completely');

        // 2. RESET formData OBJECT - Hapus semua property
        if (typeof formData !== 'undefined') {
            const keys = Object.keys(formData);
            keys.forEach(key => {
                delete formData[key];
            });
            console.log('📝 formData reset:', keys.length + ' properties deleted');

            // Reset juga struktur dasar formData
            formData.selectedEquipment = [];
            formData.duration = '';
            formData.totalPrice = '';
            formData.bookingDate = '';
            formData.startTime = '';
            formData.endTime = '';
        }

        // 3. RESET SEMUA VARIABEL GLOBAL
    // Equipment data
    if (typeof window.selectedEquipment !== 'undefined') {
        window.selectedEquipment = [];
    }

    if (typeof window.equipmentCart !== 'undefined') {
        window.equipmentCart = [];
    }

    // Booking data
    if (typeof window.bookingDuration !== 'undefined') {
        window.bookingDuration = 1;
    }

    if (typeof window.studioPricePerHour !== 'undefined') {
        window.studioPricePerHour = {{ $studio->price_per_hour }};
    }

    if (typeof window.bookingStartTime !== 'undefined') {
        window.bookingStartTime = null;
    }

    if (typeof window.bookingEndTime !== 'undefined') {
        window.bookingEndTime = null;
    }

    if (typeof window.bookingDate !== 'undefined') {
        window.bookingDate = null;
    }

    // Calendar data
    if (typeof window.calendarEvents !== 'undefined') {
        window.calendarEvents = [];
    }

        // 4. RESET CALENDAR - Hapus semua events
        if (typeof window.calendar !== 'undefined' && window.calendar) {
            try {
                const events = window.calendar.getEvents();
                events.forEach(event => event.remove());
                console.log('📅 Calendar events cleared:', events.length + ' events removed');
            } catch (error) {
                console.error('Error clearing calendar:', error);
            }
        }

        // 5. RESET FORM UI - Reset semua input form
        const registrationForm = document.getElementById('registration-form');
        if (registrationForm) {
            // Reset semua input, select, textarea
            const allInputs = registrationForm.querySelectorAll('input, select, textarea');
            allInputs.forEach(input => {
                if (input.type === 'text' || input.type === 'email' || input.type === 'tel') {
                    input.value = '';
                } else if (input.type === 'number') {
                    input.value = '';
                } else if (input.type === 'checkbox' || input.type === 'radio') {
                    input.checked = false;
                } else if (input.tagName === 'SELECT') {
                    input.selectedIndex = 0;
                }
            });
            console.log('📋 Form UI reset:', allInputs.length + ' inputs cleared');
        }

        // 6. RESET STEP PROGRESS - Kembali ke step 1
        if (typeof currentStep !== 'undefined') {
            currentStep = 1;
        }

        // 7. RESET STEP INDICATORS - Update tampilan step
        if (typeof updateStepIndicators !== 'undefined') {
            updateStepIndicators();
        }

        // 8. RESET SUMMARY DISPLAYS - Clear semua summary
        resetAllSummaryDisplays();

        // 9. RESET EQUIPMENT DISPLAY - Clear equipment cart
        resetEquipmentCartDisplay();

        console.log('✅ COMPLETE form reset finished!');

        // Verifikasi reset
        setTimeout(checkResetStatus, 100);
    }

    // Fungsi untuk reset semua summary display
    function resetAllSummaryDisplays() {
        console.log('🔄 Resetting all summary displays...');

        // Step 2 Summary
        const step2Summaries = [
            'summary-duration',
            'summary-price-per-hour',
            'summary-total-price',
            'summary-booking-date',
            'summary-booking-time',
            'summary-studio-equipment'
        ];

        step2Summaries.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.textContent = '-';
                if (id === 'summary-studio-equipment') {
                    element.innerHTML = '<span class="text-white">Tidak ada equipment tambahan</span>';
                }
            }
        });

        // Step 4 Summary (Payment)
        const step4Summaries = [
            'payment-studio-subtotal',
            'payment-equipment-subtotal',
            'payment-admin-fee',
            'payment-grand-total'
        ];

        step4Summaries.forEach(id => {
            const element = document.getElementById(id);
            if (element) element.textContent = 'Rp 0';
        });

        // Step 5 Summary (Confirmation) - Reset untuk next booking
        const step5Summaries = [
            'confirm-booking-date',
            'confirm-booking-time',
            'confirm-booking-duration',
            'confirm-studio-subtotal',
            'confirm-equipment-subtotal',
            'confirm-admin-fee',
            'confirm-total-payment',
            'confirm-payment-method',
            'confirm-payment-time'
        ];

        step5Summaries.forEach(id => {
            const element = document.getElementById(id);
            if (element) element.textContent = '-';
        });

        // Reset equipment confirmation
        const noEquipmentConfirm = document.getElementById('no-equipment-confirm');
        const equipmentConfirmList = document.getElementById('equipment-confirm-list');
        const equipmentConfirmBody = document.getElementById('equipment-confirm-body');

        if (noEquipmentConfirm) noEquipmentConfirm.classList.remove('d-none');
        if (equipmentConfirmList) equipmentConfirmList.classList.add('d-none');
        if (equipmentConfirmBody) equipmentConfirmBody.innerHTML = '';

        console.log('✅ All summary displays reset');
    }

    // Fungsi untuk reset equipment cart display
    function resetEquipmentCartDisplay() {
        console.log('🔄 Resetting equipment cart display...');

        // Reset equipment list di step 3
        const equipmentList = document.getElementById('equipment-list');
        const noEquipment = document.getElementById('no-equipment');
        const equipmentCart = document.getElementById('equipment-cart');
        const equipmentSubtotal = document.getElementById('equipment-subtotal');

        if (equipmentList) {
            // Reset semua quantity inputs
            const quantityInputs = equipmentList.querySelectorAll('input[type="number"]');
            quantityInputs.forEach(input => {
                input.value = '0';
                input.disabled = false;
            });

            // Reset semua badges
            const badges = equipmentList.querySelectorAll('.badge');
            badges.forEach(badge => {
                badge.textContent = '0';
                badge.classList.remove('bg-primary');
                badge.classList.add('bg-secondary');
            });
        }

        if (noEquipment) noEquipment.classList.remove('d-none');
        if (equipmentCart) equipmentCart.classList.add('d-none');
        if (equipmentSubtotal) equipmentSubtotal.textContent = 'Rp 0';

        console.log('✅ Equipment cart display reset');
    }

    // Function untuk mengecek status reset
    function checkResetStatus() {
        console.log('🔍 Checking reset status:');
        console.log('📦 localStorage:', localStorage.getItem('bookingFormState') ? 'NOT EMPTY' : 'EMPTY ✅');
        console.log('📝 formData:', formData ? Object.keys(formData).length + ' properties' : 'undefined');
        console.log('🛠 selectedEquipment:', window.selectedEquipment ? window.selectedEquipment.length : 'undefined');
        console.log('📅 calendar events:', window.calendar ? window.calendar.getEvents().length : 'undefined');
        console.log('🔢 currentStep:', typeof currentStep !== 'undefined' ? currentStep : 'undefined');
    }

    // =============================================
    // FUNGSI REDIRECT
    // =============================================
    function redirectToNewBooking() {
        const currentStudioId = {{ $studio->id }};
        const baseUrl = "{{ url('/booking') }}";
        const newBookingUrl = `${baseUrl}/${currentStudioId}`;

        console.log('🔗 Redirecting to:', newBookingUrl);
        window.location.href = newBookingUrl;
    }

    function redirectToStudioSelection() {
        const studiosUrl = "{{ route('user.dashboard') }}";
        console.log('🔗 Redirecting to studio selection:', studiosUrl);
        window.location.href = studiosUrl;
    }

    // =============================================
    // EVENT HANDLER UNTUK TOMBOL "BOOKING LAGI"
    // =============================================
    document.getElementById('new-booking-btn').addEventListener('click', function() {
        console.log('🆕 New booking button clicked - COMPLETE RESET');

        // Tampilkan konfirmasi dengan opsi yang lebih jelas
        Swal.fire({
            title: 'Booking Baru',
            html: `
                <div class="text-start">
                    <p>Apakah Anda ingin melakukan booking baru?</p>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="bookingOption" id="sameStudio" value="same" checked>
                        <label class="form-check-label" for="sameStudio">
                            <strong>Studio yang sama</strong><br>
                            <small class="text-muted">Booking {{ $studio->name }} lagi</small>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="bookingOption" id="differentStudio" value="different">
                        <label class="form-check-label" for="differentStudio">
                            <strong>Studio berbeda</strong><br>
                            <small class="text-muted">Pilih studio lain</small>
                        </label>
                    </div>
                </div>
            `,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Lanjutkan',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: false,
            preConfirm: () => {
                const selectedOption = document.querySelector('input[name="bookingOption"]:checked').value;
                return selectedOption;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const selectedOption = result.value;

                console.log('🎯 User selected:', selectedOption);

                // Tampilkan loading
                Swal.fire({
                    title: 'Mempersiapkan...',
                    text: 'Mereset data booking sebelumnya',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Reset SEMUA data terlebih dahulu
                setTimeout(() => {
                    resetBookingFormCompletely();

                    Swal.close();

                    // Beri jeda sebentar sebelum redirect
                    setTimeout(() => {
                        // Redirect berdasarkan pilihan
                        if (selectedOption === 'same') {
                            console.log('🔗 Redirecting to same studio booking');
                            redirectToNewBooking();
                        } else {
                            console.log('🔗 Redirecting to studio selection');
                            redirectToStudioSelection();
                        }
                    }, 500);

                }, 1000);
            }
        });
    });

    // =============================================
    // EVENT LISTENERS UNTUK TOMBOL LAINNYA
    // =============================================
    document.getElementById('download-invoice')?.addEventListener('click', function() {
        console.log('📄 Downloading invoice...');
        Swal.fire({
            icon: 'info',
            title: 'Informasi',
            text: 'Fitur download invoice akan segera tersedia',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn btn-primary'
            }
        });
    });

    document.getElementById('view-booking')?.addEventListener('click', function() {
        console.log('👀 Viewing booking details...');
        Swal.fire({
            icon: 'info',
            title: 'Informasi',
            text: 'Fitur detail booking akan segera tersedia',
            confirmButtonText: 'OK',
            customClass: {
                confirmButton: 'btn btn-primary'
            }
        });
    });

    document.getElementById('back-to-home')?.addEventListener('click', function() {
        console.log('🏠 Going back to home...');
        window.location.href = "{{ url('/') }}";
    });

    document.getElementById('print-summary')?.addEventListener('click', function() {
        console.log('🖨 Printing summary...');
        window.print();
    });

    // =============================================
    // FUNGSI UNTUK MENAMPILKAN KONFIRMASI
    // =============================================
    function showConfirmation() {
        console.log('🔄 Showing confirmation...');

        // Generate kode booking
        const bookingCode = generateBookingCode();
        document.getElementById('confirm-booking-code').textContent = bookingCode;

        // Update data konfirmasi dari formData
        if (typeof formData !== 'undefined') {
            updateConfirmationDisplay();
        }

        console.log('✅ Confirmation displayed successfully');
    }

    function generateBookingCode() {
        const prefix = 'BOOK';
        const timestamp = Date.now().toString().slice(-6);
        const random = Math.random().toString(36).substring(2, 5).toUpperCase();
        return `${prefix}${timestamp}${random}`;
    }

    function updateConfirmationDisplay() {
        // Update informasi booking
        if (formData.bookingDate) {
            document.getElementById('confirm-booking-date').textContent = formData.bookingDate;
        }

        if (formData.startTime && formData.endTime) {
            document.getElementById('confirm-booking-time').textContent =
                `${formData.startTime} - ${formData.endTime}`;
        }

        if (formData.duration) {
            document.getElementById('confirm-booking-duration').textContent = formData.duration;
        }

        // Update detail pembayaran
        if (formData.totalPrice) {
            document.getElementById('confirm-total-payment').textContent = formData.totalPrice;
        }

        // Update equipment
        if (formData.selectedEquipment && formData.selectedEquipment.length > 0) {
            displayEquipmentConfirmation(formData.selectedEquipment);
        }
    }

    function displayEquipmentConfirmation(equipment) {
        const noEquipmentDiv = document.getElementById('no-equipment-confirm');
        const equipmentListDiv = document.getElementById('equipment-confirm-list');
        const equipmentBody = document.getElementById('equipment-confirm-body');

        if (equipment.length === 0) {
            noEquipmentDiv.classList.remove('d-none');
            equipmentListDiv.classList.add('d-none');
            return;
        }

        noEquipmentDiv.classList.add('d-none');
        equipmentListDiv.classList.remove('d-none');

        let html = '';
        equipment.forEach(item => {
            const itemTotal = item.price * item.quantity * (parseInt(formData.duration) || 1);
            html += `
                <tr>
                    <td class="ps-0">
                        <span class="fw-bold">${item.name}</span>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-primary">${item.quantity}x</span>
                    </td>
                    <td class="text-center">
                        <span class="text-gray-600">Rp ${item.price.toLocaleString('id-ID')}/jam</span>
                    </td>
                    <td class="text-end pe-0">
                        <span class="fw-bold text-primary">Rp ${itemTotal.toLocaleString('id-ID')}</span>
                    </td>
                </tr>
            `;
        });

        equipmentBody.innerHTML = html;
    }

    // =============================================
    // INISIALISASI DAN FUNGSI GLOBAL
    // =============================================
    // Auto-initialize saat step 5 dibuka
    setTimeout(showConfirmation, 100);

    // Pastikan fungsi reset tersedia secara global untuk diakses dari mana saja
    window.resetBookingFormCompletely = resetBookingFormCompletely;

    // Fungsi untuk force reset (bisa dipanggil dari console browser)
    window.forceResetBooking = function() {
        console.log('🚨 FORCE RESET TRIGGERED');
        resetBookingFormCompletely();
        Swal.fire({
            icon: 'success',
            title: 'Reset Berhasil',
            text: 'Semua data booking telah direset!',
            confirmButtonText: 'OK'
        });
    };
});

// Override fungsi clearFormState yang lama dengan yang baru
if (typeof clearFormState !== 'undefined') {
    clearFormState = function() {
        console.log('🔄 Overriding clearFormState with complete reset');
        if (typeof resetBookingFormCompletely !== 'undefined') {
            resetBookingFormCompletely();
        }
    };
}
</script>

<!-- CSS Custom -->
<style>
.sticky-top {
    position: sticky;
    z-index: 10;
}

.bg-light-primary {
    background-color: #f1faff !important;
}

#confirm-booking-code {
    font-family: 'Courier New', monospace;
    letter-spacing: 2px;
}

/* Style untuk tombol Booking Lagi */
#new-booking-btn {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #000;
}

#new-booking-btn:hover {
    background-color: #e0a800;
    border-color: #e0a800;
    color: #000;
}
</style>
