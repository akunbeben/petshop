<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6 mt-2">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $stok == null ? '0' : $stok; ?></h3>

            <p>Stok masuk hari ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6 mt-2">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $qty == null ? '0' : $qty; ?></h3>

            <p>Total Qty Inventori</p>
          </div>
          <div class="icon">
            <i class="ion ion-briefcase"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6 mt-2">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= $penjualan == null ? '0' : $penjualan; ?></h3>

            <p>Penjualan hari ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6 mt-2">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= substr($profit_k, 0, 2) == null ? '0' : substr($profit_k, 0, 2); ?><sup style="font-size: 20px">%</sup></h3>

            <p>Profit hari ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header mt-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Omset per Hari</h3>
              <a href="<?= base_url('data-penjualan/'); ?>">Lihat Detail</a>
            </div>
          </div>
          <div class="card-body">
            <!-- <img src="<?= base_url('backend/assets/') . 'back.jpg'; ?>" class="img-fluid"> -->
            <canvas id="omsetChart" height="300"></canvas>
          </div>
          <div class="card-footer text-right">
            <span class="">
              <i class="fas fa-square text-primary"></i> Omset
            </span>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header mt-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Profit per Bulan</h3>
              <a href="<?= base_url('data-penjualan/detail-profit'); ?>">Lihat Detail</a>
            </div>
          </div>
          <div class="card-body">
            <!-- <img src="<?= base_url('backend/assets/') . 'back.jpg'; ?>" class="img-fluid"> -->
            <canvas id="profitChart" height="300"></canvas>
          </div>
          <div class="card-footer text-right">
            <span class="">
              <i class="fas fa-square text-primary"></i> Profit
            </span>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Traffic Kunjungan Pelanggan</h3>
              <a href="javascript:void(0);">Lihat Detail</a>
            </div>
          </div>
          <div class="card-body">
            <!-- <img src="<?= base_url('backend/assets/') . 'back.jpg'; ?>" class="img-fluid"> -->
            <canvas id="myChart" height="300"></canvas>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Statistik Jasa Penitipan</h3>
              <a href="javascript:void(0);">Lihat Detail</a>
            </div>
          </div>
          <div class="card-body">
            <!-- <img src="<?= base_url('backend/assets/') . 'back.jpg'; ?>" class="img-fluid"> -->
            <canvas id="myChart2" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>