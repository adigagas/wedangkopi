<?php
    session_start();
    include "../koneksi.php";

    if(!isset($_SESSION['admin']) OR empty($_SESSION['admin'])){
        echo "<script>location: 'login.php'</script>";
        exit;
    }

    $jenis = mysqli_query($conn, "SELECT * FROM jenis_produk");
    $opsi = mysqli_query($conn, "SELECT * FROM opsi");

    $result = mysqli_query($conn, "SELECT produk.id_produk, produk.nama_produk, produk.id_jenis, produk.id_opsi, jenis_produk.nama_jenis, opsi.nama_opsi, produk.harga, produk.deskripsi, produk.berat, produk.gambar, produk.stok
    FROM produk, jenis_produk, opsi
    WHERE produk.id_jenis = jenis_produk.id_jenis AND produk.id_opsi = opsi.id_opsi;");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>List Admin</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="css/fontastic.css">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="css/googlefonts.css">
  <!-- jQuery Circle-->
  <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.red.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.ico">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">STOK</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="card" style="width: 7rem; margin-left: 30px; margin-top: 30px">
                        <img class="card-img-top" src="img/produk/1.jpg" alt="Card image cap">
                        <div class="card-body">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <br>
                      <strong>
                        <h5 class="modal-title">PRODUK</h5>
                      </strong>
                      <div class="garis"></div>
                      <br>
                      <h5 class="modal-title">Stok</h5>
                      <input type="number" min="0" max="1000" maxlength="3" name="number" class="" placeholder="...."
                        required autofocus="" onkeypress="return hanyaAngka(event)">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <nav class="side-navbar">
    <div class="side-navbar-wrapper">
      <!-- Sidebar Header    -->
      <div class="sidenav-header d-flex align-items-center justify-content-center">
        <!-- User Info-->
        <div class="sidenav-header-inner text-center"><img src="img/avatar-11.jpg" alt="person" class="img-fluid rounded-circle">
          <h2 class="h5">Admin Web</h2><span>Admin Web</span>
        </div>
        <!-- Small Brand information, appears on minimized sidebar-->
        <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>A</strong><strong
              class="text-primary">D</strong></a></div>
      </div>
      <!-- Sidebar Navigation Menus-->
      <div class="main-menu">
        <h5 class="sidenav-heading">Menu</h5>
        <ul id="side-main-menu" class="side-menu list-unstyled">
          <li><a href="#barang" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>PRODUK
            </a>
            <ul id="barang" class="collapse list-unstyled ">
              <li><a href="tambah_produk.php">+ Tambah</a></li>
              <li><a href="list_produk.php">+ List</a></li>
            </ul> </a>
          </li>
          <li><a href="#artikel" aria-expanded="false" data-toggle="collapse"> <i class="icon-website"></i>ARTIKEL</a>
            <ul id="artikel" class="collapse list-unstyled ">
              <li><a href="tambah_artikel.php">+ Tambah</a></li>
              <li><a href="listartikel.php">+ List</a></li>
            </ul>
          </li>
          <li><a href="#penjualan" aria-expanded="false" data-toggle="collapse"> <i class="icon-check"></i>PENJUALAN</a>
            <ul id="penjualan" class="collapse list-unstyled ">
              <li><a href="list_penjualan.php">+ List</a></li>
            </ul>
          </li>
      </div>
  </nav>
  <div class="page">
    <!-- navbar-->
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-holder d-flex align-items-center justify-content-between">
            <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a
                href="#" class="navbar-brand">
                <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Admin</strong></div>
              </a></div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <!-- Log out-->
              <li class="nav-item"><a href="../functions/logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i
                    class="fa fa-sign-out"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!--form-->
    <br>
    <div class="input-group">
      <div class=" ml-4 mx-4"></div>
      <label class="atur-isi2">Filter Jenis : </label>
      <select name="id_jenis" id="id_jenis" class="" required oninvalid="this.setCustomValidity('Silahkan Pilih')" oninput="setCustomValidity('')">
        <?php while($jenisproduk = mysqli_fetch_array($jenis)):?>
          <option value="<?= $jenisproduk['id_jenis'] ?>"><?= $jenisproduk['nama_jenis'] ?></option>
        <?php endwhile; ?>
      </select>
      <div class="col-md-3">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" id="myInput" type="text" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </div>
    <br>
    <!--Tabel-->
    <div class="garis">
    </div>
    <div class="mx-5">
      <table class="table table-bordered table-striped">
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">GAMBAR</th>
              <th scope="col">NAMA</th>
              <th scope="col">JENIS</th>
              <th scope="col">OPSI</th>
              <th scope="col">HARGA</th>
              <th scope="col">BERAT</th>
              <th scope="col">STOK</th>
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody id="myTable">

            <?php $nomor=1; ?>
            <?php while($produk = mysqli_fetch_array($result)): ?>
              <tr>
                <th scope="row"><?= $nomor ?></th>
                <td>
                  <div class="img" style="width: 5rem;">
                    <img class="card-img-top" src="../uploads/produk/<?= $produk['gambar'] ?>" alt="Card image cap">
                    <div class="card-body">
                    </div>
                  </div>
                </td>
                <td><?= $produk['nama_produk'] ?></td>
                <td><?= $produk['nama_jenis'] ?></td>
                <td><?= $produk['nama_opsi'] ?></td>
                <td><?= $produk['harga'] ?></td>
                <td><?= $produk['berat'] ?></td>
                <td><?= $produk['stok'] ?></td>
                <td>
                  <a href="editproduk.php?id=<?= $produk['id_produk']; ?>"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
                  <a href="#" class="mx-2"><button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                      data-target="#exampleModalCenter">Stok</button></a>
                  <a href="#" class="mr-4"><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
                </td>
              </tr>
            <?php $nomor++; ?>
            <?php endwhile; ?>
            
          </tbody>
    </div>
    </table>
    </table>


    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script>
      function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

          return false;
        return true;
      }
    </script>
    <script>
      $(document).ready(function () {
        $("#myInput").on("keyup", function () {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>

</body>

</html>