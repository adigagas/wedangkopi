<?php
    session_start();

    $id_produk = $_GET['id'];
    unset($_SESSION['keranjang'][$id_produk]);

    echo "<script>alert('item berhasil dihapus')</script>";
    echo "<script>location='../cart.php'</script>";
?>