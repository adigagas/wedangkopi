<?php
    session_start();
    include "../koneksi.php";

    if(!isset($_SESSION['admin']) OR empty($_SESSION['admin'])){
        echo "<script>location: 'login.php'</script>";
    }

    $jenis = mysqli_query($conn, "SELECT * FROM jenis_produk");
    $opsi = mysqli_query($conn, "SELECT * FROM opsi");
    $kategori = mysqli_query($conn, "SELECT * FROM kategori");


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Menu Admin</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <script src="../ckeditor/full/ckeditor.js"></script>
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
  <!-- Side Navbar -->
  <nav class="side-navbar">
    <div class="side-navbar-wrapper">
      <!-- Sidebar Header    -->
      <div class="sidenav-header d-flex align-items-center justify-content-center">
        <!-- User Info-->
        <div class="sidenav-header-inner text-center"><img src="img/avatar-11.jpg" alt="person" class="img-fluid rounded-circle">
          <h2 class="h5">Admin web</h2><span>Admin web</span>
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
              <li><a href="listartikel.php">+ Edit</a></li>
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
                href="index.html" class="navbar-brand">
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
    <form>
      <div class="row ml-5">
        <div class="barang-form col-md-4 mt-4">

          <div class="input-group">
            <label class="atur-isi">JUDUL : </label>
            <input type="text" name="judul_artikel" class="form-control" placeholder="Judul" required autofocus="" maxlength="35">
          </div>
          <br>

          <div class="input-group">
            <label class="atur-isi">KATEGORI : </label>
            <select name="ia_kategori" id="">
              <?php while($kat = mysqli_fetch_array($kategori)): ?>
                <!-- <input type="text" name="id_kategori" class="form-control" placeholder="Judul" required autofocus="" maxlength="35"> -->
                <option value="<?= $kat['id_kategori']; ?>"><?= $kat['nama_kategori']; ?></option><>
              <?php endwhile; ?>
            </select>
          </div>
          <br>

        </div>
      </div>
      
      <div class="row ml-5">
        <div class="col-md">
          <div class="input-group">
            <label class="atur-isi2">ISI ARTIKEL : </label>
            <textarea class="ckeditor" id="ckedtor" name="isi_artikel"></textarea>
          </div>
        </div>
      </div>
      <br>
      <div class="row text-right">
        <div class="col-md-10">
          <button type="submit" class="btn btn-primary" name="submit">POST</button>
        </div>
      </div>
      
    </form>

    <?php
      if(isset($_POST['submit'])){
        $tgl = time("Y-m-d");
        $judul = $_POST['judul_artikel'];
        $id_artikel = $_POST['id_kategori'];
        $isi_artikel = $_POST['isi_artikel'];
        $id_admin = $_SESSION['admin']['id_admin'];

        echo $id_admin;

      }
    ?>

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
</body>

</html>