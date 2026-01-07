<?= $this->extend('layouts/auth-layouts/auth') ?>

<?= $this->section('styles') ?>
<style>
    .auth-title {
        margin-top: -50px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="/"><h3><i class="bi bi-book"></i> Ar - Rahman</h3></a>
            </div>
            <h1 class="auth-title">Log in.</h1>

            <?php if(session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <form action="/admin/process" method="POST">
                <?= csrf_field() ?> 
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" placeholder="Username" name="username" autofocus required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Password" name="password" required>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p><a class="font-bold" href="admin/lupa-password">Lupa password?</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>
<?= $this->endSection() ?>
