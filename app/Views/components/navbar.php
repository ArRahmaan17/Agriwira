<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
  <div class="container-sm">
    <?php if ($title !== 'Data Pegawai') : ?>
      <form action="" method="get">
        <div class="input-group">
          <input type="text" placeholder="can't do a search on this view" disabled class="form-control text-truncate" autocomplete="off" name="keyword" placeholder="" aria-label="Masukan Keyword pencarian" aria-describedby="button-addon2">
          <button disabled class="btn btn-primary" type="submit" id="button-addon2">Button</button>
        </div>
      </form>
    <?php else : ?>
      <form action="" method="get">
        <div class="input-group">
          <input type="text" class="form-control text-truncate" autocomplete="off" name="keyword" placeholder="<?= $keyword ?>" aria-label="Masukan Keyword pencarian" aria-describedby="button-addon2">
          <button class="btn btn-primary" type="submit">Button</button>
        </div>
      </form>
    <?php endif ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item dropup">
          <span class="nav-link dropdown-toggle drop" href="#" id="admin" data-bs-toggle="dropdown" aria-expanded="false"><?= session()->get('nama_pegawai') ?> </span>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="admin">
            <li>
              <h3 class="dropdown-header">Admin Fitur </h3>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" data-bs-toggle="modal" href="#createModal" role="button">New Pegawai</a></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" href="#updateModal" role="button" onclick="edit(<?= session()->get('id_pegawai') ?>)">Update Profile</a></li>
            <li><a class="dropdown-item" href="/Home/logout">Logout</a></li>
          </ul>
        </li>
        <?php if (false) : ?>
          <li class="nav-item dropup">
            <span class="nav-link dropdown-toggle drop" href="#" id="toggel" data-bs-toggle="dropdown" aria-expanded="true">Pegawai Online</span>
            <div class="dropdown-menu dropdown-menu-dark p-4" id="datapegawaionline" style="max-width: 400px;" aria-labelledby="pegawai">
              <p class="text-truncate">
                Staff Yang Online
              </p>
              <p>
              <ul>
                <?php foreach ($online as $o) : ?>
                  <li>
                    <a class="nav-link" href="/pegawai/show/<?= $o['id'] ?>"><?= $o['nama'] ?></a>
                  </li>
                <?php endforeach ?>
              </ul>
              </p>
            </div>
          </li>
        <?php endif ?>
      </ul>
    </div>
</nav>