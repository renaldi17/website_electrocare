@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">

<section id="about" class="py-5">
    <div class="container text-center">
        <h1 class="mb-4">ABOUT <span class="text-danger">ELECTROCARE</span></h1>
        <p>
            Melabangkan "Care" yang merupakan singkatan dari nama para founder, juga menunjukkan komitmen perusahaan dalam memberikan perhatian, dan dukungan terbaik bagi pelanggan.
        </p>
    </div>
</section>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f23232" fill-opacity="1" d="M0,192L24,202.7C48,213,96,235,144,218.7C192,203,240,149,288,154.7C336,160,384,224,432,234.7C480,245,528,203,576,165.3C624,128,672,96,720,112C768,128,816,192,864,192C912,192,960,128,1008,133.3C1056,139,1104,213,1152,218.7C1200,224,1248,160,1296,128C1344,96,1392,96,1416,96L1440,96L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path></svg>

<h2 class="mt-5 text-black text-center">OUR <span class="text-danger">LOGO</span></h2>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="logo-item">
                <h3>Huruf E</h3>
                <p>Melambangkan kata "Electro", yang merepresentasikan fokus perusahaan pada dunia elektronik dan komponen elektrik.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="logo-item">
                <h3>Huruf C</h3>
                <p>Melambangkan "Care" yang merupakan singkatan dari nama para founder, juga menunjukkan komitmen perusahaan dalam memberikan perhatian.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="logo-item">
                <h3>Plus</h3>
                <p>Melambangkan persatuan antara Teknologi - Pelayanan, dimana tidak hanya unggul dalam bidangnya namun juga dalam layanan terhadap pelanggan.</p>
            </div>
        </div>
        <div class="col-md-5 text-center">
            <div class="logo-item">
                <h3>Plus</h3>
                <p>Melambangkan persatuan antara Teknologi - Pelayanan, dimana tidak hanya unggul dalam bidangnya namun juga dalam layanan terhadap pelanggan.</p>
            </div>
        </div>
        <div class="col-md-5 text-center">
            <div class="logo-item">
                <h3>Plus</h3>
                <p>Melambangkan persatuan antara Teknologi - Pelayanan, dimana tidak hanya unggul dalam bidangnya namun juga dalam layanan terhadap pelanggan.</p>
            </div>
        </div>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f23232" fill-opacity="1" d="M0,192L24,202.7C48,213,96,235,144,218.7C192,203,240,149,288,154.7C336,160,384,224,432,234.7C480,245,528,203,576,165.3C624,128,672,96,720,112C768,128,816,192,864,192C912,192,960,128,1008,133.3C1056,139,1104,213,1152,218.7C1200,224,1248,160,1296,128C1344,96,1392,96,1416,96L1440,96L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path></svg>

<h2 class="mt-5 text-black text-center">OUR <span class="text-danger">TEAM</span></h2>
<div class="team-container">
    <div class="team-member">
        <img src="{{ asset('assets/image/aldi.png') }}" alt="Aldi">
    </div>
    <div class="team-member">
        <img src="{{ asset('assets/image/caca.png') }}" alt="Caca">
    </div>
</div>

<!-- New Position for SVG: Above the Contact Section -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ff2323" fill-opacity="1" d="M0,224L21.8,229.3C43.6,235,87,245,131,250.7C174.5,256,218,256,262,234.7C305.5,213,349,171,393,160C436.4,149,480,171,524,192C567.3,213,611,235,655,202.7C698.2,171,742,85,785,85.3C829.1,85,873,171,916,170.7C960,171,1004,85,1047,85.3C1090.9,85,1135,171,1178,202.7C1221.8,235,1265,213,1309,218.7C1352.7,224,1396,256,1418,272L1440,288L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>

<section id="contact" class="py-5 text-white">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 text-left">
                <h2>KEEP IN TOUCH</h2>
            </div>
            <div class="col-md-6">
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
@endsection