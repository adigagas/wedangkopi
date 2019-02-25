<?php
	session_start();
	include 'koneksi.php';
	include 'functions/indexcart.php';

	$id_produk = $_GET['id'];

	$qproduk = mysqli_query($conn, "SELECT produk.id_produk, produk.nama_produk, produk.id_jenis, produk.id_opsi, jenis_produk.nama_jenis, opsi.nama_opsi, produk.harga, produk.deskripsi, produk.gambar, produk.stok
	FROM produk, jenis_produk, opsi
	WHERE produk.id_jenis = jenis_produk.id_jenis AND produk.id_opsi = opsi.id_opsi AND id_produk = $id_produk");

	$detproduk = mysqli_fetch_assoc($qproduk);
	$id_jenis = $detproduk['id_jenis'];

	$qproduk_sejenis = mysqli_query($conn, "SELECT produk.id_produk, produk.nama_produk, produk.id_jenis, produk.id_opsi, jenis_produk.nama_jenis, opsi.nama_opsi, produk.harga, produk.deskripsi, produk.gambar, produk.stok
	FROM produk, jenis_produk, opsi
	WHERE produk.id_jenis = jenis_produk.id_jenis AND produk.id_opsi = opsi.id_opsi AND produk.id_jenis = $id_jenis ORDER BY RAND() LIMIT 4");

	$min = 0;
	if($stok=$detproduk['stok'] > 0){
		$min = 1;
	};
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
	<body style="margin-top: 95px">
		
	<div class="colorlib-loader"></div>

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
								<li class="has-dropdown active">
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
								<li><a href="cart.php"><i class="icon-shopping-cart"></i>Cart [<?= $indexcart?>]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="colorlib-shop bg-white">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<br>
							<div class="row mt-5">
								<div class="col-md-5">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(uploads/produk/<?= $detproduk['gambar']; ?>);">
											<!-- <p class="tag"><span class="sale">Sale</span></p> -->
										</div>
									</div>
								</div>
								<div class="col-md-7">
									<div class="desc">
										<h3><?= $detproduk['nama_produk']." ".$detproduk['nama_opsi']; ?></h3>
										<p class="price">
											<span>Rp. <?= $detproduk['harga']; ?></span> 
											<span class="rate text-right">
												<i class="icon-star-full"></i>
												<i class="icon-star-full"></i>
												<i class="icon-star-full"></i>
												<i class="icon-star-full"></i>
												<i class="icon-star-empty"></i>
												(74 Rating)
											</span>
										</p>
										<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
										<div class="row row-pb-sm">
									<!-- <div class="col-md-4">
										<div class="input-group">
											<span class="input-group-btn">
											<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
											<i class="icon-minus2"></i>
											</button>
											</span>
											<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="">
											<span class="input-group-btn">
											<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
												<i class="icon-plus2"></i>
											</button>
											</span>
										</div>
                        			</div> -->
									</div>
										<form action="" method="post">
											<div class="form-group">
												<div class="input-group">
													<input class="form-control shadow" type="number" min="<?= $min ?>" max="<?= $detproduk['stok'] ?>" value="<?= $min ?>" name="jumlah">
													<div class="input-group-btn">
														<?php if($stok=$detproduk['stok'] > 0): ?>
															<button class="btn btn-primary btn-addtocart shadow" name="beli"><i class="icon-shopping-cart"></i></button>
														<?php else: ?>
															<a class="btn btn-warning btn-addtocart" disabled><i class="icon-shopping-cart"></i></a>
														<?php endif; ?>	
													</div>
												</div>
											</div>												
										</form>	
										<?php
											if(isset($_POST['beli'])){
												$jumlah = $_POST['jumlah'];

												if(isset($_SESSION['keranjang'][$id_produk]))
												{
													$_SESSION['keranjang'][$id_produk] += $jumlah;;
												}
												//jk belum ada produk
												else{
													$_SESSION['keranjang'][$id_produk] = $jumlah;;
												}

												

												echo "<script>alert('Produk telah ditambahkan ke Cart')</script>";
											};
										?>													
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-12 tabulation">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#deskripsi">deskripsi</a></li>
									<li><a data-toggle="tab" href="#spesifikasi">spesifikasi</a></li>
									<li><a data-toggle="tab" href="#review">Reviews</a></li>
								</ul>
								<div class="tab-content">
									<div id="deskripsi" class="tab-pane fade in active">
										<?= $detproduk['deskripsi']; ?>
						         </div>
						         <div id="spesifikasi" class="tab-pane fade">
						         	<ul>
										 <li>Nama : <?=  $detproduk['nama_produk']; ?></li>
										 <li>Jenis : <?=  $detproduk['nama_jenis']; ?></li>
										 <li>Opsi : <?=  $detproduk['nama_opsi']; ?></li>
									</ul>  
									<h4><strong>Stok : <?= $detproduk['stok']; ?></strong></h4>
								   </div>
								   <div id="review" class="tab-pane fade">
								   	<div class="row">
								   		<div class="col-md-7">
								   			<h3>23 Reviews</h3>
								   			<div class="review">
										   		<div class="user-img" style="background-image: url(images/person1.jpg)"></div>
										   		<div class="desc">
										   			<h4>
										   				<span class="text-left">Jacob Webb</span>
										   				<span class="text-right">14 March 2018</span>
										   			</h4>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
									   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										   			</p>
										   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										   		</div>
										   	</div>
										   	<div class="review">
										   		<div class="user-img" style="background-image: url(images/person2.jpg)"></div>
										   		<div class="desc">
										   			<h4>
										   				<span class="text-left">Jacob Webb</span>
										   				<span class="text-right">14 March 2018</span>
										   			</h4>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
									   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										   			</p>
										   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										   		</div>
										   	</div>
										   	<div class="review">
										   		<div class="user-img" style="background-image: url(images/person3.jpg)"></div>
										   		<div class="desc">
										   			<h4>
										   				<span class="text-left">Jacob Webb</span>
										   				<span class="text-right">14 March 2018</span>
										   			</h4>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
									   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										   			</p>
										   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										   		</div>
										   	</div>
								   		</div>
								   		<div class="col-md-4 col-md-push-1">
								   			<div class="rating-wrap">
									   			<h3>Give a Review</h3>
									   			<p class="star">
									   				<span>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					(98%)
								   					</span>
								   					<span>20 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-empty"></i>
									   					(85%)
								   					</span>
								   					<span>10 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-empty"></i>
									   					<i class="icon-star-empty"></i>
									   					(98%)
								   					</span>
								   					<span>5 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-empty"></i>
									   					<i class="icon-star-empty"></i>
									   					<i class="icon-star-empty"></i>
									   					(98%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-empty"></i>
									   					<i class="icon-star-empty"></i>
									   					<i class="icon-star-empty"></i>
									   					<i class="icon-star-empty"></i>
									   					(98%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   		</div>
								   		</div>
								   	</div>
								   </div>
					         </div>
				         </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2 class="mt-5"><span>Produk Sejenis</span></h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
				<?php while($produk_sejenis = mysqli_fetch_assoc($qproduk_sejenis)): ?>
					<div class="col-md-3 mb-5">
						<div class="card">
							<img class="card-img-top" src="uploads/produk/<?= $produk_sejenis['gambar']; ?>" width="100%" alt="Card image cap">
							<div class="card-body text-center">
								<h4><?= $produk_sejenis['nama_produk']." ".$produk_sejenis['nama_opsi']; ?></h4>
								<p class="text-warning"><strong>Rp. <?= number_format($produk_sejenis['harga']); ?></strong></p>
								<br>
								<a href="detail-produk.php?id=<?= $produk_sejenis['id_produk']; ?>"><button class="btn btn-warning text-light">Beli</button></a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		</div>

		<div id="colorlib-subscribe">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="col-md-6 text-center">
							<h2><i class="icon-paperplane"></i>Sign Up for a Newsletter</h2>
						</div>
						<div class="col-md-6">
							<form class="form-inline qbstp-header-subscribe">
								<div class="row">
									<div class="col-md-12 col-md-offset-0">
										<div class="form-group">
											<input type="text" class="form-control" id="email" placeholder="Enter your email">
											<button type="submit" class="btn btn-primary">Subscribe</button>
										</div>
									</div>
								</div>
							</form>
						</div>
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
	<script src="js/jquery.	magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	<script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>

	</body>
</html>

