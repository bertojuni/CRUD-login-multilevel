<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'database/koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from member where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {
	if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {

		$data = mysqli_fetch_assoc($login);

		// cek jika user login sebagai admin
		if ($data['level'] == "admin") {

			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";
			// alihkan ke halaman dashboard admin
			header("location:halaman_admin.php");

			// cek jika user login sebagai pengurus
		} else if ($data['level'] == "pengurus") {
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "pengurus";
			// alihkan ke halaman dashboard pengurus
			header("location:halaman_member.php");
		} else {

			// alihkan ke halaman login kembali
			header("location:index.php?pesan=gagal");
		}
	} else {
		header("location:index.php?pesan=gagal");
	}
}
