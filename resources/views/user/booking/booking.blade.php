<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>BOOKING STUDIO MUSIK</title>

    @include('user.layout.metadata')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->

    <style>
        /* Custom step indicator circles */
        .step-indicator {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            line-height: 40px;
            text-align: center;
            font-weight: 600;
            cursor: default;
            user-select: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .step-indicator.active {
            background-color: #3699ff; /* Metronic primary */
            color: white;
        }

        .step-indicator.completed {
            background-color: #1bc5bd; /* Metronic success */
            color: white;
        }

        .step-indicator.inactive {
            background-color: #e4e6ef;
            color: #7e8299;
        }

        /* Hide all steps by default */
        .step {
            visibility: hidden;
            position: absolute;
            left: 0;
            width: 100%;
            height: 0;
            overflow: hidden;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
            z-index: 0;
        }

        .step.active {
            visibility: visible;
            position: static;
            height: auto;
            opacity: 1;
            pointer-events: auto;
            z-index: 1;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Invalid input border override for Bootstrap */
        input:invalid,
        select:invalid,
        textarea:invalid {
            border-color: #f64e60 !important;
        }

        input:valid:not(:placeholder-shown),
        select:valid:not(:placeholder-shown),
        textarea:valid:not(:placeholder-shown) {
            border-color: #1bc5bd !important;
        }
        /* Custom CSS untuk FullCalendar - Hilangkan menit */
        .fc-timegrid-slot-label-frame {
            text-align: center;
        }

        .fc-timegrid-slot-label-cushion {
            font-size: 12px;
            font-weight: 600;
        }

        /* Pastikan hanya menampilkan jam saja */
        .fc-timegrid-slot-lane {
            min-height: 60px; /* Tinggi slot 1 jam */
        }

        /* Sembunyikan axis waktu jika perlu */
        .fc-timegrid-axis-frame {
            display: none;
        }

        /* Style untuk event */
        .fc-event {
            border-radius: 4px;
            border: none;
            padding: 2px 4px;
            font-size: 12px;
            font-weight: 500;
        }

        /* Custom step indicator circles */
        .step-indicator {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            line-height: 40px;
            text-align: center;
            font-weight: 600;
            cursor: default;
            user-select: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .step-indicator.active {
            background-color: #3699ff; /* Metronic primary */
            color: white;
        }

        .step-indicator.completed {
            background-color: #1bc5bd; /* Metronic success */
            color: white;
        }

        .step-indicator.inactive {
            background-color: #e4e6ef;
            color: #7e8299;
        }

        /* Hide all steps by default */
        .step {
            visibility: hidden;
            position: absolute;
            left: 0;
            width: 100%;
            height: 0;
            overflow: hidden;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
            z-index: 0;
        }

        .step.active {
            visibility: visible;
            position: static;
            height: auto;
            opacity: 1;
            pointer-events: auto;
            z-index: 1;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Invalid input border override for Bootstrap */
        input:invalid,
        select:invalid,
        textarea:invalid {
            border-color: #f64e60 !important;
        }

        input:valid:not(:placeholder-shown),
        select:valid:not(:placeholder-shown),
        textarea:valid:not(:placeholder-shown) {
            border-color: #1bc5bd !important;
        }

        @media (max-width: 768px) {
            .summary {
                flex-direction: column;
            }
            .summary-font {
                font-size: 0.8rem !important;
            }
        }
    </style>
</head>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank"
    data-kt-scrolltop="on" data-kt-sticky-landing-header="on" data-kt-landing-header="on">
    <!--begin::Theme mode setup on page load-->
    <script>
        var studioBasePrice = {{ $studio->price_per_hour }};
        var currentUser = {
            name: "{{ auth()->user()->name }}",
            phone: "{{ auth()->user()->phone }}"
        };
    </script>
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
        <div class="py-20">
            <!--begin::Container-->
            <div class="container">
    <div class="card shadow-sm w-100">
        {{-- <div class="card-header bg-primary text-white text-center py-4">
            <h1 class="h4 fw-bold">PENDAFTARAN ANGGOTA BARU SAKA BHAYANGKARA POLSEK MAYONG</h1>
        </div> --}}

        <div class="card-body">
            <!-- Step Indicators -->
            <div class="d-flex justify-content-between mb-4 px-3">
                <div class="text-center" style="justify-items: center;">
                    <div class="step-indicator active" id="step1-indicator">1</div>
                    <small class="d-block mt-2 text-muted">Pilih Paket</small>
                </div>
                <div class="text-center" style="justify-items: center;">
                    <div class="step-indicator inactive" id="step2-indicator">2</div>
                    <small class="d-block mt-2 text-muted">Pilih Jadwal</small>
                </div>
                <div class="text-center" style="justify-items: center;">
                    <div class="step-indicator inactive" id="step3-indicator">3</div>
                    <small class="d-block mt-2 text-muted">Pilih Alat Tambahan</small>
                </div>
                <div class="text-center" style="justify-items: center;">
                    <div class="step-indicator inactive" id="step4-indicator">4</div>
                    <small class="d-block mt-2 text-muted">Pembayaran</small>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="progress mb-5" style="height: 6px;">
                <div id="progress-bar" class="progress-bar bg-primary" role="progressbar" style="width: 0%;"
                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <!-- Form -->
            <form id="registration-form" method="POST" action="###" enctype="multipart/form-data" novalidate>
                @csrf

                @include('user.booking.step.step1')

                @include('user.booking.step.step2')

                @include('user.booking.step.step3')

                @include('user.booking.step.step4')

                @include('user.booking.step.step5')
            </form>
        </div>
    </div>
    </div>
            <!--end::Container-->
        </div>
        <!--end::Content Section-->
        <!--begin::Modals-->
        <!--begin::Modal - New Product-->
        <div class="modal fade" id="kt_modal_add_event" tabindex="-1" aria-hidden="true" data-bs-focus="false">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="#" id="kt_modal_add_event_form">
                @csrf
                <div class="modal-header">
                    <h2 class="fw-bold" data-kt-calendar="title">Pilih Jadwal Booking</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" id="kt_modal_add_event_close">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="fv-row mb-9">
                        <label class="fs-6 fw-semibold required mb-2">Nama User</label>
                        <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_name" readonly />
                        <div class="text-muted fs-7 mt-1">Data diambil dari profil user yang login</div>
                    </div>
                    <div class="fv-row mb-9">
                        <label class="fs-6 fw-semibold mb-2">No Handphone</label>
                        <input type="text" class="form-control form-control-solid" placeholder="" name="calendar_event_description" readonly />
                        <div class="text-muted fs-7 mt-1">Data diambil dari profil user yang login</div>
                    </div>

                    <div class="row row-cols-lg-2 g-10">
                        <div class="col">
                            <div class="fv-row mb-9">
                                <label class="fs-6 fw-semibold mb-2 required">Tanggal Mulai</label>
                                <input class="form-control form-control-solid" name="calendar_event_start_date" placeholder="Pilih tanggal mulai" id="kt_calendar_datepicker_start_date" readonly />
                            </div>
                        </div>
                        <div class="col">
                            <div class="fv-row mb-9">
                                <label class="fs-6 fw-semibold mb-2 required">Waktu Mulai</label>
                                <input class="form-control form-control-solid" name="calendar_event_start_time" placeholder="Pilih waktu mulai" id="kt_calendar_datepicker_start_time"/>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-lg-2 g-10">
                        <div class="col">
                            <div class="fv-row mb-9">
                                <label class="fs-6 fw-semibold mb-2 required">Tanggal Selesai</label>
                                <input class="form-control form-control-solid" name="calendar_event_end_date" placeholder="Pilih tanggal selesai" id="kt_calendar_datepicker_end_date" readonly />
                            </div>
                        </div>
                        <div class="col">
                            <div class="fv-row mb-9">
                                <label class="fs-6 fw-semibold mb-2 required">Waktu Selesai</label>
                                <input class="form-control form-control-solid" name="calendar_event_end_time" placeholder="Pilih waktu selesai" id="kt_calendar_datepicker_end_time"/>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-primary d-flex align-items-center p-5 mb-10">
                        <i class="ki-duotone ki-information fs-2hx text-primary me-4"></i>
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-primary">Informasi Booking</h4>
                            <span>• Minimal booking: 1 jam</span>
                            <span>• Maksimal booking: 8 jam</span>
                            <span>• Jam operasional: 08:00 - 22:00</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" id="kt_modal_add_event_delete" class="btn btn-danger me-auto" style="display: none;">
                        Batalkan Booking
                    </button>
                    <button type="reset" id="kt_modal_add_event_cancel" class="btn btn-light me-3">
                        Batal
                    </button>
                    <button type="button" id="kt_modal_add_event_submit" class="btn btn-primary">
                        <span class="indicator-label">Booking Sekarang</span>
                        <span class="indicator-progress">
                            Memproses... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
        <!--end::Modal - New Product-->
        <!--begin::Modal - New Product-->
        <div class="modal fade" id="kt_modal_view_event" tabindex="-1" data-bs-focus="false"
            aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header border-0 justify-content-end">
                        <!--begin::Edit-->
                        <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary me-2"
                            data-bs-toggle="tooltip" data-bs-dismiss="click" title="Edit Event"
                            id="kt_modal_view_event_edit">
                            <i class="ki-duotone ki-pencil fs-2"><span
                                    class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Edit-->

                        <!--begin::Edit-->
                        <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-danger me-2"
                            data-bs-toggle="tooltip" data-bs-dismiss="click"
                            title="Delete Event" id="kt_modal_view_event_delete">
                            <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span
                                    class="path4"></span><span class="path5"></span></i>
                        </div>
                        <!--end::Edit-->

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary"
                            data-bs-dismiss="modal" data-bs-toggle="tooltip"
                            data-bs-dismiss="click" title="Hide Event" data-bs-dismiss="modal">
                            <i class="ki-duotone ki-cross fs-2x"><span
                                    class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->

                    <!--begin::Modal body-->
                    <div class="modal-body pt-0 pb-20 px-lg-17">
                        <!--begin::Row-->
                        <div class="d-flex">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-calendar-8 fs-1 text-muted me-5"><span
                                    class="path1"></span><span class="path2"></span><span
                                    class="path3"></span><span class="path4"></span><span
                                    class="path5"></span><span class="path6"></span></i>
                            <!--end::Icon-->

                            <div class="mb-9">
                                <!--begin::Event name-->
                                <div class="d-flex align-items-center mb-2">
                                    <span class="fs-3 fw-bold me-3"
                                        data-kt-calendar="event_name"></span> <span
                                        class="badge badge-light-success"
                                        data-kt-calendar="all_day"></span>
                                </div>
                                <!--end::Event name-->

                                <!--begin::Event description-->
                                <div class="fs-6" data-kt-calendar="event_description"></div>
                                <!--end::Event description-->
                            </div>
                        </div>
                        <!--end::Row-->

                        <!--begin::Row-->
                        <div class="d-flex align-items-center mb-2">
                            <!--begin::Bullet-->
                            <span
                                class="bullet bullet-dot h-10px w-10px bg-success ms-2 me-7"></span>
                            <!--end::Bullet-->

                            <!--begin::Event start date/time-->
                            <div class="fs-6"><span class="fw-bold">Starts</span> <span
                                    data-kt-calendar="event_start_date"></span></div>
                            <!--end::Event start date/time-->
                        </div>
                        <!--end::Row-->

                        <!--begin::Row-->
                        <div class="d-flex align-items-center mb-9">
                            <!--begin::Bullet-->
                            <span
                                class="bullet bullet-dot h-10px w-10px bg-danger ms-2 me-7"></span>
                            <!--end::Bullet-->

                            <!--begin::Event end date/time-->
                            <div class="fs-6"><span class="fw-bold">Ends</span> <span
                                    data-kt-calendar="event_end_date"></span></div>
                            <!--end::Event end date/time-->
                        </div>
                        <!--end::Row-->

                        <!--begin::Row-->
                        <div class="d-flex align-items-center">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-geolocation fs-1 text-muted me-5"><span
                                    class="path1"></span><span class="path2"></span></i>
                            <!--end::Icon-->

                            <!--begin::Event location-->
                            <div class="fs-6" data-kt-calendar="event_location"></div>
                            <!--end::Event location-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Modal body-->
                </div>
            </div>
        </div>
        <!--end::Modal - New Product-->
        <!--end::Modals-->
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
                @include('user.layout.footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Footer Section-->
    </div>
    <!--end::Root-->

    @include('user.layout.script')
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('js/custom/apps/calendar/calendar.js') }}"></script>
    <!--end::Custom Javascript-->
    <script>
        const formData = {};

        const steps = document.querySelectorAll('.step');
        const stepIndicators = document.querySelectorAll('.step-indicator');
        const progressBar = document.getElementById('progress-bar');
        const nextButtons = document.querySelectorAll('.next-btn');
        const prevButtons = document.querySelectorAll('.prev-btn');
        const registrationForm = document.getElementById('registration-form');

        // Fungsi untuk menyimpan state ke localStorage
        // Di dalam fungsi saveFormState(), tambahkan:
        function saveFormState() {
            const state = {
                currentStep: currentStep,
                formData: formData,
                // Simpan juga data equipment
                equipmentData: {
                    selectedEquipment: window.selectedEquipment || [],
                    studioPricePerHour: window.studioPricePerHour || {{ $studio->price_per_hour }},
                    bookingDuration: window.bookingDuration || 1
                },
                calendarEvents: window.calendar ? window.calendar.getEvents().map(event => ({
                    id: event.id,
                    title: event.title,
                    start: event.start ? event.start.toISOString() : null,
                    end: event.end ? event.end.toISOString() : null,
                    extendedProps: event.extendedProps
                })) : []
            };
            localStorage.setItem('bookingFormState', JSON.stringify(state));
            console.log('💾 Full state saved');
        }

        // Di dalam fungsi loadFormState(), tambahkan:
        function loadFormState() {
            const savedState = localStorage.getItem('bookingFormState');
            if (savedState) {
                try {
                    const state = JSON.parse(savedState);
                    currentStep = state.currentStep || 1;

                    // Memuat data form yang tersimpan
                    if (state.formData) {
                        Object.assign(formData, state.formData);
                    }

                    // Memuat data equipment
                    if (state.equipmentData) {
                        window.selectedEquipment = state.equipmentData.selectedEquipment || [];
                        window.studioPricePerHour = state.equipmentData.studioPricePerHour || {{ $studio->price_per_hour }};
                        window.bookingDuration = state.equipmentData.bookingDuration || 1;
                    }

                    // Memuat calendar events
                    if (state.calendarEvents && state.calendarEvents.length > 0 && window.calendar) {
                        setTimeout(() => {
                            loadCalendarEvents(state.calendarEvents);
                        }, 500);
                    }

                } catch (error) {
                    console.error('Error loading saved state:', error);
                    currentStep = 1;
                }
            } else {
                currentStep = 1;
            }
        }

        // Fungsi untuk memuat events ke calendar
        function loadCalendarEvents(events) {
            if (!window.calendar) {
                console.error('Calendar not initialized yet');
                return;
            }

            // Clear existing events
            window.calendar.removeAllEvents();

            // Add saved events
            events.forEach(eventData => {
                try {
                    window.calendar.addEvent({
                        id: eventData.id,
                        title: eventData.title,
                        start: eventData.start,
                        end: eventData.end,
                        allDay: false,
                        extendedProps: eventData.extendedProps || {}
                    });
                } catch (error) {
                    console.error('Error loading event:', error);
                }
            });

            console.log('📅 Loaded calendar events:', events.length);
        }

        // Fungsi untuk mengisi form dengan data yang tersimpan
        function populateFormWithSavedData() {
            // Step 2 data - Calendar events
            if (formData.bookingDate) {
                document.getElementById('summary-booking-date').textContent = formData.bookingDate;
            }
            if (formData.startTime && formData.endTime) {
                document.getElementById('summary-booking-time').textContent = `${formData.startTime} - ${formData.endTime}`;
            }
            if (formData.duration) {
                document.getElementById('summary-duration').textContent = formData.duration;
            }
            if (formData.totalPrice) {
                document.getElementById('summary-total-price').textContent = formData.totalPrice;
            }

            // Step 3 data - Equipment
            if (formData.selectedEquipment && formData.selectedEquipment.length > 0) {
                // Update equipment summary di step 2
                updateEquipmentSummary(formData.selectedEquipment);
            }
        }

        // Fungsi untuk update equipment summary di step 2
        function updateEquipmentSummary(equipment) {
            const equipmentSummary = document.getElementById('summary-studio-equipment');
            if (equipmentSummary && equipment.length > 0) {
                const equipmentText = equipment.map(item =>
                    `${item.name} (${item.quantity})`
                ).join(', ');
                equipmentSummary.innerHTML = `<span class="text-white">${equipmentText}</span>`;
            }
        }

        // Fungsi untuk menghapus state (dipanggil saat form berhasil submit)
        function clearFormState() {
            localStorage.removeItem('bookingFormState');
            currentStep = 1;
            // Reset formData object
            Object.keys(formData).forEach(key => delete formData[key]);
            console.log('🧹 Form state cleared');
        }

        let currentStep = 1;

        // Update step indicators
        function updateStepIndicators() {
            stepIndicators.forEach((indicator, index) => {
                indicator.classList.remove('active', 'completed', 'inactive');
                if (index + 1 === currentStep) {
                    indicator.classList.add('active');
                } else if (index + 1 < currentStep) {
                    indicator.classList.add('completed');
                } else {
                    indicator.classList.add('inactive');
                }
            });

            // Update progress bar
            progressBar.style.width = `${((currentStep - 1) / (steps.length - 1)) * 100}%`;

            // Simpan state setiap kali step berubah
            saveFormState();
        }

        // Show current step
        function showStep(stepNumber) {
            function updateConfirmation() {
                // Update data konfirmasi dari formData
                document.getElementById('confirm-duration').textContent = formData.duration || '';
                document.getElementById('confirm-total-price').textContent = formData.totalPrice || '';
                document.getElementById('confirm-booking-date').textContent = formData.bookingDate || '';
                document.getElementById('confirm-time-slot').textContent =
                    (formData.startTime && formData.endTime) ?
                    `${formData.startTime} - ${formData.endTime}` : '';

                // Update equipment di konfirmasi
                if (formData.selectedEquipment && formData.selectedEquipment.length > 0) {
                    const equipmentList = document.getElementById('confirm-equipment-list');
                    if (equipmentList) {
                        equipmentList.innerHTML = formData.selectedEquipment.map(item =>
                            `<div class="equipment-item d-flex justify-content-between mb-2">
                                <span>${item.name}</span>
                                <span class="badge bg-primary">${item.quantity}x</span>
                            </div>`
                        ).join('');
                    }
                }
            }

            steps.forEach(step => {
                if (parseInt(step.dataset.step) === stepNumber) {
                    step.classList.add('active');
                } else {
                    step.classList.remove('active');
                }
            });

            if (stepNumber === 5) {
                updateConfirmation();
            }

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Next button click handler
        nextButtons.forEach(button => {
            button.addEventListener('click', function () {
                const currentStepForm = this.closest('.step');
                const inputs = currentStepForm.querySelectorAll('input[required], select[required]');
                let isValid = true;

                inputs.forEach(input => {
                    if (!input.checkValidity()) {
                        input.classList.add('border-red-500');
                        isValid = false;
                    } else {
                        input.classList.remove('border-red-500');
                    }
                });

                if (!isValid) {
                    alert('Harap lengkapi semua field yang diperlukan!');
                    return;
                }

                // Simpan data ke formData sesuai step
                if (currentStep === 1) {
                    // Data step 1 jika ada
                } else if (currentStep === 2) {
                    // Simpan data dari calendar summary
                    saveCalendarDataToFormData();
                } else if (currentStep === 3) {
                    // Simpan data equipment
                    saveEquipmentDataToFormData();
                } else if (currentStep === 4) {
                    // Data step 4 jika ada
                }

                if (currentStep < steps.length) {
                    currentStep++;
                    updateStepIndicators();
                    showStep(currentStep);
                }
            });
        });

        // Previous button click handler
        prevButtons.forEach(button => {
            button.addEventListener('click', function () {
                if (currentStep > 1) {
                    currentStep--;
                    updateStepIndicators();
                    showStep(currentStep);
                }
            });
        });

        // Fungsi untuk menyimpan data calendar ke formData
        function saveCalendarDataToFormData() {
            // Ambil data dari summary
            formData.duration = document.getElementById('summary-duration').textContent;
            formData.totalPrice = document.getElementById('summary-total-price').textContent;
            formData.pricePerHour = document.getElementById('summary-price-per-hour').textContent;
            formData.bookingDate = document.getElementById('summary-booking-date').textContent;
            formData.bookingTime = document.getElementById('summary-booking-time').textContent;

            // Simpan juga data jadwal jika ada event yang dipilih
            if (window.calendar) {
                const events = window.calendar.getEvents();
                if (events.length > 0) {
                    const latestEvent = events[events.length - 1];
                    formData.bookingDate = latestEvent.startStr.split('T')[0];
                    formData.startTime = latestEvent.start.getHours().toString().padStart(2, '0') + ':00';
                    formData.endTime = latestEvent.end ? latestEvent.end.getHours().toString().padStart(2, '0') + ':00' : '';
                }
            }

            console.log('💾 Saved calendar data:', formData);
        }

        // Fungsi untuk menyimpan data equipment ke formData
        // Di dalam fungsi saveEquipmentDataToFormData(), perbaiki menjadi:
        function saveEquipmentDataToFormData() {
            // Ambil data equipment dari localStorage atau window
            try {
                const savedState = localStorage.getItem('bookingFormState');
                if (savedState) {
                    const state = JSON.parse(savedState);
                    if (state.equipmentData?.selectedEquipment) {
                        formData.selectedEquipment = state.equipmentData.selectedEquipment;
                        formData.equipmentSubtotal = calculateEquipmentSubtotal();
                        formData.grandTotal = calculateGrandTotal();
                        console.log('💾 Equipment data saved to formData:', formData.selectedEquipment);
                        return;
                    }
                }
            } catch (error) {
                console.error('Error loading equipment data for form submission:', error);
            }

            // Fallback
            formData.selectedEquipment = window.selectedEquipment || [];
        }

        // Helper functions untuk calculations
        function calculateEquipmentSubtotal() {
            const equipment = formData.selectedEquipment || [];
            const duration = parseInt(formData.duration) || 1;

            return equipment.reduce((total, item) => {
                return total + (item.price * item.quantity * duration);
            }, 0);
        }

        function calculateGrandTotal() {
            const studioSubtotal = (parseInt(formData.studioPrice) || {{ $studio->price_per_hour }}) * (parseInt(formData.duration) || 1);
            const equipmentSubtotal = calculateEquipmentSubtotal();
            return studioSubtotal + equipmentSubtotal;
        }

        // Event listener untuk input changes (auto-save)
        document.addEventListener('input', function(e) {
            if (e.target.type !== 'file') {
                saveFormState();
            }
        });

        document.addEventListener('change', function(e) {
            if (e.target.type === 'file') {
                // Untuk file, simpan nama file saja
                const fileInput = e.target;
                if (fileInput.files.length > 0) {
                    formData[fileInput.name] = fileInput.files[0].name;
                }
                saveFormState();
            }
        });

        // Backup data saat user meninggalkan halaman
        window.addEventListener('beforeunload', saveFormState);

        // Global function untuk diakses dari calendar
        window.setBookingDataFromStep2 = function(bookingData) {
            formData.duration = bookingData.duration + ' Jam';
            formData.studioPrice = bookingData.studioPrice;
            formData.startDate = bookingData.startDate;
            formData.startTime = bookingData.startTime;
            formData.endDate = bookingData.endDate;
            formData.endTime = bookingData.endTime;

            // Format tanggal untuk display
            if (bookingData.startDate) {
                const formattedDate = new Date(bookingData.startDate).toLocaleDateString('id-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                formData.bookingDate = formattedDate;
            }

            saveFormState();
            console.log('📅 Booking data saved from calendar:', bookingData);
        }

        // Optional: handle form submit
        registrationForm.addEventListener('submit', function (e) {
            // Validasi final sebelum submit
            if (!registrationForm.checkValidity()) {
                e.preventDefault();
                registrationForm.reportValidity();
                return;
            }

            // Jika form berhasil disubmit, hapus state dari localStorage
            clearFormState();

            // Jika ingin submit via AJAX, tambahkan kode di sini
        });

        // Initialize dengan memuat state yang tersimpan
        window.addEventListener('load', function() {
            setTimeout(() => {
                loadFormState();
                updateStepIndicators();
                showStep(currentStep);
                console.log('🚀 Application initialized with step:', currentStep);
            }, 100);
        });

    </script>
</body>
</html>
