<?
    if(isset($_POST['update']))
    {   
        
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
            
        // update produk
        $result = mysqli_query($conn, "UPDATE `produk` 
        SET `nama_produk` = '$nama_produk', `id_jenis` = '$id_jenis', `id_opsi` = '$id_opsi', `berat` = '$berat', `harga` = '$harga', `deskripsi` = '$deskripsi', `gambar` = '$nama_file', `stok` = '$stok'
        WHERE `produk`.`id_produk` = $id_produk;");
        
        // Redirect to homepage to display updated user in list
        header("Location: index.php");
    }
?>