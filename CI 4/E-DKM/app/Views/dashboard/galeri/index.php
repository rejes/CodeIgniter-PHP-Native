<?= $this->extend('layouts/dashboard-layouts/app') ?>
<?php helper('tgl'); ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengelolaan Galeri</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Galeri</li>
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
                <h4 class="card-title">Daftar Foto</h4>
                <a href="/dashboard/galeri/create" class="btn btn-primary">Tambah Foto</a>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col overflow-auto">
                        <table class="table" id="datatables" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Tanggal Kegiatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach($foto as $f) : ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td>
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#fotoModal<?= $f['id'] ?>"><i class="bi bi-image"></i></button>
                                    </td>
                                    <td><?= $f['nama_kategori'] ?></td>
                                    <td><?= tgl_indo(date('Y/m/d', strtotime($f['tgl_kegiatan']))) ?></td>
                                    <td>
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $f['id'] ?>"><i class="bi bi-trash"></i></button>
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

<!-- Foto Modal -->
<?php foreach($foto as $f) : ?>
<div class="modal fade" id="fotoModal<?= $f['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="/assets/images/galeri/<?= $f['foto'] ?>" width="600">
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Hapus Modal -->
<?php foreach($foto as $f) : ?>
<div class="modal fade" id="hapusModal<?= $f['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus foto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Yakin ingin menghapusnya ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <form action="/dashboard/galeri/<?= $f['id'] ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-danger">Hapus</button>
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
            "lengthMenu": [10, 25, 50]
        });
    });
</script>
<?= $this->endSection() ?>