<?= $this->extend('layouts/dashboard-layouts/app') ?>

<?= $this->section('styles') ?>
<style>
label#name-error, label#jabatan-error, label#alamat-error, label#no_telp-error{
    color: red;
    margin-top: 10px;
    font-size: 14px;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Pengurus</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard/pengurus">Pengurus</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Pengurus</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <form action="javascript:void(0)" id="form-add-pengurus">
                                    <?= csrf_field() ?>
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Masukkan nama" autofocus value="<?= old('name') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('name') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?= $validation->hasError('jabatan') ? 'is-invalid' : '' ?>" id="jabatan" name="jabatan" placeholder="Masukkan jabatan" value="<?= old('jabatan') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jabatan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <textarea type="text" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat" placeholder="Masukkan alamat" value="<?= old('alamat') ?>"></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('alamat') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="no_telp" class="col-sm-4 col-form-label">No. Handphone</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control <?= $validation->hasError('no_telp') ? 'is-invalid' : '' ?>" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Handphone" value="<?= old('no_telp') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('no_telp') ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mt-3">
                                        <button type="reset" class="btn btn-danger me-3" value="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
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
<script>
    $(function() {
        // custom validation rule
        jQuery.validator.addMethod("alpha_space", function(value, element) {
            return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
        }, "Nama hanya boleh berisi alphabet dan spasi");

        $('#form-add-pengurus').validate({
            rules: {
                name: {
                    required: true,
                    alpha_space: true
                },
                jabatan: {
                    required: true,
                },
                alamat: {
                    required: true,
                    minlength: 10
                },
                no_telp: {
                    required: true,
                    minlength: 10,
                    maxlength: 13,
                    digits: true
                }
            }, 
            messages: {
                name: {
                    required: 'Nama wajib diisi'
                },
                jabatan: {
                    required: 'Jabatan wajib diisi'
                },
                alamat: {
                    required: 'Alamat wajib diisi',
                    minlength: 'Alamat setidaknya harus berisi 10 karakter'
                },
                no_telp: {
                    required: 'No.Handphone wajib diisi',
                    minlength: 'No.Handphone setidaknya harus berisi 10 karakter',
                    maxlength: 'No.Handphone tidah boleh lebih dari 13 karakter',
                    digits: 'No.Handphone hanya boleh berisi angka'
                },
            },
            errorClass: "is-invalid",
        });

        $('#form-add-pengurus').on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            $.ajax({
                url: "<?= site_url('dashboard/pengurus/save') ?>",
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
                        ).then(function() {
                            window.location.reload();
                        });
                    }
                },
            })
        })
    })
</script>
<?= $this->endSection() ?>


