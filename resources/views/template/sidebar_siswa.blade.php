<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link" href="{{ route('dashboardSiswa') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('bukuSiswa') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Daftar Buku
                </a>
                <a class="nav-link" href="{{ route('peminjaman_siswa') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Peminjaman
                </a>
                <a class="nav-link" href="{{ route('pengaturan') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>
                    Pengaturan
                </a>
                <a class="nav-link" href="{{ route('logout') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>
                    Logout
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Siswa Perpustakaan
        </div>
    </nav>
</div>
