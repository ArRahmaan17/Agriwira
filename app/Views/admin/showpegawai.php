<?= $this->extend('allin/templates'); ?>
<?= $this->section('content'); ?>
<?= $this->include('navbar'); ?>
<div class="container col-xxl-8 px-4 py-5 ">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <?php if ($data['foto'] == null) : ?>
        <img src="<?= base_url('') ?>/img/avatardefault.png" class="d-block mx-lg-auto sticky img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="eager">
      <?php else : ?>
        <img src="<?= base_url('') ?>/img/<?= $data['foto'] ?>" class="d-block mx-lg-auto sticky img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="eager">
      <?php endif ?>
    </div>
    <div class="col-lg-6 p-4">
      <table class="table table-dark align-middle">
        <thead>
          <tr>
            <th colspan="3" scope="col">Data Pegawai</th>
          </tr>
        </thead>
        <tbody>
          <tr class="py-3">
            <td scope="col">Nama</td>
            <td scope="col">:</td>
            <td scope="col"><?= $data['nama'] ?></td>
          </tr>
          <tr class="py-3">
            <td scope="col">Email</td>
            <td scope="col">:</td>
            <td scope="col"><?= $data['email'] ?></td>
          </tr>
          <tr class="py-3">
            <td scope="col">Bidang</td>
            <td scope="col">:</td>
            <td scope="col"><?= $data['bidang'] ?></td>
          </tr>
          <tr class="py-3">
            <td scope="col">Alamat</td>
            <td scope="col">:</td>
            <td scope="col"><?= $data['alamat'] ?></td>
          </tr>
          <tr class="py-3">
            <td scope="col">Jenis Kelamin</td>
            <td scope="col">:</td>
            <td scope="col"><?= $data['jeniskelamin'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>