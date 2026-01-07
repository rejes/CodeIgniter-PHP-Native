<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets') ?>/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <div class="div m-5">
        <h2 style="text-align: center;margin-top: 20px;"> TOKO ADITFANS</h2>
        <p style="text-align: center;"> Jl. Tanjung No.47, RT.002/RW.013, Kunciran Indah, Kec. Pinang, Kota Tangerang,
            Banten 15144. Telp: 081296456033</p>

        <hr size="10px" style="border: 1px solid;">

        <div class="div mt-2">
            <h3 class="float-right">LAPORAN STOK BARANG</h3>
            <?php $timezone = time() + (60 * 60 * 7); ?>
            <p><strong>Waktu Cetak :</strong> <?= gmdate('d-m-Y / H:i:s a', $timezone) ?></p>
            <p><strong>Dicetak oleh :</strong> <?= session()->get('nama_pengguna');  ?></p>

        </div>


        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>#</th>
                    <th scope=" col">Barcode</th>
                    <th scope=" col">Kategori</th>
                    <th scope=" col">Nama</th>
                    <th scope=" col">Stok</th>
                    <th scope=" col">satuan</th>

                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($barang as $i) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td> <?= $i['barcode_barang']; ?> </td>
                    <td><?= $i['nama_kategori']; ?></td>
                    <td><?= $i['nama_barang']; ?></td>
                    <td> <?php if ($i['stok_barang'] === null) {
                                        echo "Belum diisi</span>";
                                    } else if ($i['stok_barang'] == 0) {
                                        echo "Habis";
                                    } else {
                                        echo $i['stok_barang'];
                                    } ?></td>
                    <td><?= $i['nama_satuan']; ?></td>
                </tr>


                <?php endforeach; ?>
            </tbody>
        </table>

    </div>


    <script>
    window.print();
    </script>
</body>


</html>