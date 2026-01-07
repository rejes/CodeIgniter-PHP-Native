<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('anggota/components/header');?>
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
                            <h1 class="m-0">Lengkapi Data</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Lengkapi Data</li>
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
                            <?php
                                            $id = 0;
                                            foreach($anggota_data as $i)
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

                            <form action="<?=base_url();?>Lengkapi_data/proses_anggota" method="POST"
                                enctype="multipart/form-data">
                                <input type="text" value="<?=$id_user?>" name="id_user" hidden>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        value="<?=$nama_lengkap?>" <?php  if( $id_status_verifikasi == '2' OR $id_status_verifikasi == '4'){
                                        echo 'disabled';
                                    }else{
                                        echo 'required';
                                    }  ?>>
                                </div>
                                <div class="form-group">
                                    <label for="no_kk">Nomor Kartu Keluarga</label>
                                    <input type="text" class="form-control" id="no_kk" name="no_kk" value="<?=$no_kk?>" <?php  if( $id_status_verifikasi == '2' OR $id_status_verifikasi == '4'){
                                        echo 'disabled';
                                    }else{
                                        echo 'required';
                                    }  ?>>
                                </div>
                                <div class="form-group">
                                    <label for="no_ktp">Nomor KTP</label>
                                    <input type="text" class="form-control" id="no_ktp" name="no_ktp"
                                        value="<?=$no_ktp?>" <?php  if( $id_status_verifikasi == '2' OR $id_status_verifikasi == '4'){
                                        echo 'disabled';
                                    }else{
                                        echo 'required';
                                    }  ?>>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" <?php  if( $id_status_verifikasi == '2' OR $id_status_verifikasi == '4'){
                                        echo 'disabled';
                                    }else{
                                        echo 'required';
                                    }  ?>>
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
                                    <input type="text" class="form-control" id="agama" name="agama" value="<?=$agama?>" <?php  if( $id_status_verifikasi == '2' OR $id_status_verifikasi == '4'){
                                        echo 'disabled';
                                    }else{
                                        echo 'required';
                                    }  ?>>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        value="<?=$nama_lengkap?>" <?php  if( $id_status_verifikasi == '2' OR $id_status_verifikasi == '4'){
                                        echo 'disabled';
                                    }else{
                                        echo 'required';
                                    }  ?>>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="alamat" <?php  if( $id_status_verifikasi == '2' OR $id_status_verifikasi == '4'){
                                        echo 'disabled';
                                    }else{
                                        echo 'required';
                                    }  ?>><?=$alamat?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                        value="<?=$tempat_lahir?>" <?php  if( $id_status_verifikasi == '2' OR $id_status_verifikasi == '4'){
                                        echo 'disabled';
                                    }else{
                                        echo 'required';
                                    }  ?>>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        value="<?=$tanggal_lahir?>" <?php  if( $id_status_verifikasi == '2' OR $id_status_verifikasi == '4'){
                                        echo 'disabled';
                                    }else{
                                        echo 'required';
                                    }  ?>>
                                </div>

                                <div class="form-group">
                                    <label for="foto_kk">Foto Kartu Keluarga</label>
                                    <input type="file" class="form-control" id="foto_kk" name="foto_kk" <?php  if( $id_status_verifikasi == '2' OR $id_status_verifikasi == '4'){
                                        echo 'disabled';
                                    }else{
                                        echo 'required';
                                    }  ?>>
                                    <input type="text" id="foto_kk_old" name="foto_kk_old" value="<?=$foto_kk?>" hidden>
                                    <small id="foto_kk" class="form-text text-muted">Format
                                        PNG/JPG/JPEG (Max
                                        2MB)</small>
                                </div>
                                <div class="form-group">
                                    <?php if($foto_kk){ ?>
                                    <h3>Preview Foto KK</h3>
                                    <img src="<?=base_url();?>assets/foto/<?=$foto_kk?>" alt="Foto KK" width="25%">
                                    <?php } else{?>
                                    <h3>Foto KK belum diupload</h3>
                                    <?php } ?>

                                </div>
                                <?php  if( $id_status_verifikasi == '2' OR $id_status_verifikasi == '4'){
                                        echo '<br><br>';
                                    }else{
                                        echo '<button type="submit" class="btn btn-primary">Submit</button>';
                                    }  ?>
                                
                            </form>
                            <?php endforeach;?>
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