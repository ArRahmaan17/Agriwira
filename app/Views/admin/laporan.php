<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container-lg pt-5">
    <div class="table-responsive">
      <table class="table table-bordered border-primary text-center align-middle">
        <thead>
          <tr>
            <th>Nomer</th>
            <th scope="col">Nama Pelanggan</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Deskripsi Barang</th>
            <th scope="col">Foto Proses</th>
            <th scope="col">Foto Selesai</th>
            <th scope="col">Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomer = 0 ?>
          <?php foreach ($data as $l) : ?>
            <?php $nomer++ ?>
            <tr>
              <td><?= $nomer ?></td>
              <td><?= $l['nama_pelanggan'] ?></td>
              <td><?= $l['nama_barang'] ?></td>
              <td class="col-3"><?= $l['deskripsi_barang'] ?></td>
              <td><?= ($l['fotoproses'] == null) ? 'Belum Memiliki Bukti Proses' : "<img width='75px' src=".$l['fotoproses'].">" ; ?></td></td>
              <td><?= ($l['fotoselesai'] == null) ? 'Belum Memiliki Bukti Selesai' : "<img width='75px' src=".$l['fotoselesai'].">" ; ?></td>
              <td class="col-3">Tanggal Pesan: <?= $l['tanggalpesan'] ?><br>Tanggal Selesai:<?= ($l['tanggalselesai'] == '0000-00-00') ? 'Belum Selesai' : $l['tanggalselesai'] ; ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
