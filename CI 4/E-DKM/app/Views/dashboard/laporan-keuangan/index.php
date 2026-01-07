<?= $this->extend('layouts/dashboard-layouts/app') ?>
<?php helper('tgl'); ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengelolaan Laporan Keuangan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan Keuangan</li>
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
            <div class="card-header">
                <div class="row justify-content-between d-flex">
                    <div class="col-lg-6 col-md-6">
                        <h4 class="card-title">Daftar Laporan Bulan <?= $tanggalJudul; ?></h4>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <form action="/dashboard/laporan-keuangan" class="d-flex">
                            <div class="input-group date" id="datepicker">
                                <input type="text" class="form-control" name="tglLaporan" id="tglLaporan" autocomplete="off" data-date-end-date="0d" placeholder="Pilih tanggal laporan" value="<?= $tanggalPicker ?>">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white d-block">
                                        <i class="bi bi-calendar-date"></i>
                                    </span>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col overflow-auto">
                        <table class="table" id="datatables" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Pemasukkan</th>
                                    <th scope="col">Pengeluaran</th>
                                    <th scope="col">Saldo</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($laporan) { ?>
                                    <?php 
                                    $i = 1;
                                    $totalPemasukkan = 0;
                                    $totalPengeluaran = 0;
                                    $totalSaldo = 0;
                                    ?>
                                    <?php foreach($laporan as $l) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?= tgl_indo(date('Y/m/d', strtotime($l['tanggal']))) ?></td>
                                        <td><?= $l['keterangan'] ?></td>
                                        <td>Rp <?= number_format($l['pemasukkan'],0,',','.') ?></td>
                                        <td>Rp <?= number_format($l['pengeluaran'],0,',','.') ?></td>
                                        <td>Rp <?= number_format($l['pemasukkan'] + $l['pengeluaran'],0,',','.') ?></td>
                                        <td>
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $l['id'] ?>"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php 
                                    $totalPemasukkan += $l['pemasukkan'];
                                    $totalPengeluaran += $l['pengeluaran'];
                                    $totalSaldo += ($l['pemasukkan'] + $l['pengeluaran']);
                                    ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="3" class="text-center fw-bold">Jumlah</td>
                                        <td class="d-none"></td>
                                        <td class="d-none"></td>
                                        <td class="d-none"></td>
                                        <td>Rp <?= number_format($totalPemasukkan,0,',','.') ?></td>
                                        <td>Rp <?= number_format($totalPengeluaran,0,',','.') ?></td>
                                        <td>Rp <?= number_format($totalSaldo,0,',','.') ?></td>
                                    </tr>
                                <?php } else { ?>
                                   <tr>
                                    <td colspan="7">
                                        <div class="row justify-content-center my-2">
                                            <div class="col-lg-6">
                                                <div class="alert alert-danger text-center" role="alert">
                                                    Laporan pada <?= $tanggalJudul ?> tidak ada.
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                   </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Hapus Modal -->
<?php foreach($laporan as $l) : ?>
<div class="modal fade" id="hapusModal<?= $l['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus laporan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Yakin ingin menghapusnya ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <form action="/dashboard/laporan-keuangan/<?= $l['id'] ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script>
    $(function() {
        $('#datepicker').datepicker({
            format: "mm-yyyy",
            startView: "months", 
            minViewMode: "months"
        }).on('changeDate', () => {
            const tglLaporan = $('#tglLaporan').val();
            window.open('<?= base_url('dashboard/laporan-keuangan?tglLaporan=') ?>' + tglLaporan, '_self');
        });

        $('#datatables').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    })
</script>
<?= $this->endSection() ?>