<?php
    session_start();
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
    <?php
        // while($data = count($_SESSION['ongkir'])){
        //     // echo ;
        //     print_r($data);
        // }

        // echo $_SESSION['ongkir'][0][0];

        for($i = 0; $i < count($_SESSION['ongkir']); $i++){
           
                echo "<h3>".$_SESSION['ongkir'][$i][0]."</h3>";
                echo "<p>".$_SESSION['ongkir'][$i][1].$_SESSION['ongkir'][$i][2].$_SESSION['ongkir'][$i][3]."</p>";
            
        };
    ?>
</body>
</html>