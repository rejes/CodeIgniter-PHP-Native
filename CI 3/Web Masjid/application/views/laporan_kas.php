<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kas
    </title>
    <style>
    td {
        padding-top: 20px;
        padding-bottom: 20px;
        padding-right: 5px;
    }

    td:first-child {
        padding-left: 5px;
        padding-right: 0;
    }

    table {
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }
    </style>
    <?php 
        function rupiah($angka) {
    $hasil = 'Rp ' . number_format($angka, 2, ",", ".");
    return $hasil;
    } 
    ?>
</head>

<body>
    <h2 style="text-align: center;">LAPORAN KAS MASJID AL-IKMAL</h2>
    <h2 style="text-align: center;">Bulan Januari</h2>
    <table style="height: 50px;" width="500">
        <tbody>
            <tr>
                <td style="width: 198.875px;">No</td>
                <td style="width: 198.875px;">Jenis Kas</td>
                <td style="width: 198.875px;">Nominal</td>
                <td style="width: 198.875px;">Keterangan Kas</td>
                <td style="width: 198.9px;">Tanggal Transaksi</td>
            </tr>
            <?php
                                            $id = 0;
                                            foreach($kas as $i)
                                            :
                                            $id++;
                                            $id_kas = $i['id_kas'];
                                            $jenis_kas = $i['jenis_kas'];
                                            $nominal = $i['nominal'];
                                            $keterangan_kas = $i['keterangan_kas'];
                                            $tanggal_transaksi = $i['tanggal_transaksi'];

                                            ?>
            <tr>
                <td style="width: 198.875px;"><?=$id?></td>
                <td style="width: 198.875px;"><?=$jenis_kas?></td>
                <td style="width: 198.875px;"><?=rupiah($nominal)?></td>
                <td style="width: 198.875px;"><?=$keterangan_kas?></td>
                <td style="width: 198.9px;"><?=$tanggal_transaksi?></td>
            </tr>
            <?php endforeach;?>
        </tbody>


    </table>

    <p>Total Pemasukan : <?=rupiah($kas_debit['nominal'])?></p>
    <p>Total Pengeluaran : <?=rupiah($kas_kredit['nominal'])?></p>

</body>

</html>