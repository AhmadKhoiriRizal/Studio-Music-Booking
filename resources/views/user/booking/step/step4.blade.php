<!-- Step 4: Upload Berkas -->
<div class="step" data-step="4" id="step-4">
    <h4 class="mb-4 text-primary">Pembayaran</h4>
    {{-- <div class="row g-3">
        <div class="col-md-6">
            <label for="foto" class="form-label">Foto Profil (3x4) <span class="text-danger">*</span></label>
            <input class="form-control" type="file" id="foto" name="foto" accept="image/*" required />
            <div class="invalid-feedback">Foto profil wajib diunggah.</div>
        </div>
        <div class="col-md-6">
            <label for="file_pernyataan" class="form-label">File Pernyataan <span class="text-danger">*</span></label>
            <input class="form-control" type="file" id="file_pernyataan" name="file_pernyataan" accept=".pdf,.doc,.docx" required />
            <div class="invalid-feedback">File pernyataan wajib diunggah.</div>
        </div>
    </div> --}}
    <!-- Container utama -->
<div class="container my-5 p-4">
  <!-- Judul -->
  <h2 class="text-center mb-4 fw-bold">Biaya</h2>

  <!-- Virtual Account Section -->
  <div class="mb-5">
    <small class="text-muted">Virtual Account</small>
    <div class="row g-3 mt-2">
      <!-- Contoh data kartu Virtual Account -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="card shadow-sm border-0 py-3 px-4 d-flex flex-row align-items-center">
          <img src="https://upload.wikimedia.org/wikipedia/commons/9/90/Maybank_logo.svg" alt="Maybank" style="height: 40px; width: auto;" class="me-auto" />
          <div class="text-end">
            <small class="text-muted d-block" style="font-size: 0.75rem;">Biaya</small>
            <span class="fw-bold text-primary">Rp 4.250</span>
          </div>
        </div>
      </div>
      <!-- Copy block di atas dan ganti logo & nama bank lain -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="card shadow-sm border-0 py-3 px-4 d-flex flex-row align-items-center">
          <img src="https://upload.wikimedia.org/wikipedia/commons/c/c0/Pertamina_logo.svg" alt="PermataBank" style="height: 40px; width: auto;" class="me-auto" />
          <div class="text-end">
            <small class="text-muted d-block" style="font-size: 0.75rem;">Biaya</small>
            <span class="fw-bold text-primary">Rp 4.250</span>
          </div>
        </div>
      </div>
      <!-- Tambahkan bank lain sesuai gambar dengan struktur yang sama -->
      <!-- Contoh bank lain -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="card shadow-sm border-0 py-3 px-4 d-flex flex-row align-items-center">
          <img src="https://upload.wikimedia.org/wikipedia/commons/9/95/BNI_logo.svg" alt="BNI" style="height: 40px; width: auto;" class="me-auto" />
          <div class="text-end">
            <small class="text-muted d-block" style="font-size: 0.75rem;">Biaya</small>
            <span class="fw-bold text-primary">Rp 4.250</span>
          </div>
        </div>
      </div>
      <!-- Lanjutkan semua bank lain dengan logo dan biaya sesuai -->
    </div>
  </div>

  <!-- Convenience Store -->
  <div class="mb-4">
    <small class="text-muted">Convenience Store</small>
    <div class="row g-3 mt-2">
      <!-- Alfamart -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="card shadow-sm border-0 py-3 px-4 d-flex flex-row align-items-center">
          <img src="https://upload.wikimedia.org/wikipedia/commons/f/f3/Alfamart.svg" alt="Alfamart" style="height: 40px; width: auto;" class="me-auto" />
          <div class="text-end">
            <small class="text-muted d-block" style="font-size: 0.75rem;">Biaya *</small>
            <span class="fw-bold text-primary">Rp 3.500</span>
          </div>
        </div>
      </div>
      <!-- Indomaret -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="card shadow-sm border-0 py-3 px-4 d-flex flex-row align-items-center">
          <img src="https://upload.wikimedia.org/wikipedia/commons/1/1f/Indomaret_logo.svg" alt="Indomaret" style="height: 40px; width: auto;" class="me-auto" />
          <div class="text-end">
            <small class="text-muted d-block" style="font-size: 0.75rem;">Biaya *</small>
            <span class="fw-bold text-primary">Rp 3.500</span>
          </div>
        </div>
      </div>
      <!-- Alfamidi -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="card shadow-sm border-0 py-3 px-4 d-flex flex-row align-items-center">
          <img src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Alfamidi.svg" alt="Alfamidi" style="height: 40px; width: auto;" class="me-auto" />
          <div class="text-end">
            <small class="text-muted d-block" style="font-size: 0.75rem;">Biaya *</small>
            <span class="fw-bold text-primary">Rp 3.500</span>
          </div>
        </div>
      </div>
    </div>
    <p class="mt-2" style="font-size: 0.8rem;">
      * Biaya tambahan Rp 3.000 dibebankan kepada pelanggan pada saat pembayaran di kasir
    </p>
  </div>

  <!-- E-Wallet Section -->
  <div class="mb-3">
    <small class="text-muted">E-Wallet</small>
    <div class="row g-3 mt-2">
      <!-- OVO -->
      <div class="col-md-6 col-12">
        <div class="card shadow-sm border-0 py-3 px-4">
          <div class="d-flex align-items-center mb-2">
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/f7/OVO_logo.svg" alt="OVO" style="height: 30px; width: auto;" class="me-auto" />
          </div>
          <div class="text-end">
            <small class="text-muted d-block">Biaya Pemrosesan</small>
            <span class="fw-bold text-primary">3%</span><br />
            <small class="text-muted" style="font-size: 0.75rem;">* Min: Rp 1.000</small>
          </div>
        </div>
      </div>
      <!-- QRIS -->
      <div class="col-md-6 col-12">
        <div class="card shadow-sm border-0 py-3 px-4">
          <div class="d-flex align-items-center mb-2">
            <img src="https://upload.wikimedia.org/wikipedia/commons/4/4d/QRIS_Logo.svg" alt="QRIS" style="height: 30px; width: auto;" class="me-auto" />
          </div>
          <div class="text-end">
            <small class="text-muted d-block">Biaya Pemrosesan</small>
            <span class="fw-bold text-primary">Rp 750 + 0,7%</span>
          </div>
        </div>
      </div>
      <!-- ShopeePay -->
      <div class="col-md-6 col-12">
        <div class="card shadow-sm border-0 py-3 px-4">
          <div class="d-flex align-items-center mb-2">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/ShopeePay_logo.svg" alt="ShopeePay" style="height: 30px; width: auto;" class="me-auto" />
          </div>
          <div class="text-end">
            <small class="text-muted d-block">Biaya Pemrosesan</small>
            <span class="fw-bold text-primary">3%</span><br />
            <small class="text-muted" style="font-size: 0.75rem;">* Min: Rp 1.000</small>
          </div>
        </div>
      </div>
      <!-- DANA -->
      <div class="col-md-6 col-12">
        <div class="card shadow-sm border-0 py-3 px-4">
          <div class="d-flex align-items-center mb-2">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/Dana_logo.svg" alt="DANA" style="height: 30px; width: auto;" class="me-auto" />
          </div>
          <div class="text-end">
            <small class="text-muted d-block">Biaya Pemrosesan</small>
            <span class="fw-bold text-primary">3%</span><br />
            <small class="text-muted" style="font-size: 0.75rem;">* Min: Rp 1.000</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Catatan bawah -->
  <p class="mt-4 text-center" style="font-size: 0.8rem;">
    *QRIS support pembayaran Dana, OVO, Gopay, Linkaja, ShopeePay, BCA Mobile, Maybank, CIMB, UOB, dan lainnya,
    <a href="#" class="text-primary text-decoration-none">lihat selengkapnya</a>
  </p>
</div>


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
