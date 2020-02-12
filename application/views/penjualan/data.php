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
                            <h1 class="card-title">Data <?= $title; ?></h1>
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
