<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 text-left mb-4">
                                <h1 class="card-title">Data Produk</h1>
                            </div>
                            <div class="col-lg-9 text-right mb-4">
                                <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#tbhstokModal"><i class="fa fa-lg fa-arrow-down"></i> STOK MASUK</button>
                                <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#tbhprodukModal"><i class="fa fa-lg fa-plus"></i> TAMBAH PRODUK</button>
                            </div>
                        </div>
                        <table id="produkTable" class="table table-hover table-bordered" style="width:100%">
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
                                        <button style="max-width: 45px;" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                        <button style="max-width: 45px;" class="btn btn-warning"><i class="fa fa-pencil"></i></button>
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
                <form class="form-stok" id="form-stok" method="post" action="">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="produk_stok">Produk</label>
                      <div class="col-sm-9">
                        <select class="form-control select-produk" id="produk_stok" name="produk_stok">
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
                            <input type="number" class="form-control" id="jumlah_stok" placeholder="Jumlah" name="jumlah_stok">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-produk').reset();" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
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
                            <input type="text" class="form-control" id="produk" placeholder="Nama Produk" name="produk">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="kategori">Kategori</label>
                      <div class="col-sm-9">
                        <select class="form-control select-kategori" id="kategori" name="kategori">
                            <?php foreach ($kategori as $catergory) : ?>
                                <option value="<?= $catergory->id; ?>"><?= $catergory->nama_kategori; ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="unit">Unit</label>
                      <div class="col-sm-9">
                        <select class="form-control select-unit" id="unit" name="unit">
                            <?php foreach ($unit as $units) : ?>
                                <option value="<?= $units->id; ?>"><?= $units->nama_unit; ?></option>
                            <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_beli" class="col-sm-3 col-form-label">Harga Beli</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="harga_beli" placeholder="Harga Beli" name="harga_beli">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_jual" class="col-sm-3 col-form-label">Harga Jual</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="harga_jual" placeholder="Harga Jual" name="harga_jual">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-produk').reset();" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<?php if ($this->session->flashdata('sukses-produk')) : ?>
    <div class="sukses-produk" data-suksesproduk="<?= $this->session->flashdata('sukses-produk'); ?>"></div>
<?php endif; ?>
