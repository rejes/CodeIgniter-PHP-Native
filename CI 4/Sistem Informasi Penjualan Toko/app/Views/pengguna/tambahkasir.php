<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/Kasir" id="btn-back" class="text-white">Kasir</a></li>
    <li class="breadcrumb-item active">Tambah Kasir</li>
</ol>

<div class="container-fluid ">
    <div class="card mb-3">
        <form action="/pengaturan/kasir/simpan" method="POST">
            <?= csrf_field(); ?>
            <div class="row m-4 ">
                <div class="col-6">
                    <div class="form-group">
                        <label for="username" class="pb-0 font-weight-bold">Username</label>
                        <input type="text"
                            class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                            id="username" placeholder="masukan username" name="username"
                            value="<?= old('username'); ?>">
                        <div id=" username" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('username'); ?> </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Nama</label>
                        <input type="text"
                            class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama"
                            placeholder="masukan nama" name="nama" value="<?= old('nama'); ?>">
                        <div id=" nama" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('nama'); ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="font-weight-bold">Telepon</label>
                        <input type="number"
                            class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?> "
                            id="telepon" placeholder="masukan telepon" name="telepon" value="<?= old('telepon'); ?>">
                        <div id=" telepon" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('telepon'); ?> </span>
                        </div>
                    </div>
                </div>
                <div class=" col-6">
                    <div class="form-group">
                        <label for="alamat" class="font-weight-bold">Alamat</label>
                        <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
                            id="alamat" name="alamat" style="height: 125px;" value="<?= old('alamat'); ?>"></textarea>
                        <div id=" alamat" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('alamat'); ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Password</label>
                        <input type="password"
                            class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?> "
                            id="password" aria-describedby="emailHelp" placeholder="masukan password" name="password">
                        <div id=" password" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('password'); ?> </span>
                        </div>
                    </div>
                    <div class="form-group pt-3 ">
                        <button type="submit"
                            class="btn btn-dark  align-content-center mt-3 px-5 float-right">Simpan</button>
                    </div>
                </div>

            </div>



        </form>
        <div class="form-group ml-4">
            <a href="/pengguna" id="btn-back" class="text-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>


</div>

<?= $this->endSection(); ?>