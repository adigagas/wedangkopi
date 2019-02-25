<?php
    session_start();

    session_destroy();

    echo "<script>location='../admin/login.php';</script>";
?>