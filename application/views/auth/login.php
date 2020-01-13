
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
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('backend/assets'); ?>/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('backend/assets'); ?>/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <?= $this->session->flashdata('message'); ?>
                <form action="" method="post">
                  <div class="form-group">
                    <label class="label">Username</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Username" name="username">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" placeholder="*********" name="password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-primary submit-btn btn-block">
                  </div>
                  <div class="form-group d-flex justify-content-between">
                  </div>
                </form>
              </div>
              <ul class="auth-footer">
                
              </ul>
              <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('backend/assets'); ?>/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url('backend/assets'); ?>/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?= base_url('backend/assets'); ?>/js/shared/off-canvas.js"></script>
    <script src="<?= base_url('backend/assets'); ?>/js/shared/misc.js"></script>
    <!-- endinject -->
  </body>
</html>