<?php 
$koneksi = mysqli_connect("localhost","root","","pwd_responsi");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
