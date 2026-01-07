<?php
require '../app/config.php';
include_once '../template/header.php';
$page = 'dashboard';
include_once '../template/sidebar.php';
$log = $con->query("SELECT * FROM user WHERE id_user = '$_SESSION[id_user]' ")->fetch_array();
$user = $log['id_peserta'];

$a1 = $con->query("SELECT COUNT(*) AS total FROM pendaftaran WHERE id_peserta = '$user' ")->fetch_array();
$a2 = $con->query("SELECT COUNT(*) AS total FROM pendaftaran WHERE verif = 1 AND id_peserta = '$user'")->fetch_array();
$a3 = $con->query("SELECT COUNT(*) AS total FROM pendaftaran WHERE verif = 0 AND id_peserta = '$user'")->fetch_array();
$b = $con->query("SELECT COUNT(*) AS total FROM sertifikat WHERE id_peserta = '$user' ")->fetch_array();
$c = $con->query("SELECT COUNT(*) AS total FROM award WHERE id_peserta = '$user' ")->fetch_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="info-box mb-12 bg-purple">
                        <span class="info-box-icon"><i class="fas fa-file-signature"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Data Pendaftaran Diklat</span>
                            <span class="info-box-number"><?= $a1['total'] ?> Total Data Pendaftaran | <?= $a2['total'] ?> Data Terverifikasi | <?= $a3['total'] ?> Data Belum Terverifikasi</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="info-box mb-12 bg-primary">
                        <span class="info-box-icon"><i class="fas fa-pager"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Data Sertifikat Diklat</span>
                            <span class="info-box-number"><?= $b['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="info-box mb-12 bg-olive">
                        <span class="info-box-icon"><i class="fas fa-award"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Data Penghargaan Diklat</span>
                            <span class="info-box-number"><?= $c['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template/footer.php';
?>