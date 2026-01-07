<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>
<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item active">Barang</li>
</ol>

<div class="container-fluid ">

    <div class="card p-4 mb-3">
        <?php if (session()->getFlashdata('berhasil')) :  ?>
        <div class="alert alert-success " role="alert">
            <?= session()->getFlashdata('berhasil'); ?>
        </div>
        <?php endif; ?>
        <?php if(session()->get('role_id')== 1) :?>
        <div class="row pb-4 ">
            <div class="col-8 ">
                <a href="/Barang/Tambahbarang" class="btn btn-dark px-4 py-2 mb-3"><i class="fas fa-plus "></i> Tambah
                    barang</a>
            </div>

            <div class="col-4 ">
                <a href="/Barang/Laporanstok" class="btn btn-outline-dark   float-right"><i class="fas fa-print"></i>
                    Laporan Stok</a>
                <a href="/Barang/Cetakbarcode" class="btn btn-outline-dark   float-right mr-2"><i
                        class="fas fa-barcode"></i>
                    Cetak barcode</a>
            </div>
        </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped " id="data_table">
                <thead class="bg-dark text-white text-center ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope=" col">Barcode</th>
                        <th scope=" col">Kategori</th>
                        <th scope=" col">Nama</th>
                        <th scope=" col">Stok</th>
                        <th scope=" col">Harga Jual</th>
                        <th scope=" col">satuan</th>
                        <?php if(session()->get('role_id')== 1) :?>
                        <th scope="col">Opsi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody class=" bg-white text-center">
                    <?php $no = 1; ?>
                    <?php foreach ($barang as $i) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><a href="\master\barang\barcode\<?= $i['barcode_barang'] ?>">
                                <?= $i['barcode_barang']; ?></a>
                        </td>
                        <td><?= $i['nama_kategori']; ?></td>
                        <td><?= $i['nama_barang']; ?></td>
                        <td> <?= $i['stok_barang']; ?></td>
                        <td>Rp.<?= format_rupiah($i['harga_barang']); ?></td>
                        <td><?= $i['nama_satuan']; ?></td>
                        <?php if(session()->get('role_id')== 1) :?>
                        <td>

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-sm btn-outline-dark rounded-0"
                                    href="/Master/Barang/editbarang/<?= $i['id_barang'] ?>"><i
                                        class="fas fa-edit"></i>edit</a>


                                <button data-toggle="modal" data-target="#hapusbarang"
                                    class="btn btn-sm btn-outline-dark hapus-barang rounded-0"
                                    data-id="<?= $i['id_barang']; ?>"><i class="fas fa-trash-alt"></i>
                                    Hapus</button>
                            </div>
                            <?php endif; ?>
                        </td>

                    </tr>


                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="hapusbarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin untuk mengapus ?</p>
                <form action="/Master/barang/hapusbarang" method="POST">
                    <input type="hidden" class="id_hapus_barang" name="id_barang">
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