<?php
require '../app/config.php';
include_once '../template/header.php';
$page = 'dashboard';
include_once '../template/sidebar.php';

$log = $con->query("SELECT * FROM user WHERE id_user = '$_SESSION[id_user]' ")->fetch_array();
$user = $log['id_peserta'];

$row = $con->query("SELECT * FROM peserta WHERE id_peserta = '$user'")->fetch_array();

$jk = [
    '' => '-- Pilih --',
    'Laki-laki' => 'Laki-laki',
    'Perempuan' => 'Perempuan',
];

$pdd = [
    '' => '-- Pilih --',
    'SLTA' => 'SLTA',
    'Sarjana' => 'Sarjana',
    'Magister' => 'Magister',
    'Doktor' => 'Doktor',
];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-user-edit ml-1 mr-1"></i>Ubah Profil</h4>
                </div><!-- /.col -->
                <div class="col-sm-6 float-right">
                    <a href="index" class="btn btn-sm bg-dark float-right"><i class="fa fa-arrow-left"> Kembali</i></a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="card card-lightblue card-outline">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body" style="background-color: white;">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nm_peserta" value="<?= $row['nm_peserta'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIP</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="nip" value="<?= $row['nip'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat & Tanggal Lahir</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="tmpt_lahir" placeholder="Tempat Lahir" value="<?= $row['tmpt_lahir'] ?>" required>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $row['tgl_lahir'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('jk', $jk, $row['jk'], 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kontak</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="hp_peserta" placeholder="No. HP/WA" value="<?= $row['hp_peserta'] ?>" required>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" name="email_peserta" placeholder="Email Aktif" value="<?= $row['email_peserta'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pendidikan</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('pendidikan', $pdd, $row['pendidikan'], 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pas Foto <a class="btn btn-xs bg-purple ml-1" href="<?= base_url() ?>/pas-foto/<?= $row['pas_foto'] ?>" target="_BLANK"><i class="fa fa-image mr-1"></i> Lihat</a></label>
                                    <div class="col-sm-10">
                                        <input type="file" accept=".jpg,.jpeg,.png,.JPG.,JPEG,.PNG" class="form-control" name="pas_foto">
                                        <label style='color: red; font-style: italic; font-size: 12px;'>* Biarkan Kosong jika Pas Foto tidak di ubah</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" class="btn btn-sm btn-primary float-right"><i class="fa fa-save"> Update Profil</i></button>
                                        <button type="reset" class="btn btn-sm btn-danger float-right mr-2"><i class="fa fa-times-circle"> Batal</i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!--/.col (left) -->
                </div>

            </form>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template/footer.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nm_peserta'];
    $nip = $_POST['nip'];
    $tmpt_lahir = $_POST['tmpt_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $hp = $_POST['hp_peserta'];
    $email = $_POST['email_peserta'];
    $pdd = $_POST['pendidikan'];

    $f_pas_foto = "";

    if (!empty($_FILES['pas_foto']['name'])) {
        $filelama = $row['pas_foto'];

        // UPLOAD FILE 
        $file      = $_FILES['pas_foto']['name'];
        $x_file    = explode('.', $file);
        $ext_file  = end($x_file);
        $pas_foto = rand(1, 99999) . '.' . $ext_file;
        $size_file = $_FILES['pas_foto']['size'];
        $tmp_file  = $_FILES['pas_foto']['tmp_name'];
        $dir_file  = '../pas-foto/';
        $allow_ext        = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
        $allow_size       = 2097152;
        // var_dump($pas_foto); die();

        if (in_array($ext_file, $allow_ext) === true) {
            if ($size_file <= $allow_size) {
                move_uploaded_file($tmp_file, $dir_file . $pas_foto);
                if (file_exists($dir_file . $filelama)) {
                    unlink($dir_file . $filelama);
                }

                $f_pas_foto .= "Upload Success";
            } else {
                echo "
                <script type='text/javascript'>
                    setTimeout(function () {    
                        swal({
                            title: '',
                            text:  'Ukuran Foto Terlalu Besar, Maksimal 2 Mb',
                            type: 'warning',
                            timer: 3000,
                            showConfirmButton: true
                        });     
                    },10);   
                    window.setTimeout(function(){ 
                        window.location.replace('edit-profil');
                    } ,2000); 
                </script>";
            }
        } else {
            echo "
            <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: 'Format File Tidak Didukung',
                        text:  'File Harus Berupa Gambar',
                        type: 'warning',
                        timer: 3000,
                        showConfirmButton: true
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.location.replace('edit-profil');
                } ,2000);  
            </script>";
        }
    } else {
        $pas_foto = $row['pas_foto'];
        $f_pas_foto .= "Upload Success!";
    }

    if (!empty($f_pas_foto)) {

        $update = $con->query("UPDATE peserta SET 
            nm_peserta = '$nama', 
            nip = '$nip', 
            tmpt_lahir = '$tmpt_lahir', 
            tgl_lahir = '$tgl_lahir', 
            jk = '$jk', 
            hp_peserta = '$hp', 
            email_peserta = '$email',
            pendidikan = '$pdd',
            pas_foto = '$pas_foto'
            WHERE id_peserta = '$user'
        ");

        if ($update) {
            $con->query("UPDATE user SET 
                nm_user = '$nama'
                WHERE id_peserta = '$user' 
            ");

            echo "
            <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: 'Proses Berhasil',
                        text:  'Profil telah di Update',
                        type: 'success',
                        timer: 3000,
                        showConfirmButton: false
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.location.replace('edit-profil');
                } ,2000);   
            </script>";
        } else {
            echo "
            <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: 'Proses Update Gagal',
                        text:  'Silahkan Cek Data dengan Benar',
                        type: 'error',
                        timer: 3000,
                        showConfirmButton: false
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.location.replace('edit-profil');
                } ,2000);   
            </script>";
        }
    }
}
?>