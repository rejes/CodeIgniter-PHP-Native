<?= $this->extend('layouts/dashboard-layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Data Pengurus</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard/pengurus">Pengurus</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ubah Data Pengurus</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <form action="/dashboard/pengurus/<?= $pengurus['id'] ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="PUT" />
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Masukkan nama" autofocus value="<?= $pengurus['name'] ?? old('name') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('name') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?= $validation->hasError('jabatan') ? 'is-invalid' : '' ?>" id="jabatan" name="jabatan" placeholder="Masukkan jabatan" value="<?= $pengurus['jabatan'] ?? old('jabatan') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jabatan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : '' ?>"><?= $pengurus['alamat'] ?? old('alamat') ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('alamat') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="no_telp" class="col-sm-4 col-form-label">No. Handphone</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control <?= $validation->hasError('no_telp') ? 'is-invalid' : '' ?>" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Handphone" value="<?= $pengurus['no_telp'] ?? old('no_telp') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('no_telp') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3 flex align-items-center">
                                        <button type="reset" class="btn btn-danger me-3" value="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
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

