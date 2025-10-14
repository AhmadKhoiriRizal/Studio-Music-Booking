"use strict";

// Class definition
var KTGeneralFullCalendarSelectDemos = function () {
    // Helper function untuk format Rupiah
    var formatRupiah = function(angka) {
        var number_string = angka.toString().replace(/[^,\d]/g, '');
        var split = number_string.split(',');
        var sisa = split[0].length % 3;
        var rupiah = split[0].substr(0, sisa);
        var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp ' + rupiah;
    }

    // Function to save calendar state to localStorage
    var saveCalendarState = function(calendar) {
        if (!calendar) return;

        const events = calendar.getEvents().map(event => ({
            id: event.id,
            title: event.title,
            start: event.start ? event.start.toISOString() : null,
            end: event.end ? event.end.toISOString() : null,
            extendedProps: event.extendedProps || {}
        }));

        const state = {
            events: events,
            currentDate: calendar.getDate().toISOString(),
            currentView: calendar.view?.type || 'timeGridDay',
            lastUpdated: new Date().toISOString()
        };

        localStorage.setItem('calendarState', JSON.stringify(state));
        console.log('💾 Calendar state saved:', state.events.length + ' events');
    }

    // Function to load calendar state from localStorage
    var loadCalendarState = function(calendar) {
        try {
            const savedState = localStorage.getItem('calendarState');
            if (savedState) {
                const state = JSON.parse(savedState);

                // Load events
                if (state.events && state.events.length > 0) {
                    state.events.forEach(eventData => {
                        try {
                            calendar.addEvent({
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
                    console.log('📥 Calendar events loaded:', state.events.length);
                }

                // Set current date if available
                if (state.currentDate) {
                    calendar.gotoDate(state.currentDate);
                }

                return true;
            }
        } catch (error) {
            console.error('Error loading calendar state:', error);
        }
        return false;
    }

    // Function to clear calendar state
    var clearCalendarState = function() {
        localStorage.removeItem('calendarState');
        console.log('🧹 Calendar state cleared');
    }

    // Function to update booking summary - DIPERBAIKI
    var updateBookingSummary = function(startDate, startTime, endDate, endTime) {
        console.log('=== updateBookingSummary called ===');
        console.log('Input:', {startDate, startTime, endDate, endTime});

        try {
            // Gunakan variable global dari window
            var basePrice = window.studioBasePrice || 0;

            console.log('Using studioBasePrice from window:', basePrice);

            if (basePrice === 0) {
                console.error('⚠️ studioBasePrice is 0! Check if variable is defined in HTML');
                return 0;
            }

            // Parse datetime
            var startDateTime = new Date(startDate + 'T' + startTime + ':00');
            var endDateTime = new Date(endDate + 'T' + endTime + ':00');

            console.log('Parsed dates:', {
                start: startDateTime.toString(),
                end: endDateTime.toString()
            });

            // Validasi tanggal
            if (isNaN(startDateTime.getTime()) || isNaN(endDateTime.getTime())) {
                console.error('Invalid date/time format');
                return 0;
            }

            // Hitung durasi dalam jam
            var durationMilliseconds = endDateTime - startDateTime;
            var durationHours = durationMilliseconds / (1000 * 60 * 60);

            console.log('Duration calculated:', durationHours, 'hours');

            // Hitung total harga
            var totalPrice = basePrice * durationHours;
            console.log('Calculation:', basePrice, 'x', durationHours, '=', totalPrice);

            // Format harga
            var formattedPrice = formatRupiah(Math.round(totalPrice));
            console.log('Formatted price:', formattedPrice);

            // Update tampilan - dengan error handling
            var durationElement = document.getElementById('summary-duration');
            var totalPriceElement = document.getElementById('summary-total-price');
            var bookingDateElement = document.getElementById('summary-booking-date');
            var bookingTimeElement = document.getElementById('summary-booking-time');

            if (durationElement) {
                durationElement.textContent = durationHours + ' Jam';
                console.log('✓ Duration updated:', durationElement.textContent);
            } else {
                console.error('✗ Duration element not found!');
            }

            if (totalPriceElement) {
                totalPriceElement.textContent = formattedPrice;
                console.log('✓ Total price updated:', totalPriceElement.textContent);
            } else {
                console.error('✗ Total price element not found!');
            }

            // Update tanggal booking di summary
            if (bookingDateElement) {
                const formattedDate = new Date(startDate).toLocaleDateString('id-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                bookingDateElement.textContent = formattedDate;
                console.log('✓ Booking date updated:', bookingDateElement.textContent);
            }

            // Update waktu booking di summary
            if (bookingTimeElement) {
                bookingTimeElement.textContent = `${startTime} - ${endTime}`;
                console.log('✓ Booking time updated:', bookingTimeElement.textContent);
            }

            // Simpan data booking ke localStorage untuk step 3
            saveBookingDataToLocalStorage({
                duration: durationHours,
                studioPrice: basePrice,
                startDate: startDate,
                startTime: startTime,
                endDate: endDate,
                endTime: endTime,
                totalPrice: formattedPrice
            });

            console.log('=== updateBookingSummary completed ===\n');
            return durationHours;

        } catch (error) {
            console.error('❌ Error in updateBookingSummary:', error);
            return 0;
        }
    }

    // Function to save booking data to localStorage for step 3
    var saveBookingDataToLocalStorage = function(bookingData) {
        const bookingState = {
            duration: bookingData.duration,
            studioPrice: bookingData.studioPrice,
            startDate: bookingData.startDate,
            startTime: bookingData.startTime,
            endDate: bookingData.endDate,
            endTime: bookingData.endTime,
            totalPrice: bookingData.totalPrice,
            lastUpdated: new Date().toISOString()
        };

        localStorage.setItem('bookingDataStep2', JSON.stringify(bookingState));
        console.log('💾 Booking data saved for step 3:', bookingState);
    }

    // Function to load booking data from localStorage
    var loadBookingDataFromLocalStorage = function() {
        try {
            const savedData = localStorage.getItem('bookingDataStep2');
            if (savedData) {
                const bookingData = JSON.parse(savedData);

                // Update summary display
                const durationElement = document.getElementById('summary-duration');
                const totalPriceElement = document.getElementById('summary-total-price');
                const bookingDateElement = document.getElementById('summary-booking-date');
                const bookingTimeElement = document.getElementById('summary-booking-time');

                if (durationElement && bookingData.duration) {
                    durationElement.textContent = bookingData.duration + ' Jam';
                }

                if (totalPriceElement && bookingData.totalPrice) {
                    totalPriceElement.textContent = bookingData.totalPrice;
                }

                if (bookingDateElement && bookingData.startDate) {
                    try {
                        const formattedDate = new Date(bookingData.startDate).toLocaleDateString('id-ID', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });
                        bookingDateElement.textContent = formattedDate;
                    } catch (error) {
                        bookingDateElement.textContent = bookingData.startDate;
                    }
                }

                if (bookingTimeElement && bookingData.startTime && bookingData.endTime) {
                    bookingTimeElement.textContent = `${bookingData.startTime} - ${bookingData.endTime}`;
                }

                console.log('📥 Booking data loaded from localStorage:', bookingData);
                return bookingData;
            }
        } catch (error) {
            console.error('Error loading booking data:', error);
        }
        return null;
    }

    // Function to calculate duration from form inputs
    var calculateDurationFromForm = function() {
        console.log('--- calculateDurationFromForm called ---');

        var startDate = document.querySelector('input[name="calendar_event_start_date"]').value;
        var startTime = document.querySelector('input[name="calendar_event_start_time"]').value;
        var endDate = document.querySelector('input[name="calendar_event_end_date"]').value;
        var endTime = document.querySelector('input[name="calendar_event_end_time"]').value;

        console.log('Form values:', {startDate, startTime, endDate, endTime});

        if (startDate && startTime && endDate && endTime) {
            return updateBookingSummary(startDate, startTime, endDate, endTime);
        } else {
            console.log('Not all fields filled yet');
            return 0;
        }
    }

    // Function to validate booking time
    var validateBookingTime = function(startDate, startTime, endDate, endTime) {
        var startDateTime = new Date(startDate + 'T' + startTime);
        var endDateTime = new Date(endDate + 'T' + endTime);

        if (endDateTime <= startDateTime) {
            return {
                valid: false,
                message: "Waktu selesai harus setelah waktu mulai"
            };
        }

        var durationHours = (endDateTime - startDateTime) / (1000 * 60 * 60);
        if (durationHours > 8) {
            return {
                valid: false,
                message: "Maksimal booking adalah 8 jam"
            };
        }

        if (durationHours < 1) {
            return {
                valid: false,
                message: "Minimal booking adalah 1 jam"
            };
        }

        var startHour = startDateTime.getHours();
        var endHour = endDateTime.getHours();

        if (startHour < 8 || endHour > 22 || (endHour === 22 && endDateTime.getMinutes() > 0)) {
            return {
                valid: false,
                message: "Studio hanya buka dari jam 08:00 hingga 22:00"
            };
        }

        if (startDateTime.getMinutes() !== 0 || endDateTime.getMinutes() !== 0) {
            return {
                valid: false,
                message: "Booking harus dalam kelipatan jam penuh (contoh: 08:00, 09:00, dst.)"
            };
        }

        return {
            valid: true,
            duration: durationHours
        };
    }

    // Function to check availability
    var checkAvailability = function(calendar, startDateTime, endDateTime, excludeEventId = null) {
        var events = calendar.getEvents();
        for (var event of events) {
            if (excludeEventId && event.id === excludeEventId) {
                continue;
            }

            var eventStart = event.start;
            var eventEnd = event.end || eventStart;

            if (
                (startDateTime >= eventStart && startDateTime < eventEnd) ||
                (endDateTime > eventStart && endDateTime <= eventEnd) ||
                (startDateTime <= eventStart && endDateTime >= eventEnd)
            ) {
                return {
                    available: false,
                    conflictingEvent: event
                };
            }
        }

        return {
            available: true
        };
    }

    // Reset form function
    var resetForm = function() {
        document.getElementById('kt_modal_add_event_form').reset();
        document.getElementById('kt_modal_add_event_form').removeAttribute('data-mode');
        document.getElementById('kt_modal_add_event_form').removeAttribute('data-event-id');
        document.getElementById('kt_modal_add_event_delete').style.display = 'none';

        // Reset summary ke default hanya jika tidak ada data tersimpan
        const savedData = loadBookingDataFromLocalStorage();
        if (!savedData) {
            document.getElementById('summary-duration').textContent = '1 Jam';
            var originalPrice = window.studioBasePrice || 0;
            document.getElementById('summary-total-price').textContent = formatRupiah(originalPrice);
        }

        loadCurrentUserData();
    }

    // Function to load current user data
    var loadCurrentUserData = function() {
        if (typeof currentUser !== 'undefined' && currentUser) {
            document.querySelector('input[name="calendar_event_name"]').value = currentUser.name || '';
            document.querySelector('input[name="calendar_event_description"]').value = currentUser.phone || currentUser.handphone || '';
            return;
        }

        var userData = localStorage.getItem('currentUser');
        if (userData) {
            try {
                var user = JSON.parse(userData);
                document.querySelector('input[name="calendar_event_name"]').value = user.name || '';
                document.querySelector('input[name="calendar_event_description"]').value = user.phone || user.handphone || '';
                return;
            } catch (e) {
                console.error('Error parsing user data:', e);
            }
        }

        var userNameMeta = document.querySelector('meta[name="current-user-name"]');
        var userPhoneMeta = document.querySelector('meta[name="current-user-phone"]');

        if (userNameMeta) {
            document.querySelector('input[name="calendar_event_name"]').value = userNameMeta.getAttribute('content') || '';
        }
        if (userPhoneMeta) {
            document.querySelector('input[name="calendar_event_description"]').value = userPhoneMeta.getAttribute('content') || '';
        }
    }

    var exampleSelect = function () {
        var date = new Date();
        var formattedDate = date.toISOString().split('T')[0];

        var calendarEl = document.getElementById('kt_docs_fullcalendar_selectable');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridDay'
            },
            initialDate: formattedDate,
            initialView: 'timeGridDay',
            navLinks: true,
            selectable: true,
            selectMirror: true,
            selectOverlap: false,
            slotMinTime: '08:00:00',
            slotMaxTime: '22:00:00',
            slotDuration: '01:00:00',
            slotLabelInterval: '01:00:00',
            slotLabelFormat: {
                hour: 'numeric',
                minute: '2-digit',
                meridiem: false,
                hour12: false
            },
            allDaySlot: false,
            slotEventOverlap: false,

            // Event ketika calendar selesai render
            datesSet: function(info) {
                // Simpan state calendar ketika view berubah
                setTimeout(() => {
                    saveCalendarState(calendar);
                }, 100);
            },

            // Event ketika event berubah
            eventChange: function(info) {
                saveCalendarState(calendar);
            },

            // Event ketika event dihapus
            eventRemove: function(info) {
                saveCalendarState(calendar);
            },

            select: function (arg) {
                console.log('\n=== Calendar Selection ===');

                resetForm();
                document.getElementById('kt_modal_add_event_form').setAttribute('data-mode', 'create');
                document.querySelector('[data-kt-calendar="title"]').textContent = 'Pilih Jadwal Booking';
                document.getElementById('kt_modal_add_event_delete').style.display = 'none';

                loadCurrentUserData();

                var startHour = arg.start.getHours().toString().padStart(2, '0') + ':00';
                var endHour = arg.end.getHours().toString().padStart(2, '0') + ':00';
                var startDateStr = arg.startStr.split('T')[0];
                var endDateStr = arg.endStr.split('T')[0];

                console.log('Selection:', {startDateStr, startHour, endDateStr, endHour});

                document.querySelector('input[name="calendar_event_start_date"]').value = startDateStr;
                document.querySelector('input[name="calendar_event_start_time"]').value = startHour;
                document.querySelector('input[name="calendar_event_end_date"]').value = endDateStr;
                document.querySelector('input[name="calendar_event_end_time"]').value = endHour;

                // Langsung update summary
                setTimeout(function() {
                    console.log('Triggering immediate update...');
                    updateBookingSummary(startDateStr, startHour, endDateStr, endHour);
                }, 100);

                var modal = new bootstrap.Modal(document.getElementById('kt_modal_add_event'));
                modal.show();
                modal._selectionData = arg;

                calendar.unselect();
            },

            eventClick: function (arg) {
                resetForm();
                document.getElementById('kt_modal_add_event_form').setAttribute('data-mode', 'edit');
                document.getElementById('kt_modal_add_event_form').setAttribute('data-event-id', arg.event.id);
                document.querySelector('[data-kt-calendar="title"]').textContent = 'Edit Jadwal Booking';
                document.getElementById('kt_modal_add_event_delete').style.display = 'block';

                document.querySelector('input[name="calendar_event_name"]').value = arg.event.title || '';
                document.querySelector('input[name="calendar_event_description"]').value = arg.event.extendedProps.description || '';

                var startHour = arg.event.start.getHours().toString().padStart(2, '0') + ':00';
                var endHour = arg.event.end ? arg.event.end.getHours().toString().padStart(2, '0') + ':00' : '';
                var startDateStr = arg.event.startStr.split('T')[0];
                var endDateStr = arg.event.end ? arg.event.endStr.split('T')[0] : '';

                document.querySelector('input[name="calendar_event_start_date"]').value = startDateStr;
                document.querySelector('input[name="calendar_event_start_time"]').value = startHour;

                if (arg.event.end) {
                    document.querySelector('input[name="calendar_event_end_date"]').value = endDateStr;
                    document.querySelector('input[name="calendar_event_end_time"]').value = endHour;
                } else {
                    var endTime = new Date(arg.event.start);
                    endTime.setHours(endTime.getHours() + 1);
                    var defaultEndHour = endTime.getHours().toString().padStart(2, '0') + ':00';
                    var defaultEndDate = endTime.toISOString().split('T')[0];

                    document.querySelector('input[name="calendar_event_end_date"]').value = defaultEndDate;
                    document.querySelector('input[name="calendar_event_end_time"]').value = defaultEndHour;
                    endDateStr = defaultEndDate;
                    endHour = defaultEndHour;
                }

                setTimeout(function() {
                    updateBookingSummary(startDateStr, startHour, endDateStr, endHour);
                }, 100);

                var modal = new bootstrap.Modal(document.getElementById('kt_modal_add_event'));
                modal.show();
                modal._eventData = arg.event;
            },

            dayMaxEvents: true,
            events: [] // Events akan dimuat dari localStorage
        });

        calendar.render();

        // Load saved calendar state
        setTimeout(() => {
            loadCalendarState(calendar);
            loadBookingDataFromLocalStorage();
        }, 500);

        // Expose calendar to window for access in form handler
        window.calendar = calendar;

        initModalHandlers(calendar);
    }

    var initModalHandlers = function(calendar) {
        var startDateInput = document.querySelector('input[name="calendar_event_start_date"]');
        var startTimeInput = document.querySelector('input[name="calendar_event_start_time"]');
        var endDateInput = document.querySelector('input[name="calendar_event_end_date"]');
        var endTimeInput = document.querySelector('input[name="calendar_event_end_time"]');

        // Real-time calculation dengan debounce
        var debounceTimer;
        var debounceCalculate = function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function() {
                calculateDurationFromForm();
            }, 100);
        };

        [startDateInput, startTimeInput, endDateInput, endTimeInput].forEach(function(input) {
            input.addEventListener('change', debounceCalculate);
            input.addEventListener('input', debounceCalculate);
        });

        document.getElementById('kt_modal_add_event_close').addEventListener('click', function() {
            var modal = bootstrap.Modal.getInstance(document.getElementById('kt_modal_add_event'));
            modal.hide();
        });

        document.getElementById('kt_modal_add_event_cancel').addEventListener('click', function() {
            var modal = bootstrap.Modal.getInstance(document.getElementById('kt_modal_add_event'));
            modal.hide();
        });

        document.getElementById('kt_modal_add_event_delete').addEventListener('click', function() {
            var modal = bootstrap.Modal.getInstance(document.getElementById('kt_modal_add_event'));
            var eventId = document.getElementById('kt_modal_add_event_form').getAttribute('data-event-id');

            if (eventId && modal._eventData) {
                Swal.fire({
                    text: 'Apakah Anda yakin ingin membatalkan booking ini?',
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Ya, Batalkan!",
                    cancelButtonText: "Tidak",
                    customClass: {
                        confirmButton: "btn btn-danger",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function (result) {
                    if (result.isConfirmed) {
                        modal._eventData.remove();
                        modal.hide();
                        resetForm();

                        // Clear booking data jika event dihapus
                        localStorage.removeItem('bookingDataStep2');

                        Swal.fire({
                            text: "Booking berhasil dibatalkan!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "OK",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            }
                        });
                    }
                });
            }
        });

        document.getElementById('kt_modal_add_event_submit').addEventListener('click', function() {
            var submitButton = this;
            var modal = bootstrap.Modal.getInstance(document.getElementById('kt_modal_add_event'));
            var mode = document.getElementById('kt_modal_add_event_form').getAttribute('data-mode');
            var eventId = document.getElementById('kt_modal_add_event_form').getAttribute('data-event-id');

            var eventName = document.querySelector('input[name="calendar_event_name"]').value;
            var eventDescription = document.querySelector('input[name="calendar_event_description"]').value;
            var startDate = document.querySelector('input[name="calendar_event_start_date"]').value;
            var startTime = document.querySelector('input[name="calendar_event_start_time"]').value;
            var endDate = document.querySelector('input[name="calendar_event_end_date"]').value;
            var endTime = document.querySelector('input[name="calendar_event_end_time"]').value;

            if (!eventName) {
                Swal.fire({
                    text: "Nama User harus diisi!",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
                return;
            }

            if (!startDate || !endDate || !startTime || !endTime) {
                Swal.fire({
                    text: "Tanggal dan waktu harus diisi!",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
                return;
            }

            var timeValidation = validateBookingTime(startDate, startTime, endDate, endTime);
            if (!timeValidation.valid) {
                Swal.fire({
                    text: timeValidation.message,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
                return;
            }

            var startDateTime = new Date(startDate + 'T' + startTime);
            var endDateTime = new Date(endDate + 'T' + endTime);
            var availability = checkAvailability(calendar, startDateTime, endDateTime, eventId);

            if (!availability.available) {
                Swal.fire({
                    text: "Waktu booking sudah dipesan! Silakan pilih waktu lain.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
                return;
            }

            submitButton.setAttribute("data-kt-indicator", "on");
            submitButton.disabled = true;

            setTimeout(function() {
                var finalDuration = updateBookingSummary(startDate, startTime, endDate, endTime);

                // Kirim data ke step 3
                if (typeof setBookingDataFromStep2 === 'function') {
                    setBookingDataFromStep2({
                        duration: finalDuration,
                        studioPrice: window.studioBasePrice,
                        startDate: startDate,
                        startTime: startTime,
                        endDate: endDate,
                        endTime: endTime
                    });
                }

                var eventData = {
                    title: eventName,
                    start: startDate + 'T' + startTime,
                    end: endDate + 'T' + endTime,
                    allDay: false,
                    extendedProps: {
                        description: eventDescription,
                        duration: finalDuration,
                        totalPrice: document.getElementById('summary-total-price').textContent
                    }
                };

                if (mode === 'edit' && eventId) {
                    var existingEvent = calendar.getEventById(eventId);
                    if (existingEvent) {
                        existingEvent.setProp('title', eventData.title);
                        existingEvent.setStart(eventData.start);
                        existingEvent.setEnd(eventData.end);
                        existingEvent.setExtendedProp('description', eventData.extendedProps.description);
                        existingEvent.setExtendedProp('duration', eventData.extendedProps.duration);
                        existingEvent.setExtendedProp('totalPrice', eventData.extendedProps.totalPrice);
                    }
                } else {
                    eventData.id = 'event_' + Date.now();
                    calendar.addEvent(eventData);
                }

                modal.hide();
                submitButton.removeAttribute("data-kt-indicator");
                submitButton.disabled = false;

                // Simpan state calendar setelah perubahan
                saveCalendarState(calendar);

                Swal.fire({
                    text: mode === 'edit' ? "Booking berhasil diupdate!" : "Booking berhasil dibuat!",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
            }, 1000);
        });
    }

    return {
        init: function () {
            console.log('=== Initializing FullCalendar ===');
            console.log('Studio base price from window:', window.studioBasePrice);

            if (typeof window.studioBasePrice === 'undefined' || window.studioBasePrice === 0) {
                console.error('⚠️ WARNING: studioBasePrice not defined in window or is 0!');
            }

            exampleSelect();
            console.log('✓ Initialization complete');
        },

        // Expose functions untuk diakses dari luar
        saveCalendarState: saveCalendarState,
        loadCalendarState: loadCalendarState,
        clearCalendarState: clearCalendarState
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTGeneralFullCalendarSelectDemos.init();
});

// Global function untuk clear semua data saat form submit
window.clearAllBookingData = function() {
    // Clear calendar state
    if (typeof KTGeneralFullCalendarSelectDemos.clearCalendarState === 'function') {
        KTGeneralFullCalendarSelectDemos.clearCalendarState();
    }

    // Clear booking data
    localStorage.removeItem('bookingDataStep2');
    localStorage.removeItem('calendarState');

    console.log('🧹 All booking data cleared');
};
