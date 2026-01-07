<?= $this->extend('layouts/dashboard-layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Data Profile</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <?php $adminId = $admin['id'] ?>
                                <form action="<?= session()->get('role_level') == 1 ? "/dashboard/admin/update/$adminId" : "/dashboard/admin/edit-profile/$adminId" ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="oldUsername" value="<?= $admin['username'] ?>">
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Masukkan nama" autofocus value="<?= old('name') ?? $admin['name'] ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('name') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row <?= session()->get('role_level') == 1 ? 'mb-3' : 'mb-5' ?>">
                                        <label for="username" class="col-sm-4 col-form-label">Username</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="Masukkan username" value="<?= old('username') ?? $admin['username'] ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('username') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(session()->get('role_level') == 1) : ?>
                                    <div class="row mb-5">
                                        <label for="role" class="col-sm-4 col-form-label">Role</label>
                                        <div class="col-sm-8">
                                            <select class="form-select" aria-label="Default select example" name="role_level" id="role" <?= $validation->hasError('role_level') ? 'is-invalid' : '' ?>>
                                                <option value="1" <?= $admin['level'] == 1 ? 'selected' : '' ?>>Super Admin</option>
                                                <option value="2" <?= $admin['level'] == 2 ? 'selected' : '' ?>>Admin</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('role_level') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="row my-3">
                                        <label for="username" class="col-sm-4 col-form-label">Masukkan Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Masukkan password">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-3">Ubah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>
<?= $this->endSection() ?>
