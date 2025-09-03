<!-- Step 1: Data Diri -->
<div class="step active" data-step="1" id="step-1">
    <h4 class="mb-4 text-primary">Detail Paket</h4>
    {{-- <!--begin::Content Section-->
        <div class="py-20">
            <!--begin::Container-->
            <div class="container"> --}}
                <!-- Main Content -->
                <main class="container main-section py-10">
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
            {{-- </div>
            <!--end::Container-->
        </div>
        <!--end::Content Section--> --}}
        <!--begin::Content Section-->
        <div class="d-flex flex-stack rounded-3 p-6 gap-3">
            <div class="d-flex flex-stack bg-success rounded-3 p-6 w-100" style="height: -webkit-fill-available; align-items: flex-start;">
                <!--begin::Content-->
                <div class="fs-6 fw-bold text-white">
                    <span class="d-block lh-1 mb-2">Subtotal</span>
                    <span class="d-block mb-2">Discounts</span>
                    <span class="d-block mb-6">Tax(12%)</span>
                    <span class="d-block fs-2 lh-1">Total</span>
                </div>
                <!--end::Content-->

                <!--begin::Content-->
                <div class="fs-6 fw-bold text-white text-center" style="margin-left: -25%">
                    <span class="d-block lh-1 mb-2">:</span>
                    <span class="d-block mb-2">:</span>
                    <span class="d-block mb-6">:</span>
                    <span class="d-block fs-2 lh-1">:</span>
                </div>
                <!--end::Content-->

                <!--begin::Content-->
                <div class="fs-6 fw-bold text-white text-end">
                    <span class="d-block lh-1 mb-2" data-kt-pos-element="total">$100.50</span>
                    <span class="d-block mb-2" data-kt-pos-element="discount">-$8.00</span>
                    <span class="d-block mb-6" data-kt-pos-element="tax">$11.20</span>
                    <span class="d-block fs-2 lh-1" data-kt-pos-element="grant-total">$93.46</span>
                </div>
                <!--end::Content-->
            </div>
            <div class="d-flex flex-stack bg-success rounded-3 p-6 w-100" style="height: -webkit-fill-available; align-items: flex-start;">
                <!--begin::Content-->
                <div class="fs-6 fw-bold text-white">
                    <span class="d-block lh-1 mb-2">Subtotal</span>
                    <span class="d-block mb-2">Discounts</span>
                    <span class="d-block mb-2">Discounts</span>
                    <span class="d-block mb-6">Tax(12%)</span>
                    <span class="d-block fs-2 lh-1">Total</span>
                </div>
                <!--end::Content-->

                <!--begin::Content-->
                <div class="fs-6 fw-bold text-white text-center" style="margin-left: -25%">
                    <span class="d-block lh-1 mb-2">:</span>
                    <span class="d-block mb-2">:</span>
                    <span class="d-block mb-2">:</span>
                    <span class="d-block mb-6">:</span>
                    <span class="d-block fs-2 lh-1">:</span>
                </div>
                <!--end::Content-->

                <!--begin::Content-->
                <div class="fs-6 fw-bold text-white text-end">
                    <span class="d-block lh-1 mb-2" data-kt-pos-element="total">$100.50</span>
                    <span class="d-block mb-2" data-kt-pos-element="discount">-$8.00</span>
                    <span class="d-block mb-2" data-kt-pos-element="discount">-$8.00</span>
                    <span class="d-block mb-6" data-kt-pos-element="tax">$11.20</span>
                    <span class="d-block fs-2 lh-1" data-kt-pos-element="grant-total">$93.46</span>
                </div>
                <!--end::Content-->
            </div>
        </div>
        <!--end::Content Section-->

    <div class="d-flex justify-content-between mt-4">
        <a href="###" class="btn btn-secondary disabled">Kembali</a>
        <button type="button" class="btn btn-primary next-btn">Lanjut</button>
    </div>
</div>

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

