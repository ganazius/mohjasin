<?php
// deklarasi parameter koneksi database
$host     = "localhost"; 			// server database, default “localhost” atau “127.0.0.1”
$username = "00"; 				// username database, default “root”
$password = "00*"; 					// password database, default kosong
$database = "00"; 			// memilih database yang akan digunakan

// buat koneksi database
$mysqli = mysqli_connect($host, $username, $password, $database);

// cek koneksi
// jika koneksi gagal 
if (!$mysqli) {
	// tampilkan pesan gagal koneksi
	die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
