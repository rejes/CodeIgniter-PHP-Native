<?= $this->extend('layouts/main-layouts/main-template') ?>

<?= $this->section('content') ?>
<div class="container mb-5">
    <h2 class="mb-3">Struktur Pengurus Masjid Ar-Rahman</h2>
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body m-5">
                <table class="table table-bordered" data-aos="fade-right" data-aos-duration="1500">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pengurus as $p) : ?>
                        <?php if($p['jabatan'] == 'Ketua') : ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?= $p['name'] ?></td>
                            <td><?= $p['jabatan'] ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if($p['jabatan'] == 'Wakil Ketua') : ?>
                        <tr>
                            <th scope="row">2</th>
                            <td><?= $p['name'] ?></td>
                            <td><?= $p['jabatan'] ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if($p['jabatan'] == 'Bendahara') : ?>
                        <tr>
                            <th scope="row">3</th>
                            <td><?= $p['name'] ?></td>
                            <td><?= $p['jabatan'] ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if($p['jabatan'] == 'Sekertaris') : ?>
                        <tr>
                            <th scope="row">4</th>
                            <td><?= $p['name'] ?></td>
                            <td><?= $p['jabatan'] ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
            </table>
                <h5 class="mt-5">Pengurus Bidang</h5>
                <table class="table table-bordered" data-aos="fade-left" data-aos-duration="1500">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach($pengurus as $p) : ?>
                            <?php if($p['jabatan'] !== 'Ketua' && $p['jabatan'] !== 'Wakil Ketua' && $p['jabatan'] !== 'Bendahara' && $p['jabatan'] !== 'Sekertaris') : ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $p['name'] ?></td>
                                    <td><?= $p['jabatan'] ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>