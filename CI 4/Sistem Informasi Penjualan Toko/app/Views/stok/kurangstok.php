<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/Stokkeluar" id="btn-back" class="text-white">Stok Keluar</a></li>
    <li class="breadcrumb-item active">Kurang Stok</li>
</ol>




<div class="container-fluid ">
    <div class="card mb-3 ">
        <div class="card-header font-weight-bold ">
            KURANG STOK
        </div>
        <div class="card-body">
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


            <form action="/Stok/stokkeluar/kurangstok" method="POST">
                <div class="row">
                    <div class="col-6">
                        <?php csrf_token(); ?>
                        <?php $timezone = time() + (60 * 60 * 7); ?>
                        <input type="hidden" class="pengguna-id" name="pengguna_id"
                            value="<?= session()->get('id'); ?>">
                        <input type="hidden" class="barang-id" name="barang_id" value="">
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal</label>
                            <input class="form-control tambah_tanggal " id="tanggal" name="tanggal"
                                value="<?= gmdate('y-m-d', $timezone); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Barcode</label>
                            <div class="input-group">
                                <input type="text" class="form-control input-barcode  <?= ($validation->hasError('barcode_barang')) ? 'is-invalid' : ''; ?>
                                    <?= (session()->getFlashdata('barcode_gagal')) ? 'is-invalid' : ''; ?>"
                                    name="barcode_barang">
                                <div class="input-group-prepend">

                                    <button type="button" data-toggle="modal" data-target="#caribarang"
                                        class="btn btn-sm btn-primary cari-barang">
                                        Pilih</button>

                                </div>
                                <div id="barcode" class="invalid-feedback text-left ml-1 mt-0">
                                    <span> <?= $validation->getError('barcode_barang'); ?>
                                        <?= session()->getFlashdata('barcode_gagal'); ?> </span>
                                </div>
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">jumlah</label>
                            <input type="number"
                                class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>"
                                id="jumlah" name="jumlah">
                            <div id="supplier" class="invalid-feedback text-left ml-1 mt-0">
                                <span> <?= $validation->getError('jumlah'); ?> </span>
                            </div>
                        </div>




                    </div>
                    <div class="col-6">



                        <div class="form-group">
                            <label class="font-weight-bold">Keterangan</label>
                            <textarea name="keterangan" id="" cols="23" rows="5"
                                class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>"></textarea>
                            <div id="keterangan" class="invalid-feedback text-left ml-1 mt-0">
                                <span> <?= $validation->getError('keterangan'); ?> </span>
                            </div>
                        </div>

                        <button class="btn btn-dark float-right mt-4" type="submit">simpan</button>
                    </div>


                </div>

        </div>
        </form>
        <div class="form-group ml-4">
            <a href="/Stokkeluar" id="btn-back" class="text-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>


<div class="modal fade " id="caribarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  px-2">
                <div class="table-responsive ">
                    <table class="table table-bordered table-striped table-sm text-sm" id="data_table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope=" col">Barcode</th>
                                <th scope=" col">Nama</th>
                                <th scope=" col">Stok</th>
                                <th scope=" col">Satuan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class=" bg-white text-center">
                            <?php $no = 1; ?>
                            <?php foreach ($barang as $i) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $i['barcode_barang']; ?></td>
                                <td><?= $i['nama_barang']; ?></td>
                                <td> <?php if ($i['stok_barang'] === null) {
                                                echo "<span class='badge badge-info'>Belum diisi</span>";
                                            } else if ($i['stok_barang'] == 0) {
                                                echo "<span class='badge badge-danger'>Habis</span>";
                                            } else {
                                                echo $i['stok_barang'];
                                            } ?></td>
                                <td><?= $i['nama_satuan']; ?></td>
                                <td>

                                    <button type="button" class="btn btn-sm btn-dark btn-outline-light pilih-barang"
                                        data-barcode="<?= $i['barcode_barang']; ?>"
                                        data-id=" <?= $i['id_barang']; ?> ">pilih</button>
                                </td>
                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>














    <?= $this->endSection(); ?>