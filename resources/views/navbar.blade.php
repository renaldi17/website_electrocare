<link rel="stylesheet" href="{{ asset('assets/css/navbar.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<nav class="navbar navbar-expand-lg py-3">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="/">
      <img src="{{ asset('assets/image/logoec.png') }}" height="50" width="50" alt="Logo">
    </a>

    <!-- Navigation Links - Centered -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">ABOUT</a>
        </li>
        <!-- Products Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PRODUCTS
          </a>
          <ul class="dropdown-menu" aria-labelledby="productsDropdown">
            <li><a class="dropdown-item" href="/products">Mikrokontroller</a></li>
            <li><a class="dropdown-item" href="/products">Sensor</a></li>
            <li><a class="dropdown-item" href="/products">Aktuator</a></li>
            <li><a class="dropdown-item" href="/products">Other</a></li>
          </ul>
        </li>
        <!-- Projects Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="projectsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PROJECTS
          </a>
          <ul class="dropdown-menu" aria-labelledby="projectsDropdown">
            <li><a class="dropdown-item" href="/projects">Sistem Berbasis Komputer</a></li>
            <li><a class="dropdown-item" href="/projects">Mekatronika</a></li>
            <li><a class="dropdown-item" href="/projects">Sistem Tertanam</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <!-- Right Icons -->
    <div class="d-flex align-items-center">
      <a href="/cart" class="btn btn-link">
        <i class="fas fa-shopping-cart"></i>
      </a>
      <!-- User Dropdown -->
      <div class="dropdown">
        <a class="btn btn-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
          @auth
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <li><a class="dropdown-item" href="/order">Pesanan Anda</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="dropdown-item">Keluar</button>
              </form>
            </li>
          @else
            <li><a class="dropdown-item" href="/login">Masuk</a></li>
            <li><a class="dropdown-item" href="/admin/dashboard">Admin Page</a></li>
          @endauth
        </ul>
      </div>
    </div>

    <!-- Mobile Toggle Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>