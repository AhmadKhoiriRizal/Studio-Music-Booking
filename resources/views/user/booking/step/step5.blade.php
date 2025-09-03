<!-- Step 5: Konfirmasi -->
<div class="step" data-step="5" id="step-5">
    <h4 class="mb-4 text-primary">Konfirmasi Pembayaran</h4>

    <div class="mb-4 p-3 bg-light rounded">
        <h5 class="text-primary mb-3">Data Pribadi</h5>
        <div class="row g-3">
            <div class="col-md-6"><strong>Nama Lengkap:</strong> <span id="confirm-nama"></span></div>
            <div class="col-md-6"><strong>Tempat Lahir:</strong> <span id="confirm-tempat_lahir"></span></div>
            <div class="col-md-6"><strong>Tanggal Lahir:</strong> <span id="confirm-tanggal_lahir"></span></div>
            <div class="col-md-6"><strong>Jenis Kelamin:</strong> <span id="confirm-jenis_kelamin"></span></div>
            <div class="col-12"><strong>Alamat:</strong> <span id="confirm-alamat"></span></div>
            <div class="col-md-6"><strong>Nomor Telepon:</strong> <span id="confirm-no_hp"></span></div>
            <div class="col-md-6"><strong>Email:</strong> <span id="confirm-email"></span></div>
        </div>
    </div>

    <div class="mb-4 p-3 bg-light rounded">
        <h5 class="text-primary mb-3">Data Sekolah</h5>
        <div class="row g-3">
            <div class="col-md-6"><strong>Nama Sekolah:</strong> <span id="confirm-sekolah"></span></div>
            <div class="col-md-6"><strong>Nama Orang Tua:</strong> <span id="confirm-nama_ortu"></span></div>
            <div class="col-md-6"><strong>Pekerjaan Orang Tua:</strong> <span id="confirm-pekerjaan_ortu"></span></div>
        </div>
    </div>

    <div class="mb-4 p-3 bg-light rounded">
        <h5 class="text-primary mb-3">Data Tambahan</h5>
        <div class="row g-3">
            <div class="col-md-6"><strong>Hobi:</strong> <span id="confirm-hobi"></span></div>
            <div class="col-md-6"><strong>Tinggi Badan:</strong> <span id="confirm-tinggi_badan"></span></div>
            <div class="col-md-6"><strong>Berat Badan:</strong> <span id="confirm-berat_badan"></span></div>
            <div class="col-md-6"><strong>Golongan Darah:</strong> <span id="confirm-golongan_darah"></span></div>
        </div>
    </div>

    <div class="mb-4 p-3 bg-light rounded">
        <h5 class="text-primary mb-3">Berkas</h5>
        <div class="row g-3 align-items-center">
            <div class="col-md-4 text-center">
                <strong>Foto Profil</strong>
                <img id="confirm-foto-preview" src="https://placehold.co/120x160" alt="Pratinjau foto profil yang diunggah"
                    class="img-thumbnail mt-2" style="width: 120px; height: 160px; object-fit: cover;" />
            </div>
            <div class="col-md-8">
                <strong>File Pernyataan:</strong>
                <p id="confirm-file_pernyataan" class="mb-0"></p>
            </div>
        </div>
    </div>

    <div class="form-check mb-4">
        <input class="form-check-input" type="checkbox" id="agree" name="agree" required />
        <label class="form-check-label" for="agree">
            Saya menyatakan bahwa data yang diisi adalah benar dan dapat dipertanggungjawabkan.
        </label>

</div>

<div class="flex justify-between">
    <button type="button"
        class="prev-btn bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400 transition">Kembali</button>
    <button type="submit"
        class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition">Kirim
        Pendaftaran</button>
</div>
</div>
