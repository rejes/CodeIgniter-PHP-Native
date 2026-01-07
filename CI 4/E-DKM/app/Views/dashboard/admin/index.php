<?= $this->extend('layouts/dashboard-layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengelolaan Admin</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin</li>
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
                <h4 class="card-title">Daftar Admin</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahData">Tambah Admin</button>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col overflow-auto">
                        <table class="table" id="datatables" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th>Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($admin as $a) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?= $a['name'] ?></td>
                                        <td><?= $a['username'] ?></td>
                                        <td><?= $a['email'] ?></td>
                                        <td><?= $a['level'] == 1 ? 'Super Admin' : 'Admin' ?></td>
                                        <td>
                                            <a href="/dashboard/admin/edit/<?= $a['username'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <?php if($a['username'] != session()->get('username')) : ?>
                                                <button class="btn btn-danger delete" type="button" data-bs-toggle="modal" data-bs-target="#modalHapusData<?= $a['id'] ?>"><i class="bi bi-trash"></i></button>
                                            <?php endif; ?>
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

<!-- Modal tambah data -->
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahDataLabel">Password Keamanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/dashboard/admin/security-add" method="POST">
        <?= csrf_field() ?>
            <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php foreach($admin as $a) : ?>
    <!-- Modal Hapus data -->
    <div class="modal fade" id="modalHapusData<?= $a['id'] ?>" tabindex="-1" aria-labelledby="modalHapusDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalTambahDataLabel">Hapus Data Admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/dashboard/admin/delete" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <p class="mb-3">Yakin ingin menghapus admin <strong><?= $a['name'] ?></strong> ?</p>
            <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="idAdmin" value="<?= $a['id'] ?>">
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
<script>
    $(function() {
        $('#datatables').DataTable({
            "lengthMenu": [10, 25, 50]
        });
    })
</script>
<?= $this->endSection() ?>

