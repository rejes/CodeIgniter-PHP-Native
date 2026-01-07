<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item active"><?= ($judul); ?></li>
</ol>
<div class="container-fluid ">
    <div class="card col-6">

        <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger mt-2" role="alert">
            <?= session()->getFlashdata('gagal')  ?>
        </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('berhasil')) : ?>
        <div class="alert alert-success mt-2" role="alert">
            <?= session()->getFlashdata('berhasil')  ?>
        </div>
        <?php endif; ?>
        <form class="<?= (session()->getFlashdata('gagal')) ? 'pb-4 px-4' : 'p-4'; ?>" method="POST"
            action="/Pengaturan/pengguna/savepassword">
            <div class="form-group">
                <label for="passwordlama" class="font-weight-bold">Password lama</label>
                <input type="password"
                    class="form-control <?= ($validation->hasError('passwordlama')) ? 'is-invalid' : ''; ?>"
                    id="passwordlama" name="passwordlama">
                <div class="invalid-feedback text-left ml-1 mt-0">
                    <span id="passwordlamahelp" class="form-text text-muted text-danger">
                        <?= $validation->getError('passwordlama'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="passwordbaru" class="font-weight-bold">Password baru</label>
                <input type="password"
                    class="form-control <?= ($validation->hasError('passwordbaru')) ? 'is-invalid' : ''; ?>"
                    id="passwordbaru" name="passwordbaru">
                <div class="invalid-feedback text-left ml-1 mt-0">
                    <span class="form-text text-muted text-danger">
                        <?= $validation->getError('passwordbaru'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="passwordbaru" class="font-weight-bold">Komfirmasi Password baru</label>
                <input type="password"
                    class="form-control <?= ($validation->hasError('passwordkonfirmasi')) ? 'is-invalid' : ''; ?>"
                    id="passwordkonfirmasi" name="passwordkonfirmasi">
                <div class="invalid-feedback text-left ml-1 mt-0">
                    <span class="form-text text-muted text-danger">
                        <?= $validation->getError('passwordkonfirmasi'); ?></span>
                </div>
            </div>
            <button type="submit" class="btn btn-dark">Simpan</button>
        </form>
    </div>
</div>



<?= $this->endSection(); ?>