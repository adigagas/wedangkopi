<?php
    session_start();
    include "koneksi.php";

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
    <title>List Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!--panggil jquery-->
    <script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
    <!--panggil css-->
    <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
    <!---selector-->
    <script type="text/javascript">
        $(document).ready(function () {
            $(".perbesar").fancybox();
        });
    </script>
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
                    <li><a href="#barang" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>PRODUK</a>
                        <ul id="barang" class="collapse list-unstyled ">
                            <li><a href="tambah_produk.php">+ Tambah</a></li>
                            <li><a href="list_produk.php">+ List</a></li>
                        </ul> </a>
                    </li>
                    <li><a href="#artikel" aria-expanded="false" data-toggle="collapse"> <i class="icon-website"></i>ARTIKEL</a>
                        <ul id="artikel" class="collapse list-unstyled ">
                            <li><a href="tambah_artikel.php">+ Post</a></li>
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
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="bukti-verivikasi" tabindex="-1" role="dialog" aria-labelledby="bukti-verivikasiLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="img/bukti/bukti1.jpg" width="100%" />
                </div>
            </div>
        </div>
    </div>
    <div class="page">
        <!-- navbar-->
        <header class="header">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                        <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars">
                                </i></a><a href="index.html" class="navbar-brand">
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
        <div class="row ml-4">
            <div class="barang-form col-md-4 mt-4">
                <div class="input-group">
                    <label class="nota">NOTA : </label>
                    <input type="text" name="nota" class="form-control" placeholder="Nomor Nota" required autofocus=""
                        maxlength="10">
                </div>
                <br>
                <div class="input-group">
                    <label class="nama-pelanggan">NAMA PELANGGAN : </label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Pelanggan" required autofocus=""
                        maxlength="10">
                </div>
            </div>
        </div>
        <br>
        <div class="garis"></div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="ukuran-dg">
                        <img class="card-img-top" src="img/produk/png1.png" alt="Card image cap">
                        <div class="card-body">
                        </div>
                    </div>
                </div>

                <div class="col-sm-7" class="batas-dg">
                    <br>
                    <h4> Java </h4>
                    <button type="button" class="btn btn-secondary btn-sm" disabled="">Ukuran 200gr</button>
                    <button type="button" class="btn btn-secondary btn-sm" disabled="">Jumlah 1</button>
                    <b class="rata-kanan">Rp. 180.000</b>
                    <div class="garis-grey">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ukuran-dg">
                        <img class="card-img-top" src="img/produk/png2.png" alt="Card image cap">
                        <div class="card-body">
                        </div>
                    </div>
                </div>

                <div class="col-md-7" class="batas-dg">
                    <br>
                    <h4> Flores </h4>
                    <button type="button" class="btn btn-secondary btn-sm" disabled="">Ukuran 200gr</button>
                    <button type="button" class="btn btn-secondary btn-sm" disabled="">Jumlah 1</button>
                    <b class="rata-kanan">Rp. 180.000</b>
                    <div class="garis-grey">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white">
            <b style="font-size:24px" class="geser">Sub Total</b><b style="font-size:24px" class="geser4">Rp.</b><b
                style="font-size:24px" class="geser3">360.000</b>
        </div>
        <div class="bg-secondary">
            <b style="font-size:24px" class="geser">Biaya Kirim</b><b style="font-size:24px" class="geser5">Rp.</b><b
                style="font-size:24px" class="geser8">40.000</b>
        </div>
        <div class="bg-warning">
            <b style="font-size:30px" class="geser">Grand Total</b><b style="font-size:30px" class="geser6">Rp.</b><b
                style="font-size:24px" class="geser7">360.000</b>
        </div>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="" class="ukuran-dg">
                        <a href="img/bukti/bukti1.jpg" data-toggle="modal" data-target="#bukti-verivikasi">
                            <img src="img/bukti/bukti1.jpg" width="100" />
                        </a>
                    </div>
                </div>

                <div class="col-sm-7" class="batas-dg">
                    <br>
                    <h4>Nama: Gagas</h4>
                    <h4>Bank: Mandiri</h4>
                    <h4>Total: Rp. 320.000</h4>
                </div>
            </div>
            <div class="geser2">
                <button type="submit" class="btn btn-warning btn-lg">Terima</button>
                <button type="submit" class="btn btn-success btn-lg">Tolak</button>
                <button type="button" class="btn btn-danger btn-lg">Close</button>
            </div>
        </div>
    </div>
</body>

</html>


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