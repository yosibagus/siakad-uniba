<?php 

include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$ipaddress = '';
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
} else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
} else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
} else if (isset($_SERVER['HTTP_FORWARDED'])) {
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
} else if (isset($_SERVER['REMOTE_ADDR'])) {
    $ipaddress = $_SERVER['REMOTE_ADDR'];
} else {
    $ipaddress = 'IP tidak dikenali';
}

$nama_lengkap = $_POST['nama_lengkap'];
$no_hp = $_POST['no_hp'];
$latlong = $_POST['latlong'];
$tgl_lacak = date('d M Y H:i');
if (!empty($nama_lengkap) || !empty($no_hp)) {

	$simpan = mysqli_query($conn, "INSERT INTO lokasi values (null, '$nama_lengkap', '$no_hp', '$latlong' , '$ipaddress', '$tgl_lacak')");
	if ($simpan) {
		echo "<script>alert('data berhasil disimpan'); window.location.href='index.php';</script>";

	}
}
else {
	echo "<script>window.location.href='index.php';</script>";
}



?>