<?= $this->extend('layouts/dashboard-layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <h3>Dashboard Statistik</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-3 col-md-3">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldUser1"></i>
                                    </div>
                                </div>
                                <div class="col-9 col-md-9">
                                    <h6 class="text-muted font-semibold">Jumlah Pengurus</h6>
                                    <h6 class="font-extrabold mb-0"><?= $jumlahPengurus ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-3 col-md-3">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldUser"></i>
                                    </div>
                                </div>
                                <div class="col-9 col-md-9">
                                    <h6 class="text-muted font-semibold">Jumlah Admin</h6>
                                    <h6 class="font-extrabold mb-0"><?= $jumlahAdmin ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-3 col-md-3">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldWork"></i>
                                    </div>
                                </div>
                                <div class="col-9 col-md-9">
                                    <h6 class="text-muted font-semibold">Program Kerja</h6>
                                    <h6 class="font-extrabold mb-0">3</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Laporan Keuangan <?= date("Y") ?></h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="/assets/images/faces/1.jpg" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?= $nama ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Pengurus Masjid</h4>
                </div>
                <div class="card-content pb-4">
                    <?php foreach($pengurus as $p) : ?>
                        <?php if($p['jabatan'] == 'Ketua') : ?>
                            <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="/assets/images/faces/2.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1"><?= $p['name'] ?></h5>
                                <h6 class="text-muted mb-0"><?= $p['jabatan'] ?></h6>
                            </div>
                            </div>
                        <?php endif; ?>
                        <?php if($p['jabatan'] == 'Wakil Ketua') : ?>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="/assets/images/faces/1.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1"><?= $p['name'] ?></h5>
                                <h6 class="text-muted mb-0"><?= $p['jabatan'] ?></h6>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($p['jabatan'] == 'Bendahara') : ?>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="/assets/images/faces/3.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1"><?= $p['name'] ?></h5>
                                <h6 class="text-muted mb-0"><?= $p['jabatan'] ?></h6>   
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($p['jabatan'] == 'Sekertaris') : ?>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="/assets/images/faces/8.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1"><?= $p['name'] ?></h5>
                                <h6 class="text-muted mb-0"><?= $p['jabatan'] ?></h6>   
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<?php 
$dataPemasukkan = "[";
foreach($pemasukkanLaporanKeuangan as $pemasukkan){
    $dataPemasukkan .= $pemasukkan.",";
} 
$dataPemasukkan .= "]";

$dataPengeluaran = "[";
foreach($pengeluaranLaporanKeuangan as $pengeluaran){
    $dataPengeluaran .= $pengeluaran.",";
} 
$dataPengeluaran .= "]";

?>
<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script type="text/javascript">
const formatRupiah = uang => {
    const reverse = uang.toString().split('').reverse().join('');
	const ribuan = reverse.match(/\d{1,3}/g);
	return ribuan.join('.').split('').reverse().join('');
}

let optionsProfileVisit = {
	series: [{
        name: 'Pemasukkan',
        data: <?= $dataPemasukkan; ?>
    }, {
        name: 'Pengeluaran',
        data: <?= $dataPengeluaran; ?>
    }],
        chart: {
        type: 'area',
        // stacked: true,
        height: 350
    },
    plotOptions: {
        bar: {
        horizontal: false,
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        curve: 'smooth'
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
    },
    yaxis: {
        title: {
            text: 'Rp (Rupiah)',
            style: {
                fontSize:  '13px',
                fontWeight:  'normal',
                fontFamily:  "sans-serif",
                color:  '#263238'
            },
        }
    },
    fill: {
        opacity: 1,
    },
    markers: {
        size: 4,
        colors: ['#435ebe', '#5ddab4'],
        strokeWidth: 0,
        showNullDataPoints: true
    },
    colors: ['#435ebe', '#5ddab4'],
    tooltip: {
        y: {
            formatter: function (val) {
                return "Rp. " + formatRupiah(val)
            }
        }
    }
}
const chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
chartProfileVisit.render();
</script>
<?= $this->endSection() ?>
