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
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#tbhkaryawanModal"><i class="fa fa-plus"></i> KARYAWAN BARU</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="produkTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Kontak</th>
                                    <th>Jabatan</th>
                                    <th>Opt.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($karyawan as $plg) : ?>
                                <tr>
                                    <td><?= $plg->nama; ?></td>
                                    <td><?= $plg->alamat; ?></td>
                                    <td><?= $plg->email . ' / ' . $plg->telepon; ?></td>
                                    <td><?= $plg->jabatan == 1 ? 'Admin' : 'Kasir'; ?></td>
                                    <td class="text-center" style="max-width: 50px;">
                                        <div class="row justify-content-center">
                                            <button 
                                                id="edit-karyawan"
                                                style="max-width: 45px;" 
                                                class="btn btn-warning btn-sm" 
                                                data-toggle="modal" 
                                                data-target="#editkaryawanModal"
                                                data-id="<?= $plg->id; ?>"
                                                data-nama="<?= $plg->nama; ?>"
                                                data-telepon="<?= $plg->telepon; ?>"
                                                data-alamat="<?= $plg->alamat; ?>"
                                                data-email="<?= $plg->email; ?>"
                                                >
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            &nbsp;
                                            <form action="<?= base_url('karyawan/hapus/'); ?>" method="post">
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
<div class="modal fade" id="tbhkaryawanModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tbhkaryawanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tbhkaryawanLabel">Tambah <?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-karyawan" id="form-karyawan" method="post" action="<?= base_url('karyawan/tambah') ; ?>">
                    <div class="form-group row">
                        <label for="karyawan" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="karyawan" placeholder="Nama karyawan" name="karyawan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="alamat" placeholder="Alamat Lengkap" name="alamat" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telepon" class="col-sm-3 col-form-label">Telepon</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="telepon" placeholder="Nomor Telepon" name="telepon" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="jabatan" placeholder="jabatan" name="jabatan" required>
                                <option value="1">Admin</option>
                                <option value="2">Kasir</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-karyawan').reset();" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="editkaryawanModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editkaryawanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="tbhkaryawanLabel">Edit Data <?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-editkaryawan" id="form-editkaryawan" method="post" action="<?= base_url('karyawan/edit/'); ?>">
                <div class="form-group row">
                        <label for="editkaryawan" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="hidden" id="id_karyawan" name="id_karyawan">
                            <input type="text" class="form-control" id="editkaryawan" placeholder="Nama karyawan" name="editkaryawan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editalamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="editalamat" placeholder="Alamat Lengkap" name="editalamat" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editemail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="editemail" placeholder="Email" name="editemail" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edittelepon" class="col-sm-3 col-form-label">Telepon</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="edittelepon" placeholder="Nomor Telepon" name="edittelepon" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editjabatan" class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="editjabatan" name="editjabatan" required>
                                <option value="1">Admin</option>
                                <option value="2">Kasir</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-editkaryawan').reset();" data-dismiss="modal">Tutup</button>
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
