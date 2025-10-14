<!-- Step 2: Data Sekolah -->
<style>
/* Custom CSS untuk tinggi FullCalendar */
#kt_docs_fullcalendar_selectable {
    width: 100% !important;
    height: 800px !important; /* Tinggi fixed yang lebih besar */
    min-height: 800px !important;
}

.fc .fc-view-harness {
    height: 750px !important; /* Tinggi area view */
    min-height: 750px !important;
}

.fc .fc-scroller-liquid-absolute {
    height: 100% !important;
}

/* Time slots lebih tinggi */
.fc-timegrid-slot {
    height: 60px !important; /* Tinggi setiap slot waktu */
    min-height: 60px !important;
}

.fc-timegrid-slot-lane {
    height: 60px !important;
    min-height: 60px !important;
}

/* Event container lebih tinggi */
.fc-timegrid-col-events {
    min-height: 60px !important;
}

/* Scroll area untuk banyak data */
.fc-timegrid-body {
    max-height: 700px !important;
    min-height: auto;
    overflow-y: auto !important;
}

/* Calendar header tetap di atas */
.fc-header-toolbar {
    margin-bottom: 1rem !important;
}

/* Responsive height adjustments */
@media (max-width: 768px) {
    #kt_docs_fullcalendar_selectable {
        height: 600px !important;
        min-height: 600px !important;
    }
}

@media (min-width: 1200px) {
    #kt_docs_fullcalendar_selectable {
        height: 900px !important;
        min-height: 900px !important;
    }
}

/* Scrollbar styling untuk calendar */
.fc-timegrid-body::-webkit-scrollbar {
    width: 8px;
}

.fc-timegrid-body::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.fc-timegrid-body::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 4px;
}

.fc-timegrid-body::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

/* Loading state untuk calendar */
.calendar-loading {
    opacity: 0.6;
    pointer-events: none;
}

.calendar-loading::after {
    content: "Memuat data...";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(255,255,255,0.9);
    padding: 10px 20px;
    border-radius: 5px;
    z-index: 1000;
}
</style>
<div class="step" data-step="2" id="step-2">
    <h4 class="mb-4 text-primary">Pilih Jadwal Booking</h4>

    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Calendar-->
        <div id="kt_docs_fullcalendar_selectable"></div>
        <!--end::Calendar-->
    </div>
    <!--end::Card body-->

    <!--begin::Content Section-->
    <!-- BAGIAN SUMMARY - PERBAIKAN -->
    <div class="d-flex flex-stack rounded-3 p-6 gap-3 mt-6">
        <!-- Summary Box 1 -->
        <div class="d-flex flex-stack bg-primary rounded-3 p-6 w-100" style="height: -webkit-fill-available; align-items: flex-start;">
            <!--begin::Content-->
            <div class="fs-6 fw-bold text-white">
                <span class="d-block lh-1 mb-2">Nama User</span>
                <span class="d-block mb-2">Nomer Handphone</span>
                <span class="d-block mb-2">Nama Studio</span>
                <span class="d-block mb-2">Tipe</span>
                <span class="d-block mb-2">Kapasitas</span>
                <span class="d-block mb-2">Tanggal Booking</span>
                <span class="d-block mb-2">Waktu Booking</span> <!-- ⭐ TAMBAHKAN INI -->
                <span class="d-block mb-2">Equipment</span>
            </div>
            <!--end::Content-->

            <!--begin::Content-->
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
            <!--end::Content-->

            <!--begin::Content-->
            <div class="fs-6 fw-bold text-white text-end">
                <span class="d-block lh-1 mb-2" id="summary-studio-name">{{ $currentUser->name }}</span>
                <span class="d-block mb-2" id="summary-studio-phone">{{ $currentUser->phone }}</span>
                <span class="d-block mb-2" id="summary-studio-name-studio">{{ $studio->name }}</span>
                <span class="d-block mb-2" id="summary-studio-type">{{ ucfirst($studio->type) }}</span>
                <span class="d-block mb-2" id="summary-studio-capacity">{{ $studio->kapasitas }} Orang</span>
                <span class="d-block mb-2" id="summary-booking-date">-</span>
                <span class="d-block mb-2" id="summary-booking-time">-</span> <!-- ⭐ TAMBAHKAN INI -->
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

        <!-- Summary Box 2 - YANG DIPERBAIKI -->
        <div class="d-flex flex-stack bg-primary rounded-3 p-6 w-100" style="height: -webkit-fill-available; align-items: flex-start;">
            <!--begin::Content-->
            <div class="fs-6 fw-bold text-white">
                <span class="d-block lh-1 mb-2">Harga Perjam</span>
                <span class="d-block mb-2">Durasi Booking</span>
                <span class="d-block mb-2">Total Pembayaran</span>
            </div>
            <!--end::Content-->

            <!--begin::Content-->
            <div class="fs-6 fw-bold text-white text-center" style="margin-left: -25%">
                <span class="d-block lh-1 mb-2">:</span>
                <span class="d-block mb-2">:</span>
                <span class="d-block mb-2">:</span>
            </div>
            <!--end::Content-->

            <!--begin::Content-->
            <div class="fs-6 fw-bold text-white text-end">
                <!-- ⭐ PERBAIKAN: Tambahkan data-price="{{ $studio->price_per_hour }}" -->
                <span class="d-block lh-1 mb-2"
                    id="summary-price-per-hour"
                    data-price="{{ $studio->price_per_hour }}">
                    Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}
                </span>

                <span class="d-block mb-2" id="summary-duration">1 Jam</span>

                <span class="d-block mb-2" id="summary-total-price">
                    Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}
                </span>
            </div>
            <!--end::Content-->
        </div>
    </div>
    <!--end::Content Section-->

    <div class="d-flex justify-content-between mt-4">
        <button type="button" class="btn btn-secondary prev-btn">Kembali</button>
        <button type="button" class="btn btn-primary next-btn">Lanjut</button>
    </div>
</div>

{{-- <style>
    #kt_calendar_app {
        min-height: 600px;
        height: auto;
    }
</style> --}}


