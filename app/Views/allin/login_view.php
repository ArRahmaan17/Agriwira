<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    <?= $title ?>
  </title> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    body{
    background-color: rgb(247,248,249);
    }
    .shadow{
      background-color: rgb(230,230,230);
    }
  </style>
</head>

<body>
<div class="container col-xl-11 col-xxl-10 px-2 py-5 h-100">
  <div class="row align-items-center g-lg-5 py-5 border-dark">
    <div class="col-lg-6">
      <img src="<?= base_url('img/sideimage.svg') ?>" alt="Image" class="img-fluid">
    </div>
    <div class="col-md-10 mx-auto col-lg-6 text-center">
      <form action="" method="POST" class="p-2 p-md-4 shadow border rounded-3">
        <img class="mb-3" src="/img/hehe.webp" title="logo Perusahaan" width="100px">
        <?php if (session()->getFlashdata('error')) : ?>
          <div class=" alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php elseif (!session()->getFlashdata('error')) : ?>
          <div class=" alert alert-danger" role="alert" style="display: none;">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif ?>
        <div class="form-floating mb-3 ">
          <input required type="email" value="<?= session()->getFlashdata('email') ?>" name="inputEmail" class="form-control" id="inputEmail" placeholder="example@example.com">
          <label for="inputEmail">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input required type="password" name="inputPassword" class="form-control" id="inputPassword" placeholder="*******">
          <label for="inputPassword">Password</label>
        </div>
        <div class="d-grid">
          <input class="btn btn-white btn-login text-uppercase fw-bold" type="submit" value="Login" name="login">
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html> 