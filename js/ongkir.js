$(document).ready(function(){
    $('#provinsi').change(function(){

        //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
        var prov = $('#provinsi').val();

          $.ajax({
            type : 'GET',
               url : 'http://localhost/kopi/functions/cek_kabupaten.php',
            data :  'prov_id=' + prov,
                success: function (data) {

                //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                $("#kabupaten").html(data);
            }
          });
    });

    $("#cek").click(function(){
        //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
        var asal = $('#asal').val();
        // var asal = ['86']['11']['Jawa Timur']['Kabupaten']['Bondowoso']['68219'];
        var kab = $('#kabupaten').val();
        var kurir = $('#kurir').val();
        var berat = $('#berat').val();

          $.ajax({
            type : 'POST',
               url : 'http://localhost/kopi/functions/cek_ongkir.php',
            data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
                success: function (data) {

                //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
                $("#ongkir").text(data);
            }
          });
    });
});