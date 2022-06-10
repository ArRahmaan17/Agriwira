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
        <form action="<?= base_url('Admin/editbarang')?>/<?=$data['id_barang'] ?>" class="col-12 mr-3" method="POST">
          <? csrf_field() ?>
          <input type="hidden" name="id_barang" value="<?= $data['id_barang'] ?>">
          <div class="mb-1">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" value="<?= (old('nama_barang')) ? old('nama_barang') : $data['nama_barang'] ?>">
          </div>
           <div class="mb-1">
            <label for="deskripsi" class="form-label">Example textarea</label>
            <textarea class="form-control" id="deskripsi" rows="3"><?= (old('deskripsi_barang')) ? old('deskripsi_barang') : ''; ?></textarea>
          </div>
          <div class="d-flex">
            <div class="m-1 col-3">
              <label for="dimensi_barang" class="form-label">Dimensi Barang</label>
              <select class="form-select" name="dimensi_barang">
                 <option <?= (old('dimensi_barang') =='kg' or $data['dimensi_barang'] == 'kg') ? 'selected' : ''; ?> value="kg">Kg</option>
                 <option <?= (old('dimensi_barang') =='pcs' or $data['dimensi_barang'] == 'pcs') ? 'selected' : ''; ?> value="pcs">Pcs</option>
              </select>
            </div>
            <div class="m-1 col-3">
              <label for="kemasan_barang" class="form-label">Kemasan Barang</label>
              <select class="form-select" name="kemasan_barang">
                 <option <?= (old('kemasan_barang') =='curah' or $data['kemasan_barang'] == 'curah') ? 'selected' : ''; ?> value="curah">Curah</option>
                 <option <?= (old('kemasan_barang') =='vakum' or $data['kemasan_barang'] == 'vakum') ? 'selected' : ''; ?> value="vakum">Vakum</option>
              </select>
            </div>
            <div class="m-1 col-3">
              <label for="expired_barang" class="form-label">Expired Barang</label>
              <select class="form-select" name="expired_barang">
                 <option <?= (old('expired_barang') =='6' or $data['expired_barang'] == '6') ? 'selected' : ''; ?> value="6">6 Bulan</option>
                 <option <?= (old('expired_barang') =='12' or $data['expired_barang'] == '12') ? 'selected' : ''; ?> value="12">12 Bulan</option>
                 <option <?= (old('expired_barang') =='18' or $data['expired_barang'] == '18') ? 'selected' : ''; ?> value="18">18 Bulan</option>
              </select>
            </div>
          </div>
          <div class="my-4">
            <input type="submit" class="btn btn-primary form-control" value="Update Barang">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>