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
                        <div class="float-right">
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#tbhPelangganModal"><i class="fa fa-plus"></i> TAMBAH PELANGGAN</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="produkTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Opt.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($pelanggan as $plg) : ?>
                                <tr>
                                    <td><?= $plg->nama; ?></td>
                                    <td><?= $plg->telepon; ?></td>
                                    <td><?= $plg->alamat; ?></td>
                                    <td class="text-center" style="max-width: 50px;">
                                        <button 
                                            id="edit-pelanggan"
                                            style="max-width: 45px;" 
                                            class="btn btn-warning btn-sm" 
                                            data-toggle="modal" 
                                            data-target="#editpelangganModal"
                                            data-id="<?= $plg->id; ?>"
                                            data-nama="<?= $plg->nama; ?>"
                                            data-telepon="<?= $plg->telepon; ?>"
                                            data-alamat="<?= $plg->alamat; ?>"
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
<div class="modal fade" id="tbhPelangganModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tbhPelangganLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tbhPelangganLabel">Tambah <?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-pelanggan" id="form-pelanggan" method="post" action="">
                    <div class="form-group row">
                        <label for="pelanggan" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="pelanggan" placeholder="Nama pelanggan" name="pelanggan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telepon" class="col-sm-3 col-form-label">Telepon</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="telepon" placeholder="Nomor Telepon" name="telepon" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="alamat" placeholder="Alamat Lengkap" name="alamat" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-pelanggan').reset();" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="editpelangganModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editpelangganLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="tbhPelangganLabel">Tambah <?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-editpelanggan" id="form-editpelanggan" method="post" action="<?= base_url('pelanggan/edit/'); ?>">
                    <div class="form-group row">
                        <label for="editpelanggan" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="hidden" id="id_plg" name="id_plg">
                            <input type="text" class="form-control" id="editpelanggan" placeholder="Nama pelanggan" name="editpelanggan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edittelepon" class="col-sm-3 col-form-label">Telepon</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="edittelepon" placeholder="Nomor Telepon" name="edittelepon" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editalamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="editalamat" placeholder="Alamat Lengkap" name="editalamat" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-editpelanggan').reset();" data-dismiss="modal">Tutup</button>
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
