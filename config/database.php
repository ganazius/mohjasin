<?php
// deklarasi parameter koneksi database
$host     = "localhost"; 			// server database, default “localhost” atau “127.0.0.1”
$username = "mohjasin_dbuser"; 				// username database, default “root”
$password = "PutuneMbahMohJasin*"; 					// password database, default kosong
$database = "mohjasin_dulur"; 			// memilih database yang akan digunakan

// buat koneksi database
$mysqli = mysqli_connect($host, $username, $password, $database);

// cek koneksi
// jika koneksi gagal 
if (!$mysqli) {
	// tampilkan pesan gagal koneksi
	die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
