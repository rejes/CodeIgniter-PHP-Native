<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item active">Supplier</li>
</ol>

<div class="container-fluid ">
    <div class="card col-12 mb-4">
        <div class=" my-3 mx-2">
            <?php if (session()->getFlashdata('berhasil')) :  ?>
            <div class="alert alert-success " role="alert">
                <?= session()->getFlashdata('berhasil'); ?>
            </div>
            <?php endif; ?>


            <?php if (session()->getFlashdata('error_tambah_supplier')) :  ?>
            <script>
            $(document).ready(function() {
                $('.tambah-supplier').trigger('click');
            });
            </script>
            <?php endif; ?>


            <?php if (session()->getFlashdata('error_edit_supplier')) :  ?>
            <script>
            $(document).ready(function() {
                $('.edit-supplier').trigger('click');
            });
            </script>
            <?php endif; ?>




            <div class="row pb-4 ">
                <?php if(session()->get('role_id')== 1) :?>
                <div class="col-7 ">
                    <button data-toggle="modal" data-target="#tambahsupplier"
                        class="btn btn-sm btn-dark tambah-supplier px-4 py-2 mb-3">
                        <i class="fas fa-plus"> </i> Tambah Supplier</button>
                </div>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped  " id="data_table">
                    <thead class="bg-dark text-white text-center ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope=" col">Nama</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">keterangan</th>
                            <?php if(session()->get('role_id')== 1) :?>
                            <th scope="col">Opsi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody class=" bg-white text-center">
                        <?php $i = 1; ?>
                        <?php foreach ($supplier as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $s['nama_supplier']; ?></td>
                            <td><?= $s['no_telepon_supplier']; ?></td>
                            <td><?= $s['alamat_supplier']; ?></td>
                            <td><button data-toggle="modal" data-target="#keterangansupplier"
                                    data-keterangan="<?= $s['keterangan_supplier'] ?>"
                                    class="btn btn-sm btn-outline-dark keterangan-supplier rounded-0">
                                    <i class="fas fa-eye"></i> Lihat</button></td>
                            <?php if(session()->get('role_id')== 1) :?>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button data-toggle="modal" data-target="#editsupplier"
                                        data-id="<?= $s['id_supplier']; ?>" data-nama="<?= $s['nama_supplier']; ?>"
                                        data-alamat="<?= $s['alamat_supplier']; ?>"
                                        data-telepon="<?= $s['no_telepon_supplier']; ?>"
                                        data-keterangan="<?= $s['keterangan_supplier'] ?>"
                                        class="btn btn-sm btn-outline-dark edit-supplier rounded-0">
                                        <i class="fas fa-edit"></i>Edit</button>

                                    <button data-toggle="modal" data-target="#hapussupplier"
                                        data-id="<?= $s['id_supplier']; ?>"
                                        class="btn btn-sm btn-outline-dark hapus-supplier rounded-0"><i
                                            class="fas fa-trash-alt"></i>
                                        Hapus</button>
                                </div>
                            </td>
                            <?php endif; ?>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- modal keterangan supplier -->
<div class="modal fade" id="keterangansupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">keterangan Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p class="isiketerangan px-2 py-1"></p>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah pelanggan -->
<div class="modal fade" id="tambahsupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Master/supplier/tambahsupplier" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text"
                            class=" form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                            name="nama">
                        <div id="nama" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('nama'); ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">NO Telepon</label>
                        <input type="number"
                            class=" form-control <?= ($validation->hasError('telepon')) ? 'is-invalid' : ''; ?>"
                            name="telepon">
                        <div id="telepon" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('telepon'); ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Alamat</label>
                        <textarea
                            class=" form-control    <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?> "
                            name="alamat" id="alamat" cols="30" rows="5"></textarea>

                        <div id=" alamat" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('alamat'); ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">keterangan</label>
                        <textarea
                            class=" form-control    <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?> "
                            name="keterangan" id="keterangan" cols="30" rows="5"></textarea>

                        <div id=" keterangan" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('keterangan'); ?> </span>
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



<!-- modal edit pelanggan -->
<div class="modal fade" id="editsupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Master/supplier/editsupplier" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="supplier_id_edit" id="supplier_id_edit" class="supplier_id_edit">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text"
                            class=" form-control supplier_nama_edit   <?= ($validation->hasError('supplier_nama_edit')) ? 'is-invalid' : ''; ?> "
                            id="supplier_nama_edit" name="supplier_nama_edit">
                        <div id=" supplier_nama_edit" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('supplier_nama_edit'); ?> </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">No telepon</label>
                        <input type="text"
                            class=" form-control supplier_telepon_edit   <?= ($validation->hasError('supplier_telepon_edit')) ? 'is-invalid' : ''; ?> "
                            id="supplier_telepon_edit" name="supplier_telepon_edit">
                        <div id=" supplier_telepon_edit" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('supplier_telepon_edit'); ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Alamat</label>
                        <textarea
                            class=" form-control supplier_alamat_edit <?= ($validation->hasError('supplier_alamat_edit')) ? 'is-invalid' : ''; ?> "
                            name="supplier_alamat_edit" id="supplier_alamat_edit" cols="30" rows="5">
                            </textarea>

                        <div id=" supplier_alamat_edit" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('supplier_alamat_edit'); ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">keterangan</label>
                        <textarea
                            class=" form-control supplier_keterangan_edit <?= ($validation->hasError('supplier_keterangan_edit')) ? 'is-invalid' : ''; ?> "
                            name="supplier_keterangan_edit" id="supplier_keterangan_edit" cols="30" rows="5">
                            </textarea>

                        <div id=" supplier_keterangan_edit" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('supplier_keterangan_edit'); ?> </span>
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



<div class="modal fade" id="hapussupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin untuk mengapus ?</p>
                <form action="/Master/Supplier/hapussupplier" method="POST">
                    <input type="hidden" class="id_hapus_supplier" name="id_supplier">
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