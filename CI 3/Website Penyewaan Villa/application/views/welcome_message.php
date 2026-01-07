<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("tamu/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("tamu/navbar.php") ?>

<div id="wrapper">

  <div id="content-wrapper">

    <div class="container-fluid">


      <!-- search box-->
        <div class="container-fluid">
          <div class="search-form"><h4><span class="fa fa-search"></span> Search for</h4>
            <?php echo form_open('Welcome/cari');?>
          <div class="row">
          <div class="col-lg-12">
              <select class="form-control" name="id_kelas_kamar">
                <option value="">Pilih Kelas Villa</option>
                <?php
                foreach ($kelas_kamar->result_array() as $value) { ?>
                    <option value="<?php echo $value['id_kelas_kamar']; ?>"><?php echo $value['nama_kelas_kamar'] ?></option>
                <?php
                }
                ?>
               
              </select>
              </div>
          </div>
          <button class="btn btn-primary">Find Now</button>

          <?php echo form_close();?>
        </div>
        <hr style="border: 1px solid">
      <!--end search box-->


    <!-- Icon Cards-->
<div class="row">

      <?php foreach ($kamar->result_array() as $value) { ?>
      <div class="col-xl-3 col-sm-6 mb-3" >

      <div class="properties" style="background-color: white; ">
        <div class="text-black font-weight-bold center">
             <img src="<?php echo base_url();?>/assets/images/<?php echo $value['nama_kamar_gambar'];?>" class="img-responsive" alt="properties" style="width:278.5px;height:150px;">
            <?php
                if ($value['status_kamar']=="0") { ?>
                  <div class="card-body status sold">
                <div style="color: white;"> Villa Tersedia</div>
                </div>
                <?php
                }
                else { ?>
                  <div class="card-body status new">
                <div style="color: white;">Being Reserved</div>
              </div>
              <?php 
              }
              ?>

                <h3><a href="<?php echo base_url();?>welcome/kamardetail/<?php echo $value['id_kamar'];?>"><?php echo $value['no_kamar'];?></a></h3>
                  <hr style="margin-top: 1; margin-bottom: 1;">
                  <h5><p class="price">Harga: <?php echo rupiah($value['harga_kamar']);?></p></h5>
                   <hr style="margin-top: 1; margin-bottom: 1;">
                  <div class="listing-detail"><?php echo $value['nama_kelas_kamar'];?>   </div>
                  <a class="btn btn-primary" href="<?php echo base_url();?>welcome/kamardetail/<?php echo $value['id_kamar'];?>">Selengkapnya</a>

        </div>

        
        
      </div>
      </div>
      
      <?php
      }
      ?>

    </div>
    <!-- /.iron-card -->
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("tamu/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("tamu/scrolltop.php") ?>
<?php $this->load->view("tamu/modal.php") ?>
<?php $this->load->view("tamu/js.php") ?>
    
</body>
</html>