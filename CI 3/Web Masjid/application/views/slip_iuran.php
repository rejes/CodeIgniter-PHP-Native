<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Slip Iuran Bulnana Anggota</title>
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
</head>

<body>
    <h4 style="text-align: center; margin-bottom:-15px; margin-top:-15px;">BADAN PENGURUS HARIAN MASJID AL-IKMAL</h4>
    <h4 style="text-align: center; margin-bottom:-15px;">KECAMATAN Bukit Kecil</h4>
    <p style="text-align: center; margin-bottom:-15px;">KELURAHAN 26 Ilir</p>
    <p style="text-align: center; margin-bottom:65px;">SLIP IURAN BULANAN ANGGOTA</p>
    <p style="text-align: left; margin-bottom:-15px; margin-left:70px;">Nama Anggota : <?=$anggota_iuran['0']['nama_lengkap']?></p>
    <p style="text-align: left; margin-bottom:-15px; margin-left:70px;">Alamat : <?=$anggota_iuran['0']['alamat']?></p>
    <p style="text-align: left; margin-bottom:-20px; margin-left:70px;">No Telp : <?=$anggota_iuran['0']['no_hp']?></p>
    <p style="text-align: center;">&nbsp;</p>
    <table style="height: 30px; margin-left: auto; margin-right: auto;"" width="265">
        <tbody>
            <tr>
                <td style="width: 275.1px; text-align: center; margin-bottom:-15px;">BULAN</td>
                <td style="width: 275.1px; text-align: center; margin-bottom:-15px;">IURAN</td>
            </tr>
            <tr>
                <td style="width: 275.1px; text-align: center; margin-bottom:-15px;"><?=$anggota_iuran['0']['bulan']?></td>
                <td style="width: 275.1px; text-align: center; margin-bottom:-15px;"><?=$anggota_iuran['0']['jumlah_iuran']?></td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <p style="text-align: right; margin-top:-40px; margin-right:45px;">KETUA PENGURUS</p>
    <p style="text-align: right;">&nbsp;</p>
    <p style="text-align: right;">&nbsp;</p>
    <p style="text-align: right; margin-top:-40px; margin-right:105px;">Ttd</p>
</body>

</html>