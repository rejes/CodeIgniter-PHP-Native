<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<div class="container-fluid">

    <marquee class="text-information py-2" behavior="scroll" direction="left" onmouseover="this.stop();"
        onmouseout="this.start();"> <strong>
            Selamat datang di toko AditFans Jl. Tanjung No.47, RT.002/RW.013, Kunciran Indah, Kec. Pinang, Kota
            Tangerang,
            Banten 15144 ,Telp: 081296456033</strong></marquee>


    <div class="row">
        <!-- <form action="/Inti/Kasir/detailpenjualan"> -->
        <div class="col-lg-5">
            <div class="card px-2 pt-4 pb-5">
                <table class="table-sm">
                    <tr>
                        <td class="font-weight-bold ">
                            <p>Tanggal</p>
                        </td>
                        <td>
                            <?php $timezone = time() + (60 * 60 * 7); ?>
                            <input name="tanggal" class="form-control bg-light"
                                value="<?= gmdate('Y-m-d', $timezone); ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">
                            Kasir
                        </td>
                        <td>
                            <input type="text" class="form-control bg-light"
                                value="<?= $pengguna[0]['nama_pengguna'] ?>" readonly>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">

                <div class="row text-right ">
                    <div class="col-lg-12">
                        <h1 class=" ml-4 mr-3 py-2">TOTAL :<SPAN
                                class="tagihan_kasir ml-4 py-2 text-danger ">Rp.0</SPAN>
                        </h1>

                    </div>

                </div>

            </div>
            <div class="card mt-2">
                <div class="row p-3">
                    <div class="col-lg-5">
                        <tr>
                            <td>
                                <Label class="font-weight-bold align-content-center wajib">Barcode</Label>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control kasir-barcode bg-light " name="barcode_item"
                                        autofocus>
                                    <div class="input-group-prepend">
                                        <button type="button" data-toggle="modal" data-target="#cariitem_kasir"
                                            class="btn btn-sm btn-primary cari-item-kasir rounded-0">
                                            Pilih</button>
                                    </div>
                                    <div id="barcode" class="invalid-feedback text-left ml-1 mt-0">
                                        <span class="error-barcode"></span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </div>

                    <div class="col-lg-5">
                        <tr>
                            <td>
                                <Label class="font-weight-bold">Jumlah</Label>
                            </td>
                            <td>
                                <input type="Number" class="form-control bg-light jumlah_kasir" min="1">
                            </td>


                        </tr>

                    </div>
                    <div class="col-lg-2 button-barcode">
                        <tr>

                            <td>
                                <button type="button" class="btn btn-dark btn-sm  kirim-barcode">Tambah</button>
                            </td>


                        </tr>

                    </div>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-12">
            <div class="card py-3 px-1">
                <div class="info-kasir">


                </div>
                <table class="table table-sm tabel-kasir text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>barcode</th>
                            <th>Item</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light kasir-body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row pt-3 mb-3">

        <div class="col-lg-4">
            <div class="card  p-2">
                <table class="table-sm">
                    <tr>
                        <td class="font-weight-bold ">
                            <label for="">Bayar</label>
                        </td>
                        <td>
                            <input class="form-control bayar_kasir" type="number">
                        </td>
                    </tr>

                    <tr>
                        <td class="font-weight-bold ">
                            <label for="">Kembalian</label>
                        </td>
                        <td>
                            <label class="font-weight-bold">: <span class="text-danger kembalian_kasir">
                                </span></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>

                        <td>
                            <button type="button"
                                class="btn btn-dark btn-sm hitung_kembalian float-right mb-2">Hitung</button>
                        </td>
                    </tr>

                </table>

            </div>

        </div>
        <div class="col-lg-4">

            <table>
                <tr>
                    <td>
                        <button type="button" data-toggle="modal" data-target="#nota_penjualan"
                            data-no_penjualan="<?= session()->get('no_penjualan'); ?>"
                            class="btn btn-sm btn-dark btn-nota px-5 mr-2">
                            <i class="fas fa-file-signature"></i> Nota Penjualan</button>

                    </td>


                </tr>
                <!-- <tr>

                    <td>
                        <p>*Untuk menyelesaikan proses transaksi diwajibkan klik "simpan"</p>
                    </td>
                </tr> -->

            </table>
        </div>





    </div>
</div>

<div class="modal fade " id="nota_penjualan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nota Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-sm-left">
                <div class="card p-2">


                    <h2 style="text-align: center;margin-top: 20px;">TOKO ADITFANS</h2>
                    <H5 style="text-align: center;"> Jl. Tanjung No.47, RT.002/RW.013, Kunciran Indah</H5>
                    <H5 style="text-align: center;">Kec. Pinang, Kota Tangerang, Banten 15144</H5>
                    <H5 style="text-align: center;">Telp: 081296456033</H5>
                    <hr style="border: 1px solid;">

                    <?php $timezone = time() + (60 * 60 * 7); ?>
                    <div class="row">
                        <div class="col-8">
                            <p><strong>Kode Nota :</strong> NP-<?= session()->get('no_penjualan'); ?>
                                <br><strong>Waktu : </strong><?= gmdate('d-m-Y / H:i:s a', $timezone) ?>
                                <br><strong>Kasir :</strong> <?= session()->get('nama_pengguna'); ?>
                            </p>
                        </div>
                    </div>



                    <table class="table " style="padding: 3px;">
                        <thead>
                            <tr>

                                <th><Strong>Nama Item</Strong></th>
                                <th><Strong>Harga Satuan</Strong></th>
                                <th><strong>QTY</strong></th>
                                <th><STRong>Total</STRong></th>
                            </tr>
                        </thead>

                        <tbody class="tabel-notapenjualan">

                        </tbody>


                    </table>
                    <hr>

                    <p style="text-align: right;"><strong>Grandtotal :</strong><span class="grandtotal_np"></span>
                    </p>
                </div>



                <div class=" modal-footer ">
                    <!-- <button type="button" class="btn btn-secondary " data-dismiss="modal">Tutup</button> -->
                    <form action="/Inti/Transaksi/penjualan" method="post">
                        <button class="btn btn-danger">simpan</button>
                    </form>
                    <form action="/Inti/Transaksi/cetak_notapenjualan" method="post">
                        <button type="submit" class="btn btn-primary">cetak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>








<div class="modal fade " id="cariitem_kasir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Item</h5>
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
                                <th scope=" col">Kategori</th>

                                <th scope=" col">Satuan</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class=" bg-white text-center">
                            <?php $no = 1; ?>
                            <?php foreach ($barang as $i) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $i['barcode_barang']; ?></td>
                                <td><?= $i['nama_barang']; ?></td>
                                <td><?= $i['nama_kategori']; ?></td>
                                -->
                                <td><?= $i['nama_satuan']; ?></td>
                                <td>

                                    <button type="button"
                                        class="btn btn-sm btn-dark btn-outline-light pilih-barang-kasir"
                                        data-barcode="<?= $i['barcode_barang']; ?>"
                                        data-id=" <?= $i['id_barang']; ?> ">pilih</button>
                                </td>
                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>














<?= $this->endSection(); ?>