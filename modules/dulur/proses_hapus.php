<?php
// panggil file "database.php" untuk koneksi ke database
require_once "../../config/database.php";

// mengecek data GET "id_dulur"
if (isset($_GET['id'])) {
    // ambil data GET dari tombol hapus
    $id_dulur = mysqli_real_escape_string($mysqli, $_GET['id']);

    // mengecek data foto profil
    // sql statement untuk menampilkan data "foto_profil" dari tabel "tbl_dulur" berdasarkan "id_dulur"
    $query = mysqli_query($mysqli, "SELECT foto_profil FROM tbl_dulur WHERE id_dulur='$id_dulur'")
                                    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);

    // jika data "foto_profil" tidak kosong
    if (!empty($data['foto_profil'])) {
        // hapus file foto dari folder images
       // $hapus_file = unlink("../../images/$data[foto_profil]");
    }

    // sql statement untuk delete data dari tabel "tbl_dulur" berdasarkan "id_dulur"
    $delete = mysqli_query($mysqli, "DELETE FROM tbl_dulur WHERE id_dulur='$id_dulur'")
                                     or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));
    // cek query
    // jika proses delete berhasil
    if ($delete) {
        // alihkan ke halaman data dulur dan tampilkan pesan berhasil hapus data
        header('location: ../../main.php?module=dulur&pesan=2');
    }
}
