<?= $this->extend('layouts/error-layouts/error') ?>

<?= $this->section('content') ?>
<div class="error-page container">
    <div class="col-md-8 col-12 offset-md-2">
        <img class="img-error" src="/assets/images/samples/error-404.png" alt="Not Found">
        <div class="text-center">
            <h1 class="error-title">Tidak Ditemukan</h1>
            <p class='fs-5 text-gray-600'>Halaman yang anda cari tidak ditemukan.</p>
            <a href="/" class="btn btn-lg btn-outline-primary mt-3 mb-5">Ke Halaman Utama</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
