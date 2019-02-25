<?php
    session_start();
    include 'koneksi.php';
    include 'functions/rajaongkir.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/ongkir.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Hitung Ongkir</title>
</head>
<body>
    <h3>Hitung Ongkir</h3>
    <br>
    <label>Kabupaten Tujuan</label><br>
    <select id="kabupaten" name="kabupaten"></select><br><br>

    <label>Kurir</label><br>
    <select id="kurir" name="kurir">
        <option value="jne">JNE</option>
        <option value="tiki">TIKI</option>
        <option value="pos">POS INDONESIA</option>
    </select><br><br>

    <label>Berat (gram)</label><br>
    <input id="berat" type="text" name="berat" value="500" />
    <br><br>

    <input id="cek" type="submit" value="Cek"/>

    <div id="ongkir">
        <pre>
            <?php print_r($_SESSION); ?>
        </pre>
    </div>
</body>
</html>
<script src="js/ongkir.js"></script>