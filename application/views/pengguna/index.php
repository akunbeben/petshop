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
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#tbhpenggunaModal"><i class="fa fa-plus"></i> PENGGUNA BARU</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="produkTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Username</th>
                                    <th>Opt.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($pengguna as $plg) : ?>
                                <tr>
                                    <td><?= $plg->nama; ?></td>
                                    <td><?= $plg->username; ?></td>
                                    <td class="text-center" style="max-width: 50px;">
                                        <div class="row justify-content-center">
                                            <button 
                                                id="edit-pengguna"
                                                style="max-width: 45px;" 
                                                class="btn btn-warning btn-sm" 
                                                data-toggle="modal" 
                                                data-target="#editpenggunaModal"
                                                data-id="<?= $plg->id; ?>"
                                                data-id_karyawans="<?= $plg->sub_id; ?>"
                                                data-username="<?= $plg->username; ?>"
                                                data-password="<?= $plg->password; ?>"
                                                >
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            &nbsp;
                                            <form action="<?= base_url('pengguna/hapus/'); ?>" method="post">
                                                <input type="hidden" name="id" value="<?= $plg->id; ?>">
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

<!-- Modal -->
<div class="modal fade" id="tbhpenggunaModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tbhpenggunaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tbhpenggunaLabel">Tambah <?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-pengguna" id="form-pengguna" method="post" action="<?= base_url('pengguna/tambah') ; ?>">
                    <div class="form-group row">
                        <label for="pengguna" class="col-sm-3 col-form-label">Karyawan</label>
                        <div class="col-sm-9">
                            <select class="form-control select-produk" id="id_karyawan" placeholder="id_karyawan" name="id_karyawan" required>
                                <option value="">-- Pilih Karyawan --</option>
                                <?php foreach ($karyawan as $key) : ?>
                                <option value="<?= $key->id; ?>"><?= $key->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-pengguna').reset();" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="editpenggunaModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editpenggunaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="tbhpenggunaLabel">Edit Data <?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-editpengguna" id="form-editpengguna" method="post" action="<?= base_url('pengguna/edit/'); ?>">
                    <div class="form-group row">
                        <label for="editusername" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="hidden" name="id_pengguna" id="id_pengguna" required>
                            <input type="hidden" name="editid_karyawan" id="editid_karyawan" required>
                            <input type="text" class="form-control" id="editusername" placeholder="Username" name="editusername" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editpassword" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="editpassword" placeholder="Password" name="editpassword" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-editpengguna').reset();" data-dismiss="modal">Tutup</button>
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
