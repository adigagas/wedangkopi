<?php
    session_start();
    include "../koneksi.php";

    if(!isset($_SESSION['admin']) OR empty($_SESSION['admin'])){
        echo "<script>location: 'login.php'</script>";
    }

    $jenis = mysqli_query($conn, "SELECT * FROM jenis_produk");
    $opsi = mysqli_query($conn, "SELECT * FROM opsi");


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
  <script src="js/previewuploads.js"></script>
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
    <form methode="post">
      <div class="row ml-4">
        <div class="barang-form col-md-4 mt-4">
          <div class="input-group">
            <label class="tata-nama">NAMA : </label>
            <input type="text" name="nama_produk" class="form-control" placeholder="Nama" required autofocus="" maxlength="35">
          </div>
          <br>
          <div class="input-group">
            <label class="tata-jenis">JENIS : </label>
            <select name="id_jenis" id="id_jenis" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Pilih')"
              oninput="setCustomValidity('')">
              <?php
                while($jenisproduk = mysqli_fetch_assoc($jenis)){
                    echo "<option value='".$jenisproduk['id_jenis']."'>".$jenisproduk['nama_jenis']."</option>";
                }
              ?>
            </select>
          </div>
          <br>
          <div class="input-group">
            <label class="tata-opsi">OPSI : </label>
            <select name="id_opsi" id="id_opsi" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Pilih')"
              oninput="setCustomValidity('')">
              <?php
                while($opsiproduk = mysqli_fetch_assoc($opsi)){
                    echo "<option value='".$opsiproduk['id_opsi']."'>".$opsiproduk['nama_opsi']."</option>";
                }
              ?>
             
            </select>
          </div>
          <br>
          <div class="input-group">
            <label class="tata-harga">HARGA : </label>
            <button><a class="portfolio-link" href="#fg" data-toggle="modal" data-dismiss="modal">Rp.</a></button><input
              type="number" name="harga" class="form-control" placeholder="Harga" required autofocus="" onkeypress="return hanyaAngka(event)"
              maxlength="6">
          </div>
          <br>
          <div class="input-group">
            <label class="tata-diskon">Diskon : </label>
            <button><a class="portfolio-link" href="#fg" data-toggle="modal" data-dismiss="modal">Rp.</a></button><input
              type="number" name="discount" class="form-control" placeholder="Diskon" required autofocus="" onkeypress="return hanyaAngka(event)"
              maxlength="6">
          </div>
          <br>
          <div class="input-group">
            <label class="tata-stok">STOK : </label>
            <div class="barang-form col-md-3 mt-6">
              <input type="number" name="stok" class="form-control" placeholder="Stok" required autofocus="" onkeypress="return hanyaAngka(event)"
                maxlength="2">
            </div>
          </div>
          <br>
          <div class="input-group">
            <label class="tata-stok">BERAT:</label>
            <div class="barang-form col-md-3 mt-6">
              <input type="number" name="berat" class="form-control" placeholder="berat" required autofocus="" onkeypress="return hanyaAngka(event)"
                maxlength="2">
            </div>
          </div>
          <br>
          <div class="input-group">
            <label class="tata-desk">DESKRIPSI : </label>
            <textarea name="deskripsi" class="form-control" arial-label="with textarea"></textarea>
          </div>
        </div>
        <div class="col-md-4 ml-3 mt-4">
          <img class="mb-5" id="preview" src="" alt="" width="300px"/><br>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <label class="tata-gbr">GAMBAR </label>
            <input type="file" name="gambar" onchange="tampilkanPreview(this,'preview')">
          </div>
        </div>
      </div>

      <br>
      <div class="button-simpan">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>

    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['submit'])) {
    
    $nama_produk = $_POST['nama_produk'];
    $id_jenis = $_POST['id_jenis'];
    $id_opsi = $_POST['id_opsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $berat = $_POST['berat'];
    $discount = $_POST['discount'];
    $deskripsi = $_POST['deskripsi'];

    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './uploads/';

    move_uploaded_file($source, $folder.$nama_file);
                                                
    // Insert user data into table
    $insert = mysqli_query($conn, "INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_jenis`, `id_opsi`, `berat`, `harga`, `discount`, `deskripsi`, `gambar`, `stok`) VALUES (NULL, '$nama_produk', '$id_jenis', '$id_opsi', '$berat', '$harga', '$discount', '$deskripsi', '$nama_file', '$stok');");
                                        
    // Show message when user added
    if($insert){
        echo 'Berhasil upload' ;
    }else{
        echo 'Gagal Upload';
    }	

    var_dump($_POST);
    var_dump($_FILES);
    
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