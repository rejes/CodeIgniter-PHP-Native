<!DOCTYPE html>
<html lang="en">

<head>
    <link href="<?= base_url('assets') ?>/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <h2 style="text-align: center;margin-top: 20px;">TOKO ADITFANS</h2>
        <p style="text-align: center;"> Jl. Tanjung No.47, RT.002/RW.013, Kunciran Indah, Kec. Pinang, Kota Tangerang,
            Banten 15144. Telp: 081296456033</p>
        <hr>

        <?php $timezone = time() + (60 * 60 * 7); ?>
        <div class="row">
            <div class="col-8">
                <p><strong>Kode Nota :</strong> NP-<?= session()->get('no_penjualan'); ?>
                    <br><strong>Waktu : </strong><?= gmdate('d-m-Y / H:i:s a', $timezone) ?>
                    <br><strong>Kasir :</strong> <?= session()->get('nama_pengguna'); ?>
                </p>
            </div>
        </div>


        <table class="table" style="padding: 3px;">

            <thead>
                <tr>
                    <th style="padding: 0px 20px;"><Strong>Nama Item</Strong></th>
                    <th style="padding: 0px 20px;"><Strong>Harga Satuan</Strong></th>
                    <th style="padding: 0px 20px;"><strong>QTY</strong></th>
                    <th style="padding: 0px 20px;"><STRong>Total</STRong></th>
                </tr>
            </thead>
            <tbody>
                <?php $grandtotal = 0; ?>
                <?php foreach ($keranjang as $k) : ?>
                <tr>
                    <td style=" padding: 15px 25px; margin-top:30px"><?= $k['nama_barang']; ?></td>

                    <td style="padding: 15px 25px;">Rp.<?= format_rupiah($k['harga_barang']); ?></td>
                    <td style="padding: 15px 25px;"><?= $k['qty']; ?></td>
                    <td style="padding: 15px 25px;">Rp.<?= format_rupiah($k['qty'] * $k['harga_barang'])  ?></td>

                </tr>
                <?php $grandtotal = $grandtotal + ($k['qty'] * $k['harga_barang']); ?>

                <?php endforeach; ?>

            </tbody>
        </table>
        <hr>

        <p style="text-align: right;"><strong>Grandtotal : </strong>Rp.<?= format_rupiah($grandtotal) ?></p>
        <script>
        window.print();
        </script>


</body>

</html>