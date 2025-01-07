@extends('layout')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">

    <!-- Hero -->
    <section id="hero" class="px-0" data-aos="fade-up">
        <div class="container text-center text-white">
            <div class="hero-title" data-aos="fade-up" data-aos-duration="1000">
                <div class="hero-text">Selamat Datang di <br> Electrocare</div>
                <h4 data-aos="fade-up" data-aos-duration="1200">Projects DIY and Electric Components</h4>
            </div>
        </div>
    </section>

    <!-- Program -->
    <section id="program" style="margin-top: -30px" data-aos="zoom-in">
        <div class="container">
            <div class="row">
                <div class="col-lg-3" data-aos="fade-right">
                    <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h5 data-aos="fade-up">Fast <br>Delivery</h5>
                        </div>
                        <img style="width:50px" src="{{ asset('assets/image/delivery.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-3" data-aos="fade-right" data-aos-delay="200">
                    <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h5 data-aos="fade-up">Creative <br>Ideas</h5>
                        </div>
                        <img style="width:50px" src="{{ asset('assets/image/brain.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-3" data-aos="fade-right" data-aos-delay="400">
                    <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h5 data-aos="fade-up">More <br>Effencience</h5>
                        </div>
                        <img style="width:50px" src="{{ asset('assets/image/time.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-3" data-aos="fade-right" data-aos-delay="600">
                    <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h5 data-aos="fade-up">Affordable <br>Prices</h5>
                        </div>
                        <img style="width:50px" src="{{ asset('assets/image/dollar.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Join -->
    <section id="join" class="py-5" data-aos="fade-up">
        <div class="container py-5">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stripe me-2"></div>
                        <h5>Make an Account</h5>
                    </div>
                    <h1 class="fw-bold mb-2">Make your account first, before you can buy from us!</h1>
                    <p class="mb-3">
                        A lot of DIY Project Ideas and Affordable Electric Component
                    </p>
                    <a class="btn btn-outline-danger" href="/register">Sign Up</a>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="{{ asset('assets/image/unohd.png') }}" alt="" style="margin-left: 20px; width: 400px; height: auto;">
                </div>
            </div>
        </div>
    </section>

    <!-- Foto Eskul -->
    <section id="foto-kegiatan" class="section-foto-kegiatan parallax" data-aos="fade-up">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div class="d-flex align-items-center">
                    <div class="stripe-putih me-2"></div>
                    <h5 class="fw-bold text-white">DIY Projects</h5>
                </div>
                <div>
                    <a href="/projects" class="btn btn-outline-light">More Projects</a>
                </div>
            </div>

            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-lg-4 col-md-6 col-12 mb-4" data-aos="fade-up">
                        <div class="card">
                            <a href="{{ route('detail_project', $project->id) }}" class="text-dark text-decoration-none">
                                <div class="product-images">
                                    <img src="{{ asset('storage/' . $project->gambar) }}" class="card-img-top" alt="{{ $project->nama }}" style="height: 200px; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <span class="badge bg-info">{{ ucfirst($project->kategori) }}</span>
                                    <h5 class="card-title">{{ $project->nama }}</h5>
                                    <p class="card-text">Rp {{ number_format($project->harga, 0, ',', '.') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .foto-container {
            height: 300px; /* Set height for all images */
            overflow: hidden; /* Hide overflow */
        }

        .foto-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure images cover the container */
        }
    </style>
@endsection
