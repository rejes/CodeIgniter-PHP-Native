<?= $this->extend('layouts/main-layouts/main-template') ?>
<?= $this->section('styles') ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<link rel="stylesheet" href="/assets/css/galeri.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mb-5">
    <h2 class="text-center mb-5">Galeri Masjid Ar-Rahman</h2>
    <div class="row mb-4 text-center">
        <div class="col-md">
            <a href="/galeri" class="badge <?= uri_string() == 'galeri' ? 'bg-secondary': 'bg-primary' ?> text-decoration-none mb-2">Semua Foto</a>
            <?php foreach($kategori as $k) : ?>
                <a href="/galeri/<?= $k['slug'] ?>" class="badge <?= uri_string() === "galeri/" . $k['slug'] ? 'bg-secondary': 'bg-primary' ?> text-decoration-none mb-2"><?= $k['nama_kategori'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <?php if($foto) { ?>
            <?php foreach($foto as $f) : ?>
                <div class="col-lg-3 col-md-4 col-xs-6 col-6 thumb">
                    <a href="/assets/images/galeri/<?= $f['foto'] ?>" class="fancybox" rel="ligthbox">
                        <img  src="/assets/images/galeri/<?= $f['foto'] ?>" class="zoom img-fluid"  alt="">
                    </a>
                </div>
            <?php endforeach; ?>
        <?php } else { ?>
            <div class="row text-center justify-content-center mt-5">
                <div class="col-md-5">
                    <div class="alert alert-danger" role="alert">
                        Foto pada kategori tersebut tidak ada...
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
$(document).ready(function(){
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });

    $(".zoom").hover(function(){
        $(this).addClass('transition');
    }, function(){
        $(this).removeClass('transition');
    });

});
</script>
<?= $this->endSection() ?>

