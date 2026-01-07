<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Anggota</title>
</head>

<body>

    <table
        style="height: 92px; margin-left: auto; margin-right: auto;  border: none; background-color: white; margin-top:-50px">
        <tbody>
            <tr style="height: 113.575px;">
                <!-- <td style="width: 40.925px; text-align: center; height: 113.575px; border: none;">
                    <h1><img style="margin-left: 40px;" src="<?=base_url();?>assets/logo/sumsel.png" alt="" width="72"
                            height="98" /></h1>
                </td> -->
                <td style="width: 580px; text-align: center; height: 113.575px; border: none;">
                    <p style="text-align: center; margin-bottom: -10px;">KARTU ANGGOTA PENGURUS MASJID AL-IKMAL</p>
                    <p style="margin-bottom: -10px;">BADAN PENGURUS HARIAN MASJID AL-IKMAL</p>
                    <p style="margin-bottom: -10px;">KECAMATAN Bukit Kecil</p>
                    <p style="margin-bottom: -10px;">KELURAHAN 26 Ilir</p>
                </td>
            </tr>
        </tbody>
    </table>


    <center>
        <p>KARTU ANGGOTA</p>
    </center>

    <table style="margin-left: auto; margin-right: auto; height: 213px; width: 372.612px; margin-top:10px;">
        <tbody>


            <tr>
                <!-- <td style="width: 58px; vertical-align: top;">
                    <br>
                    <img src="<?=base_url();?>assets/berkas/<?=$foto_saya?>" alt="" width="100" /></td> -->
                <td style="text-align: center; width: 300px; ">

                    <p style="text-align: left; margin-left: 30px; font-weight: bold; margin-bottom:-5px;">No Induk
                        Kependudukan</p>
                    <p style="text-align: left; margin-left: 30px; font-weight: bold; margin-bottom:-5px;">Nama Lengkap
                    </p>
                    <p style="text-align: left; margin-left: 30px; font-weight: bold; margin-bottom:-5px;">Tempat
                        tanggal Lahir</p>
                    <p style="text-align: left; margin-left: 30px; font-weight: bold; margin-bottom:-5px;">Jenis Kelamin
                    </p>
                    <p style="text-align: left; margin-left: 30px; font-weight: bold; margin-bottom:-5px;">Agama</p>
                    <p style="text-align: left; margin-left: 30px; font-weight: bold; margin-bottom:-5px;">Alamat
                        Lengkap</p>
                </td>
                <?php
                                            $id = 0;
                                            foreach($anggota as $i)
                                            :
                                            $id++;
                                            $id_user = $i['id_user'];
                                            $nama_lengkap = $i['nama_lengkap'];
                                            $jabatan = $i['jabatan'];
                                            $no_kk = $i['no_kk'];
                                            $no_ktp = $i['no_ktp'];
                                            $jenis_kelamin = $i['jenis_kelamin'];
                                            $agama = $i['agama'];
                                            $no_hp = $i['no_hp'];
                                            $alamat = $i['alamat'];
                                            $tempat_lahir = $i['tempat_lahir'];
                                            $tanggal_lahir = $i['tanggal_lahir'];
                                            $foto_kk = $i['foto_kk'];
                                            $id_status_verifikasi = $i['id_status_verifikasi'];
                                            $tanggal_registered = $i['tanggal_registered'];
                                            
                                          

                                            ?>
                <td style="text-align: center; width: 300px;">
                    <p style="text-align: left; margin-bottom:-5px;"><?=$no_kk?></p>
                    <p style="text-align: left; margin-bottom:-5px;"><?=$nama_lengkap?></p>
                    <p style="text-align: left; margin-bottom:-5px;"><?=$tempat_lahir?>,<?=$tanggal_lahir?></p>
                    <p style="text-align: left; margin-bottom:-5px;"><?=$jenis_kelamin?></p>
                    <p style="text-align: left; margin-bottom:-5px;"><?=$agama?></p>
                    <p style="text-align: left; margin-bottom:-5px;"><?=$alamat?></p>
                </td>
                <?php endforeach;?>
            </tr>

        </tbody>
    </table>
</body>

</html>