@extends('layout')

@section('content')
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">

    <!-- Hero -->
    <section id="hero" class="px-0">
        <div class="container text-center text-white">
            <div class="hero-title">
                <div class="hero-text">Selamat Datang di <br> Electrocare</div>
                <h4>Projects DIY and Electric Components</h4>
            </div>
        </div>
    </section>

    <!-- Program -->
    <section id="program" style="margin-top: -30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Fast <br>Delivery</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Creative <br>Ideas</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h5>More <br>Effencience</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Affordable <br>Prices</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Join -->
    <section id="join" class="py-5">
        <div class="container py-5">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stripe me-2"></div>
                        <h5>Make Account</h5>
                    </div>
                    <h1 class="fw-bold mb-2">Make your account before you can buy from us!</h1>
                    <p class="mb-3">
                        A lot of DIY Project Ideas and Affordable Electric Component
                    </p>
                    <a class="btn btn-outline-danger" href="/daftar">Sign Up</a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('assets/image/dummy1.PNG') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Foto Eskul -->
    <section id="foto-kegiatan" class="section-foto-kegiatan parallax">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div class="d-flex align-items-center">
                    <div class="stripe-putih me-2"></div>
                    <h5 class="fw-bold text-white">DIY Projects</h5>
                </div>
                <div>
                    <a href="" class="btn btn-outline-light">More Projects</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="foto-container">
                        <img src="{{ asset('assets/image/dummy1.PNG') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="foto-container">
                        <img src="{{ asset('assets/image/dummy1.PNG') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="foto-container">
                        <img src="{{ asset('assets/image/dummy1.PNG') }}" class="img-fluid" alt="">
                    </div>
                </div>
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
