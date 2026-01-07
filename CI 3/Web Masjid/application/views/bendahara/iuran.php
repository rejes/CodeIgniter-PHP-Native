<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('bendahara/components/header');?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
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

        <?php $this->load->view('bendahara/components/navbar');?>

        <?php $this->load->view('bendahara/components/sidebar');?>



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Iuran</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Iuran</li>
                            </ol>
                        </div><!-- /.col -->
                        <button type="button" class="btn btn-primary ml-2 mt-3" data-toggle="modal"
                            data-target="#exampleModal">
                            Tambah Data
                        </button>
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
                                    <h3 class="card-title">Data Iuran</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Tanggal Iuran</th>
                                                <th>Jumlah Iuran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 0;
                                            foreach($anggota_iuran as $i)
                                            :
                                            $id++;
                                            $id_user = $i['id_user'];
                                            $id_iuran = $i['id_iuran'];
                                            $nama_lengkap = $i['nama_lengkap'];
                                            $bulan = $i['bulan'];
                                            $tahun = $i['tahun'];
                                            $tanggal_iuran = $i['tanggal_iuran'];
                                            $jumlah_iuran = $i['jumlah_iuran'];
                                            
                                          

                                            ?>
                                            <tr>
                                                <td><?=$id?></td>
                                                <td><?=$nama_lengkap?></td>
                                                <td><?=$bulan?></td>
                                                <td><?=$tahun?></td>
                                                <td><?=$tanggal_iuran?></td>
                                                <td><?=$jumlah_iuran?></td>
                                                <td>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-primary" data-toggle="modal"
                                                                data-target="#ubah_iuran<?=$id_iuran?>">
                                                                Edit <i class="nav-icon fas fa-edit"></i>
                                                            </a>

                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" data-toggle="modal"
                                                                data-target="#delete_iuran<?=$id_iuran?>"
                                                                class="btn btn-danger">Hapus <i
                                                                    class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal Ubah Data Iuran -->
                                            <div class="modal fade" id="ubah_iuran<?=$id_iuran?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah
                                                                Data
                                                                Iuran
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?=base_url();?>Iuran/ubah_data_bendahara"
                                                                method="POST">
                                                                <input type="text" value="<?=$id_iuran?>"
                                                                    name="id_iuran" hidden>
                                                                <div class="form-group">
                                                                    <label for="bulan">Bulan</label>
                                                                    <input type="text" class="form-control" id="bulan"
                                                                        name="bulan" value="<?=$bulan?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tahun">Tahun</label>
                                                                    <input type="text" class="form-control" id="tahun"
                                                                        name="tahun" value="<?=$tahun?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tanggal_iuran">Tanggal Iuran</label>
                                                                    <input type="date" class="form-control"
                                                                        id="tanggal_iuran" value="<?=$tanggal_iuran?>"
                                                                        name="tanggal_iuran" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="jumlah_iuran">Jumlah Iuran</label>
                                                                    <input type="text" class="form-control"
                                                                        id="jumlah_iuran" value="<?=$jumlah_iuran?>"
                                                                        name="jumlah_iuran" required>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Delete Data Iuran -->
                                            <div class="modal fade" id="delete_iuran<?=$id_iuran?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus
                                                                Data
                                                                Iuran
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url();?>Iuran/hapus_data_bendahara"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id_iuran"
                                                                            value="<?php echo $id_iuran?>" />

                                                                        <p>Apakah kamu yakin ingin menghapus data
                                                                            ini?</i></b></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger ripple"
                                                                        data-dismiss="modal">Tidak</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success ripple save-category">Ya</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kematian</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url();?>Iuran/tambah_data_bendahara" method="POST">
                                    <div class="form-group">
                                        <label for="id_user">Anggota</label>
                                        <select class="form-control" id="group-select" placeholder="Select a group..."
                                            name="id_user" required>

                                            <?php
                                            $id = 0;
                                            foreach($anggota as $i)
                                            :
                                            $id++;
                                            $nama_lengkap = $i['nama_lengkap'];
                                            $id_user_detail = $i['id_user_detail'];
                                            ?>
                                            <option value="<?=$id_user_detail?>"><?=$nama_lengkap?></option>
                                            <?php endforeach;?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bulan">Bulan</label>
                                        <input type="text" class="form-control" id="bulan" name="bulan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <input type="text" class="form-control" id="tahun" name="tahun" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_iuran">Tanggal Iuran</label>
                                        <input type="date" class="form-control" id="tanggal_iuran" name="tanggal_iuran"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah_iuran">Jumlah Iuran</label>
                                        <input type="text" class="form-control" id="jumlah_iuran" name="jumlah_iuran"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
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

    <?php $this->load->view('bendahara/components/js');?>
</body>

</html>