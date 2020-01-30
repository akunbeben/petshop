
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Petshop | <?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('backend/assets/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('backend/assets/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('backend/assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('backend/assets/'); ?>plugins/jqvmap/jqvmap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('backend/assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('backend/assets/'); ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('backend/assets/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('backend/assets/'); ?>plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?= base_url('backend/assets/'); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('backend/assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('backend/assets/'); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('backend/assets/'); ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed <?= $this->uri->segment(1) == 'penjualan' ? 'sidebar-collapse' : '' ; ?>">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <button class="btn nav-link" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i></button>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link text-center">
      <span class="brand-text font-weight-light">PETSHOP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('backend/assets/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'master-data' ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'master-data' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('master-data/produk/'); ?>" class="nav-link <?= $this->uri->segment(2) == 'produk' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('master-data/kategori-produk/'); ?>" class="nav-link <?= $this->uri->segment(2) == 'kategori-produk' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('master-data/unit-produk/'); ?>" class="nav-link <?= $this->uri->segment(2) == 'unit-produk' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Produk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('pelanggan/'); ?>" class="nav-link <?= $this->uri->segment(1) == 'pelanggan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-header">MAIN MENU</li>
          <li class="nav-item">
            <a href="<?= base_url('penjualan/'); ?>" class="nav-link <?= $this->uri->segment(1) == 'penjualan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Penjualan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('penitipan/'); ?>" class="nav-link <?= $this->uri->segment(1) == 'penitipan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-cat"></i>
              <p>
                Penitipan
              </p>
            </a>
          </li>
          <li class="nav-header">REPORTS</li>
          <li class="nav-item">
            <a href="<?= base_url('laporan/inventori'); ?>" class="nav-link <?= $this->uri->segment(2) == 'inventori' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan Inventori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('laporan/stok-masuk'); ?>" class="nav-link <?= $this->uri->segment(2) == 'stok-masuk' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-barcode"></i>
              <p>
                Laporan Barang Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('laporan/penjualan'); ?>" class="nav-link <?= $this->uri->segment(2) == 'penjualan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Laporan Penjualan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('laporan/penitipan'); ?>" class="nav-link <?= $this->uri->segment(2) == 'penitipan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-cat"></i>
              <p>
                Laporan Penitipan
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="<?= base_url('laporan/inventori'); ?>" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan Inventori
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?= $contents; ?>
  </div>
  <!-- /.content-wrapper -->
<!-- Modal logout -->
  <div class="modal fade" id="logoutModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Logout confirm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure want to logout?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('auth/logout/'); ?>'">Logout</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Logout -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('backend/assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('backend/assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('backend/assets/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('backend/assets/'); ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('backend/assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Toastr -->
<script src="<?= base_url('backend/assets/'); ?>plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url('backend/assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('backend/assets/'); ?>dist/js/adminlte.min.js"></script>

<script src="<?= base_url('backend/assets/'); ?>master.js"></script>

</body>
</html>
