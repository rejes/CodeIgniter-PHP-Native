<?= $this->extend('layouts/dashboard-layouts/app') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Foto Kegiatan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard/galeri">Galeri</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Foto</li>
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
                                <form action="/dashboard/galeri/save" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="row mb-3">
                                        <label for="kategori" class="col-sm-4 col-form-label">Pilih Kategori</label>
                                        <div class="col-sm-8">
                                            <select class="form-select <?= $validation->hasError('kategori') ? 'is-invalid' : '' ?>" name="kategori" >
                                                <option disabled selected>Pilih Kategori</option>
                                                <?php foreach($kategori as $k) : ?>
                                                    <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kategori') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="tglKegiatan" class="col-sm-4 col-form-label">Tanggal Kegiatan</label>
                                        <div class="col-sm-8">
                                           <div class="input-group date" id="datepicker">
                                               <input type="text" class="form-control <?= $validation->hasError('tglKegiatan') ? 'is-invalid' : '' ?>" name="tglKegiatan" id="tglKegiatan" autocomplete="off" data-date-end-date="0d" placeholder="Pilih tanggal kegiatan" value="<?= old('tglKegiatan') ?>">
                                               <span class="input-group-append">
                                                   <span class="input-group-text bg-white d-block">
                                                        <i class="bi bi-calendar-date"></i>
                                                   </span>
                                               </span>
                                               <div class="invalid-feedback">
                                                    <?= $validation->getError('tglKegiatan') ?>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="image-preview-filepond form-control <?= $validation->hasError('foto') ? 'is-invalid' : '' ?>" name="foto" id="foto">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('foto') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Tambah</button>
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
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script>
    $(function() {
        $('#datepicker').datepicker({
            todayHighlight: true
        });
    })
    FilePond.registerPlugin(
        FilePondPluginImagePreview
    );
    FilePond.create( document.querySelector('.image-preview-filepond'), { 
        storeAsFile: true,
        allowImagePreview: true, 
        allowImageFilter: false,
        allowImageExifOrientation: false,
        allowImageCrop: false,
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
    });
</script>
<?= $this->endSection() ?>

