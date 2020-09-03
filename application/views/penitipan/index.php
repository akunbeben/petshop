<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data <?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="float-left">
            <h1 class="card-title">Data Penitipan Masuk</h1>
          </div>
          <div class="float-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#penitipan"><i class="fas fa-download"></i> Masuk</button>
            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#biaya"><i class="fas fa-cogs"></i> Biaya</button>
          </div>
        </div>
        <div class="card-body">
          <table id="produkTable" class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>Nama Peliharaan</th>
                <th>Pemilik</th>
                <th>Catatan</th>
                <th>Tanggal Masuk</th>
                <th>Opt.</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($list as $penitipan) : ?>
                <tr>
                  <td><?= $penitipan->nama_peliharaan; ?></td>
                  <td><?= $penitipan->nama; ?></td>
                  <td><?= $penitipan->catatan; ?></td>
                  <td><?= date('d M Y H:i:s', strtotime($penitipan->tanggal_masuk)); ?></td>
                  <td>
                    <div class="row justify-content-center">
                      <button class="btn btn-warning btn-sm" id="edit-penitipan" data-toggle="modal" data-target="#editpenitipan" data-id="<?= $penitipan->id; ?>" data-nama_peliharaan="<?= $penitipan->nama_peliharaan; ?>" data-pemilik="<?= $penitipan->id_pemilik; ?>" data-catatan="<?= $penitipan->catatan; ?>">
                        <i class="fas fa-pencil-alt"></i></button>
                      &nbsp;
                      <form action="<?= base_url('penitipan/keluar/'); ?>" method="post">
                        <input type="hidden" name="id" value="<?= $penitipan->id; ?>">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
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
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="float-left">
            <h1 class="card-title">Data Penitipan Keluar</h1>
          </div>
        </div>
        <div class="card-body">
          <table id="keluarTable" class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>Nama Peliharaan</th>
                <th>Pemilik</th>
                <th>Catatan</th>
                <th>Total Biaya</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($list_keluar as $keluar) : ?>
                <tr>
                  <td><?= $keluar->nama_peliharaan; ?></td>
                  <td><?= $keluar->nama; ?></td>
                  <td><?= $keluar->catatan; ?></td>
                  <td><?= rupiah($keluar->biaya); ?></td>
                  <td><?= date('d M Y H:i:s', strtotime($keluar->tanggal_masuk)); ?></td>
                  <td><?= date('d M Y H:i:s', strtotime($keluar->tanggal_keluar)); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="penitipan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="penitipanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('penitipan/masuk/'); ?>" method="post" class="form-penitipan" id="form-penitipan">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="penitipanLabel">Form <?= $title; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_peliharaan" class="col-form-label">Nama Peliharaan</label>
            <input type="text" class="form-control" id="nama_peliharaan" placeholder="Nama Peliharaan" name="nama_peliharaan" required>
          </div>
          <div class="form-group">
            <label for="pemilik" class="col-form-label">Nama Pemilik</label>
            <select name="pemilik" id="pemilik" class="form-control" required>
              <option value=""> -- Pilih Pemilik -- </option>
              <?php foreach ($pelanggan as $plg) : ?>
                <option value="<?= $plg->id; ?>"><?= $plg->nama; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="catatan" class="col-form-label">Catatan</label>
            <textarea type="text" class="form-control" id="catatan" placeholder="Catatan" name="catatan"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-penitipan').reset();" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="biaya" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="biayaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('penitipan/biaya/'); ?>" method="post" class="form-biaya" id="form-biaya">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="biayaLabel">Form Biaya <?= $title; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="biaya_lama" class="col-form-label">Biaya perhari</label>
            <input type="text" class="form-control" id="biaya_lama" readonly name="biaya_lama" required value="<?= rupiah($biaya->biaya); ?>">
          </div>
          <div class="form-group">
            <label for="biaya_baru" class="col-form-label">Update Biaya</label>
            <input type="number" class="form-control" id="biaya_baru" name="biaya_baru" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-penitipan').reset();" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="editpenitipan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editpenitipanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('penitipan/edit/'); ?>" method="post" class="form-editpenitipan" id="form-editpenitipan">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="penitipanLabel">Form <?= $title; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="edit_nama_peliharaan" class="col-form-label">Nama Peliharaan</label>
            <input type="text" class="form-control" id="edit_nama_peliharaan" placeholder="Nama Peliharaan" name="edit_nama_peliharaan" required>
            <input type="hidden" name="edit_id" id="edit_id">
          </div>
          <div class="form-group">
            <label for="edit_pemilik" class="col-form-label">Nama Pemilik</label>
            <select name="edit_pemilik" id="edit_pemilik" class="form-control" required>
              <option value=""> -- Pilih Pemilik -- </option>
              <?php foreach ($pelanggan as $plg) : ?>
                <option value="<?= $plg->id; ?>"><?= $plg->nama; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="edit_catatan" class="col-form-label">Catatan</label>
            <textarea type="text" class="form-control" id="edit_catatan" placeholder="edit_Catatan" name="edit_catatan"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="document.getElementById('form-editpenitipan').reset();" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php if ($this->session->flashdata('sukses-produk')) : ?>
  <div class="sukses-produk" data-suksesproduk="<?= $this->session->flashdata('sukses-produk'); ?>"></div>
<?php endif; ?>