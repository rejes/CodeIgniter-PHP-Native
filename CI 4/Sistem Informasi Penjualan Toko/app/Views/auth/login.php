<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets') ?>/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="<?= base_url('assets') ?>/dist/css/styles.css" rel="stylesheet" crossorigin="anonymous" />
</head>

<body class="bg-light">

    <div class="form-login">
        <div class="div text-center mb-4">
            <h3 class="font-weight-bold">SISTEM INFORMASI PENJUALAN TOKO ADITFANS</h3>
        </div>
        <div class="card">
            <div class="card-header bg-dark">
                <H2 class="text-white text-center">LOGIN</H2>
            </div>
            <div class="card-body my-3">
                <form class="form-signin " method="post" action="Auth/login/proses">
                    <?= csrf_field(); ?>
                    <?php if (session()->getFlashdata('msg')) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('berhasil')) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('berhasil') ?></div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="username" class="sr-only">Username</label>
                        <input type="text"
                            class="form-control  <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                            id="username" name="username" autofocus value="<?= old('username'); ?>"
                            placeholder="Username">
                        <div id="username" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('username'); ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>"
                            placeholder="Password">
                        <div id="password" class="invalid-feedback text-left ml-1   mt-0">
                            <span><?= $validation->getError('password'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-block">Masuk</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


</body>