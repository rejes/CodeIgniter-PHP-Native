<?= $this->extend('layouts/main-layouts/main-template') ?>

<?= $this->section('styles') ?>
<style>
label#nama-error, label#noHp-error, label#pesan-error, label#jumlahTransfer-error, label#buktiTransfer-error {
    color: red;
    margin-top: 10px;
    font-size: 14px;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mb-5">
    <h2 class="mb-4">Program sedekah / sumbangan Masjid Ar-Rahman</h2>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body m-5">
                    <h5>Assalamualaikum warahmatullahi wabarakatuh</h5>
                    <p class="mt-3">Nabi Muhammad Sallallahu Alaihi Wasallam bersabda :<br>“Barangsiapa yang membangun masjid, maka Allah akan bangunkan baginya semisalnya di surga.” (HR. Bukhari, 450 dan Muslim, 533 dari Hadits Utsman radhiallahu’anhu)</p>
                    <p class="my-3">Diriwayatkan Ibnu Majah, 738 dari Jabir bin Abdullah radhiallahu’anhuma, sesungguhnya Rasulullah Sallallahu Alahi Wasallam bersabda :<br>“Barangsiapa membangun masjid karena Allah sebesar sarang burung atau lebih kecil. Maka Allah akan bangunkan baginya rumah di surga.” (Dishahihkan oleh Al-Albany) </p>
                    <p class="my-3">Saudaraku kaum muslimin dan muslimat yang di rahmati Allah SWT, marilah kita berlomba-lomba dalam kebaikan, semoga Allah SWT membangunkan rumah untuk siapa saja yang menyumbangkan hartanya untuk membangun masjid Raudhatul Jannah karena Allah SWT. </p>
                    <hr>
                    <div class="row justify-content-between">
                        <h5 class="mb-4">Formulir sumbangan</h5>
                        <?php if(session()->getFlashdata('success')) : ?>
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= session()->getFlashdata('success'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-5">
                            <form action="javascript:void(0)" id="form-add-sumbangan" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" id="nama" placeholder="Masukkan nama lengkap" name="name" value="<?= old('name') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('name') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="noHp" class="form-label">No. Handphone</label>
                                    <input type="number" class="form-control <?= $validation->hasError('no_telp') ? 'is-invalid' : '' ?>" id="noHp" placeholder="Masukkan nama No. Handphone" name="no_telp" value="<?= old('no_telp') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_telp') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="pesan" class="form-label">Pesan</label>
                                    <textarea name="pesan" class="form-control <?= $validation->hasError('pesan') ? 'is-invalid' : '' ?>" cols="30" rows="3" placeholder="Masukkan pesan anda" name="pesan"><?= old('pesan') ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pesan') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlahTransfer" class="form-label">Jumlah Transfer</label>
                                    <input type="number" class="form-control <?= $validation->hasError('jumlahTransfer') ? 'is-invalid' : '' ?>" id="jumlahTransfer" placeholder="Masukkan jumlah transfer" name="jumlahTransfer" value="<?= old('jumlahTransfer') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jumlahTransfer') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="buktiTransfer" class="form-label">Bukti Transfer</label>
                                    <input class="form-control <?= $validation->hasError('buktiTransfer') ? 'is-invalid' : '' ?>" type="file" id="buktiTransfer" name="buktiTransfer" accept=".png, .jpg">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('buktiTransfer') ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                        <div class="col-lg-5 mt-4">
                            <p class="fw-bold">Nomor Tujuan Transfer</p>
                            <ul class="list-group d-block">
                                <li class="list-group-item"><strong>DANA</strong> 081338891237 a/n Febi Widiastuti</li>
                                <li class="list-group-item"><strong>OVO</strong> 081338891237 a/n Febi Widiastuti</li>
                                <li class="list-group-item"><strong>BCA</strong> 3882349462 a/n Febi Widiastuti</li>
                            </ul>
                            <div class="alert alert-warning mt-5" role="alert">
                                Foto bukti transfer harus terlihat <strong>jelas</strong> !
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(function() {
        jQuery.validator.addMethod("extension", function(value, element, param) {
            param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g";
            return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
        }, "Yang anda pilih bukan gambar");

        jQuery.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'ukuran file tidak boleh melebihi 2MB');

        $('#form-add-sumbangan').validate({
            rules: {
                name: {
                    required: true
                },
                no_telp: {
                    required: true,
                    minlength: 10,
                    maxlength: 13,
                    digits: true
                },
                jumlahTransfer: {
                    required: true,
                    digits: true,
                    minlength: 5,
                },
                pesan: {
                    required: true,
                    minlength: 5
                },
                buktiTransfer: {
                    required: true,
                    extension: "jpg|jpeg|png",
                    filesize: 2048
                }
            }, messages: {
                name: {
                    required: 'Nama lengkap wajib diisi'
                },
                no_telp: {
                    required: 'No.Handphone wajib diisi',
                    minlength: 'No.Handphone setidaknya harus berisi 10 karakter',
                    maxlength: 'No.Handphone tidah boleh lebih dari 13 karakter',
                    digits: 'No.Handphone hanya boleh berisi angka'
                },
                jumlahTransfer: {
                    required: 'Jumlah transfer wajib diisi',
                    digits: 'Jumlah transfer hanya boleh berisi angka',
                    minlength: 'Jumlah Transfer minimal Rp. 10.000',
                },
                pesan: {
                    required: 'Pesan wajib diisi',
                    minlength: 'Pesan setidaknya harus berisi 5 karakter',
                },
                buktiTransfer: {
                    required: 'Bukti transfer wajib diisi',
                }
            },
            errorClass: "is-invalid",
        });

        $('#form-add-sumbangan').on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            $.ajax({
                url: "<?= site_url('sumbangan') ?>",
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    if(data.success) {
                        Swal.fire(
                            'Sukses',
                            'Data berhasil disimpan',
                            'success'
                        ).then(() => {
                            window.location.reload()
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error at add data');
                }
            })
        })
    })
</script>
<?= $this->endSection() ?>