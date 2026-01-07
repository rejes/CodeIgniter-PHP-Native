<?php 

require 'header.php'; 

$jenis       = mysqli_query($conn, "SELECT * FROM jenis");
$search      = isset($_GET['search']) ? $_GET['search'] : null;
$jenis_id    = isset($_GET['jenis_id']) ? $_GET['jenis_id'] : null;
$per_halaman = isset($_GET['per_halaman']) ? $_GET['per_halaman'] : 12;
$halaman     = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$utama       = ($halaman > 1) ? ($halaman * $per_halaman) - $per_halaman : 0;
$sebelumnya  = $halaman - 1;
$selanjutnya = $halaman + 1;
$filter      = '';

if($search) {
  $filter .= '&search=' . $search;
}

if($jenis_id) {
  $filter .= '&jenis_id=' . $jenis_id;
  $raw     = "AND koleksi.jenis_id = '$jenis_id'";
} else {
  $raw = null;
}

$koleksi = mysqli_query($conn, "SELECT koleksi.*, jenis.nama as nama_jenis, penerbit.nama, koleksi_pustaka.konten FROM koleksi LEFT JOIN penerbit ON koleksi.penerbit_id = penerbit.id LEFT JOIN jenis ON jenis.id = koleksi.jenis_id LEFT JOIN koleksi_pustaka ON koleksi.id = koleksi_pustaka.koleksi_id WHERE (koleksi.judul LIKE '%$search%' OR koleksi.isbn LIKE '%$search%' OR koleksi.pengarang LIKE '%$search%' OR koleksi_pustaka.konten LIKE '%$search%') $raw GROUP BY koleksi.id ORDER BY koleksi.tanggal_entri ASC LIMIT $utama, $per_halaman"); 

$total_data = mysqli_num_rows(mysqli_query($conn, "SELECT koleksi.*, jenis.nama as nama_jenis, penerbit.nama, koleksi_pustaka.konten FROM koleksi LEFT JOIN penerbit ON koleksi.penerbit_id = penerbit.id LEFT JOIN jenis ON jenis.id = koleksi.jenis_id LEFT JOIN koleksi_pustaka ON koleksi.id = koleksi_pustaka.koleksi_id WHERE (koleksi.judul LIKE '%$search%' OR koleksi.isbn LIKE '%$search%' OR koleksi.pengarang LIKE '%$search%' OR koleksi_pustaka.konten LIKE '%$search%') $raw GROUP BY koleksi.id"));
$total_halaman = ceil($total_data / $per_halaman);

?>
<div class="container">
  <div class="mt-5 mb-5">
    <div class="card mb-5">
      <div class="card-body">
        <form action="" method="GET">
          <div class="mb-3">
            <div class="row">
              <div class="col-8">
                <input type="text" name="search" class="form-control" value="<?= $search; ?>" placeholder="cari berdasarkan judul, isbn atau pengarang">
              </div>
              <div class="col-4">
                <select name="jenis_id" id="jenis_id" class="form-control">
                  <option value="">Semua Jenis</option>
                  <?php while($row = mysqli_fetch_assoc($jenis)) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="text-end">
            <?php if($search) { ?>
              <a href="koleksi.php" class="btn btn-danger">Reset</a>
            <?php } ?>
            <button type="submit" class="btn btn-primary pull-right">Cari</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-12 mb-3">
        <?php if(mysqli_num_rows($koleksi) > 0) { ?>
          <div class="row justify-content-end">
            <div class="col-3">
              <form action="">
                <div class="row mb-3">
                  <label for="per_halaman" class="col-5 col-form-label">Per Halaman</label>
                  <div class="col-7">
                    <select name="per_halaman" id="per_halaman" class="form-control" onchange="return $(this).parents('form').submit()">
                      <option value="12" <?= $per_halaman == 12 ? 'selected' : '' ?>>12</option>
                      <option value="24" <?= $per_halaman == 24 ? 'selected' : '' ?>>24</option>
                      <option value="60" <?= $per_halaman == 60 ? 'selected' : '' ?>>60</option>
                    </select>
                  </div>
                </div>
              </form>
            </div>
          </div>
        <?php } ?>
      </div>
      <?php if(mysqli_num_rows($koleksi) > 0) { ?>
        <?php while($row = mysqli_fetch_assoc($koleksi)) { ?>
          <div class="col-3">
            <div class="card mb-3">
              <div class="card-header">
                <div class="card-title">
                  <div class="text-center">
                    <?php 
                      if($row['cover']) {
                        $cover = $base_url . '/archive/' . $row['cover'];
                      } else {
                        $cover = $base_url . '/archive/empty.jpg';
                      }
                    ?>
                    <img src="<?= $cover; ?>" height="350" class="img-fluid" alt="<?= $row['judul']; ?>">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h6 class="card-title" style="max-height:20px !important; overflow:hidden;">
                  <?php $str = randomString(); ?>
                  <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#<?= $str; ?>">
                    <?= $row['judul']; ?>
                  </a>  
                </h6>
                <div class="modal fade" id="<?= $str; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $row['judul']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="text-center">
                              <div>Pengarang :</div>
                              <span class="text-muted"><?= $row['pengarang']; ?></span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="text-center">
                              <div>Jenis :</div>
                              <span class="text-muted"><?= str_replace('_', '', $row['nama_jenis']); ?></span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="text-center">
                              <div>ISBN :</div>
                              <span class="text-muted"><?= ucwords(str_replace('_', '', $row['isbn'])); ?></span>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <p><?= $row['keterangan']; ?></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <small>
                      Jenis : <?= str_replace('_', '', $row['nama_jenis']); ?><br>
                      ISBN : <?= ucwords(str_replace('_', '', $row['isbn'])); ?>
                    </small>
                  </div>
                  <div class="col-md-12">
                    <div class="text-end mt-3">
                      <a href="aksi_pinjam.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm col-12">Pinjam</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        <?php } ?>
      <?php } else { ?>
        <div class="alert alert-info text-center">
          Data tidak ditemukan.<br>
          <small>
            <a href="koleksi.php" class="fst-italic text-danger">Reset pencarian.</a>
          </small>
        </div>
      <?php } ?>
      <?php if(mysqli_num_rows($koleksi) > 0) { ?>
        <nav aria-label="..." class="mt-5">
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" href="<?= $halaman > 1 ? "?halaman=$sebelumnya" . $filter : 'javascript:void(0);' ?>">&larr;</a>
            </li>
            <?php for($i = 1; $i <= $total_halaman; $i++) { ?>
              <?php if($halaman == $i) { ?>
                <li class="page-item active" aria-current="page">
                  <a class="page-link" href="javascript:void(0);"><?= $i; ?></a>
                </li>
              <?php } else { ?>
                <li class="page-item">
                  <a class="page-link" href="?halaman=<?= $i . $filter; ?>"><?= $i; ?></a>
                </li>
              <?php } ?>
            <?php } ?>
            <li class="page-item">
              <a class="page-link" href="<?= $halaman > $total_halaman ? "?halaman=$selanjutnya" . $filter : 'javascript:void(0);' ?>">&rarr;</a>
            </li>
          </ul>
        </nav>
      <?php } ?>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>