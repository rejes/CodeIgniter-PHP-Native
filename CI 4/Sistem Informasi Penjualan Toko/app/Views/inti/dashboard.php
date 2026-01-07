<?= $this->extend('template'); ?>

<?= $this->section('Content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-primary text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-user"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Kasir</p>
                    <h3 class="font-weight-bold mb-0 counter"><?= $kasir; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-success text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-box"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">barang</p>
                    <h3 class="font-weight-bold mb-0 counter"><?= $barang ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-danger text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-truck"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Supplier</p>
                    <h3 class="font-weight-bold mb-0 counter"><?= $supplier ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card my-3 ">
        <div class="card-header bg-dark">
            <p class="font-weight-bold text-white">GRAFIK PENJUALAN BARANG</p>
        </div>

        <div class="mx-3 my-2 ">
            <canvas class="align-center" id="myChart" width="400" height="120"></canvas>


        </div>



        <div class="card-footer bg-white">
            <p class="float-right text-dark"><span class="font-weight-bold">Periode :</span> <?php 
        $timezone = time() + (60 * 60 * 7);
       echo gmdate('M Y',$timezone); ?></p>
        </div>
    </div>


</div>
<script>
function random_rgba() {
    var warna = () => Math.random() * 256 >> 0;
    return warna();
}

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {

        labels: [
            <?php foreach($barangjual as $b):?>
            <?= '"'.$b['nama_barang'].'",'?>
            <?php endforeach; ?>
        ],

        datasets: [{
            label: 'Penjualan',
            data: [<?php foreach($barangjual as $b):?>
                <?= $b['jumlah_beli'].','?>
                <?php endforeach; ?>
            ],
            backgroundColor: [
                <?php foreach($barangjual as $b):?> 'rgba(' + random_rgba() + ', ' + random_rgba() +
                ', ' + random_rgba() + ', 0.3)',
                <?php endforeach; ?>
            ],
            borderColor: [
                'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>




<?= $this->endSection(); ?>