<?= $this->extend('allin/templates'); ?>
<?= $this->section('content'); ?>
<div class="row mt-4">
  <div class="col-xl-12 col-md-12">
    <div class="card mb-1">
      <div class="card-header pb-0">
        <h5 class="d-inline-block">Barang Masuk</h5>
        <div class="d-flex mt-4">
          <div class="mx-2">
            <a href="<?= base_url('barangmasuk/tambahbarangmasuk') ?>">
              <span type="button" class="badge p-3 mb-3 d-inline-block badge-xl bg-gradient-primary">Tambah Barang Masuk</span>
            </a>
          </div>
          <div class="mz-2">
            <a href="<?= base_url('/listbarang/tambahbarang') ?>">
              <span type="button" class="badge p-3 mb-3 d-inline-block badge-xl bg-gradient-primary">Tambah Barang</span>
            </a>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <div class="table-responsive">
          <table class="table align-items-center ">
            <tbody>
              <?php foreach ($barang as $b) : ?>
                <tr>
                  <td class="w-10">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">Nama Pengirim:</p>
                        <h6 class="text-sm mb-0"><?= $b['nama_pelanggan'] ?></h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Jumlah:</p>
                      <h6 class="text-sm mb-0"><?= $b['jumlah_barang'] ?><?= $b['dimensi_barang'] ?></h6>
                    </div>
                  </td>
                  <td class="align-middle text-sm">
                    <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Tanggal Masuk:</p>
                      <h6 class="text-sm mb-0"><?= $b['tanggalmasuk'] ?></h6>
                    </div>
                  </td>
                  <td class="align-middle text-sm">
                    <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Penanggung Jawab:</p>
                      <h6 class="text-sm mb-0"><?= $b['nama_pegawai'] ?></h6>
                    </div>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>