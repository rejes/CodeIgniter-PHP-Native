<?= $this->extend('layouts/dashboard-layouts/app') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengelolaan Pengurus Masjid</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengurus</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php if(session()->getFlashdata('error')) : ?>
    <div class="row">
        <div class="col-lg">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('success')) : ?>
    <div class="row">
        <div class="col-lg">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Pengurus</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div>
                    <a class="btn btn-danger mb-2" href="/dashboard/pengurus/pdf">Download PDF</a>
                    </div>
                    <div class="col overflow-auto">
                        <table class="table" id="datatables" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach($pengurus as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?= $p['name'] ?></td>
                                        <td><?= $p['jabatan'] ?></td>
                                        <td>
                                            <a href="#detailModal<?= $p['id'] ?>" title="Detail" data-bs-toggle="modal" data-bs-target="#detailModal<?= $p['id'] ?>" class="btn btn-success"><i class="bi bi-eye-fill"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Detail Modal -->
<?php foreach($pengurus as $p) : ?>
<div class="modal fade detailModal" id="detailModal<?= $p['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pengurus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
            <li class="list-group-item">Nama : <?= $p['name'] ?></li>
            <li class="list-group-item">Alamat : <?= $p['alamat'] ?></li>
            <li class="list-group-item">No.Telp : <?= $p['no_telp'] ?></li>
            <li class="list-group-item">Jabatan : <?= $p['jabatan'] ?></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger TombolModalHapus" data-bs-toggle="modal" data-bs-target="#hapusData<?= $p['id'] ?>">Hapus</button>
        <a href="/dashboard/pengurus/edit/<?= $p['id'] ?>" class="btn btn-success">Edit</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade modalHapus" id="hapusData<?= $p['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pengurus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/dashboard/pengurus/<?= $p['id'] ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <p>Yakin ingin menghapusnya ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script>
    $(function() {
        $('.TombolModalHapus').click(function() {
            $('.detailModal').modal('hide');
        });

        $('#datatables').DataTable({
            // dom: 'Bfrtip',
            // buttons: [
            //     'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
            // ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    })
</script>
<?= $this->endSection() ?>

