<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active">Produk</li>
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
                            <h1 class="card-title">Data Produk</h1>
                        </div>
                        <div class="float-right">
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#tbhstokModal"><i class="fa fa-arrow-down"></i> STOK MASUK</button>
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#tbhprodukModal"><i class="fa fa-plus"></i> TAMBAH PRODUK</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="produkTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Opt.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($produk as $prd) : ?>
                                <tr>
                                    <td><?= $prd->nama_produk; ?></td>
                                    <td><?= $prd->nama_kategori; ?></td>
                                    <td><?= $prd->nama_unit; ?></td>
                                    <td><?= rupiah($prd->harga_jual); ?></td>
                                    <td><?= $prd->stok; ?></td>
                                    <td class="text-center" style="max-width: 50px;">
                                        <button 
                                        style="max-width: 45px;" 
                                        class="btn btn-success btn-sm"
                                        data-toggle="modal" 
                                        data-target="#detailprodukModal"
                                        >
                                        <i class="fas fa-eye"></i>
                                        </button>
                                        
                                        <button 
                                            id="edit-produk"
                                            style="max-width: 45px;" 
                                            class="btn btn-warning btn-sm" 
                                            data-toggle="modal" 
                                            data-target="#editprodukModal"
                                            data-id="<?= $prd->id; ?>"
                                            data-nama_produk="<?= $prd->nama_produk; ?>"
                                            data-nama_kategori="<?= $prd->nama_kategori; ?>"
                                            data-nama_unit="<?= $prd->nama_unit; ?>"
                                            data-harga_jual="<?= $prd->harga_jual; ?>"
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
<div class="modal fade" id="tbhstokModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tbhstokLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tbhstokLabel">Stok Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-stok" id="form-stok" method="post" action="<?= base_url('master-data/stockin/'); ?>">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="produk_stok">Produk</label>
                      <div class="col-sm-9">
                        <select class="form-control select-produk" id="produk_stok" name="produk_stok" required>
                                <option value="">-- Pilih Produk --</option>
                            <?php foreach ($produk as $prod) : ?>
                                <option value="<?= $prod->id; ?>"><?= $prod->nama_produk; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="id_prod" id="id_prod">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_stok" class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="jumlah_stok" placeholder="Jumlah" name="jumlah_stok" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-stok').reset();" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="tbhprodukModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tbhprodukLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tbhprodukLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-produk" id="form-produk" method="post" action="">
                    <div class="form-group row">
                        <label for="produk" class="col-sm-3 col-form-label">Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="produk" placeholder="Nama Produk" name="produk" required>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="kategori">Kategori</label>
                      <div class="col-sm-9">
                        <select class="form-control select-kategori" id="kategori" name="kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($kategori as $catergory) : ?>
                                <option value="<?= $catergory->id; ?>"><?= $catergory->nama_kategori; ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="unit">Unit</label>
                      <div class="col-sm-9">
                        <select class="form-control select-unit" id="unit" name="unit" required>
                                <option value="">-- Pilih Unit --</option>
                            <?php foreach ($unit as $units) : ?>
                                <option value="<?= $units->id; ?>"><?= $units->nama_unit; ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_beli" class="col-sm-3 col-form-label">Harga Beli</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="harga_beli" placeholder="Harga Beli" name="harga_beli" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_jual" class="col-sm-3 col-form-label">Harga Jual</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="harga_jual" placeholder="Harga Jual" name="harga_jual" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-produk').reset();" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="editprodukModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editprodukLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editprodukLabel">Edit data produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-editproduk" id="form-editproduk" method="post" action="<?= base_url('master-data/edit/'); ?>">
                    <div class="form-group row">
                        <label for="editproduk" class="col-sm-3 col-form-label">Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="editproduk" placeholder="Nama Produk" name="editproduk" required>
                            <input type="hidden" name="edit_idprod" id="edit_idprod">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="editkategori">Kategori</label>
                      <div class="col-sm-9">
                        <select class="form-control select-kategori" id="editkategori" name="editkategori" required>
                                <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($kategori as $catergory) : ?>
                                <option value="<?= $catergory->id; ?>"><?= $catergory->nama_kategori; ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="editunit">Unit</label>
                      <div class="col-sm-9">
                        <select class="form-control select-unit" id="editunit" name="editunit" required>
                                <option value="">-- Pilih Unit --</option>
                            <?php foreach ($unit as $units) : ?>
                                <option value="<?= $units->id; ?>"><?= $units->nama_unit; ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="harga" placeholder="Harga Produk" name="harga" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-editproduk').reset();" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="detailprodukModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="detailprodukLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailprodukLabel">Detail stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="detailTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Data Masuk</th>
                                <th>Jumlah</th>
                                <th>Di input oleh</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $detail = $this->ProdukModel->detail()->result();
                        foreach ($detail as $dtl) : ?>
                            <tr>
                                <td><?= $dtl->nama_produk; ?></td>
                                <td><?= $dtl->time_stamp; ?></td>
                                <td><?= $dtl->jumlah == 0 ? 'Stok inisial' : $dtl->jumlah; ?></td>
                                <td><?= $dtl->created_by; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<?php if ($this->session->flashdata('sukses-produk')) : ?>
    <div class="sukses-produk" data-suksesproduk="<?= $this->session->flashdata('sukses-produk'); ?>"></div>
<?php endif; ?>
