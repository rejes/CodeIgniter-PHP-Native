<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item active">Barang Masuk </li>
</ol>


<div class="container-fluid ">
    <?php if(session()->get('role_id')== 1) :?>
    <div class="card p-3">
        <form action="/Stok/Stokmasuk/laporanstokmasuk" method="POST">
            <div class="row">

                <div class="col-3">
                    <label for="tanggalmulai" class="form-label"><strong>Tanggal mulai</strong></label>
                    <input type="Date" class="form-control" name="tanggalmulai" id="tanggalmulai">
                </div>
                <div class="col-3">
                    <label for="tanggalakhir" class="form-label"><Strong>Tanggal akhir</Strong></label>
                    <input type="Date" class="form-control" name="tanggalakhir" id="tanggalakhir">
                </div>
                <div class="col-4">
                    <button class="btn btn-dark " style="margin-top : 30px"><i class="fas fa-print"></i>
                        Cetak</button>
                </div>

            </div>
        </form>
    </div>
    <?php endif; ?>
    <div class="card p-4 mb-3 mt-3">
        <?php if (session()->getFlashdata('berhasil')) :  ?>
        <div class="alert alert-success " role="alert">
            <?= session()->getFlashdata('berhasil'); ?>
        </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('gagal')) :  ?>
        <div class="alert alert-danger " role="alert">
            <?= session()->getFlashdata('gagal'); ?>
        </div>
        <?php endif; ?>


        <div class="row pb-4 ">
            <div class="col-12">
                <h5 class="float-left font-weight-bold">BARANG MASUK</h5>
                <?php if(session()->get('role_id')== 1) :?>
                <a href="/stokmasuk/tambahstok" class="btn btn-dark px-4 py-2 mb-3 float-right ">
                    Tambah
                    Stok</a>
                <?php endif; ?>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table table-bordered table-striped table-sm" id="data_table">
                <thead class="bg-dark text-white text-center ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope=" col">Tanggal</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Keterangan</th>
                        <?php if(session()->get('role_id')== 1) :?>
                        <th scope="col">Opsi</th>
                        <?php endif; ?>
                    </tr>

                </thead>
                <tbody class=" bg-white text-center">
                    <?php $i = 1; ?>
                    <?php foreach ($stokmasuk as $n) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td>
                            <?= $n['tanggal_stokmasuk']; ?>
                        </td>
                        <td>
                            <?= $n['nama_supplier']; ?>
                        </td>
                        <td>
                            <?= $n['nama_barang']; ?>
                        </td>
                        <td>
                            <?= $n['jumlah_stokmasuk']; ?>
                        </td>


                        <td>
                            <button data-toggle="modal" data-target="#keteranganstokmasuk"
                                class="btn-keterangan btn btn-sm btn-outline-dark rounded-0"
                                data-keterangan="<?= $n['keterangan_stokmasuk'] ?>"><i class="fas fa-eye"></i>
                                </i>lihat</button>
                        </td>
                        <?php if(session()->get('role_id')== 1) :?>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button data-toggle="modal" data-target="#batalstokmasuk"
                                    class="btn btn-sm btn-outline-dark batal-stokmasuk "
                                    data-id_stokmasuk="<?= $n['id_stokmasuk']; ?>"
                                    data-jumlah=" <?= $n['jumlah_stokmasuk']; ?>"
                                    data-id_barang="<?= $n['barang_id']; ?>">Batal </button>
                                <button data-toggle="modal" data-target="#hapusstokmasuk"
                                    class="btn btn-sm btn-outline-dark hapus-stokmasuk "
                                    data-id_stokmasuk="<?= $n['id_stokmasuk']; ?>">Hapus </button>
                            </div>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="modal fade" id="batalstokmasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Batal stokmasuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin untuk membatalkan ?</p>
                <form action="/Stok/Stokmasuk/batalstokmasuk" method="POST">
                    <input type="hidden" class="id_stokmasuk_batal" name="id_stokmasuk_batal">
                    <input type="hidden" class="id_barang_batal" name="id_barang_batal">
                    <input type="hidden" class="jumlah_batal" name="jumlah_batal">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-dark">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="hapusstokmasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">hapus stokmasuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin untuk menghapus ?</p>
                <form action="/Stok/Stokmasuk/hapusstokmasuk" method="POST">
                    <input type="hidden" class="id_stokmasuk_hapus" name="id_stokmasuk_hapus">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-dark">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="keteranganstokmasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="detailketeranganstokmasuk"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>