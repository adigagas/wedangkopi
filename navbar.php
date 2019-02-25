<?php
    include 'functions/indexcart.php';
?>
<nav class="colorlib-nav fixed-top bg-light" role="navigation" style="background :whitesmoke">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div id="colorlib-logo"><a href="index.php"><small><img src="uploads/img/seneng-ngopi-color.png" alt="" width="80%"></small></a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li class="active"><a href="index.php">Home</a></li>
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
                        <li><a href="cart.php"><i class="icon-shopping-cart"></i>Cart [<?= $indexcart?>]</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>