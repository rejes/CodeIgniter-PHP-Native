<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item active">Kategori</li>
</ol>

<div class="container-fluid ">
    <div class="card col-12">
        <div class=" my-3 mx-2">
            <?php if (session()->getFlashdata('berhasil')) :  ?>
            <div class="alert alert-success " role="alert">
                <?= session()->getFlashdata('berhasil'); ?>
            </div>
            <?php endif; ?>


            <?php if (session()->getFlashdata('error_edit')) :  ?>
            <script>
            $(document).ready(function() {
                $('.edit-kategori').trigger('click');
            });
            </script>
            <?php endif; ?>


            <?php if (session()->getFlashdata('error_tambah')) :  ?>
            <script>
            $(document).ready(function() {
                $('.tambah-kategori').trigger('click');
            });
            </script>
            <?php endif; ?>




            <div class="row pb-4 ">
                <?php if(session()->get('role_id')== 1) :?>
                <div class="col-7 ">
                    <button data-toggle="modal" data-target="#tambahkategori"
                        class="btn btn-sm btn-dark tambah-kategori px-4 py-2 mb-3">
                        <i class="fas fa-plus"></i> Tambah kategori</button>
                </div>
                <?php endif ?>

            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped " id="data_table">
                    <thead class="bg-dark text-white text-center ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope=" col">Nama</th>
                            <?php if(session()->get('role_id')== 1) :?>
                            <th scope="col">Opsi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody class=" bg-white text-center">
                        <?php $i = 1; ?>
                        <?php foreach ($kategori as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $k['nama_kategori']; ?></td>
                            <?php if(session()->get('role_id')== 1) :?>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button data-toggle="modal" data-target="#editkategori"
                                        data-id="<?= $k['id_kategori']; ?>" data-nama="<?= $k['nama_kategori']; ?>"
                                        class="btn btn-sm btn-outline-dark edit-kategori rounded-0"><i
                                            class="fas fa-edit"></i>
                                        Edit</button>

                                    <button data-toggle="modal" data-target="#hapuskategori"
                                        data-id="<?= $k['id_kategori']; ?>"
                                        class="btn btn-sm btn-outline-dark hapus-kategori rounded-0"><i
                                            class="fas fa-trash-alt"></i>
                                        Hapus</button>
                                </div>
                            </td>
                            <?php endif; ?>
                            <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if (session()->getFlashdata('gagal')) :  ?>
                <h5 class="text-center">
                    <?= session()->getFlashdata('gagal'); ?>
                </h5>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<!-- modal tambah kategori -->
<div class="modal fade" id="tambahkategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Master/Kategori/tambahkategori" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text"
                            class=" form-control <?= ($validation->hasError('nama_kategori')) ? 'is-invalid' : ''; ?>"
                            name="nama_kategori">
                        <div id="nama_kategori" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('nama_kategori'); ?> </span>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-dark">kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>



<!-- modal edit kategori -->
<div class="modal fade" id="editkategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Master/Kategori/editkategori" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="kategori_id_edit" id="kategori_id_edit" class="kategori_id_edit ">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text"
                            class=" form-control kategori_nama_edit   <?= ($validation->hasError('kategori_nama_edit')) ? 'is-invalid' : ''; ?> "
                            id="kategori_nama_edit" name="kategori_nama_edit">
                        <div id=" kategori_nama_edit" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('kategori_nama_edit'); ?> </span>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-dark">kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapuskategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin untuk mengapus ?</p>
                <form action="/Master/Kategori/hapuskategori" method="POST">
                    <input type="hidden" class="id_hapus_kategori" name="id_kategori">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-dark">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>








<?= $this->endSection(); ?>