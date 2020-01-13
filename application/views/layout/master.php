
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Petshop - <?= $title; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('backend/assets'); ?>/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('backend/assets'); ?>/vendors/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="<?= base_url('backend/assets'); ?>/vendors/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="<?= base_url('backend/assets'); ?>/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url('backend/assets'); ?>/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url('backend/assets'); ?>/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="<?= base_url('backend/assets'); ?>/vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('backend/assets'); ?>/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url('backend/assets'); ?>/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="<?= base_url('backend/assets'); ?>/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="<?= base_url('admin/'); ?>">
            <img src="<?= base_url('backend/assets'); ?>/images/logo.svg" alt="logo" /> 
          </a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html">
            <img src="<?= base_url('backend/assets'); ?>/images/logo-mini.svg" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-email-outline"></i>
                <span class="count bg-success">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                <a class="dropdown-item py-3 border-bottom">
                  <p class="mb-0 font-weight-medium float-left">Notification </p>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-alert m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                    <p class="font-weight-light small-text mb-0"> Just now </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="<?= base_url('backend/assets'); ?>/images/faces/face1.jpg" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="<?= base_url('backend/assets'); ?>/images/faces/face1.jpg" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold"><?= $this->session->userdata('username'); ?></p>
                </div>
                <a class="dropdown-item">My Profile</a>
                <!-- Button trigger modal -->
                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                  Sign Out
                  <i class="dropdown-item-icon ti-power-off"></i>
                </button>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="<?= base_url('backend/assets'); ?>/images/faces/face1.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?= $this->session->userdata('username'); ?></p>
                  <p class="designation">Administrator</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item <?= $this->uri->segment(1) == 'produk' ? 'active' : ''; ?>">
              <a class="nav-link" data-toggle="collapse" href="#produk" aria-expanded="false" aria-controls="produk">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse <?= $this->uri->segment(1) == 'produk' ? 'show' : ''; ?>" id="produk">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('produk/'); ?>">Produk</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <?= $contents; ?>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 Designed by <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>.</span>
              </span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <!-- Modal -->
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
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('backend/assets'); ?>/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url('backend/assets'); ?>/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?= base_url('backend/assets'); ?>/js/shared/off-canvas.js"></script>
    <script src="<?= base_url('backend/assets'); ?>/js/shared/misc.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
    <script>
    $(function () {
    $('#produkTable').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false,
      'pageLength'  : 5
    })
  });
    </script>
  </body>
</html>