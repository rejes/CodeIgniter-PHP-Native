<?= $this->extend('layouts/dashboard-layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Kategori Foto</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/kategori-foto">Kategori Foto</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Kategori Foto</li>
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
                                <form action="/dashboard/kategori-foto/save" method="post">
                                    <?= csrf_field() ?>
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-4 col-form-label">Nama Kategori</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?= $validation->hasError('nama_kategori') ? 'is-invalid' : '' ?>" id="nama_kategori" name="nama_kategori" placeholder="Masukkan nama kategori" autofocus value="<?= old('nama_kategori') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_kategori') ?>
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
