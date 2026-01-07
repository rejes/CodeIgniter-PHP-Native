<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('anggota/components/header');?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?=base_Url();?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <?php $this->load->view('anggota/components/navbar');?>

        <?php $this->load->view('anggota/components/sidebar');?>



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Inventory</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Inventory</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Inventory</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Inventory</th>
                                                <th>Merk</th>
                                                <th>Satuan</th>
                                                <th>Jumlah</th>
                                                <th>Kondisi Barang</th>
                                                <th>Tanggal Masuk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 0;
                                            foreach($inventory as $i)
                                            :
                                            $id++;
                                            $id_inventory = $i['id_inventory'];
                                            $nama_inventory = $i['nama_inventory'];
                                            $merk = $i['merk'];
                                            $satuan = $i['satuan'];
                                            $jumlah = $i['jumlah'];
                                            $kondisi_barang = $i['kondisi_barang'];
                                            $tanggal_masuk = $i['tanggal_masuk'];
                                          

                                            ?>
                                            <tr>
                                                <td><?=$id?></td>
                                                <td><?=$nama_inventory?>
                                                </td>
                                                <td><?=$merk?></td>
                                                <td> <?=$satuan?></td>
                                                <td><?=$jumlah?></td>
                                                <td><?=$kondisi_barang?></td>
                                                <td><?=$tanggal_masuk?></td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('anggota/components/js');?>
</body>

</html>