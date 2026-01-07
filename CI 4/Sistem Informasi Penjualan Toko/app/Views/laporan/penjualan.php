<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item active">Laporan Penjualan</li>
</ol>



<div class="container-fluid ">
    <?php if(session()->get('role_id')== 1) :?>
    <div class="card p-3">
        <form action="/Laporan/Penjualan/laporanpenjualan" method="POST">
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

    <div class="card p-4 my-3 ">
        <?php if (session()->getFlashdata('gagal')) :  ?>
        <div class="alert alert-danger " role="alert">
            <?= session()->getFlashdata('gagal'); ?>
        </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped " id="data_table">
                <thead class="bg-dark text-white text-center ">
                    <tr>
                        <th>Kode Nota</th>
                        <th>tanggal</th>
                        <th>Kasir</th>
                        <th>Keranjang</th>
                    </tr>



                </thead>
                <tbody class="text-center">
                    <?php foreach($penjualan as $p): ?>
                    <tr>
                        <td>NP-<?= $p['id_penjualan'] ?></td>
                        <td><?= $p['tanggal_penjualan'] ?></td>
                        <td><?= $p['nama_pengguna'] ?></td>
                        <td> <button data-toggle="modal" data-target="#lihatkeranjang"
                                data-id="<?= $p['id_penjualan']; ?>"
                                class="btn btn-sm btn-outline-dark lihat-keranjang px-2 py-1 rounded-0"><i
                                    class="fas fa-eye"></i>
                                Lihat </button></td>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

    <div class="modal fade" id="lihatkeranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judul-keranjang"></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm" id="data_table">
                            <thead class="bg-dark text-white text-center ">
                                <tr>
                                    <th>Item</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>



                            </thead>
                            <tbody class="text-center isi-keranjang">

                            </tbody>
                        </table>

                        <H5 class="total-keranjang float-right"></H5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>








        <?= $this->endSection(); ?>