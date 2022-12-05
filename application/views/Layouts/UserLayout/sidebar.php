<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <?php if ($this->session->userdata('id_role') == 1) { ?>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('SuperAdmin/Dashboard') ?>">
                <?php } else { ?>
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('Admin/Dashboard') ?>">
                    <?php } ?>
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Sipetu</div>
                    </a>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">


                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <?php if ($this->session->userdata('id_role') == 1) { ?>
                        <a class="nav-link" href="<?= site_url('SuperAdmin/Dashboard') ?>">
                            <i class="fas fa-chart-line"></i>
                            <span>Dashboard</span></a>
                    <?php } else { ?>
                        <a class="nav-link" href="<?= site_url('Admin/Dashboard') ?>">
                            <i class="fas fa-chart-line"></i>
                            <span>Dashboard</span></a>
                    <?php } ?>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Master
                </div>

                <?php if ($this->session->userdata('id_role') == 1) { ?>
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Data Admin</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Data Admin</h6>
                                <a class="collapse-item" href="<?= site_url('SuperAdmin/DataUser'); ?>">Data User</a>
                            </div>
                        </div>
                    </li>
                <?php } ?>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Data Instansi</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php if ($this->session->userdata('id_role') == 1) { ?>
                                <h6 class="collapse-header">Data Instansi</h6>
                                <a class="collapse-item" href="<?= site_url('SuperAdmin/Kelurahan'); ?>">Data Kelurahan</a>
                                <a class="collapse-item" href="<?= site_url('SuperAdmin/Kecamatan'); ?>">Data Kecamatan</a>
                                <a class="collapse-item" href="<?= site_url('SuperAdmin/Ikm'); ?>">Pemetaan IKM</a>
                        </div>
                    <?php } else { ?>
                        <h6 class="collapse-header">Data Instansi</h6>
                        <a class="collapse-item" href="<?= site_url('Admin/Kelurahan'); ?>">Data Kelurahan</a>
                        <a class="collapse-item" href="<?= site_url('Admin/Kecamatan'); ?>">Data Kecamatan</a>
                        <a class="collapse-item" href="<?= site_url('Admin/Ikm'); ?>">Pemetaan IKM</a>
                    <?php } ?>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Addons
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Cetak Data</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php if ($this->session->userdata('id_role') == 1) { ?>
                                <h6 class="collapse-header">Cetak Data</h6>
                                <a class="collapse-item" href="<?= site_url('SuperAdmin/Ikm/print'); ?>">Cetak Data IKM</a>
                            <?php } else { ?>
                                <h6 class="collapse-header">Cetak Data</h6>
                                <a class="collapse-item" href="<?= site_url('Admin/Ikm/print'); ?>">Cetak Data IKM</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

        </ul>
        <!-- End of Sidebar -->