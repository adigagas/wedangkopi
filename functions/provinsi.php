<?php
    //Get Data Provinsi
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 66277c2fe0a72d6dcbf96b55fbf3c3cf"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

// echo "Provinsi Tujuan<br>";
// echo "<select name='provinsi' id='provinsi'>";
// echo "<option>Pilih Provinsi Tujuan</option>";
$data = json_decode($response, true);
// for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
//     echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
// }
// echo "</select><br><br>";

echo "<div class='col-md-6'>";
echo "<label for='provinsi'>Provinsi</label>";
// <input type='text' id='zippostalcode' class='form-control' placeholder='Zip / Postal'>
echo "<select class='form-control' name='provinsi' id='provinsi'>";
// echo "<option>Pilih Provinsi<option>";
echo "<option>Pilih Provinsi</option>";
for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
        echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
    }
echo "</select>";
echo "</div>";
// Get Data Provinsi
?>