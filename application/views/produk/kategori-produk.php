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
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#tbhKategoriModal"><i class="fa fa-plus"></i> TAMBAH KATEGORI</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="produkTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>
                                    <th>Opt.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($kategori as $kat) : ?>
                                <tr>
                                    <td><?= $kat->nama_kategori; ?></td>
                                    <td class="text-center" style="max-width: 1500px;">
                                        <button 
                                            id="edit-kategori"
                                            style="max-width: 45px;" 
                                            class="btn btn-warning btn-sm" 
                                            data-toggle="modal" 
                                            data-target="#editKategoriModal"
                                            data-id="<?= $kat->id; ?>"
                                            data-nama_kategori="<?= $kat->nama_kategori; ?>"
                                            data-status="<?= $kat->aktif; ?>"
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
<div class="modal fade" id="tbhKategoriModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tbhKategoriLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tbhKategoriLabel">Tambah Kategori Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-kategori" id="form-kategori" method="post" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" placeholder="Nama Kategori" name="kategori" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="status" name="status" value="0">
                        <label class="form-check-label" for="status">Aktif ?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-kategori').reset();" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->


<!-- Modal -->
<div class="modal fade" id="editKategoriModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editKategoriLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKategoriLabel">Edit Kategori Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-editKategori" id="form-editKategori" method="post" action="<?= base_url('master-data/edit-cat/'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="hidden" id="id_kategori" name="id_kategori">
                        <input type="text" class="form-control" id="editkategori" placeholder="Nama Kategori" name="editkategori" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="editstatus" name="editstatus" value="0">
                        <label class="form-check-label" for="editstatus">Aktif ?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-editKategori').reset();" data-dismiss="modal">Tutup</button>
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
