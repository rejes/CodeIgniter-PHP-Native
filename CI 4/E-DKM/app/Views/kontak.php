<?= $this->extend('layouts/main-layouts/main-template') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2 class="text-center mb-5">Kontak Masjid Ar - Rahman</h2>
    <div class="row justify-content-center">
        <div class="col-lg-3 mb-3">
            <div class="card">
                <div class="card-body text-center m-3">
                    <i class="fa-solid fa-phone fa-2x text-primary"></i>
                    <h5 class="mt-3">Telepon</h5>
                    <p>021-558923</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3">
            <div class="card">
                <div class="card-body text-center m-3">
                    <i class="fa-brands fa-whatsapp fa-2x text-primary"></i>
                    <h5 class="mt-3">WhatsApp</h5>
                    <p>0812349123</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-3">
            <div class="card">
                <div class="card-body text-center m-3">
                    <i class="fa-solid fa-envelope fa-2x text-primary"></i>
                    <h5 class="mt-3">Email</h5>
                    <p>arrahman@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-lg-9 mb-5">
            <div class="card">
                <div class="card-body text-center m-3">
                    <i class="fa-solid fa-map-location fa-2x text-primary"></i>
                    <h5 class="mt-3">Alamat</h5>
                    <p> Jl. Raya Gudang Peluru No.1, RT.1/RW.4, Marunda, Kec. Cilincing, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14150, Indonesia</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
