<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data <?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Master Data</a></li>
          <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="float-left">
              <h1 class="card-title"><?= $title; ?></h1>
            </div>
          </div>
          <div class="card-body">
            <table id="produkTable" class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Profit</th>
                  <th>Periode</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $number = 1;
                foreach ($data as $profit) : ?>
                  <tr>
                    <td style="width: 20px;" class="text-center"><?= $number++; ?></td>
                    <td><?= rupiah($profit->profit); ?></td>
                    <td><?= $profit->long_date ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


<?php if ($this->session->flashdata('sukses-produk')) : ?>
  <div class="sukses-produk" data-suksesproduk="<?= $this->session->flashdata('sukses-produk'); ?>"></div>
<?php endif; ?>