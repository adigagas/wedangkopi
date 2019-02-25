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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="robots" content="all,follow">
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
    <!--nav-->
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
        <br>
        <div class="input-group">
            <div class=" ml-5"></div>
            <label class="filter"> Filter: </label>
            <select name="JENIS" id="JENIS" class="#" required oninvalid="this.setCustomValidity('Silahkan Pilih')"
                oninput="setCustomValidity('')">
                <option value="">-Status-</option>
                <option value="">belum bayar</option>
                <option value="">sudah bayar</option>
            </select>
            <div class="col-md-3">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" id="myInput" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
        <br>
        <!--tabel-->
        <div class="garis">
        </div>
        <div class="mx-5">
            <table class="table table-bordered table-striped">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">NO NOTA</th>
                            <th scope="col">NAMA PEMBELI</th>
                            <th scope="col">TANGGAL</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <br>
                        <tr>
                            <th scope="row">170111</th>

                            <td>aji</td>
                            <td>9 desember 2018</td>
                            <td>belum bayar</td>
                            <td>
                                <a href="detail_status.html"><button type="button" class="btn btn-primary btn-sm">Detail</button></a>

                            </td>
                        </tr>

                        <tr>
                            <th scope="row">170222</th>

                            <td>gagas</td>
                            <td>10 desember 2018</td>
                            <td>sudah bayar</td>
                            <td>
                                <a href="detail_status.html"><button type="button" class="btn btn-primary btn-sm">Detail</button></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>

                            <td>kopi aceh</td>
                            <td>gayo</td>
                            <td>kopi bubuk</td>
                            <td>
                                <a href="detail_status.html"><button type="button" class="btn btn-primary btn-sm">Detail</button></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>

                            <td>kopi aceh</td>
                            <td>gayo</td>
                            <td>kopi bubuk</td>
                            <td>
                                <a href="detail_status.html"><button type="button" class="btn btn-primary btn-sm">Detail</button></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>

                            <td>kopi aceh</td>
                            <td>gayo</td>
                            <td>kopi bubuk</td>
                            <td>
                                <a href="detail_status.html"><button type="button" class="btn btn-primary btn-sm">Detail</button></a>
                            </td>
                        </tr>
                    </tbody>
        </div>
        </table>
        </table>
        <br>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-5">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
        <br>

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