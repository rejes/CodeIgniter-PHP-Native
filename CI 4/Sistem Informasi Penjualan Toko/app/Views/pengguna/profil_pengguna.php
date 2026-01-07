<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>


<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item active"><?= ($judul); ?></li>
</ol>

<div class="container-fluid ">
    <div class="card col-8">
        <table class=" table ">
            <tbody>
                <tr>
                    <td class=" font-weight-bold">Username</td>
                    <td>:</td>
                    <td><?= $user[0]['username_pengguna']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Nama</td>
                    <td>:</td>
                    <td><?= $user[0]['nama_pengguna']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">No Telepon</td>
                    <td>:</td>
                    <td><?= $user[0]['no_telepon_pengguna']; ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Alamat</td>
                    <td>:</td>
                    <td> <?php if ($user[0]['alamat_pengguna'] == null) {
                                echo "-";
                            } else {
                                echo $user[0]['alamat_pengguna'];;
                            } ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Role</td>
                    <td>:</td>
                    <td><?= $user[0]['nama_role']; ?></td>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="col-8">
        <a href="/myprofile/edit" class="btn btn-dark px-5 mt-2 float-right">Ubah data</a>
    </div>

</div>

<?= $this->endSection(); ?>