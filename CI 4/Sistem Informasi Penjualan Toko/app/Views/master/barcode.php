<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item active">Barcode Item</li>
</ol>



<div class="container-fluid ">


    <div class="card col-6">
        <div class="row">
            <div class="col-4">

                <div class="div pl-3 pt-3 pb-2">

                    <?= barcode($kode); ?>
                    <p><?= $kode; ?></p>
                    <a href="/Item" id="btn-back" class="text-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>

        </div>
    </div>

</div>









<?= $this->endSection(); ?>