<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-3">
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="customer" class="col-sm-4 col-form-label">Pelanggan</label>
                                <div class="col-sm-8">
                                    <select name="customer" id="customer" class="form-control customer">
                                        <option value="">Umum</option>
                                        <?php foreach ($customer as $key) : ?>
                                        <option value="<?= $key->id; ?>"><?= $key->nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mt-3">
                    <form role="form" method="post" action="<?= base_url('penjualan/addtocart'); ?>">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="customer" class="col-sm-2 col-form-label">Produk</label>
                                <div class="col-md-9">
                                    <select name="produk" id="produk" class="form-control select-produk">
                                        <option value="">-- Pilih Produk --</option>
                                        <?php foreach ($produk as $prd) : ?>
                                        <option value="<?= $prd->id; ?>"><?= $prd->nama_produk; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-success" type="submit"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Item</th>
                                <th>Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th>Sub Total</th>
                                <th class="text-center">Opt.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($keranjang as $carts) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $carts->nama_produk; ?></td>
                                <td><?= rupiah($carts->harga_jual); ?></td>
                                <td class="text-center"><?= $carts->qty; ?></td>
                                <td><?= rupiah($carts->harga_jual * $carts->qty); ?></td>
                                <td class="text-center">
                                    <button class="btn-sm btn-danger tombol-cart" onclick="window.location.href='<?= base_url('penjualan/hapus/') . $carts->produk_id; ?>';"><i class="fa fa-trash"></i></button>
                                    <button class="btn-sm btn-success tombol-cart" onclick="window.location.href='<?= base_url('penjualan/kurang/') . $carts->produk_id; ?>';"><i class="fa fa-minus"></i></button>
                                    <button class="btn-sm btn-success tombol-cart" onclick="window.location.href='<?= base_url('penjualan/tambah/') . $carts->produk_id; ?>';"><i class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form method="post" action="<?= base_url('pos/process'); ?>">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="cash" class="col-sm-4 col-form-label">Cash</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="cash" name="cash" required>
                                    <input type="hidden" class="form-control" id="customer" name="customer">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="text-left col-md-6">
                                    <label for="grandtotal" class="col-form-label">Grand Total</label>
                                </div>
                                <div class="float-right col-md-6">
                                    <h3><strong><?= rupiah($grand_total) == null ? '0' : rupiah($grand_total); ?></strong></h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row justify-content-end my-2">
                        <button class="btn-lg btn-warning clear-cart col-md-12" onclick="window.location.href='<?= base_url('penjualan/reset'); ?>'"><i class="fa fa-refresh"></i> New Order</button>
                    </div>
                    <div class="row justify-content-end my-2">
                        <button class="btn-lg btn-success col-md-12" type="submit"><i class="fa fa-send"></i> Process Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php if ($this->session->flashdata('gagal-produk')) : ?>
    <div class="gagal-produk" data-gagalproduk="<?= $this->session->flashdata('gagal-produk'); ?>"></div>
<?php endif; ?>
