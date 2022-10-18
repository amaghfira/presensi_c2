<?php
 
 include "koneksi.php";
 $i=0;
 $cek = mysqli_query($host,"SELECT *, min(time) AS 'absen_pagi', max(time) AS 'absen_sore', SUBTIME(max(time), min(time)) AS 'jam_kerja', SUBTIME(SUBTIME(max(time), min(time)),'07:00:00') AS 'kurang_jam' FROM absensi GROUP BY nama_mitra,`date` ORDER BY `date` ASC");


$arr = array();
while ($data = mysqli_fetch_assoc($cek)) {
    $arr[] = $data;
}

// print_r($arr);

$keys = array_keys($arr);
// print_r($keys);
// print_r ($arr[$keys[0]]['date']);
for ($i = 0; $i < count($arr); $i++) {
        $mitra[] = array(strtolower($arr[$keys[$i]]['nama_mitra']),$arr[$keys[$i]]['kurang_jam']);
        // $jam[] = $arr[$keys[$i]]['kurang_jam'];
        
}

// foreach ($mitra as $key => $value) {
//     foreach ($jam as $k) {
//         $orang[$value] = $k;
//     }
    
// }

foreach ($mitra as $m_item) {
    $new_arr[] = array($m_item[0] => $m_item[1]);
}
print_r($new_arr);
// print_r($new_arr);
// print_r ($new_arr[0]);
foreach ($new_arr as $key => $value) {
    // print_r($value[0]);
    $dat = array_sum($new_arr);
}

// print_r($mitra);
$nama = array('imanur' => array(1,9,10));
// print_r($nama);
// echo array_sum($nama['imanur']);
mysqli_close($host);
 ?>



<!-- $arr[$keys[$i]]['kurang_jam'] -->