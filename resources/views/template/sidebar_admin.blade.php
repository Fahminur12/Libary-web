<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>

                <!-- Dashboard -->
                <a class="nav-link" href="{{ route('dashboardAdmin') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!-- Buku -->
                <a class="nav-link" href="{{ route('buku') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Buku
                </a>

                 <!-- Rak -->
                 <a class="nav-link" href="{{ route('rak') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Rak
                </a>

                <!-- Kategori Buku -->
                <a class="nav-link" href="{{ route('kategori_buku') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Kategori Buku
                </a>

                <!-- Penulis -->
                <a class="nav-link" href="{{ route('penulis') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>
                    Penulis
                </a>

                <!-- Penerbit -->
                <a class="nav-link" href="{{ route('penerbit') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                    Penerbit
                </a>

                <!-- Peminjaman -->
                <a class="nav-link" href="{{ route('admin.peminjaman') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-hand"></i></div>
                    Peminjaman
                </a>

                <!-- Pengaturan -->
                <a class="nav-link" href="{{ route('pengaturanadmin') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                    Pengaturan
                </a>

                <!-- Logout -->
                <a class="nav-link" href="{{ route('logout') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>
                    Logout
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Admin Perpustakaan
        </div>
    </nav>
</div>
