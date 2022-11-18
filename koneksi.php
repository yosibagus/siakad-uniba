<?php 
	
	$conn = mysqli_connect('localhost', 'root', '', 'pin_location');

	if (!$conn) {
		echo "database gagal tersambung, periksa koneksi server";
	}

?>