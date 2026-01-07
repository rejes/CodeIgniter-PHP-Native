<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item active">Barang rusak </li>
</ol>


<div class="container-fluid ">
    <?php if(session()->get('role_id')== 1) :?>
    <div class="card p-3">
        <form action="/Stok/Stokkeluar/laporanstokkeluar" method="POST">
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
                    <button class="btn btn-dark " style="margin-top : 30px"><i class="fas fa-print"></i> Cetak</button>
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
                <h5 class="float-left font-weight-bold">BARANG RUSAK</h5>
                <?php if(session()->get('role_id')== 1) :?>
                <a href="/stokkeluar/kurangstok" class="btn btn-dark px-4 py-2 mb-3 float-right "></i>Kurang
                    stok</a>
                <?php endif; ?>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table table-bordered table-striped table-sm" id="data_table">
                <thead class="bg-dark text-white text-center ">
                    <tr>
                        <th scope="col">#</th>
                        <th scope=" col">Tanggal</th>
                        <th scope="col">Item</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Keterangan</th>
                        <?php if(session()->get('role_id')== 1) :?>
                        <th scope="col">Opsi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody class=" bg-white text-center">
                    <?php $i = 1; ?>
                    <?php foreach ($stokkeluar as $n) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td>
                            <?= $n['tanggal_stokkeluar']; ?>
                        </td>
                        <td>
                            <?= $n['nama_barang']; ?>
                        </td>
                        <td>
                            <?= $n['jumlah_stokkeluar']; ?>
                        </td>


                        <td>
                            <button data-toggle="modal" data-target="#keteranganstokkeluar"
                                class="btn-keterangan btn btn-sm btn-outline-dark rounded-0"
                                data-keterangan="<?= $n['keterangan_stokkeluar'] ?>"><i class="fas fa-eye"></i>
                                lihat</button>
                        </td>
                        <?php if(session()->get('role_id')== 1) :?>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button data-toggle="modal" data-target="#batalstokkeluar"
                                    class="btn btn-sm btn-outline-dark batal-stokkeluar "
                                    data-id_stokkeluar="<?= $n['id_stokkeluar']; ?>"
                                    data-jumlah=" <?= $n['jumlah_stokkeluar']; ?>"
                                    data-id_barang="<?= $n['barang_id']; ?>">Batal</i></button>
                                <button data-toggle="modal" data-target="#hapusstokkeluar"
                                    class="btn btn-sm btn-outline-dark hapus-stokkeluar"
                                    data-id_stokkeluar="<?= $n['id_stokkeluar']; ?>">Hapus</i></button>
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



<div class="modal fade" id="batalstokkeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Batal stok keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin untuk membatalkan ?</p>
                <form action="/Stok/stokkeluar/batalstokkeluar" method="POST">
                    <input type="hidden" class="id_stokkeluar_batal" name="id_stokkeluar_batal">
                    <input type="hidden" class="id_barang_batal" name="id_barang_batal">
                    <input type="hidden" class="jumlah_batal" name="jumlah_batal">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-dark">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapusstokkeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">hapus stok keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin untuk mengapus ?</p>
                <form action="/Stok/stokkeluar/hapusstokkeluar" method="POST">
                    <input type="hidden" class="id_stokkeluar_hapus" name="id_stokkeluar_hapus">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-dark">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="keteranganstokkeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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