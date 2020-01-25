<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Produk</h1>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h1 class="card-title">Data <?= $title; ?></h1>
                        </div>
                        <div class="float-right">
                            <form action="" method="post">
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
                            <?php foreach ($inventori as $inv) : ?>
                                <tr>
                                    <td><?= $inv->no_doc; ?></td>
                                    <td><?= $inv->created_at; ?></td>
                                    <td><?= $inv->created_by; ?></td>
                                    <td>
                                        <div class="row justify-content-center">
                                            <form action="<?= base_url('laporan/print/'); ?>" method="post">
                                                <input type="hidden" value="<?= $inv->id; ?>" name="id">
                                                <button class="btn btn-success btn-sm" type="submit"><i class="fas fa-download" value="pdf"></i></button>
                                            </form>
                                            &nbsp;
                                            <form action="<?= base_url('laporan/print/'); ?>" method="post">
                                                <input type="hidden" value="<?= $inv->id; ?>" name="id">
                                                <button class="btn btn-warning btn-sm" type="submit"><i class="fas fa-print" value="print"></i></button>
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