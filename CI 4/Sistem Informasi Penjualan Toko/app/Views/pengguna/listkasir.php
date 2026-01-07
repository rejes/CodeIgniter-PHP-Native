<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>



<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item active">Kasir</li>
</ol>

<div class="container-fluid ">
    <div class="card p-4 mb-3">
        <?php if (session()->getFlashdata('berhasil')) :  ?>
        <div class="alert alert-success " role="alert">
            <?= session()->getFlashdata('berhasil'); ?>
        </div>

        <?php endif; ?>
        <div class="row pb-4 ">
            <div class="col-8 ">
                <a href="/kasir/tambahkasir" class="btn btn-dark px-4"><i class="fas fa-user-plus "></i> Tambah
                    Kasir</a>
            </div>

        </div>





        <div class="table-responsive">
            <table class="table table-bordered table-striped " id="data_table">
                <thead class="bg-dark text-white text-center ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope=" col">Nama</th>
                        <th scope=" col">Username</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class=" bg-white text-center">
                    <?php $i = 1; ?>
                    <?php foreach ($kasir as $u) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $u['nama_pengguna']; ?></td>
                        <td><?= $u['username_pengguna']; ?></td>
                        <td>


                            <div class=" btn-group" role="group" aria-label="Basic example">
                                <button data-toggle="modal" data-target="#detailpengguna"
                                    data-id="<?= $u['id_pengguna']; ?>" data-username="<?= $u['username_pengguna']; ?>"
                                    data-nama="<?= $u['nama_pengguna']; ?>"
                                    data-no_telepon="<?= $u['no_telepon_pengguna']; ?>"
                                    data-alamat="<?= $u['alamat_pengguna']; ?>"
                                    class="btn btn-sm btn-outline-dark detail-pengguna">
                                    Detail</button>
                                <button data-toggle="modal" data-target="#hapuskasir"
                                    data-id="<?= $u['id_pengguna']; ?>"
                                    class="btn btn-sm btn-outline-dark hapus-pengguna"><i class="fas fa-trash-alt"></i>
                                    Hapus</button>
                            </div>
                        </td>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>








<!-- modal hapus pengguna -->
<div class="modal fade" id="hapuskasir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus penggunna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin untuk mengapus ?</p>
                <form action="/Pengaturan/Kasir/hapuskasir" method="POST">
                    <input type="hidden" class="id_hapus_pengguna" name="id_pengguna">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-dark">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="detailpengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Kasir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class=" table ">
                    <tbody>
                        <tr>
                            <td class=" font-weight-bold">Username</td>
                            <td>:</td>
                            <td class="table_username"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Nama</td>
                            <td>:</td>
                            <td class="table_nama"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">No Telepon</td>
                            <td>:</td>
                            <td class="table_telepon"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Alamat</td>
                            <td>:</td>
                            <td class="table_alamat">
                        </tr>

                    </tbody>
                </table>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>






    <?= $this->endSection(); ?>