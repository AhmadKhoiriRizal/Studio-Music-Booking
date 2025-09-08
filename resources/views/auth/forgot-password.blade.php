<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.layout.metadata')
    <title>Lupa Password - Studio Music Booking</title>
    <style>
        .method-badge {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: #f3f6f9;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }
        .whatsapp-badge {
            color: #25D366;
        }
        .email-badge {
            color: #EA4335;
        }
    </style>
</head>
<body id="kt_body" class="app-blank">
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Forgot Password -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">

                        <!--begin::Form-->
                        <form class="form w-100" method="POST" action="{{ route('password.send') }}" id="forgotPasswordForm">
                            @csrf
                            <input type="hidden" name="method" id="methodInput" value="auto">

                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Reset Password</h1>
                                <div class="text-gray-500 fw-semibold fs-6">
                                    Masukkan email atau nomor WhatsApp yang terdaftar
                                </div>
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-8 position-relative">
                                <input type="text" placeholder="Email atau nomor WhatsApp" name="login" id="loginInput"
                                    class="form-control bg-transparent" value="{{ old('login') }}"
                                    required autocomplete="off">
                                <span class="method-badge" id="methodBadge">Auto</span>
                                @error('login')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Input group-->

                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    <span class="indicator-label">
                                        <i class="ki-duotone ki-message-text-2 fs-2 me-2"></i>
                                        <span id="submitText">Kirim Kode Verifikasi</span>
                                    </span>
                                    <span class="indicator-progress">
                                        Mengirim... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                            <!--end::Submit button-->

                            <!--begin::Method info-->
                            <div class="alert alert-info d-none" id="methodInfo">
                                <div class="d-flex align-items-center">
                                    <i class="ki-duotone ki-information fs-2 me-3"></i>
                                    <div>
                                        <span id="infoText">Kode verifikasi akan dikirim via WhatsApp</span>
                                        <div class="text-muted small" id="detailText"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Method info-->
                        </form>
                        <!--end::Form-->

                        <!--begin::Back to login-->
                        <div class="text-center mt-5">
                            <a href="{{ route('login') }}" class="btn btn-light-primary">
                                <i class="ki-duotone ki-arrow-left fs-3 me-1"></i>
                                Kembali ke Login
                            </a>
                        </div>
                        <!--end::Back to login-->

                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Body-->

            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url( {{ asset('media/misc/auth-bg.png')}}">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <!--begin::Logo-->
                    <a href="/metronic8/demo1/index.html" class="mb-0 mb-lg-12">
                        <img alt="Logo" src="{{ asset('media/logos/custom-1.png') }}" class="h-60px h-lg-75px">
                    </a>
                    <!--end::Logo-->

                    <!--begin::Image-->
                    <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
                        src="{{ asset('media/misc/auth-screens.png') }}" alt="">
                    <!--end::Image-->

                    <!--begin::Title-->
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">
                        Fast, Efficient and Productive
                    </h1>
                    <!--end::Title-->

                    <!--begin::Text-->
                    <div class="d-none d-lg-block text-white fs-base text-center">
                        In this kind of post, <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the
                            blogger</a>

                        introduces a person they’ve interviewed <br> and provides some background information about

                        <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>
                        and their <br> work following this is a transcript of the interview.
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Forgot Password-->
    </div>

    @include('user.layout.script')

    <!--begin::Custom Javascript-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginInput = document.getElementById('loginInput');
            const methodInput = document.getElementById('methodInput');
            const methodBadge = document.getElementById('methodBadge');
            const methodInfo = document.getElementById('methodInfo');
            const infoText = document.getElementById('infoText');
            const detailText = document.getElementById('detailText');
            const submitText = document.getElementById('submitText');
            const submitBtn = document.getElementById('submitBtn');

            // Function to detect input type
            function detectInputType(value) {
                // Remove non-digit characters for phone check
                const cleanValue = value.replace(/\D/g, '');

                // Check if it's a phone number (min 10 digits, max 15 digits)
                if (cleanValue.length >= 10 && cleanValue.length <= 15) {
                    return 'whatsapp';
                }

                // Check if it's an email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailRegex.test(value)) {
                    return 'email';
                }

                return 'unknown';
            }

            // Function to update UI based on input type
            function updateInputType() {
                const value = loginInput.value.trim();
                const type = detectInputType(value);

                switch (type) {
                    case 'whatsapp':
                        methodInput.value = 'whatsapp';
                        methodBadge.textContent = 'WhatsApp';
                        methodBadge.className = 'method-badge whatsapp-badge';
                        infoText.textContent = 'Kode verifikasi akan dikirim via WhatsApp';
                        detailText.textContent = 'Pastikan nomor WhatsApp Anda aktif dan terdaftar';
                        submitText.textContent = 'Kirim via WhatsApp';
                        submitBtn.className = 'btn btn-success';
                        methodInfo.classList.remove('d-none');
                        break;

                    case 'email':
                        methodInput.value = 'email';
                        methodBadge.textContent = 'Email';
                        methodBadge.className = 'method-badge email-badge';
                        infoText.textContent = 'Kode verifikasi akan dikirim via Email';
                        detailText.textContent = 'Periksa inbox atau spam folder email Anda';
                        submitText.textContent = 'Kirim via Email';
                        submitBtn.className = 'btn btn-primary';
                        methodInfo.classList.remove('d-none');
                        break;

                    default:
                        methodInput.value = 'auto';
                        methodBadge.textContent = 'Auto';
                        methodBadge.className = 'method-badge';
                        infoText.textContent = 'Masukkan email atau nomor WhatsApp';
                        detailText.textContent = 'Sistem akan mendeteksi secara otomatis';
                        submitText.textContent = 'Kirim Kode Verifikasi';
                        submitBtn.className = 'btn btn-primary';
                        methodInfo.classList.add('d-none');
                        break;
                }
            }

            // Format phone number for WhatsApp
            function formatPhoneNumber(phone) {
                let cleaned = phone.replace(/\D/g, '');
                if (cleaned.startsWith('0')) {
                    cleaned = '62' + cleaned.substring(1);
                }
                return cleaned;
            }

            // Event listener for input changes
            loginInput.addEventListener('input', updateInputType);
            loginInput.addEventListener('blur', updateInputType);

            // Form submission
            document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
                const value = loginInput.value.trim();
                const type = detectInputType(value);

                // Format phone number if it's a WhatsApp request
                if (type === 'whatsapp') {
                    loginInput.value = formatPhoneNumber(value);
                }

                // Add loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.setAttribute('data-kt-indicator', 'on');
                    submitBtn.disabled = true;
                }
            });

            // Initialize on page load
            if (loginInput.value) {
                updateInputType();
            }
        });
    </script>
    <!--end::Custom Javascript-->
</body>
</html>
