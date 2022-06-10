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
      <div class="card-body px-5 pt-3 pb-2">
        <div class="alert alert-success container sukses text-white" role="alert" <?= (!session()->getFlashdata('berhasil')) ? 'style="display: none;"' : '';  ?>>
          <?= session()->getFlashdata('berhasil'); ?>
        </div>
        <div class="alert alert-danger container error text-white" role="alert" <?= (!session()->getFlashdata('gagal')) ? 'style="display: none;"' : '';  ?>>
          <?= session()->getFlashdata('gagal'); ?>
        </div>
        <form action="<?= base_url('Admin/tambahpesanan') ?>" class="col-12 mr-3" method="POST">
          <? csrf_field() ?>
          <input type="hidden" name="id_pegawai" value="<?= session()->get('id_pegawai') ?>">
          <div class="mb-3">
            <label for="namapetugas" class="form-label">Nama petugas</label>
            <input type="text" class="form-control" name="namapetugas" value="<?= session()->get('nama_pegawai') ?>" readonly disabled>
          </div>
          <div class="mb-3">
            <label for="namapemesan" class="form-label">Nama Pemesan</label>
            <select class="form-select" name="namapemesan">
              <?php foreach ($pelanggan as $p ) : ?>
               <option <?= (old('namapemesan')) ? 'selected' : ''; ?> value="<?= $p['id_pelanggan'] ?>"><?= $p['nama_pelanggan'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="barangpesanan" class="form-label">Nama Barang</label>
            <select class="form-select" name="barangpesanan">
              <?php foreach ($barang as $b ) : ?>
               <option <?= (old('barangpesanan')) ? 'selected' : ''; ?> value="<?= $b['id_barang'] ?>"><?= $b['nama_barang'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="inputJumlah" class="form-label">Jumlah and Dimensi Pesanan</label>
            <div class="input-group">
              <input type="number" name="jumlahpesanan" min="1" maxlength="8" value="<?= old('jumlahpesanan') ? old('jumlahpesanan') :'1'  ?>" class="form-control">
              <select class="form-select" name="dimensi_barang" aria-label="Default select example">
                <option <?= (old('dimensi_barang') =='kg') ? 'selected' : ''; ?> value="kg">Kg</option>
                <option <?= (old('dimensi_barang') =='pcs') ? 'selected' : ''; ?> value="pcs">Pcs</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <input type="submit" class="btn btn-primary form-control" value="Tambah Pesanan">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>