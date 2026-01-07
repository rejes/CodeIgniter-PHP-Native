<?= $this->extend('layouts/main-layouts/main-template') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<link rel="stylesheet" href="/assets/css/home.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="first mb-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg">
                <h1 class="text-center" data-aos="fade-down" data-aos-duration="1300">Masjid Ar - Rahman</h1>
                <p class="text-center namaKota">Jakarta Pusat</p>
            </div>
        </div>
        <div class="row justify-content-center d-flex">
            <div class="col-11 first_home"></div>
        </div>
        <div class="row justify-content-center d-flex">
            <div class="col-10 col-md-10 jadwalSholat bg-white p-3">
                <h5 class="text-center pb-2">Jadwal Sholat DKI Jakarta & Sekitarnya</h5>
                <div class="row text-center justify-content-center">
                    <div class="col-4 col-md col-sm">
                        <p class="fw-bold">Subuh</p>
                        <p class="subuh">00:00</p>
                    </div>
                    <div class="col-4 col-md col-sm">
                        <p class="fw-bold">Dzuhur</p>
                        <p class="dzuhur">00:00</p>
                    </div>
                    <div class="col-4 col-md col-sm">
                        <p class="fw-bold">Ashar</p>
                        <p class="ashar">00:00</p>
                    </div>
                    <div class="col-4 col-md col-sm">
                        <p class="fw-bold">Maghrib</p>
                        <p class="maghrib">00:00</p>
                    </div>
                    <div class="col-4 col-md col-sm">
                        <p class="fw-bold">Isya</p>
                        <p class="isya">00:00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="testimonial my-3">
    <div class="container">
        <h2 class="text-center header-testi" data-aos="fade-right" data-aos-duration="1300">Apa Kata Mereka ?</h2>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="card swiper-slide p-3">
                    <img src="/assets/images/testimonial/img-testi-1.png" alt="Profile Testimonial" class="img-testi rounded-circle">
                    <div class="card-body">
                        <p class="text">“Kalau lagi di deket kawasan JakPus kota dan mau beribadah bisa ke sini , lokasi pinggir jalan raya dan cukup strategis.”</p>
                        <hr>
                        <p class="name">E. Djadjang Djajaatmadja</p>
                        <p class="role">Walikota Jakarta Pusat</p>
                    </div>
                </div>
                <div class="card swiper-slide p-3">
                    <img src="/assets/images/testimonial/img-testi-2.png" alt="Profile Testimonial" class="img-testi rounded-circle">
                    <div class="card-body">
                        <p class="text">“Suasana nyaman bisa menambah kekhusuan beribadah dan letaknya strategis di tengah perkotaan.”</p>
                        <hr>
                        <p class="name">Ustaz Prof. H. Mamat</p>
                        <p class="role">Ustaz</p>
                    </div>
                </div>
                <div class="card swiper-slide p-3">
                    <img src="/assets/images/testimonial/img-testi-3.png" alt="Profile Testimonial" class="img-testi rounded-circle">
                    <div class="card-body">
                        <p class="text">“Masjid yang sangat unik dengan Architecture yang sangat modern dan "memanjakan" mata dengan perpaduan budayanya.”</p>
                        <hr>
                        <p class="name">Jajang Ujang</p>
                        <p class="role">Pemuda Masjid</p>
                    </div>
                </div>
                <div class="card swiper-slide p-3">
                    <img src="/assets/images/testimonial/img-testi-4.png" alt="Profile Testimonial" class="img-testi rounded-circle">
                    <div class="card-body">
                        <p class="text">“Masjid luas, sejuk karna sirkulasi udara sangat banyak. Parkiran luas untuk motor. Toilet dan tempat wudhu bersih dan rapih.”</p>
                        <hr>
                        <p class="name">Gasti Safitri</p>
                        <p class="role">Tukang Seblak</p>
                    </div>
                </div>
                <div class="card swiper-slide p-3">
                    <img src="/assets/images/testimonial/img-testi-5.png" alt="Profile Testimonial" class="img-testi rounded-circle">
                    <div class="card-body">
                        <p class="text">“Masjid nya megah dan nyaman, tempat wudhu nya juga bagus dan bersih dan juga bnyak kerannya, megah, damai, tentram dan indah."</p>
                        <hr>
                        <p class="name">Mulyono Najmudin</p>
                        <p class="role">Orang kebetulan lewat</p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    fetch('https://api.pray.zone/v2/times/today.json?city=jakarta')
    .then(res => res.json())
    .then(data => {
        if(data.code === 200 && data.status === 'OK') {
            const subuh = document.querySelector('.subuh');
            const dzuhur = document.querySelector('.dzuhur');
            const ashar = document.querySelector('.ashar');
            const maghrib = document.querySelector('.maghrib');
            const isya = document.querySelector('.isya');

            subuh.innerHTML = data.results.datetime[0].times.Fajr;
            dzuhur.innerHTML = data.results.datetime[0].times.Dhuhr;
            ashar.innerHTML = data.results.datetime[0].times.Asr;
            maghrib.innerHTML = data.results.datetime[0].times.Maghrib;
            isya.innerHTML = data.results.datetime[0].times.Isha;

        } else {
            console.log('Tidak OK')
        }
    })
    .catch(err => console.log(err))

    const swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        spaceBetween: 32,
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 100,
          modifier: 2,
          slideShadows: true,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
    });
    
</script>
<?= $this->endSection() ?>
