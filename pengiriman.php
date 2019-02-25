<?php
	session_start();
	include 'koneksi.php';
	include 'functions/indexcart.php';
	include 'functions/cek-berat.php'
	// include 'functions/rajaongkir.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Store Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<body style="margin-top: 150px">
		
	<!-- <div class="colorlib-loader"></div> -->

	<div id="page">
		<nav class="colorlib-nav fixed-top bg-light" role="navigation" style="background :whitesmoke">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.php"><small><img src="uploads/img/seneng-ngopi-color.png" alt="" width="80%"></small></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li class="has-dropdown">
									<a href="produk.php">Produk</a>
									<ul class="dropdown">
										<li><a href="produk.php">All Produk</a></li>
										<li><a href="produk.php?kategori=origin">Origin</a></li>
										<li><a href="produk.php?kategori=coffee">Coffee</a></li>
										<li><a href="produk.php?kategori=equipment">Equipment</a></li>
										<li><a href="produk.php?kategori=merchandise">Merchandise</a></li>
									</ul>
								</li>
								<li><a href="artikel.php">Artikel</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="contact.php">Pembelian</a></li>
								<li class="active"><a href="cart.php"><i class="icon-shopping-cart"></i>Cart [<?= $indexcart; ?>]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Keranjang Belanja</h3>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3>Pengiriman</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Checkout Finish</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<form method="post" class="colorlib-form">
							<h2>Billing Details</h2>
							<div class="row">
								
								<div class="col-md-12">
									<div class="form-group">
										<label for="no_hp">No. HP</label>
										<input type="text" onkeypress="return hanyaAngka(event)" id="towncity" class="form-control" placeholder="No HP" name="no_hp" maxlength="13">
										<label for="email">Email</label>
										<input type="email" id="towncity" class="form-control" placeholder="Email" name="email">
										<label for="nama_plg">Nama Lengkap</label>
										<input type="text" id="towncity" class="form-control" placeholder="Nama Lengkap" name="nama_plg">
										<label for="alamat">Alamat Lengkap</label>
										<input type="textarea" class="form-control" placeholder="Alamat Lengkap" name="alamat">
										<label for="kode_pos">Kode Pos</label>
										<input type="text" onkeypress="return hanyaAngka(event)" id="towncity" class="form-control" placeholder="Kode POS" name="kode_pos" maxlength="13">
										<!-- <label for="companyname">No. HP</label>
										<input type="text" id="towncity" class="form-control" placeholder="Town or City"> -->
									</div>
								</div>
								<div class="form-group">
									<!-- <div class="col-md-6">
										<label for="proivinsi">Asal Kota</label>
										<input class="disable" type="text" id="fname" class="form-control" value="<?= $dataasal['rajaongkir']['results'][85]['city_id'] ?>">
										
									</div> -->
									<?php include 'functions/kab.php'; ?>
									<!-- <div class="col-md-6">
										<label for="lname">Provinsi</label>
										<input type="text" id="zippostalcode" class="form-control" placeholder="Zip / Postal">
									</div> -->
									<div class="col-md-6">
										<label>Kurir</label><br>
										<select class="form-control" id="kurir" name="kurir">
											<option value="jne">JNE</option>
										</select>
									</div>
									
								</div>
								<div class="form-group">
									<?php include 'functions/provinsi.php'; ?>
									<div class="col-md-6">
										<label for="kabupaten">Kabupaten</label>
										<!-- <input type="text" id="kabupaten" class="form-control" placeholder="State Province"> -->
										<select class="form-control" name="kabupaten" id="kabupaten">
											<option>Pilih Kab/Kota</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-6">
										<label for="berat">Berat</label>
										<input id="berat" type="text" name="berat" readonly value="<?= $totalberat; ?>" class="form-control">
									</div>
									<div class="col-md-6 col-md-push-3">
										<!-- <label for="kabupaten">Kabupaten</label> -->
										<!-- <input type="text" id="kabupaten" class="form-control" placeholder="State Province"> -->
										<!-- <br><br> -->
										<button class="btn btn-warning" id="cek" type="submit" value="Cek" name="cekout">CHECKOUT</button>
									</div>
								</div>
		             	    </div>
						</form>
						<?php
							if(isset($_POST['cekout'])){
								$no_tlp = $_POST['no_tlp'];
								$email = $_POST['email'];
								$nama_plg = $_POST['nama_plg'];
								$alamat = $_POST['alamat'];
								$kode_pos = $_POST['kode_pos'];
								$provisi = $_POST['provinsi'];
								$kabupaten = $_POST['kabupaten'];

								$insert_plg = mysqli_query($conn, "INSERT INTO `pelanggan` (`id_plg`, `no_tlp`, `email`, `nama_plg`, `provinsi`, `kota`, `kode_pos`, `alamat`) VALUES ('', '$no_tlp', '$email', $nama_plg, '$provisi', '$kabupaten', '$kode_pos', '$alamat');");

								if($insert_plg){
									$id_plg = mysqli_insert_id($conn);

									$insert_trans_jual = mysqli_query($conn, "INSERT INTO `trans_penjualan` (`no_trans_jual`, `kode_trans`, `id_plg`, `nama_plg`, `tgl_trans_jual`, `subtotal`, `ongkir`, `grandtotal`, `id_status`) VALUES (NULL, 'abcabc', '1', 'gagas', '2018-12-21', '0', '7000', '7000', '1');");
								}
							}
						?>
					</div>
				
				</div>
			</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>About Store</h4>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Returns/Exchange</a></li>
								<li><a href="#">Gift Voucher</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-2">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col-md-3">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="#">yoursite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							
							<span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart2" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<!-- ongkir -->
	<script src="js/ongkir.js"></script>
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

