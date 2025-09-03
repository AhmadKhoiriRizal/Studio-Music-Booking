<!-- Step 2: Data Sekolah -->
<div class="step" data-step="2" id="step-2">
    <h4 class="mb-4 text-primary">Pilih Jadwal Booking</h4>

    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Calendar-->
        <div id="kt_calendar_app"></div>
        <!--end::Calendar-->
    </div>
    <!--end::Card body-->

    {{-- <div class="row g-3">
        <div class="col-md-6">
            <label for="sekolah" class="form-label">Nama Sekolah <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="Nama sekolah/universitas" required />
            <div class="invalid-feedback">Nama sekolah wajib diisi.</div>
        </div>
        <div class="col-md-6">
            <label for="nama_ortu" class="form-label">Nama Orang Tua <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Nama orang tua" required />
            <div class="invalid-feedback">Nama orang tua wajib diisi.</div>
        </div>
        <div class="col-md-6">
            <label for="pekerjaan_ortu" class="form-label">Pekerjaan Orang Tua <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="pekerjaan_ortu" name="pekerjaan_ortu" placeholder="Pekerjaan orang tua" required />
            <div class="invalid-feedback">Pekerjaan orang tua wajib diisi.</div>
        </div>
    </div> --}}
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


