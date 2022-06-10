<?= $this->extend('allin/templates'); ?>
<?= $this->section('content'); ?>
<div class="row mt-4">
  <div class="col-xl-12 col-md-12">
    <div class="card mb-1">
      <div class="card-header pb-0">
        <h5 class="d-inline-block">Managemen Barang</h5>
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
      	<div class="row">
      		<?php foreach ($barang as $b) : ?>
      			<div class="col-sm-6 col-md-4 col-lg-3 my-1">
		        	<div class="card">
		        		<div class="card-header text-capitalize">
		        			<?= $b['nama_barang'] ?>
		        		</div>
  						<div class="card-body ">
  						    <p class="card-text">Lorem ipsum dolor sit amet, consectetur</p>
  						    <ul class="list-group mb-2">
  							    <li class="list-group-item">Dimensi :<?= $b['dimensi_barang'] ?></li>
  							    <li class="list-group-item">Kemasan :<?= $b['kemasan_barang'] ?></li>
  							    <li class="list-group-item">Expired :<?= $b['expired_barang'] ?> Bulan</li>
  							</ul>
  						    <a href="<?= base_url() ?>/listbarang/editbarang/<?= $b['id_barang'] ?>" class="btn btn-success form-control">Edit <?= $b['nama_barang'] ?></a>
  						</div>
            </div>
				  </div>
		    <?php endforeach ?>
      	</div>
       </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>