<?php
    session_start();
    include '../koneksi.php';

    $asal = $_POST['asal'];
    $provinsi = $_POST['provinsi'];
	$id_kabupaten = $_POST['kab_id'];
	$kurir = $_POST['kurir'];
    $berat = $_POST['berat'];
    $hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $nama = $_POST['nama_plg'];
    $tot_berat = $_POST['berat'];
    $pos = $_POST['kode_pos'];
    $alamat = $_POST['alamat'];
    $kode_trans = uniqid(30);
    $tgl = date("Y-m-d");

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
	    "key: 66277c2fe0a72d6dcbf96b55fbf3c3cf"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {	echo "cURL Error #:" . $err;
	} else {
    //   echo $response;

        $data = json_decode($response, true);

        $asalkota = $data['rajaongkir']['origin_details']['city_name'];
        $kotatujuan = $data['rajaongkir']['destination_details']['city_name'];
        // $pos = $data['rajaongkir']['destination_details']['postal_code'];
        
        // $_SESSION['kode_pos'] = $pos;
        
        $kota = array($asalkota, $kotatujuan);
        
        $_SESSION['kota'] = $kota; 
        
        for($i=0; $i < count($data['rajaongkir']['results']); $i++)
        {
            
            $namaeks = $data['rajaongkir']['results'][$i]['name'];
                    
            for($j=0; $j < count($data['rajaongkir']['results'][$i]['costs']); $j++)
            {   
                $servis = $data['rajaongkir']['results'][$i]['costs'][$j]['service'];
                $deskripsi = $data['rajaongkir']['results'][$i]['costs'][$j]['description'];
                $ket = $data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['etd'];
                $harga = number_format($data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value']);

                
                $paket = array($servis,$deskripsi,$ket,$harga);
                $_SESSION['ongkir'][$j] = $paket;
            };    
        };

        $ongkir = $data['rajaongkir']['results'][$i]['costs'][0]['cost'][0]['value'];

        
	}
	
?>