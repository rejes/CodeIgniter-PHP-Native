<?= $this->extend('layouts/dashboard-layouts/app') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Laporan Keuangan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard/laporan-keuangan">Laporan Keuangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Laporan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php if(session()->getFlashdata('success')) : ?>
    <div class="row">
        <div class="col-lg">
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
                                <form action="/dashboard/laporan-keuangan/save" method="post">
                                    <?= csrf_field() ?>
                                    <div class="row mb-3">
                                        <label for="tglLaporan" class="col-sm-4 col-form-label">Tanggal Laporan</label>
                                        <div class="col-sm-8">
                                           <div class="input-group date" id="datepicker">
                                               <input type="text" class="form-control <?= $validation->hasError('tglLaporan') ? 'is-invalid' : '' ?>" name="tglLaporan" autocomplete="off" data-date-end-date="0d" placeholder="Pilih tanggal laporan" value="<?= old('tglLaporan') ?>">
                                               <span class="input-group-append">
                                                   <span class="input-group-text bg-white d-block">
                                                        <i class="bi bi-calendar-date"></i>
                                                   </span>
                                               </span>
                                               <div class="invalid-feedback">
                                                    <?= $validation->getError('tglLaporan') ?>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan" placeholder="Masukkan keterangan" value="<?= old('keterangan') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('keterangan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="pemasukkan" class="col-sm-4 col-form-label">Pemasukkan</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control <?= $validation->hasError('pemasukkan') ? 'is-invalid' : '' ?>" id="pemasukkan" name="pemasukkan" placeholder="Masukkan jumlah pemasukkan" value="<?= old('pemasukkan') ?? '0' ?>"/>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('pemasukkan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="pengeluaran" class="col-sm-4 col-form-label">Pengeluaran</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control <?= $validation->hasError('pengeluaran') ? 'is-invalid' : '' ?>" id="pengeluaran" name="pengeluaran" placeholder="Masukkan jumlah pengeluaran" value="<?= old('pengeluaran') ?? '0' ?>"/>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('pengeluaran') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-3">Tambah</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(function() {
        $('#datepicker').datepicker({
            todayHighlight: true
        });
    })
</script>
<?= $this->endSection() ?>

