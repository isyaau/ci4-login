<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-car"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Rental Mobil</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $active == 'dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        MASTER MOBIL
    </div>
    <!-- Nav Item - Charts -->
    <li class="nav-item <?= $active == 'merk' ? 'active' : '' ?>">
        <a class="nav-link" href="/data-merk">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Merk</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Charts -->
    <li class="nav-item <?= $active == 'mobil' ? 'active' : '' ?>">
        <a class="nav-link" href="/data-mobil">
            <i class="fas fa-fw fa-car"></i>
            <span>Data Mobil</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        MASTER PEMESAN
    </div>
    <!-- Nav Item - Charts -->
    <li class="nav-item <?= $active == 'pemesan' ? 'active' : '' ?>">
        <a class="nav-link" href="/data-pemesan">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Pemesan</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Charts -->
    <li class="nav-item <?= $active == 'bayar' ? 'active' : '' ?>">
        <a class="nav-link" href="/data-bayar">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Data Jenis Bayar</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        MASTER PESANAN
    </div>
    <!-- Nav Item - Charts -->
    <li class="nav-item <?= $active == 'perjalanan' ? 'active' : '' ?>">
        <a class="nav-link" href="/data-perjalanan">
            <i class="fas fa-fw fa-street-view"></i>
            <span>Data Perjalanan</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Charts -->
    <li class="nav-item <?= $active == 'pesanan' ? 'active' : '' ?>">
        <a class="nav-link" href="/data-pesanan">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Data Pesanan</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        PENGATURAN
    </div>
    <!-- Nav Item - Charts -->
    <li class="nav-item <?= $active == 'akun' ? 'active' : '' ?>">
        <a class="nav-link" href="/data-akun">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manajemen Akun</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>