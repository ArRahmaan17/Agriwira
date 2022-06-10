<?= $this->extend('allin/templates'); ?>
<?= $this->section('content'); ?>
<div class="row">
  <div class="col-xl-12 col-md-12">
    <div class="card mb-1">
      <div class="card-header pb-0">
        <h5>Pesanan Masuk</h5>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Nama Pemesan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pesanan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Pesanan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pesan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($masuk as $d) : ?>
                <tr>
                  <td>
                    <div class="d-flex">
                      <div>
                        <img src="<?= base_url('/img/avatardefault.png') ?>" class="avatar avatar-sm me-2">
                      </div>
                      <h6 class="pt-2 text-md"><?= $d['nama_pelanggan'] ?></h6>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs text-wrap font-weight-bold text-uppercase mb-0">Beras <?= $d['nama_barang'] ?></p>
                  </td>
                  <td>
                    <p class="text-xs text-secondary text-uppercase mb-0"><?= $d['jumlah'] ?> <?= $d['dimensi'] ?></p>
                  </td>
                  <td class="ps-4 text-md">
                    <span class="text-secondary text-xs font-weight-bold"><?= $d['tanggalpesan'] ?></span>
                  </td>
                  <td class="ps-3">
                    <span class="badge badge-sm bg-gradient-secondary">Masuk</span>
                  </td>
                  <td class="align-middle dropleft">
                    <a class="text-secondary font-weight-bold text-xs" type="button" id="editDrdw" data-bs-toggle="dropdown" aria-expanded="false">Proses Pesanan</a>
                    <ul class=" dropdown-menu" aria-labelledby="editDrdw">
                      <li><a class="dropdown-item text-xs" onclick="prosespesanan(<?= $d['id_pesanan'] ?>)">Proses</a></li>
                      <li><a href="<?= base_url()?>/orderoffline/editpesanan/<?= $d['id_pesanan'] ?>" class="dropdown-item text-xs">Edit</a></li>
                    </ul>
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