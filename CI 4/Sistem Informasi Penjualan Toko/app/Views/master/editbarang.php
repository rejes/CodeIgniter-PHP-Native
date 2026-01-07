<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-barang"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-barang"><a href="/barang" id="btn-back" class="text-white">barang</a></li>
    <li class="breadcrumb-barang active">Edit barang</li>
</ol>

<div class="container-fluid ">
    <div class="card mb-3">
        <form action="\Master\barang\updatebarang" method="POST">
            <input type="hidden" name="id" value="<?= $barang[0]['id_barang']; ?>">
            <div class="row px-3 py-3">
                <div class="col-5">
                    <div class="form-group">

                        <label class="font-weight-bold">Kategori</label>
                        <select class=" form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>"
                            name="kategori">


                            <?php foreach ($kategori as $k) : ?>

                            <option value="<?= $k['id_kategori'] ?>" <?php if ($k['id_kategori'] == $barang[0]['kategori_id']) {
                                                                                echo "selected";
                                                                            } ?>>
                                <?= $k['nama_kategori']; ?>
                            </option>
                            <?php endforeach; ?>
                            <div id="kategori" class="invalid-feedback text-left ml-1 mt-0">
                                <span> <?= $validation->getError('kategori'); ?> </span>
                            </div>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">satuan</label>
                        <select class=" form-control  <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>"
                            name="satuan">
                            <?php foreach ($satuan as $u) : ?>
                            <option value="<?= $u['id_satuan'] ?>" <?php if ($u['id_satuan'] == $barang[0]['satuan_id']) {
                                                                            echo "selected";
                                                                        } ?>>
                                <?= $u['nama_satuan']; ?></option>
                            <?php endforeach; ?>
                            <div id="satuan" class="invalid-feedback text-left ml-1 mt-0">
                                <span> <?= $validation->getError('satuan'); ?> </span>
                            </div>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text"
                            class="form-control  <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama"
                            name="nama" value="<?= $barang[0]['nama_barang']; ?>">
                        <div id="barcode" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('nama'); ?> </span>
                        </div>
                    </div>
                    <a href="/barang" id="btn-back" class="text-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label class="font-weight-bold">Kode Barcode</label>
                        <input type="text" class="form-control <?= ($validation->hasError('barcode')) ? 'is-invalid' : ''; ?>
                            <?= (session()->getFlashdata('gagal_barcode')) ? 'is-invalid' : ''; ?>" id="barcode"
                            name="barcode" value="<?= $barang[0]['barcode_barang']; ?>">
                        <div id=" barcode" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('barcode'); ?>
                                <?= session()->getFlashdata('gagal_barcode'); ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Harga</label>
                        <input type="number"
                            class="form-control  <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>"
                            id="Harga" name="harga" value="<?= $barang[0]['harga_barang']; ?>">
                        <div id="barcode" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('harga'); ?> </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark float-right mt-4">Simpan</button>
                </div>

            </div>


        </form>
    </div>
</div>



<?= $this->endSection(); ?>