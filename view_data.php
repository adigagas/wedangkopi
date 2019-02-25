<?php
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="paging.php" method="get">
        <label for="searchtext">Cari : </label>
        <input type="text" name="searchtext">
        <button type="submit">Cari</button>
    </form>
    <?php echo "<center>".$paginate."</center>"; ?>
</body>
</html>