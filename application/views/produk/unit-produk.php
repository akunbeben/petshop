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
                        <div class="float-right">
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#tbhUnitModal"><i class="fa fa-plus"></i> TAMBAH UNIT</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="produkTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Unit</th>
                                    <th>Opt.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($unit as $units) : ?>
                                <tr>
                                    <td><?= $units->nama_unit; ?></td>
                                    <td class="text-center" style="max-width: 50px;">
                                        <button 
                                            id="edit-unit"
                                            style="max-width: 45px;" 
                                            class="btn btn-warning btn-sm" 
                                            data-toggle="modal" 
                                            data-target="#editUnitModal"
                                            data-id="<?= $units->id; ?>"
                                            data-nama_unit="<?= $units->nama_unit; ?>"
                                            data-status="<?= $units->aktif; ?>"
                                            >
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
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

<!-- Modal -->
<div class="modal fade" id="tbhUnitModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tbhUnitLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tbhUnitLabel">Tambah Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-unit" id="form-unit" method="post" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" class="form-control" id="unit" placeholder="Nama Unit" name="unit" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="status" name="status" value="0">
                        <label class="form-check-label" for="status">Aktif ?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-unit').reset();" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->


<!-- Modal -->
<div class="modal fade" id="editUnitModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editUnitLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUnitLabel">Edit Kategori Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-editUnit" id="form-editUnit" method="post" action="<?= base_url('master-data/edit-unit/'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="hidden" id="id_unit" name="id_unit">
                        <input type="text" class="form-control" id="editunit" placeholder="Nama Unit" name="editunit" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="editstatus" name="editstatus" value="0">
                        <label class="form-check-label" for="editstatus">Aktif ?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-editUnit').reset();" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<?php if ($this->session->flashdata('sukses-produk')) : ?>
    <div class="sukses-produk" data-suksesproduk="<?= $this->session->flashdata('sukses-produk'); ?>"></div>
<?php endif; ?>
