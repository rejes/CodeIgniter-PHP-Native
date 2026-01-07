<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('anggota/components/header');?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('edit')){ ?>
    <script>
    swal({
        title: "Berhasil Diubah!",
        text: "Data Berhasil Diubah!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_edit')){ ?>
    <script>
    swal({
        title: "Eror!",
        text: "Terjadi Kesalahan Dalam Proses data!",
        icon: "error"
    });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('input')){ ?>
    <script>
    swal({
        title: "Berhasil Ditambahakan!",
        text: "Data Berhasil Ditambahkan!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_input')){ ?>
    <script>
    swal({
        title: "Eror!",
        text: "Terjadi Kesalahan Dalam Proses data!",
        icon: "error"
    });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('delete')){ ?>
    <script>
    swal({
        title: "Berhasil Dihapus!",
        text: "Data Berhasil Dihapus!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_delete')){ ?>
    <script>
    swal({
        title: "Eror!",
        text: "Terjadi Kesalahan Dalam Proses data!",
        icon: "error"
    });
    </script>
    <?php } ?>
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
                            <h1 class="m-0">Info Kematian</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Info Kematian</li>
                            </ol>
                        </div>

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <?php
                                            $id = 0;
                                            foreach($anggota_kematian as $i)
                                            :
                                            $id++;
                                            $id_user = $i['id_user'];
                                            $id_kematian = $i['id_kematian'];
                                            $tanggal_kematian = $i['tanggal_kematian'];
                                            $jam_kematian = $i['jam_kematian'];
                                            $usia = $i['usia'];
                                            $nama_lengkap = $i['nama_lengkap'];
                                            
                                          

                                            ?>
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    Info Kematian
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Telah Meniggal Dunia Nama <?=$nama_lengkap?> Usia <?=$usia?>
                                    </h5>
                                    <p class="card-text">Pada Tanggal <?=$tanggal_kematian?> dan Jam <?=$jam_kematian?>.
                                    </p>

                                </div>
                            </div>
                            <!-- /.card -->
                            <?php endforeach;?>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

            </section>
            <!-- /.content -->
            <!-- /.content -->
        </div>


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