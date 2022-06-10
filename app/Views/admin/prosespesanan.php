<?= $this->extend('allin/templates'); ?>
<?= $this->section('content'); ?>
<div class="row">
  <div class="p-5 col-xl-12 col-md-12">
    <div class="card mb-1">
      <div class="card-header pb-0">
        <a class="text-decoration-none">
          <h5><?= $title ?></h5>
        </a>
      </div>
      <div class="card-body px-5 pt-3 pb-2 ">
        <form action="<?= base_url() ?>/Admin/buktiproses/<?= $data['id_barang'] ?>" class="col-10" method="post" enctype="multipart/form-data">
          <div class="mb-3 col-12">
            <label for="InputNama" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" name="nama_pegawai" readonly id="InputNama" value="<?= session()->get('nama_pegawai') ?>">
          </div>
          <div class="mb-3 col-12">
            <label for="InputNama" class="form-label">Pesanan</label>
            <input type="text" class="form-control" name="data_pesanan" readonly id="InputNama" value="<?= $data['nama_barang'] ?> <?= $data['jumlah_barang'] ?> <?= $data['dimensi_barang'] ?>">
          </div>
          <div class="mb-3 col-12">
            <label for="inputFoto" class="form-label">Masukan Foto Proses</label>
            <input type="file" class="form-control" name="foto_proses">
          </div>
          <div class="mb-3 col-12">
            <input type="submit" class="btn btn-primary form-control" value="Masukan Bukti Proses">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>