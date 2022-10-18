<?php 
// isi nama host, username mysql, dan password mysql anda
$hostlk = mysqli_connect("localhost","u8152743_ipd","ipd@6400", "u8152743_lk");

if($hostlk){
	// echo "koneksi host berhasil.<br/>";
}else{
	// echo "koneksi gagal.<br/>";
}
// isikan dengan nama database yang akan di hubungkan
$db = mysqli_select_db($hostlk,"lk");

// if($db){
// 	echo "koneksi database berhasil.";
// }else{
// 	echo "koneksi database gagal.";
// }
?>