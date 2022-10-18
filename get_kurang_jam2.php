<?php
 
 include "koneksi.php";
 $i=0;
 $cek = mysqli_query($host,"SELECT *, min(time) AS 'absen_pagi', max(time) AS 'absen_sore', SUBTIME(max(time), min(time)) AS 'jam_kerja', SUBTIME(SUBTIME(max(time), min(time)),'07:00:00') AS 'kurang_jam' FROM absensi GROUP BY nama_mitra,`date` ORDER BY `date` ASC");


$arr = array();
while ($data = mysqli_fetch_assoc($cek)) {
    $arr[] = $data;
}


$keys = array_keys($arr);

for ($i = 0; $i < count($arr); $i++) {
    $mitra[$i] = array(strtolower($arr[$keys[$i]]['nama_mitra']), $arr[$keys[$i]]['kurang_jam']);
    $mitra = $mitra;
}

print_r($mitra);
mysqli_close($host);



 ?>



<!-- $arr[$keys[$i]]['kurang_jam'] -->