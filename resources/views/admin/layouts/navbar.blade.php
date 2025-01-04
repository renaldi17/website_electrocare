<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand mt-1 ps-3" href="#">
        <img src="/assets/image/logoec.png" width="35px" height="35px" alt="Electrocare" />
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-lg-0 me-lg-0 order-1 me-4" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar-->
    <ul class="navbar-nav d-none d-md-inline-block form-inline me-md-3 my-md-0 my-2 me-0 ms-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="">Profile</a></li>
                {{-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> --}}
                <li>
                    <hr class="dropdown-divider" />
                </li>

                {{-- @guest
                    <li class="nav-item">
                        <a class="dropdown-item" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                            @csrf
                        </form>
                    </li>
                @endguest --}}
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="/admin">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Dashboard
                    </a>
                    <a class="nav-link" 
                    href="/admin/product">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-product"></i>
                        </div>
                        Product
                    </a>
                    <a class="nav-link" 
                    href="/admin/project">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-data"></i>
                        </div>
                        Project
                    </a>
                    <a class="nav-link" 
                    href="/admin/order">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-data"></i>
                        </div>
                        Order
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-columns"></i>
                        </div>
                        Interface
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" >
                                {{-- href="{{ route('about.index') }}"> --}}
                                About
                            </a>
                            {{-- <a class="nav-link" href="{{ route('profil.index') }}">
                                Profil
                            </a>
                            <a class="nav-link" href="{{ route('slider.index') }}">
                                Slider
                            </a> --}}
                            {{-- <a class="nav-link" href="{{ route('struktur.index') }}">
                                Struktur
                            </a>
                            <a class="nav-link" href="{{ route('perangkat_desa.index') }}">
                                Perangkat Desa
                            </a>
                            <a class="nav-link" href="{{ route('kontak.index') }}">
                                Kontak
                            </a> --}}
                        </nav>
                    </div>
                    {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        Data
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                aria-controls="pagesCollapseAuth">
                                User
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link">
                                         {{-- href="{{ route('user.index') }}"> --}}
                                        {{-- admin
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseError" aria-expanded="false"
                                aria-controls="pagesCollapseError">
                                Info
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/admin/product">
                                        Product
                                    </a>
                                    <a class="nav-link" href="/admin/project">
                                        Project
                                    </a>
                                    {{-- <a class="nav-link" href="{{ route('potensi_desa.index') }}">
                                        Potensi
                                    </a>
                                    <a class="nav-link" href="{{ route('produk_hukum.index') }}">
                                        Produk Hukum
                                    </a> 
                                </nav>
                            </div>
                        </nav>
                    </div> --}}
                    {{-- <div class="sb-sidenav-menu-heading">Service</div>
                    <a class="nav-link" href="{{ route('jenisSurat.index') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fa-regular fa-folder-open"></i>
                        </div>
                        Jenis Surat
                    </a>
                    <a class="nav-link" href="{{ route('pengajuanSurat.index') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fa-solid fa-file-lines"></i>
                        </div>
                        Pengajuan Surat
                    </a> --}}
                </div>
            </div>
        </nav>
    </div>
