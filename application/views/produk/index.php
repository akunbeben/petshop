<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 text-left mb-4">
                        <h1 class="card-title">Data Produk</h1>
                    </div>
                    <div class="col-lg-6 text-right mb-4">
                        <button class="btn btn-light btn-lg">EXPORT</button>
                        <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#tbhprodukModal"><i class="fa fa-lg fa-plus"></i> TAMBAH PRODUK</button>
                    </div>
                </div>
                <table id="produkTable" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>PPN</th>
                            <th>Opt.</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($produk as $prd) : ?>
                        <tr>
                            <td><?= $prd->nama_produk; ?></td>
                            <td><?= $prd->nama_kategori; ?></td>
                            <td><?= $prd->nama_unit; ?></td>
                            <td><?= $prd->harga_jual; ?></td>
                            <td><?= $prd->ppn; ?></td>
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
</div>

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
                <form class="forms-sample">
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('auth/logout/'); ?>'">Logout</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->