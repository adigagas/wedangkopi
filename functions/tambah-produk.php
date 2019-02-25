<?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['submit'])) {
    
    $nama_produk = $_POST['nama_produk'];
    $id_jenis = $_POST['id_jenis'];
    $id_opsi = $_POST['id_opsi'];
    $harga = $_POST['harga'];
    $discount = $_POST['discount'];
    $deskripsi = $_POST['deskripsi'];

    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './uploads/';

    move_uploaded_file($source, $folder.$nama_file);
                                                
    // Insert user data into table
    $insert = mysqli_query($conn, "INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_jenis`, `id_opsi`, `harga`, `discount`, `deskripsi`,`gambar`) VALUES (NULL, '$nama_produk', '$id_jenis', '$id_opsi', '$harga', '$discount', '$deskripsi','$nama_file');");
                                        
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