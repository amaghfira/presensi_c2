<?php 
header('Content-type: application/json');
$json = file_get_contents("https://pbd.bps.go.id/presensi/forms/kaizala.php?request=presensi_bulanan&nip=340060019&bulan=7&tahun=2021");
$json2 = json_encode($json);
$json3 = json_decode($json, true);
// echo gettype($json3);
echo $json3['data'][0]['Tahun'];

$i = 0;
$empty_array = array();
while($json3){
    $i = $i + 1;
    $empty_array[] = [
        0 => $json3['data'][0]['Tahun']
        // 1 => $b['nama_mitra'],
        // 2 => $b['absen_pagi'],
        // 3 => $b['absen_sore'],
        // 4 => $b['jam_kerja'],
		// 5 => $b['kurang_jam']
    ];

}

// JSON objects 
$json_data = json_encode($empty_array);

$json_data2 = '{ "data" : ' . $json_data . '}';
header('Content-type: application/json');
echo $json_data2;
// echo $json2;
?>