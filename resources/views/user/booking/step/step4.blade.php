<!-- Step 4: Pembayaran -->
<div class="step" data-step="4" id="step-4">
    <h4 class="mb-4 text-primary">Pilih Metode Pembayaran</h4>

    <!-- Container utama -->
    <div class="container-fluid p-0">
        <!-- Alert Info -->
        <div class="alert alert-primary d-flex align-items-center mb-6">
            <i class="ki-duotone ki-information-2 fs-2hx text-primary me-4">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <div class="d-flex flex-column">
                <h4 class="mb-1 text-primary">Informasi Pembayaran</h4>
                <span>Pilih metode pembayaran yang paling nyaman untuk Anda. Total yang harus dibayar sudah termasuk semua biaya.</span>
            </div>
        </div>

        <div class="row g-6">
            <!-- Kolom Kiri: Metode Pembayaran -->
            <div class="col-lg-8">
                <!-- Virtual Account -->
                <div class="card card-flush mb-6">
                    <div class="card-header">
                        <h3 class="card-title fw-bold">Virtual Account</h3>
                        <div class="card-toolbar">
                            <span class="badge badge-light-primary">Rekomendasi</span>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-4">
                            <!-- BCA -->
                            <div class="col-md-4 col-6">
                                <div class="payment-method-card" data-method="va" data-bank="bca" data-fee="4250">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg"
                                             alt="BCA" class="w-40px h-40px" />
                                        <div class="ms-3">
                                            <div class="fw-bold fs-6">BCA Virtual Account</div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">Biaya Admin</small>
                                        <span class="fw-bold text-primary">Rp 4.250</span>
                                    </div>
                                </div>
                            </div>

                            <!-- BNI -->
                            <div class="col-md-4 col-6">
                                <div class="payment-method-card" data-method="va" data-bank="bni" data-fee="4250">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/BNI_logo.svg"
                                             alt="BNI" class="w-40px h-40px" />
                                        <div class="ms-3">
                                            <div class="fw-bold fs-6">BNI Virtual Account</div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">Biaya Admin</small>
                                        <span class="fw-bold text-primary">Rp 4.250</span>
                                    </div>
                                </div>
                            </div>

                            <!-- BRI -->
                            <div class="col-md-4 col-6">
                                <div class="payment-method-card" data-method="va" data-bank="bri" data-fee="4250">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Bank_BRI_logo_2022.svg"
                                             alt="BRI" class="w-40px h-40px" />
                                        <div class="ms-3">
                                            <div class="fw-bold fs-6">BRI Virtual Account</div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">Biaya Admin</small>
                                        <span class="fw-bold text-primary">Rp 4.250</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Mandiri -->
                            <div class="col-md-4 col-6">
                                <div class="payment-method-card" data-method="va" data-bank="mandiri" data-fee="4250">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg"
                                             alt="Mandiri" class="w-40px h-40px" />
                                        <div class="ms-3">
                                            <div class="fw-bold fs-6">Mandiri Virtual Account</div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">Biaya Admin</small>
                                        <span class="fw-bold text-primary">Rp 4.250</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- E-Wallet -->
                <div class="card card-flush mb-6">
                    <div class="card-header">
                        <h3 class="card-title fw-bold">E-Wallet</h3>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-4">
                            <!-- QRIS -->
                            <div class="col-md-6">
                                <div class="payment-method-card" data-method="ewallet" data-provider="qris" data-fee="0.007" data-fee-fixed="750">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4d/QRIS_Logo.svg"
                                             alt="QRIS" class="w-40px h-40px" />
                                        <div class="ms-3">
                                            <div class="fw-bold fs-6">QRIS</div>
                                            <small class="text-muted">All E-Wallets</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">Biaya Admin</small>
                                        <span class="fw-bold text-primary">0.7% + Rp 750</span>
                                    </div>
                                </div>
                            </div>

                            <!-- OVO -->
                            <div class="col-md-6">
                                <div class="payment-method-card" data-method="ewallet" data-provider="ovo" data-fee="0.03" data-fee-min="1000">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f7/OVO_logo.svg"
                                             alt="OVO" class="w-40px h-40px" />
                                        <div class="ms-3">
                                            <div class="fw-bold fs-6">OVO</div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">Biaya Admin</small>
                                        <span class="fw-bold text-primary">3%</span>
                                        <small class="text-muted d-block">Min. Rp 1.000</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Dana -->
                            <div class="col-md-6">
                                <div class="payment-method-card" data-method="ewallet" data-provider="dana" data-fee="0.03" data-fee-min="1000">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/Dana_logo.svg"
                                             alt="DANA" class="w-40px h-40px" />
                                        <div class="ms-3">
                                            <div class="fw-bold fs-6">DANA</div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">Biaya Admin</small>
                                        <span class="fw-bold text-primary">3%</span>
                                        <small class="text-muted d-block">Min. Rp 1.000</small>
                                    </div>
                                </div>
                            </div>

                            <!-- ShopeePay -->
                            <div class="col-md-6">
                                <div class="payment-method-card" data-method="ewallet" data-provider="shopeepay" data-fee="0.03" data-fee-min="1000">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/ShopeePay_logo.svg"
                                             alt="ShopeePay" class="w-40px h-40px" />
                                        <div class="ms-3">
                                            <div class="fw-bold fs-6">ShopeePay</div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">Biaya Admin</small>
                                        <span class="fw-bold text-primary">3%</span>
                                        <small class="text-muted d-block">Min. Rp 1.000</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Convenience Store -->
                <div class="card card-flush">
                    <div class="card-header">
                        <h3 class="card-title fw-bold">Convenience Store</h3>
                    </div>
                    <div class="card-body pt-0">
                        <div class="alert alert-warning mb-4">
                            <i class="ki-duotone ki-information fs-2 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Biaya tambahan Rp 3.000 dibebankan kepada pelanggan pada saat pembayaran di kasir
                        </div>
                        <div class="row g-4">
                            <!-- Alfamart -->
                            <div class="col-md-4 col-6">
                                <div class="payment-method-card" data-method="cstore" data-provider="alfamart" data-fee="3500">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f3/Alfamart.svg"
                                             alt="Alfamart" class="w-40px h-40px" />
                                        <div class="ms-3">
                                            <div class="fw-bold fs-6">Alfamart</div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">Biaya Admin</small>
                                        <span class="fw-bold text-primary">Rp 3.500</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Indomaret -->
                            <div class="col-md-4 col-6">
                                <div class="payment-method-card" data-method="cstore" data-provider="indomaret" data-fee="3500">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/1f/Indomaret_logo.svg"
                                             alt="Indomaret" class="w-40px h-40px" />
                                        <div class="ms-3">
                                            <div class="fw-bold fs-6">Indomaret</div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">Biaya Admin</small>
                                        <span class="fw-bold text-primary">Rp 3.500</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Alfamidi -->
                            <div class="col-md-4 col-6">
                                <div class="payment-method-card" data-method="cstore" data-provider="alfamidi" data-fee="3500">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Alfamidi.svg"
                                             alt="Alfamidi" class="w-40px h-40px" />
                                        <div class="ms-3">
                                            <div class="fw-bold fs-6">Alfamidi</div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted d-block">Biaya Admin</small>
                                        <span class="fw-bold text-primary">Rp 3.500</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Ringkasan Pembayaran - YANG DIPERBAIKI -->
            <div class="col-lg-4">
                <div class="card card-flush sticky-top" style="top: 2rem;">
                    <div class="card-header">
                        <h3 class="card-title fw-bold">Ringkasan Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <!-- Ringkasan Awal (sebelum pilih metode) -->
                        <div id="initial-summary">
                            <div class="text-center py-4">
                                <i class="ki-duotone ki-credit-card fs-2hx text-muted mb-3"></i>
                                <div class="text-muted">Pilih metode pembayaran untuk melihat detail</div>
                            </div>
                        </div>

                        <!-- Ringkasan Detail (setelah pilih metode) -->
                        <div id="detailed-summary" class="d-none">
                            <!-- Metode Terpilih -->
                            <div class="border-bottom pb-4 mb-4">
                                <small class="text-muted d-block mb-2">Metode Pembayaran</small>
                                <div id="selected-method-display" class="d-flex align-items-center">
                                    <!-- Akan diisi oleh JavaScript -->
                                </div>
                            </div>

                            <!-- Rincian Biaya -->
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-gray-600">Subtotal Studio:</span>
                                    <span class="fw-bold text-gray-800" id="payment-studio-subtotal">Rp 0</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-gray-600">Subtotal Equipment:</span>
                                    <span class="fw-bold text-gray-800" id="payment-equipment-subtotal">Rp 0</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-gray-600">Biaya Admin:</span>
                                    <span class="fw-bold text-gray-800" id="payment-admin-fee">Rp 0</span>
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="border-top pt-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-gray-800 fw-bold fs-5">Total Pembayaran:</span>
                                    <span class="text-primary fw-bold fs-3" id="payment-grand-total">Rp 0</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Bayar -->
                        <div class="mt-6">
                            <button type="button" class="btn btn-primary w-100 py-3 fw-bold fs-5" id="proceed-payment" disabled>
                                <i class="ki-duotone ki-lock fs-2 me-2"></i>
                                Bayar Sekarang
                            </button>
                            <div class="text-center mt-3">
                                <small class="text-muted">Dengan mengklik "Bayar Sekarang", Anda menyetujui
                                    <a href="#" class="text-primary text-decoration-none">Syarat & Ketentuan</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                <span class="d-block lh-1 mb-2" id="summary-studio-name-step4">{{ $currentUser->name }}</span>
                <span class="d-block mb-2" id="summary-studio-phone-step4">{{ $currentUser->phone }}</span>
                <span class="d-block mb-2" id="summary-studio-name-studio-step4">{{ $studio->name }}</span>
                <span class="d-block mb-2" id="summary-studio-type-step4">{{ ucfirst($studio->type) }}</span>
                <span class="d-block mb-2" id="summary-studio-capacity-step4">{{ $studio->kapasitas }} Orang</span>
                <span class="d-block mb-2" id="summary-booking-date-step4">-</span>
                <span class="d-block mb-2" id="summary-booking-time-step4">-</span> <!-- ⭐ TAMBAHKAN INI -->
                <span class="d-block mb-2" id="summary-studio-equipment-step4">
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
                <span class="d-block mb-2" id="summary-duration-step4">1 Jam</span>
                <span class="d-block mb-2" id="summary-equipment-total-step4">Rp 0</span>
                <span class="d-block mb-2" id="summary-total-price-step4">
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

<!-- CSS Custom -->
<style>
.payment-method-card {
    border: 2px solid #e4e6ef;
    border-radius: 8px;
    padding: 1.25rem;
    cursor: pointer;
    transition: all 0.3s ease;
    height: 100%;
}

.payment-method-card:hover {
    border-color: #009ef7;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.payment-method-card.selected {
    border-color: #009ef7;
    background-color: #f1faff;
}

.payment-method-card.disabled {
    opacity: 0.5;
    pointer-events: none;
    cursor: not-allowed;
}

.payment-method-card .w-40px {
    width: 40px;
    height: 40px;
    object-fit: contain;
}

.sticky-top {
    position: sticky;
    z-index: 10;
}

.equipment-badge {
    background: rgba(255,255,255,0.2);
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.875rem;
}

/* Style untuk status warning */
.alert-warning-custom {
    border-left: 4px solid #ffc107;
    background-color: #fff8e1;
}
</style>

<!-- JavaScript untuk Payment - YANG DIPERBAIKI -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    let selectedPaymentMethod = null;
    let adminFee = 0;
    let paymentData = {
        studioSubtotal: 0,
        equipmentSubtotal: 0,
        baseTotal: 0
    };

    console.log('💰 Payment System Initialized');

    // Function untuk sync data dari step 3 - DIPERBAIKI
    function syncPaymentDataFromStep3() {
        console.log('🔄 Syncing data from Step 3...');

        // Ambil data langsung dari elemen Step 3
        const studioSubtotalElement = document.getElementById('studio-subtotal');
        const equipmentSubtotalElement = document.getElementById('equipment-subtotal');
        const grandTotalElement = document.getElementById('grand-total');

        // Debug: Cek elemen yang ditemukan
        console.log('Elements found:', {
            studioSubtotal: studioSubtotalElement,
            equipmentSubtotal: equipmentSubtotalElement,
            grandTotal: grandTotalElement
        });

        // Update payment data
        if (studioSubtotalElement) {
            paymentData.studioSubtotal = parsePrice(studioSubtotalElement.textContent);
            console.log('Studio subtotal:', paymentData.studioSubtotal);
        }

        if (equipmentSubtotalElement) {
            paymentData.equipmentSubtotal = parsePrice(equipmentSubtotalElement.textContent);
            console.log('Equipment subtotal:', paymentData.equipmentSubtotal);
        }

        if (grandTotalElement) {
            paymentData.baseTotal = parsePrice(grandTotalElement.textContent);
            console.log('Base total:', paymentData.baseTotal);
        }

        // Juga ambil dari summary step 3
        const durationElement = document.getElementById('summary-duration-step3');
        const equipmentTotalElement = document.getElementById('summary-equipment-total-step3');
        const totalPriceElement = document.getElementById('summary-total-price-step3');

        if (durationElement) {
            document.getElementById('summary-duration-step4').textContent = durationElement.textContent;
        }
        if (equipmentTotalElement) {
            document.getElementById('summary-equipment-total-step4').textContent = equipmentTotalElement.textContent;
        }
        if (totalPriceElement) {
            document.getElementById('summary-total-price-step4').textContent = totalPriceElement.textContent;
        }

        // Update ringkasan pembayaran TANPA menunggu metode dipilih
        updateInitialPaymentSummary();

        console.log('✅ Payment data synced:', paymentData);
    }

    // Update ringkasan awal (sebelum pilih metode)
    function updateInitialPaymentSummary() {
        console.log('📊 Updating initial payment summary...');

        // Update elemen dengan data yang sudah di-sync
        updateElementText('payment-studio-subtotal', formatRupiah(paymentData.studioSubtotal));
        updateElementText('payment-equipment-subtotal', formatRupiah(paymentData.equipmentSubtotal));
        updateElementText('payment-grand-total', formatRupiah(paymentData.baseTotal));

        console.log('Initial summary updated');
    }

    // Event listener untuk pemilihan metode pembayaran
    document.querySelectorAll('.payment-method-card').forEach(card => {
        card.addEventListener('click', function() {
            selectPaymentMethod(this);
        });
    });

    // Function untuk memilih metode pembayaran
    function selectPaymentMethod(card) {
        console.log('🎯 Selecting payment method...');

        // Reset semua selection
        document.querySelectorAll('.payment-method-card').forEach(c => {
            c.classList.remove('selected');
        });

        // Set selected
        card.classList.add('selected');

        // Simpan data metode yang dipilih
        selectedPaymentMethod = {
            method: card.dataset.method,
            provider: card.dataset.provider || card.dataset.bank,
            fee: card.dataset.fee,
            feeFixed: card.dataset.feeFixed || 0,
            feeMin: card.dataset.feeMin || 0,
            name: getPaymentMethodName(card.dataset.provider || card.dataset.bank)
        };

        console.log('Selected method:', selectedPaymentMethod);

        // Hitung biaya admin
        calculateAdminFee();

        // Tampilkan metode terpilih
        showSelectedMethod(card);

        // Tampilkan ringkasan detail
        showDetailedSummary();

        // Enable tombol bayar
        document.getElementById('proceed-payment').disabled = false;
    }

    // Hitung biaya admin berdasarkan metode
    function calculateAdminFee() {
        if (!selectedPaymentMethod) return;

        console.log('🧮 Calculating admin fee...');

        let calculatedFee = 0;

        switch(selectedPaymentMethod.method) {
            case 'va':
            case 'cstore':
                // Fixed fee
                calculatedFee = parseInt(selectedPaymentMethod.fee) || 0;
                break;

            case 'ewallet':
                if (selectedPaymentMethod.provider === 'qris') {
                    // QRIS: 0.7% + fixed fee
                    const percentageFee = paymentData.baseTotal * parseFloat(selectedPaymentMethod.fee);
                    calculatedFee = percentageFee + parseInt(selectedPaymentMethod.feeFixed);
                } else {
                    // E-wallet lain: percentage dengan minimum
                    const percentageFee = paymentData.baseTotal * parseFloat(selectedPaymentMethod.fee);
                    const minFee = parseInt(selectedPaymentMethod.feeMin) || 0;
                    calculatedFee = Math.max(percentageFee, minFee);
                }
                break;
        }

        adminFee = Math.round(calculatedFee);
        console.log('Admin fee calculated:', adminFee);

        updatePaymentSummary();
    }

    // Update ringkasan pembayaran setelah pilih metode
    function updatePaymentSummary() {
        const finalAmount = paymentData.baseTotal + adminFee;

        console.log('Updating payment summary:', {
            baseTotal: paymentData.baseTotal,
            adminFee: adminFee,
            finalAmount: finalAmount
        });

        updateElementText('payment-admin-fee', formatRupiah(adminFee));
        updateElementText('payment-grand-total', formatRupiah(finalAmount));

        // Update juga di summary box
        updateElementText('summary-total-price-step4', formatRupiah(finalAmount));
    }

    // Tampilkan metode yang dipilih
    function showSelectedMethod(card) {
        const display = document.getElementById('selected-method-display');

        // Clone card content tanpa event listeners
        const cardContent = card.cloneNode(true);
        cardContent.classList.remove('selected');
        cardContent.style.cursor = 'default';
        cardContent.style.pointerEvents = 'none';

        // Hapus event listeners dari child elements
        const buttons = cardContent.querySelectorAll('button');
        buttons.forEach(btn => {
            btn.replaceWith(btn.cloneNode(true));
        });

        display.innerHTML = '';
        display.appendChild(cardContent);
    }

    // Tampilkan ringkasan detail
    function showDetailedSummary() {
        document.getElementById('initial-summary').classList.add('d-none');
        document.getElementById('detailed-summary').classList.remove('d-none');
    }

    // Proses pembayaran
    document.getElementById('proceed-payment').addEventListener('click', function() {
        if (!selectedPaymentMethod) {
            showAlert('error', 'Pilih metode pembayaran terlebih dahulu');
            return;
        }

        const finalAmount = paymentData.baseTotal + adminFee;

        // Simpan data pembayaran ke formData
        if (typeof formData !== 'undefined') {
            formData.paymentMethod = selectedPaymentMethod;
            formData.adminFee = adminFee;
            formData.finalAmount = finalAmount;
            formData.paymentData = paymentData;
        }

        console.log('Processing payment with data:', {
            selectedPaymentMethod,
            adminFee,
            finalAmount,
            paymentData
        });

        // Tampilkan konfirmasi
        showPaymentConfirmation();
    });

    // Tampilkan konfirmasi pembayaran
    function showPaymentConfirmation() {
        const finalAmount = paymentData.baseTotal + adminFee;

        Swal.fire({
            title: 'Konfirmasi Pembayaran',
            html: `
                <div class="text-start">
                    <p>Anda akan melakukan pembayaran dengan:</p>
                    <div class="border rounded p-3 mb-3">
                        <strong>${selectedPaymentMethod.name}</strong><br>
                        <small class="text-muted">Biaya admin: ${formatRupiah(adminFee)}</small>
                    </div>
                    <div class="fs-4 fw-bold text-primary">Total: ${formatRupiah(finalAmount)}</div>
                    <div class="mt-3 text-muted fs-7">
                        <div>Subtotal Studio: ${formatRupiah(paymentData.studioSubtotal)}</div>
                        <div>Subtotal Equipment: ${formatRupiah(paymentData.equipmentSubtotal)}</div>
                    </div>
                </div>
            `,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Bayar Sekarang',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-secondary'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                processPayment();
            }
        });
    }

    // Proses pembayaran (simulasi)
    function processPayment() {
        const button = document.getElementById('proceed-payment');
        const originalText = button.innerHTML;

        button.disabled = true;
        button.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
            Memproses Pembayaran...
        `;

        // Simulasi proses pembayaran
        setTimeout(() => {
            showAlert('success', 'Pembayaran berhasil! Mengarahkan ke halaman konfirmasi...');

            // Simpan data pembayaran untuk step selanjutnya
            if (typeof formData !== 'undefined') {
                formData.paymentStatus = 'success';
                formData.paymentDate = new Date().toISOString();
            }

            // Lanjut ke step berikutnya
            if (currentStep < steps.length) {
                currentStep++;
                updateStepIndicators();
                showStep(currentStep);
            }

            button.disabled = false;
            button.innerHTML = originalText;
        }, 2000);
    }

    // Helper functions
    function parsePrice(priceText) {
        if (!priceText) return 0;
        const cleaned = priceText.replace(/[^\d]/g, '');
        return parseInt(cleaned) || 0;
    }

    function getPaymentMethodName(provider) {
        const providers = {
            // Virtual Account
            'bca': 'BCA Virtual Account',
            'bni': 'BNI Virtual Account',
            'bri': 'BRI Virtual Account',

            // E-Wallet
            'qris': 'QRIS',
            'ovo': 'OVO',

            // Convenience Store
            'alfamart': 'Alfamart',
            'indomaret': 'Indomaret',
        };

        return providers[provider] || provider;
    }

    function updateElementText(elementId, text) {
        const element = document.getElementById(elementId);
        if (element) {
            element.textContent = text;
        } else {
            console.warn('Element not found:', elementId);
        }
    }

    function formatRupiah(amount) {
        const validAmount = Number(amount) || 0;
        return 'Rp ' + validAmount.toLocaleString('id-ID');
    }

    function showAlert(type, message) {
        console.log(`${type}: ${message}`);
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: type,
                title: type === 'success' ? 'Berhasil!' : 'Peringatan',
                text: message,
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        }
    }

    // Initialize saat step 4 aktif
    function initializeStep4() {
        console.log('🚀 Initializing Step 4...');
        syncPaymentDataFromStep3();

        // Juga sync saat user kembali ke step ini
        document.addEventListener('visibilitychange', function() {
            if (!document.hidden && document.getElementById('step-4').classList.contains('active')) {
                setTimeout(syncPaymentDataFromStep3, 100);
            }
        });
    }

    // Initialize
    setTimeout(initializeStep4, 500);
});
</script>
