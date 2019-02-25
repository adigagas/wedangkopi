<?php

    $indexcart = 0;
    
    if(isset($_SESSION['keranjang'])){
        $indexcart = count($_SESSION['keranjang']);
    }
    
?>