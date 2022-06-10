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
      <?php $id = $data['id_pesanan'] ?>
      <div class="card-body px-5 pt-3 pb-2 ">
        <div class="alert alert-success container sukses text-white" role="alert" <?= (!session()->getFlashdata('berhasil')) ? 'style="display: none;"' : '';  ?>>
          <?= session()->getFlashdata('berhasil'); ?>
        </div>
        <div class="alert alert-danger container error text-white" role="alert" <?= (!session()->getFlashdata('gagal')) ? 'style="display: none;"' : '';  ?>>
          <?= session()->getFlashdata('gagal'); ?>
        </div>
        <form action='<?= base_url("/Admin/buktiselesai/$id") ?>' class="col-8" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_pegawai" value="<?= session()->get('id_pegawai') ?>">
          <div class="mb-3 col-10">
            <label for="InputNama" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" name="nama_pegawai" readonly id="InputNama" value="<?= session()->get('nama_pegawai') ?>">
          </div>
          <div class="mb-3 col-10">
            <label for="InputNama" class="form-label">Pesanan</label>
            <input type="text" class="form-control" name="nama_pegawai" readonly id="InputNama" value="<?= $data['nama_barang'] ?> <?= $data['jumlah_barang'] ?> <?= $data['dimensi_barang'] ?>">
          </div>
          <div class="mb-3 col-10">
            <label for="inputFoto" class="form-label">Masukan Bukti Selesai</label>
            <input type="file" class="form-control" name="foto_selesai">
          </div>
          <div class="mb-3 col-10">
            <input type="submit" class="btn btn-primary form-control" value="Masukan Bukti Proses">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>