<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<ol class="breadcrumb mx-4 bg-dark ">
    <li class="breadcrumb-item"><a href="/" id="btn-back" class="text-white">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/Barang" id="btn-back" class="text-white">Barang</a></li>
    <li class="breadcrumb-item active">Tambah Barang</li>
</ol>

<div class="container-fluid ">
    <div class="card mb-3">
        <form action="\Master\barang\simpanbarang" method="POST">

            <div class="row px-3 py-3">
                <div class="col-5">
                    <div class="form-group">
                        <label class="font-weight-bold">Kategori</label>
                        <select class=" form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>"
                            name="kategori">
                            <option value="">-- pilih --</option>
                            <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id=" kategori" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('kategori'); ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">satuan</label>
                        <select class=" form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>"
                            name="satuan">
                            <option value=" ">-- pilih --</option>
                            <?php foreach ($satuan as $u) : ?>
                            <option value="<?= $u['id_satuan'] ?>"><?= $u['nama_satuan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id=" satuan" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('satuan'); ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text"
                            class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama"
                            name="nama">
                        <div id=" nama" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('nama'); ?> </span>
                        </div>
                    </div>
                    <a href="/Barang" id="btn-back" class="text-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label class="font-weight-bold">Kode Barcode</label>
                        <input type="text" class="form-control <?= ($validation->hasError('barcode')) ? 'is-invalid' : ''; ?>
                            <?= (session()->getFlashdata('gagal_barcode')) ? 'is-invalid' : ''; ?>" id="barcode"
                            name="barcode">
                        <div id=" barcode" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('barcode'); ?>
                                <?= session()->getFlashdata('gagal_barcode'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Stok Awal</label>
                        <input type="number"
                            class="form-control <?= ($validation->hasError('stok_awal')) ? 'is-invalid' : ''; ?>"
                            id="stok_awal" name="stok_awal" value="0" min="0">
                        <div id=" stok_awal" class="invalid-feedback text-left ml-1 mt-0">
                            <span> <?= $validation->getError('stok_awal'); ?> </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Harga</label>
                        <input type="number"
                            class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga"
                            name="harga">
                        <div id=" harga" class="invalid-feedback text-left ml-1 mt-0">
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