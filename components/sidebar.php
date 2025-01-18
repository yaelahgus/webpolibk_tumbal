<aside class="main-sidebar sidebar-dark-primary elevation-4">  
    <!-- Sidebar -->  
    <div class="sidebar">  
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">  
            <div class="image">  
                <img src="../../assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">  
            </div>  
            <div class="info">  
                <a href="#" class="d-block"><?php echo $username ?></a>  
            </div>  
        </div>  
  
        <!-- SidebarSearch Form -->  
        <div class="form-inline">  
            <div class="input-group" data-widget="sidebar-search">  
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">  
                <div class="input-group-append">  
                    <button class="btn btn-sidebar">  
                        <i class="fas fa-search fa-fw"></i>  
                    </button>  
                </div>  
            </div>  
        </div>  
  
        <!-- Sidebar Menu -->  
        <nav class="mt-2">  
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  
                <li class="nav-item menu-open">  
                    <a href="#" class="nav-link active">  
                        <i class="nav-icon fas fa-tachometer-alt"></i>  
                        <p>  
                            Menu  
                            <i class="right fas fa-angle-left"></i>  
                        </p>  
                    </a>  
                    <?php if ($_SESSION['akses'] == "admin") { ?>  
                        <ul class="nav nav-treeview">  
                            <li class="nav-item">  
                                <a href="dashboard_admin.php" class="nav-link">  
                                    <i class="fas fa-solid fa-th nav-icon"></i>  
                                    <p>Dashboard <span class="right badge badge-danger">Admin</span></p>  
                                </a>  
                            </li>  
                            <li class="nav-item">  
                                <a href="dokter.php" class="nav-link">  
                                    <i class="fas fa-solid fa-user-nurse nav-icon"></i>  
                                    <p>Dokter <span class="right badge badge-danger">Admin</span></p>  
                                </a>  
                            </li>  
                            <li class="nav-item">  
                                <a href="poli.php" class="nav-link">  
                                    <i class="fas fa-solid fa-hospital nav-icon"></i>  
                                    <p>Poli <span class="right badge badge-danger">Admin</span></p>  
                                </a>  
                            </li>  
                            <li class="nav-item">  
                                <a href="obat.php" class="nav-link">  
                                    <i class="fas fa-solid fa-tablets nav-icon"></i>  
                                    <p>Obat <span class="right badge badge-danger">Admin</span></p>  
                                </a>  
                            </li>  
                            <li class="nav-item">  
                                <a href="pasien.php" class="nav-link">  
                                    <i class="fas fa-solid fa-user nav-icon"></i>  
                                    <p>Pasien <span class="right badge badge-danger">Admin</span></p>  
                                </a>  
                            </li>  
                        </ul>  
                    <?php } else if ($_SESSION['akses'] == "dokter") { ?>  
                        <ul class="nav nav-treeview">  
                            <li class="nav-item">  
                                <a href="dashboard_dokter.php" class="nav-link">  
                                    <i class="fas fa-solid fa-th nav-icon"></i>  
                                    <p>Dashboard <span class="right badge badge-success">Dokter</span></p>  
                                </a>  
                            </li>  
                            <li class="nav-item">  
                                <a href="jadwalPeriksa.php" class="nav-link">  
                                    <i class="fas fa-solid fa-hospital-user nav-icon"></i>  
                                    <p>Jadwal Periksa <span class="right badge badge-success">Dokter</span></p>  
                                </a>  
                            </li>  
                            <li class="nav-item">  
                                <a href="periksaPasien.php" class="nav-link">  
                                    <i class="fas fa-solid fa-stethoscope nav-icon"></i>  
                                    <p>Memeriksa Pasien <span class="right badge badge-success">Dokter</span></p>  
                                </a>  
                            </li>  
                            <li class="nav-item">  
                                <a href="riwayatPasien.php" class="nav-link">  
                                    <i class="fas fa-solid fa-book-medical nav-icon"></i>  
                                    <p>Riwayat Pasien <span class="right badge badge-success">Dokter</span></p>  
                                </a>  
                            </li>  
                            <li class="nav-item">  
                                <a href="profile.php" class="nav-link">  
                                    <i class="nav-icon fas fa-user"></i>  
                                    <p>Update Profile <span class="right badge badge-success">Dokter</span></p>  
                                </a>  
                            </li>
                            <!-- Doctor specific links -->
                            <li class="nav-item">
                                <a href="konsultasi.php" class="nav-link">
                                    <i class="fas fa-comments nav-icon"></i>
                                    <p>Konsultasi Terbaru</p>
                                </a>
                            </li>  
                        </ul>  
                    <?php } else if ($_SESSION['akses'] == "pasien") { ?>  
                        <ul class="nav nav-treeview">  
                            <li class="nav-item">  
                                <a href="dashboard_pasien.php" class="nav-link">  
                                    <i class="fas fa-solid fa-hospital-user nav-icon"></i>  
                                    <p>Dashboard <span class="right badge badge-info">Pasien</span></p>  
                                </a>  
                            </li>  
                            <li class="nav-item">  
                                <a href="daftarPoliklinik.php" class="nav-link">  
                                    <i class="fas fa-solid fa-stethoscope nav-icon"></i>  
                                    <p>Daftar Poli <span class="right badge badge-info">Pasien</span></p>  
                                </a>  
                            </li>
                            <li class="nav-item">
                                <a href="konsultasi.php" class="nav-link">
                                    <i class="fas fa-comments nav-icon"></i>
                                    <p>Konsultasi Terbaru</p>
                                </a>
                            </li>  
                        </ul>  
                    <?php } ?>  
                </li>
                  
                <li class="nav-item">  
                    <a href="../../pages/logout/logout.php" class="nav-link">  
                        <i class="nav-icon fas fa-sign-out-alt"></i>  
                        <p>  
                            Logout  
                        </p>  
                    </a>  
                </li>  
            </ul>  
        </nav>  
        <!-- /.sidebar-menu -->  
    </div>  
    <!-- /.sidebar -->  
</aside>  
  
<style>  
    .sidebar-dark-primary {  
        background-color: #343a40; /* Warna latar belakang sidebar */  
    }  
  
    .nav-link {  
        color: #ffffff; /* Warna teks link */  
        transition: background-color 0.3s; /* Transisi halus saat hover */  
    }  
  
    .nav-link:hover {  
        background-color: #495057; /* Warna latar belakang saat hover */  
        color: #ffffff; /* Warna teks saat hover */  
    }  
  
    .nav-icon {  
        margin-right: 10px; /* Jarak antara ikon dan teks */  
    }  
  
    .user-panel .info a {  
        color: #ffffff; /* Warna teks nama pengguna */  
        font-weight: bold; /* Teks tebal untuk nama pengguna */  
    }  
  
    .badge {  
        font-size: 0.8rem; /* Ukuran font badge */  
    }  
</style>  
