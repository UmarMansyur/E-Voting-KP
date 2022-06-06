<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home/index">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Evoting Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= site_url('admin/dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/data_siswa'); ?>">
            <i class="fas fa-user"></i>
            <span>Data Siswa</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/data_kandidat'); ?>">
            <i class="fas fa-user-tie"></i>
            <span>Data Kandidat</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/data_kelas'); ?>">
            <i class="fas fa-school"></i>
            <span>Data Kelas</span></a>
    </li>

    <!-- Nav Item - Chart -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/data_suara'); ?>">
            <i class="fas fa-chart-bar"></i>
            <span>Data Suara</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/pengumuman'); ?>">
            <i class="fas fa-cog"></i>
            <span>Manajemen Setting</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->