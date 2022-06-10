<?= $this->extend('allin/templates'); ?>
<?= $this->section('content'); ?>
<div class="row mt-4">
  <div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
      <div class="card-header pb-0 pt-3 bg-transparent">
        <h6 class="text-capitalize">Pesanan Offline 2022</h6>
        <p class="text-sm mb-0">
          <i class="fa fa-arrow-up text-success"></i>
          <span class="font-weight-bold">4% more</span> in 2021
        </p>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end penjualan -->

<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-header pb-0 p-3 bg-transparent">
        <div class="d-flex justify-content-between">
          <h6 class="mb-2">Barang Masuk</h6>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center ">
          <tbody>
            <?php foreach ($barang as $b) : ?>
              <tr>
                <td class="w-10">
                  <div class="d-flex px-2 py-1 align-items-center">
                    <div class="ms-4">
                      <p class="text-xs font-weight-bold mb-0">Nama:</p>
                      <h6 class="text-sm mb-0"><?= $b['nama_barang'] ?></h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">Jumlah:</p>
                    <h6 class="text-sm mb-0"><?= $b['jumlah_barang'] ?> <?= $b['dimensi_barang'] ?></h6>
                  </div>
                </td>
                <td class="align-middle text-sm">
                  <div class="col text-center">
                    <p class="text-xs font-weight-bold mb-0">Tanggal Masuk:</p>
                    <h6 class="text-sm mb-0"><?= $b['tanggalmasuk'] ?></h6>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-5 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-header pb-0 p-3 bg-transparent">
        <h6 class="d-flex justify-content-between">Categories</h6>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                <i class="ni ni-calendar-grid-58 text-white text-sm opacity-10"></i>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-sm">Pesanan Offline</h6>
                <span class="text-xs"><?= $allpesanan ?> Pesanan, <span class="font-weight-bold"><?= $pesananselesai ?> Selesai</span></span>
              </div>
            </div>
            <div class="d-flex">
              <a href="<?= base_url() ?>/orderoffline/" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
            </div>
          </li>
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                <i class="ni ni-credit-card text-white text-sm opacity-10"></i>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-sm">Barang Masuk</h6>
                <span class="text-xs"><?= $allbarangmasuk ?> Barang Masuk</span>
              </div>
            </div>
            <div class="d-flex">
              <a href="<?= base_url() ?>/barangmasuk" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
            </div>
          </li>
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                <i class="ni ni-books text-white text-sm opacity-10"></i>
              </div>
              <div class="d-flex flex-column">
                <h6 class="mb-1 text-dark text-sm">Laporan Harian </h6>
                <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
              </div>
            </div>
            <div class="d-flex">
              <a href="<?= base_url() ?>/laporan" target="_blank" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>