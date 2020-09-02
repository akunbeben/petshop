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
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filter data</h3>
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
                                        <label for="tanggal_awal">Tanggal awal</label>
                                        <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="col-sm-12">
                                        <label for="tanggal_akhir">Tanggal akhir</label>
                                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
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
                        <div class="d-flex justify-content-between">
                            <h1 class="card-title"><?= $title; ?> 1 Bulan terakhir</h1>
                            <a href="<?= base_url('data-penjualan/detail-profit'); ?>">Detail Profit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="produkTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Faktur</th>
                                    <th>Kasir</th>
                                    <th>Pelanggan</th>
                                    <th>Total Belanja</th>
                                    <th>Bayar</th>
                                    <th>Waktu Transaksi</th>
                                    <th>Opt.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penjualan as $pj) : ?>
                                    <tr>
                                        <td><?= $pj->faktur; ?></td>
                                        <td><?= $pj->kasir; ?></td>
                                        <td><?= $pj->pelanggan ?></td>
                                        <td><?= rupiah($pj->total); ?></td>
                                        <td><?= rupiah($pj->bayar); ?></td>
                                        <td><?= date('d M Y H:i:s', strtotime($pj->waktu_transaksi)); ?></td>
                                        <td class="text-center" style="max-width: 50px;">
                                            <div class="row justify-content-center">
                                                <form action="<?= base_url('data-penjualan/hapus/'); ?>" method="post">
                                                    <input type="hidden" name="id" value="<?= $pj->faktur; ?>">
                                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
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