@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<section id="about" class="py-5" data-aos="fade-down">
    <div class="container text-center">
        <h1 class="mb-4 text-black">ABOUT <span class="text-danger">ELECTROCARE</span></h1>
        <p>
            Electrocare adalah penyedia komponen elektronik dalam bentuk kit dan eceran, yang dirancang untuk mendukung para penggemar teknologi dan proyek DIY. Melalui website kami, pelanggan dapat dengan mudah memesan produk yang mereka butuhkan, memastikan proses pembelian yang cepat dan efisien. Electrocare juga menghadirkan aplikasi inovatif yang memungkinkan pemantauan pemasukan dan pengeluaran bisnis secara praktis. Dengan tambahan sistem cerdas untuk merekomendasikan proyek dan produk sesuai kebutuhan pelanggan, Electrocare membantu mewujudkan ide-ide kreatif menjadi kenyataan.        </p>
    </div>
</section>

<div class="container text-center py-5" style="" data-aos="fade-up" id="why">
    <h2 class="text-black">WHY <span class="text-danger">ELECTROCARE</span>?</h2>
    <p>
        Electrocare menawarkan solusi lengkap untuk kebutuhan komponen elektronik Anda. Kami tidak hanya menyediakan produk berkualitas dalam bentuk kit dan eceran, tetapi juga menghadirkan pengalaman belanja yang mudah melalui platform online kami. Dengan aplikasi untuk manajemen bisnis dan sistem cerdas yang memberikan rekomendasi personal, Electrocare memastikan setiap pelanggan mendapatkan produk yang paling sesuai dengan kebutuhan mereka. Pilih Electrocare sebagai mitra andalan Anda dalam menciptakan proyek DIY yang inovatif!
    </p>
    {{--  <div class="logo-container">
        <div class="logo-item">
            <img src="{{ asset('assets/image/logoec.png') }}" alt="" class="logo-img">
            <h3>Huruf E</h3>
            <p>Melambangkan kata "Electro", yang merepresentasikan fokus perusahaan pada dunia elektronik dan komponen elektrik.</p>
        </div>
        <div class="logo-item">
            <img src="{{ asset('assets/image/logoec.png') }}" alt="" class="logo-img">
            <h3>Huruf C</h3>
            <p>Melambangkan "Care" yang merupakan singkatan dari nama para founder, juga menunjukkan komitmen perusahaan dalam memberikan perhatian.</p>
        </div>
        <div class="logo-item">
            <img src="{{ asset('assets/image/logoec.png') }}" alt="" class="logo-img">
            <h3>Plus</h3>
            <p>Melambangkan persatuan antara Teknologi - Pelayanan, dimana tidak hanya unggul dalam bidangnya namun juga dalam layanan terhadap pelanggan.</p>
        </div>
        <div class="logo-item">
            <img src="{{ asset('assets/image/logoec.png') }}" alt="" class="logo-img">
            <h3>Merah</h3>
            <p>Melambangkan persatuan antara Teknologi - Pelayanan, dimana tidak hanya unggul dalam bidangnya namun juga dalam layanan terhadap pelanggan.</p>
        </div>
        <div class="logo-item">
            <img src="{{ asset('assets/image/logoec.png') }}" alt="" class="logo-img">
            <h3>Kuning</h3>
            <p>Melambangkan persatuan antara Teknologi - Pelayanan, dimana tidak hanya unggul dalam bidangnya namun juga dalam layanan terhadap pelanggan.</p>
        </div>
    </div>  --}}
</div>

<style>
    .logo-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .logo-item {
        margin: 20px;
        text-align: center;
        width: 200px; /* Atur lebar card sesuai kebutuhan */
    }

    .logo-img {
        width: 100px;
        display: block;
        margin: 0 auto; /* Pusatkan gambar */
    }

    body {
        font-family: 'Poppins', sans-serif; /* Mengatur font untuk seluruh halaman */
    }
    /* Anda bisa menambahkan lebih banyak aturan CSS di sini jika diperlukan */
</style>

<h2 class="mt-5 text-black text-center" data-aos="fade-up">OUR <span class="text-danger">TEAM</span></h2>
<div class="team-container" data-aos="fade-up">
    <div class="team-member">
        <img src="{{ asset('assets/image/aldi.png') }}" alt="Aldi">
    </div>
    <div class="team-member">
        <img src="{{ asset('assets/image/caca.png') }}" alt="Caca">
    </div>
</div>

<section id="contact" class="mt-5 py-5 text-white" data-aos="fade-up">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 text-left">
                <h2>KEEP IN TOUCH<br>WITH US</h2>
            </div>
            <div class="col-md-6 text-light">
                <div class="contact-buttons d-flex justify-content-end">
                    <div class="contact-item bg-warning p-3 mx-2">
                        <a href="mailto:electrocare@gmail.com" class="contact-link text-dark">
                            <i class="fas fa-envelope"></i>
                            <span>Contact Us</span>
                        </a>
                    </div>
                    <div class="contact-item bg-warning p-3 mx-2">
                        <a href="https://instagram.com/electrocare_official" class="contact-link text-dark">
                            <i class="fab fa-instagram"></i>
                            <span>About Us</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection
