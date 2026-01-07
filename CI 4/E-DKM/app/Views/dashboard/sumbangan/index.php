<?= $this->extend('layouts/dashboard-layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengelolaan Sumbangan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sumbangan</li>
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
            <div class="card-header justify-content-between d-flex">
                <h4 class="card-title">Daftar Sumbangan</h4>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col overflow-auto">
                        <table class="table" id="datatables" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Waktu Sumbangan</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jumlah Sumbangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach($sumbangan as $s) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?= date('d F Y - H:i:s', strtotime($s['created_at'])) ?></td>
                                        <td><?= $s['name'] ?></td>
                                        <td>Rp <?= number_format($s['jumlah'],0,',','.') ?></td>
                                        <td>
                                            <a href="#detailModal<?= $s['id'] ?>" data-bs-toggle="modal" data-bs-target="#detailModal<?= $s['id'] ?>" class="badge bg-success"><i class="bi bi-eye-fill"></i></a>
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

<!-- Modal -->
<?php foreach($sumbangan as $s) : ?>
<div class="modal fade" id="detailModal<?= $s['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Sumbangan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-5">
                <img src="/assets/images/sumbangan/<?= $s['bukti_transfer'] ?>" width="200">
            </div>
            <div class="col-md-7">
            <ul class="list-group">
                <li class="list-group-item"><strong>Nama Pengirim : </strong><?= $s['name'] ?></li>
                <li class="list-group-item"><strong>Jumlah : </strong>Rp <?= number_format($s['jumlah'],0,',','.') ?></li>
                <li class="list-group-item"><strong>No. Telepon : </strong><?= $s['no_telp'] ?></li>
                <li class="list-group-item"><strong>Pesan : </strong><?= $s['pesan'] ?></li>
            </ul>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <p>Tidak valid ?</p>
        <button type="button" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $s['id'] ?>" class="btn-sm border-0 btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php foreach($sumbangan as $s) : ?>
<div class="modal fade" id="hapusModal<?= $s['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Yakin ingin menghapusnya ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <form action="/dashboard/sumbangan/<?= $s['id'] ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE" />
            <button type="sumbit" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(function() {
        $('#datatables').DataTable({
            "lengthMenu": [6, 10, 20]
        });
    });
</script>
<?= $this->endSection() ?>

