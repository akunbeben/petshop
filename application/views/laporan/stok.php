<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data <?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Laporan</a></li>
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
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filter laporan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="col-sm-12">
                                        <label for="tgl_awal">Tanggal awal</label>
                                        <input type="date" class="form-control" id="tanggal_awal" name="tgl_awal">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="col-sm-12">
                                        <label for="tgl_akhir">Tanggal akhir</label>
                                        <input type="date" class="form-control" id="tanggal_akhir" name="tgl_akhir">
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 31.5px;">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i> Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h1 class="card-title">Data <?= $title; ?></h1>
                        </div>
                        <div class="float-right">
                            <form action="<?= base_url('laporan/generate_stok'); ?>" method="post">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-paste"></i> Buat Laporan</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="produkTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No. Dokumen</th>
                                    <th>Dibuat pada</th>
                                    <th>Dibuat oleh</th>
                                    <th>Opt.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($stok as $stk) : ?>
                                <tr>
                                    <td><?= $stk->no_doc; ?></td>
                                    <td><?= $stk->created_at; ?></td>
                                    <td><?= $stk->created_by; ?></td>
                                    <td>
                                        <div class="row justify-content-center">
                                            <form action="<?= base_url('laporan/stok-masuk-print/'); ?>" method="post">
                                                <input type="hidden" value="<?= $stk->id; ?>" name="id">
                                                <button class="btn btn-success btn-sm" type="submit" value="pdf" name="gen"><i class="fas fa-download"></i></button>
                                            </form>
                                            &nbsp;
                                            <form action="<?= base_url('laporan/stok-masuk-print/'); ?>" method="post">
                                                <input type="hidden" value="<?= $stk->id; ?>" name="id">
                                                <button class="btn btn-warning btn-sm" type="submit" value="print" name="gen"><i class="fas fa-print"></i></button>
                                            </form>
                                        </div>
                                    </td>
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
