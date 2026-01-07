<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="<?= base_url('img') ?>/favicon.ico" rel='shorcut icon'>

    <title>Toko Aditfans</title>
    <link href="<?= base_url('assets') ?>/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="<?= base_url('assets') ?>/dist/css/styles.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="<?= base_url('assets') ?>/dist/css/DataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="<?= base_url('assets') ?>/dist/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('assets') ?>/dist/js/chart.min.js" crossorigin="anonymous">
    </script>
    < <script src="<?= base_url('assets') ?>/dist/js/jquery-3.5.1.min.js" crossorigin="anonymous">
        </script>


</head>

<body class="sb-nav-fixed bg-light">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <div class="col-11">
            <a class="navbar-brand" href="/">Toko <strong>ADITFANS</strong></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                    class="fas fa-bars"></i></button>
        </div>

        <div class="col-1 ">
            <ul class="navbar-nav ml-auto ml-md-0 float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/myprofil">Profil Saya</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/ubahpassword">Ubah Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Logout</a>

                    </div>
                </li>
            </ul>
        </div>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Inti</div>
                        <a class="nav-link" href="/">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt "></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="/transaksi">
                            <div class="sb-nav-link-icon"><i class="fas fa-calculator "></i></div>
                            Transaksi
                        </a>
                        <div class="sb-sidenav-menu-heading">Master</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Produk
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/kategori"></i>Kategori</a>
                                <a class="nav-link" href="/Satuan"> Satuan</a>
                                <a class="nav-link" href="/Barang"> Barang</a>

                            </nav>
                        </div>


                        <a class="nav-link" href="/Supplier">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                            Supplier
                        </a>

                        <div class="sb-sidenav-menu-heading">Stok</div>
                        <a class="nav-link" href="/Stokmasuk">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-alt-circle-right"></i></i></div>
                            Barang Masuk
                        </a>

                        <a class="nav-link" href="/Stokkeluar">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-alt-circle-left"></i></i></div>
                            Barang Rusak    
                        </a>

                        <div class="sb-sidenav-menu-heading">Laporan</div>
                        <a class="nav-link" href="/Penjualan">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Penjualan
                        </a>

                        <?php if(session()->get('role_id')== 1) :?>
                        <div class="sb-sidenav-menu-heading">Pengaturan</div>
                        <a class="nav-link" href="/Kasir">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Kasir
                        </a>
                        <?php endif; ?>





                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Login :</div>
                    <?php if(session()->get('role_id')== 1){
                        echo "Admin";
                    }else{
                        echo "Kasir";
                    } ?>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content" class="bg-abuabu">
            <main>

                <?= $this->renderSection('Content'); ?>


            </main>
            <footer class="py-4 bg-white mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; aditfans 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script src="<?= base_url('assets') ?>/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('assets') ?>/dist/js/jquery.dataTables.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('assets') ?>/dist/js/dataTables.bootstrap4.min.js" crossorigin="anonymous">
    </script>

    <script src="<?= base_url('assets') ?>/dist/js/scripts.js"></script>















</body>

</html>