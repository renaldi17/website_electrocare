<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-K_KHAcB3fkb8nGyZ"></script>

    {{-- Summernote CSS di antara Head--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css" />
</head>
<body>

<!-- Navbar -->
    @include('navbar')

<!-- Content -->
    @yield('content')


<!-- Footer -->
            <section class="bg-light border-top">
            <div class="container py-4">
                <div class="d-flex justify-content-between">
                <div>
                    Electrocare
                </div>
                <div class="d-flex">
                    <p class="me-4">Syarat & Ketentuan</p>
                    <p>
                    <a href="" class="text-decoration-none text-dark">Kebijakan Privasi</a>
                    </p>
                </div>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
        const navbar = document.querySelector(".fixed-top");
        window.onscroll = () =>{
            if (window.scrollY > 100) {
                navbar?.classList.add("scroll-nav-active");
                navbar?.classList.add("text-nav-active");
                // navbar.classList.remove("navbar-dark");
            } else {
                navbar?.classList.remove("scroll-nav-active");
                // navbar.classList.add("navbar-dark");
            }
        };
        </script>

        {{-- JQUERY --}}
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
        {{-- Summernote JS --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>


        <script>
        $(document).ready(function() {
                $('#summernote').summernote({
                    height: 200,
                });
        });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>
