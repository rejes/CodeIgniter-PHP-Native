<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/components/header');?>
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

    <?php if ($this->session->flashdata('eror')){ ?>
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

    <?php if ($this->session->flashdata('verifikasi')){ ?>
    <script>
    swal({
        title: "Berhasil Di Update Status Verifikasi!",
        text: "Data Berhasil Di Update Status Verifikasi!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_verifikasi')){ ?>
    <script>
    swal({
        title: "Eror!",
        text: "Terjadi Kesalahan Dalam Proses data!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('error_file_kk')){ ?>
    <script>
    swal({
        title: "Eror!",
        text: "Format File Tidak Sesuai!",
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

        <?php $this->load->view('admin/components/navbar');?>

        <?php $this->load->view('admin/components/sidebar');?>



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Anggota</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Anggota</li>
                            </ol>
                        </div><!-- /.col -->
                        <!-- Button trigger modal -->
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
                                    <h3 class="card-title">Data Anggota</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jabatan</th>
                                                <th>Nomor KK</th>
                                                <th>Nomor KTP</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Agama</th>
                                                <th>Nomor HP</th>
                                                <th>Alamat</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Foto KK</th>
                                                <th>Status Verifikasi</th>
                                                <th>Tanggal Register</th>
                                                <th>Aksi</th>
                                                <th>Verifikasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 0;
                                            foreach($anggota as $i)
                                            :
                                            $id++;
                                            $id_user = $i['id_user'];
                                            $username = $i['username'];
                                            $email = $i['email'];
                                            $password = $i['password'];
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
                                            <tr>
                                                <td><?=$id?></td>
                                                <td><?=$nama_lengkap?>
                                                </td>
                                                <td><?=$jabatan?></td>
                                                <td><?=$no_kk?></td>
                                                <td><?=$no_ktp?></td>
                                                <td><?=$jenis_kelamin?></td>
                                                <td><?=$agama?></td>
                                                <td><?=$no_hp?></td>
                                                <td><?=$alamat?></td>
                                                <td><?=$tempat_lahir?></td>
                                                <td><?=$tanggal_lahir?></td>
                                                <td>
                                                    <center> <a
                                                            href="<?= base_url();?>assets/foto/<?php echo $foto_kk?>"
                                                            target="_blank"><img
                                                                src="<?= base_url();?>assets/foto/<?php echo $foto_kk?>"
                                                                style="width: 50%"> </a></center>
                                                </td>
                                                <td><?php if($id_status_verifikasi == 1){ ?>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-danger" data-toggle="modal"
                                                                data-target="#edit_data_pegawai">
                                                                Belum Diverifikasi
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php }elseif($id_status_verifikasi == 2) {?>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-warning" data-toggle="modal"
                                                                data-target="#edit_data_pegawai">
                                                                Menunggu Diverifikasi
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php }elseif($id_status_verifikasi == 3) {?>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-danger" data-toggle="modal"
                                                                data-target="#edit_data_pegawai">
                                                                Data Ditolak
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php }elseif($id_status_verifikasi == 4) {?>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-success" data-toggle="modal"
                                                                data-target="#edit_data_pegawai">
                                                                Data Diterima
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php }?></td>
                                                <td><?=$tanggal_registered?></td>
                                                <td>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-primary" data-toggle="modal"
                                                                data-target="#ubah_anggota<?=$id_user?>">
                                                                Edit <i class="nav-icon fas fa-edit"></i>
                                                            </a>

                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" data-toggle="modal"
                                                                data-target="#delete_anggota<?=$id_user?>"
                                                                class="btn btn-danger">Hapus <i
                                                                    class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-primary" data-toggle="modal"
                                                                data-target="#setuju<?= $id_user ?>">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" data-toggle="modal"
                                                                data-target="#tidak_setuju<?= $id_user ?>"
                                                                class="btn btn-danger"><i class="fas fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                                
                                                <!-- Modal Ubah Data Anggota-->
                                                <div class="modal fade" id="ubah_anggota<?=$id_user?>" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data
                                                                    Anggota
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?=base_url();?>Pengurus/edit_data_admin"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    <input type="text" value="<?=$id_user?>"
                                                                        name="id_user" hidden>
                                                                    <div class="form-group">
                                                                        <label for="username">Username</label>
                                                                        <input type="text" class="form-control"
                                                                            id="username" name="username"
                                                                            value="<?=$username?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="password">Password</label>
                                                                        <input type="text" class="form-control"
                                                                            id="password" name="password"
                                                                            value="<?=$password?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Email</label>
                                                                        <input type="text" class="form-control"
                                                                            id="email" name="email" value="<?=$email?>"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_lengkap">Nama Lengkap</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama_lengkap" name="nama_lengkap"
                                                                            value="<?=$nama_lengkap?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no_kk">Nomor Kartu Keluarga</label>
                                                                        <input type="text" class="form-control"
                                                                            id="no_kk" name="no_kk" value="<?=$no_kk?>"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no_ktp">Nomor KTP</label>
                                                                        <input type="text" class="form-control"
                                                                            id="no_ktp" name="no_ktp"
                                                                            value="<?=$no_ktp?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                                                        <select class="form-control" id="jenis_kelamin"
                                                                            name="jenis_kelamin" required>
                                                                            <option value="L" <?php  if($jenis_kelamin == 'L'){
                                                                                                echo 'selected';
                                                                                            }else{
                                                                                                echo '';
                                                                                            }  ?>>Laki-Laki</option>
                                                                            <option value="P" <?php  if($jenis_kelamin == 'P'){
                                                                                                echo 'selected';
                                                                                            }else{
                                                                                                echo '';
                                                                                            }  ?>>Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="agama">Agama</label>
                                                                        <input type="text" class="form-control"
                                                                            id="agama" name="agama" value="<?=$agama?>"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no_hp">Nomor HP</label>
                                                                        <input type="text" class="form-control"
                                                                            id="no_hp" name="no_hp"
                                                                            value="<?=$nama_lengkap?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="alamat">Alamat</label>
                                                                        <textarea class="form-control"
                                                                            id="exampleFormControlTextarea1" rows="3"
                                                                            name="alamat"
                                                                            required><?=$alamat?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tempat_lahir">Tempat Lahir</label>
                                                                        <input type="text" class="form-control"
                                                                            id="tempat_lahir" name="tempat_lahir"
                                                                            value="<?=$tempat_lahir?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                                                        <input type="date" class="form-control"
                                                                            id="tanggal_lahir" name="tanggal_lahir"
                                                                            value="<?=$tanggal_lahir?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="foto_kk">Foto Kartu Keluarga</label>
                                                                        <input type="file" class="form-control"
                                                                            id="foto_kk" name="foto_kk" required>
                                                                        <input type="text" id="foto_kk_old"
                                                                            name="foto_kk_old" value="<?=$foto_kk?>"
                                                                            hidden>
                                                                        <small id="foto_kk"
                                                                            class="form-text text-muted">Format
                                                                            PNG/JPG/JPEG (Max
                                                                            2MB)</small>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Setuju Data Anggota -->
                                                <div class="modal fade" id="setuju<?= $id_user ?>" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Setujui
                                                                Data Anggota
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form
                                                                    action="<?php echo base_url()?>Anggota/acc_anggota/4"
                                                                    method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            
                                                                            <input type="hidden" name="id_user"
                                                                                value="<?php echo $id_user?>" />

                                                                            <p>Apakah kamu yakin ingin Menyetujui Data Anggota
                                                                                ini?</i></b></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-danger ripple"
                                                                            data-dismiss="modal">Tidak</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success ripple save-category">Ya</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Tidak Setuju Data Anggota -->
                                                <div class="modal fade" id="tidak_setuju<?= $id_user ?>" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Tolak
                                                                Data Anggota
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form
                                                                    action="<?php echo base_url()?>Anggota/acc_anggota/3"
                                                                    method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                           
                                                                            <input type="hidden" name="id_user"
                                                                                value="<?php echo $id_user?>" />

                                                                            <p>Apakah kamu yakin ingin Menolak Data Anggota
                                                                                ini?</i></b></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-danger ripple"
                                                                            data-dismiss="modal">Tidak</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success ripple save-category">Ya</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Delete Data Anggota -->
                                                <div class="modal fade" id="delete_anggota<?=$id_user?>" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                    Data
                                                                    Anggota
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= base_url();?>Anggota/hapus_data_admin"
                                                                    method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_user"
                                                                                value="<?php echo $id_user?>" />
                                                                            <input type="text" name="foto_kk_old"
                                                                                value="<?=$foto_kk?>" hidden>

                                                                            <p>Apakah kamu yakin ingin menghapus data
                                                                                ini?</i></b></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-danger ripple"
                                                                            data-dismiss="modal">Tidak</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success ripple save-category">Ya</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

                <!-- Modal Tambah Data Anggota -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Anggota</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url();?>Anggota/tambah_data_admin" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_kk">Nomor Kartu Keluarga</label>
                                        <input type="text" class="form-control" id="no_kk" name="no_kk" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_ktp">Nomor KTP</label>
                                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input type="text" class="form-control" id="agama" name="agama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            name="alamat" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto_kk">Foto Kartu Keluarga</label>
                                        <input type="file" class="form-control" id="foto_kk" name="foto_kk" required>
                                        <small id="foto_kk" class="form-text text-muted">Format PNG/JPG/JPEG (Max
                                            2MB)</small>
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

    <?php $this->load->view('admin/components/js');?>
</body>

</html>