<?= $this->extend('layouts/dashboard-layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Password</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php if(session()->getFlashdata('error')) : ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('success')) : ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <form action="/dashboard/change-password" method="post">
                                    <?= csrf_field() ?>
                                    <div class="row mb-5">
                                        <label for="oldPassword" class="col-sm-5 col-form-label">Password lama</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control <?= $validation->hasError('oldPassword') ? 'is-invalid' : '' ?>" id="oldPassword" name="oldPassword" placeholder="Masukkan password lama" autofocus>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('oldPassword') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-sm-5 col-form-label">Password baru</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control <?= $validation->hasError('newPassword') ? 'is-invalid' : '' ?>" id="newPassword" name="newPassword" placeholder="Masukkan password baru">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('newPassword') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="confPassword" class="col-sm-5 col-form-label">Konfirmasi password baru</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control <?= $validation->hasError('confPassword') ? 'is-invalid' : '' ?>" id="confPassword" name="confPassword" placeholder="Ulangi password baru">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('confPassword') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-3">Ubah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>
<?= $this->endSection() ?>
