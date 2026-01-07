<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>


<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/myprofil" id="btn-back" class="text-white">Profile Saya</a></li>
    <li class="breadcrumb-item active"><?= ($judul); ?></li>
</ol>
<div class="container-fluid ">
    <div class="card p-3">
        <div class="row">
            <div class="col-6">
                <form action="/pengaturan/pengguna/updateprofile" method="POST" class="mt-4 mx-2">
                    <?= csrf_field(); ?>
                    <div class="form-group ">
                        <label class="font-weight-bold">Username </label>
                        <input type="text"
                            class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                            name="username" value="<?= $user[0]['username_pengguna']; ?>">
                        <div id=" username" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('username'); ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">nama </label>
                        <input type="text"
                            class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama"
                            value="<?= $user[0]['nama_pengguna']; ?>">
                        <div id=" nama" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('nama'); ?> </span>
                        </div>
                    </div>

            </div>
            <div class="col-6 ">
                <div class="form-group mt-4">
                    <label class="font-weight-bold">telepon </label>
                    <input type="number"
                        class="form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>"
                        name="telepon" value="<?= $user[0]['no_telepon_pengguna']; ?>">
                    <div id=" telepon" class="invalid-feedback text-left ml-1 mt-0">
                        <span> <?= $validation->getError('telepon'); ?> </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">alamat </label>
                    <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
                        name=" alamat" id="alamat" cols="10" rows="5"> <?= $user[0]['alamat_pengguna']; ?></textarea>
                    <div id=" alamat" class="invalid-feedback text-left ml-1 mt-0">
                        <span> <?= $validation->getError('alamat'); ?> </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark  align-content-center mb-3 px-5 float-right">Edit</button>
                </form>
                <div class="form-group ml-4">

                </div>

            </div>

        </div>

        <a href="/pengaturan/pengguna/profil_pengguna" id="btn-back" class="text-dark ml-3 pb-3"><i
                class="fas fa-arrow-left"></i>
            Kembali</a>
    </div>

</div>

<?= $this->endSection(); ?>