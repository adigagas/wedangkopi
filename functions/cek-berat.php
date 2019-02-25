<?php
    $totalberat = 0;
    // $totalbelanja = 0;
    
    foreach($_SESSION['keranjang'] as $id_produk=>$jumlah){
        $qproduk = mysqli_query($conn, "SELECT produk.id_produk, produk.nama_produk, produk.id_jenis, produk.id_opsi, jenis_produk.nama_jenis, opsi.nama_opsi, produk.harga, produk.deskripsi, produk.gambar, produk.stok, produk.berat
        FROM produk, jenis_produk, opsi
        WHERE produk.id_jenis = jenis_produk.id_jenis AND produk.id_opsi = opsi.id_opsi AND produk.id_produk = $id_produk");
        $cartproduk = mysqli_fetch_assoc($qproduk);
        $subtotal = $cartproduk['harga']*$jumlah;
        $subberat = $cartproduk['berat']*$jumlah;

        $totalberat += $subberat;
        // $totalbelanja = $totalbelanja+$subtotal;
    };
?>