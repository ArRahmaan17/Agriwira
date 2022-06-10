<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    <?= $title ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('/assets/css/nucleo-icons.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('/assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url('/assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('/assets/css/argon-dashboard.css'); ?>" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    body {
      background-color: rgb(175,179,176);
    }
    .hiasan{
      background-color: rgb(108,99,254);
    }
  </style>
</head>

<body class="g-sidenav-show bg-gray-100">
  <div  class="min-height-300 position-absolute w-100 hiasan"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="<?= base_url('/admindashboard') ?>">
        <img src="<?= base_url('/assets/img/logo-ct-dark.png') ?>" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold"><?= $title ?></span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= ($title == 'Admin Dashboard') ? 'active' : '';  ?>" href="<?= base_url('/admindashboard') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($title == 'Order Offline') ? 'active' : '';  ?> " href="<?= base_url('/orderoffline') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Order Offline</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($title == 'Barang Masuk') ? 'active' : '';  ?> " href="<?= base_url('/barangmasuk') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Barang Masuk</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($title == 'Manage Barang') ? 'active' : '';  ?> " href="<?= base_url('/listbarang') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-book-bookmark text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Semua Barang</span>
          </a>
        </li>
        <li class="nav-item">
          <a target="_blank" class="nav-link <?= ($title == 'Laporan') ? 'active' : '';  ?>" href="<?= base_url() ?>/laporan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-books text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Laporan Bulanan</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
          <ul class="navbar-nav">
            <li class="nav-item d-flex align-items-center text-white">
              <i class="fa fa-clock me-sm-1 d-sm-inline d-none"></i>
              <span id="jamserver" class="d-sm-inline font-weight-bold d-none"></span>
            </li>
            <li class="nav-item d-flex ps-3 align-items-center">
              <a class="nav-link text-white font-weight-bold px-0" data-bs-toggle="offcanvas" href="#akunControl" role="button" aria-controls="offcanvasExample">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none" >Hallo, <?= session()->get('nama_pegawai') ?></span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <!-- <li class="nav-item px-3 d-flex align-items-center">
              <div class="form-check form-switch ps-0 ms-auto my-auto">
                <input class="form-check-input mt-1 ms-auto" type="checkbox" onclick="darkMode(this)" id="dark-version">
              </div>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- end navbar -->
    <div class="alert alert-success container sukses" role="alert" style="display: none;">
    </div>
    <div class="alert alert-danger container error" role="alert" style="display: none;">
    </div>
    <div class="container-fluid">
      <?= $this->renderSection('content'); ?>
    </div>
    <!--end Render Section -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="akunControl" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Control Akun</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-flex" href="<?= base_url('/admindashboard') ?>">
                <span class="nav-link-text mt-1">Edit Profile</span>
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center  justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                  </svg>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex" href="<?= base_url('/logout') ?>">
                <span class="nav-link-text mt-1">Logout</span>
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                  </svg>
                </div>
              </a>
            </li>
          </ul>
          <hr>
          <div class="mt-3">
            <h5>Pegawai Online</h5>
            <div class="list-group">
              <?php $no = 0;  ?>
              <?php foreach ($online as $o) : ?>
                <?php $no++; ?>
                <div class="list-group-item col-10 text-start shadow-sm font-weight-bold row d-flex">
                  <?= $no  ?>
                  <div class="col"> <?=$o['nama_pegawai']?></div> <div class="badge badge-sm bg-gradient-success col py-2 text-center">Online</div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end Control Akun -->
    <footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://github.com/ArRahmaan17/" target="_blank" class="font-weight-bold">MAMAN</a>
              for a better Company.
            </div>
          </div>
        </div>
      </div>
    </footer>
  </main>
  <script src="<?= base_url('/assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('/assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('/assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('/assets/js/plugins/chartjs.min.js') ?>"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="<?= base_url('/assets/js/argon-dashboard.min.js?v=2.0.2') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      setInterval(timestamp, 1000);
      function timestamp() {
      $.ajax({
        url: '<?= base_url('Admin/jam') ?>',
        success: function(data) {
          $('#jamserver').html(data);
        }
      });
    }
    function prosesselesai($id) {
      $.ajax({
        url: "<?= base_url('Admin/prosesselesai') ?>/" + $id,
        type: "POST",
        data: {
          'id': $id
        },
        success: function(hasil) {
          $hasilobj = $.parseJSON(hasil);
          if ($hasilobj.status == true) {
            $('.error').hide();
            $('.alert-success').html($hasilobj.pesan);
            $('.sukses').show();
            window.location = "<?= current_url() ?>";
          } else {
            $('.sukses').hide();
            $('.alert-danger').html($hasilobj.pesan);
            $('.error').show();
          }
        }
      });
    }

    function prosespesanan($id) {
      $.ajax({
        url: "<?= base_url('Admin/prosespesanan') ?>/" + $id,
        type: "POST",
        data: {
          'id_pesanan': $id
        },
        success: function(hasil) {
          $hasilobj = $.parseJSON(hasil);
          if ($hasilobj.status == true) {
            $('.error').hide();
            $('.alert-success').html($hasilobj.pesan);
            $('.sukses').show();
            window.location = "<?= current_url() ?>";
          } else {
            $('.sukses').hide();
            $('.alert-danger').html($hasilobj.pesan);
            $('.error').show();
          }
        }
      });
    }

    $('.tombol-tutup').on('click', function() {
      if ($('.sukses').is('visible')) {
        window.location.href = "<?= current_url() . "?" . $_SERVER['QUERY_STRING']  ?>";
      }
      $('.alert').hide();
      bersihkan();
    })

    function hapus($id) {
      var result = confirm("Yakin Mau Hapus data dengan ID = " + $id);
      if (result) {
        window.location = "<?= base_url('Pegawai/hapus') ?>/" + $id
      }
    }

    function edit($id) {
      $.ajax({
        url: "<?= base_url('Pegawai/edit') ?>/" + $id,
        type: "GET",
        success: function(hasil) {
          var $hasilobj = $.parseJSON(hasil);
          if ($hasilobj.id != null) {
            $('#inputId').val($hasilobj.id);
            $('#inputNama').val($hasilobj.nama);
            $('#inputEmail').val($hasilobj.email);
            $('#inputPassword').val($hasilobj.password);
            $('#inputPasswordcf').val($hasilobj.password);
            $('#inputBidang').val($hasilobj.bidang);
            $('#inputAlamat').val($hasilobj.alamat);
            $('#inputJk').val($hasilobj.jeniskelamin);
            $('#inputRole').val($hasilobj.role);
          }
        }
      });
    }

    function bersihkan() {
      $('#inputId').val('');
      $('#inputNama').val('');
      $('#inputEmail').val('');
      $('#inputUsername').val('');
      $('#inputPassword').val('');
      $('#inputPasswordcf').val('');
      $('#inputFoto').attr("src", "");
      $('#inputAlamat').val('');
    }

    $('#tombolUpdate').on('click', function() {
      var $id = $('#inputId').val();
      var $nama = $('#inputNama').val();
      var $email = $('#inputEmail').val();
      var $password = $('#inputPassword').val();
      var $cfpassword = $('#inputPasswordcf').val();
      var $bidang = $('#inputBidang').val();
      var $alamat = $('#inputAlamat').val();
      var $jeniskelamin = $('#inputJk').val();
      var $role = $('#inputRole').val();

      if ($password == $cfpassword) {
        $.ajax({
          url: "<?= base_url('Pegawai/update') ?>",
          type: "POST",
          data: {
            'id': $id,
            'nama': $nama,
            'email': $email,
            'password': $password,
            'cfpassword': $cfpassword,
            'bidang': $bidang,
            'alamat': $alamat,
            'jeniskelamin': $jeniskelamin,
            'role': $role
          },
          success: function(hasil) {
            $hasilobj = $.parseJSON(hasil);
            if ($hasilobj.status == true) {
              $('.error').hide();
              $('.sukses').html($hasilobj.pesan);
              $('.sukses').show();
              bersihkan();
              window.location = "<?= base_url() ?>";
            } else {
              $('.sukses').hide();
              $('.error').html($hasilobj.pesan);
              $('.error').show();
            }
          }
        });
      } else {
        $('.sukses').hide();
        $('.error').html("Password dan confirm Password Tidak Sama");
        $('.error').show();
      }
    });

    $('#tombolSimpan').on('click', function() {
      var $nama = $('#inputNama').val();
      var $email = $('#inputEmail').val();
      var $password = $('#inputPassword').val();
      var $cfpassword = $('#inputPasswordcf').val();
      var $bidang = $('#inputBidang').val();
      var $alamat = $('#inputAlamat').val();
      var $jeniskelamin = $('#inputJk').val();
      var $role = $('#inputRole').val();
      if ($password == $cfpassword) {
        $.ajax({
          url: "<?= base_url('Pegawai/simpan') ?>",
          type: "POST",
          data: {
            'nama': $nama,
            'email': $email,
            'password': $password,
            'cfpassword': $cfpassword,
            'bidang': $bidang,
            'alamat': $alamat,
            'jeniskelamin': $jeniskelamin,
            'role': $role
          },
          success: function(hasil) {
            $hasilobj = $.parseJSON(hasil);
            if ($hasilobj.status == true) {
              $('.error').hide();
              $('.sukses').html($hasilobj.pesan);
              $('.sukses').show();
              bersihkan();
              window.location = "<?= base_url() ?>";
            } else {
              $('.sukses').hide();
              $('.error').html($hasilobj.pesan);
              $('.error').show();
            }
          }
        });
      } else {
        $('.sukses').hide();
        $('.error').html("Password dan confirm Password Tidak Sama");
        $('.error').show();
      }
    });
    });

    

    $(document).ready(function(){
      $("footer a.font-weight-bold").html("<a href='https://github.com/ArRahmaan17/' target='_blank' class='font-weight-bold'>Rahmaan17</a>")
    });
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    var ctx1 = document.getElementById("chart-line").getContext("2d");
    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>


</body>

</html>