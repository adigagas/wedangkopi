<?php
    session_start();

    //mendapatkan id produk
    $id_produk = $_GET['id'];

    //jk sudah ada produk
    if(isset($_SESSION['keranjang'][$id_produk]))
    {
        $_SESSION['keranjang'][$id_produk]+=1;
    }
    //jk belum ada produk
    else{
        $_SESSION['keranjang'][$id_produk]=1;
    }

    echo "<script> alert('produk berhasil dimasukkan ke keranjang belanja') </script>";
    // echo "<script> location='cart.php'; </script>"; 

?>