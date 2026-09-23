<?php
// panggil file "database.php" untuk koneksi ke database
require_once "../../config/database.php";
date_default_timezone_set('Asia/Jakarta');
// mengecek data hasil submit dari form
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $bani           = $_POST['bani'];
    $nama_lengkap   = mysqli_real_escape_string($mysqli, trim($_POST['nama_lengkap']));
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $status         = $_POST['status'];
    $pasangan       = $_POST['pasangan'];
    $orang_tua      = $_POST['orang_tua'];
    $anak_ke        = $_POST['anak_ke'];
    $provinsi       = $_POST['provinsi'];
    $kota           = $_POST['kota'];
    $kecamatan      = $_POST['kecamatan'];
    $kelurahan      = $_POST['kelurahan'];
    $alamat         = $_POST['alamat'];
    $pekerjaan      = $_POST['pekerjaan'];
    $koordinat      = mysqli_real_escape_string($mysqli, trim($_POST['koordinat']));
    $email          = mysqli_real_escape_string($mysqli, trim($_POST['email']));
    $whatsapp       = mysqli_real_escape_string($mysqli, trim($_POST['whatsapp']));
    $foto_profil    = $_POST['foto_profil'];
    if ($status == "1") {
        $id_dulur = "$orang_tua$anak_ke";
        $pasangan = "";
    } else {
        if ($jenis_kelamin == "Laki-laki") {
            $id_dulur = "$pasangan" . "s";
            $orang_tua = "";
            $anak_ke = "";
        } else {
            $id_dulur = "$pasangan" . "i";
            $orang_tua = "";
            $anak_ke = "";
        }
    }
    
    $query = mysqli_query($mysqli, "SELECT id_dulur FROM tbl_dulur WHERE id_dulur='$id_dulur'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

    // ambil data hasil query
    if (mysqli_num_rows($query)){ 
    header('location: ../../main.php?module=dulur&pesan=0'); 
    } else {
    
    $nama_lengkap   = strtoupper($nama_lengkap);
    $email   = strtolower($email);
      $foto_profil = "default.jpg";
    // ubah format tanggal menjadi Tahun-Bulan-Hari (Y-m-d) sebelum disimpan ke database
    $tanggal    = date('Y-m-d', strtotime($tanggal_lahir));
    $tanggal_isi    = date('Y-m-d');
    // ambil data file hasil submit dari form
    $nama_file          = $_FILES['foto_profil']['name'];
    $tmp_file           = $_FILES['foto_profil']['tmp_name'];
    $extension          = array_pop(explode(".", $nama_file));
    // enkripsi nama file
    $nama_file_enkripsi = sha1(md5(time() . $nama_file)) . '.' . $extension;
    // tentukan direktori penyimpanan file
    $path               = "../../images/" . $nama_file_enkripsi;

    // lakukan proses unggah file
    // jika file berhasil diunggah
    if ($id_dulur) {
        // sql statement untuk insert data ke tabel "tbl_dulur"
        $insert = mysqli_query($mysqli, "INSERT INTO tbl_dulur(
                                                                id_dulur, 
                                                                bani, 
                                                                nama_lengkap, 
                                                                jenis_kelamin, 
                                                                tanggal_lahir, 
                                                                status, 
                                                                pasangan, 
                                                                orang_tua, 
                                                                anak_ke, 
                                                                pekerjaan,
                                                                provinsi, 
                                                                kota, 
                                                                kecamatan, 
                                                                kelurahan, 
                                                                alamat, 
                                                                koordinat, 
                                                                tanggal_isi, 
                                                                email, 
                                                                whatsapp, 
                                                                foto_profil) 
                                         VALUES(
                                         '$id_dulur', 
                                         '$bani', 
                                         '$nama_lengkap', 
                                         '$jenis_kelamin', 
                                         '$tanggal', 
                                         '$status', 
                                         '$pasangan', 
                                         '$orang_tua', 
                                         '$anak_ke', 
                                         '$pekerjaan', 
                                         '$provinsi', 
                                         '$kota', 
                                         '$kecamatan', 
                                         '$kelurahan', 
                                         '$alamat', 
                                         '$koordinat', 
                                         '$tanggal_isi',
                                         '$email', 
                                         '$whatsapp', 
                                         '$foto_profil')")
                                         or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));
        // cek query
        // jika proses insert berhasil
        if ($insert) {
            // alihkan ke halaman data dulur dan tampilkan pesan berhasil simpan data
            header('location: ../../main.php?module=dulur&pesan=1');
        }
        }
    }
}
