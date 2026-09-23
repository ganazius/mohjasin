<?php
// panggil file "database.php" untuk koneksi ke database
require_once "../../config/database.php";
date_default_timezone_set('Asia/Jakarta');
// mengecek data hasil submit dari form
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form

  	$nomor_id		= $_POST['nomor_id'];
    $bani           = $_POST['bani'];
    $nama_lengkap   = mysqli_real_escape_string($mysqli, trim($_POST['nama_lengkap']));
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $status         = $_POST['status'];
    $pasangan       = $_POST['pasangan'];
    $orang_tua      = $_POST['orang_tua'];
    $provinsi       = $_POST['provinsi'];
    $kota           = $_POST['kota'];
    $kecamatan      = $_POST['kecamatan'];
    $kelurahan      = $_POST['kelurahan'];
    $alamat         = $_POST['alamat'];
    $pekerjaan      = $_POST['pekerjaan'];
    $pekerjaan2      = $_POST['pekerjaan2'];
    $koordinat      = mysqli_real_escape_string($mysqli, trim($_POST['koordinat']));
    $email          = mysqli_real_escape_string($mysqli, trim($_POST['email']));
    $whatsapp       = mysqli_real_escape_string($mysqli, trim($_POST['whatsapp']));
    $meninggal      = $_POST['meninggal'];
    $tanggal_meninggal      = $_POST['tanggal_meninggal'];

    if ($status == "1") {
		$anak_ke = $_POST['anak_ke'];
        $id_dulur = "$orang_tua" . "$anak_ke";
        $pasangan = "";
		if (($orang_tua == "") | ($anak_ke == "")){
			echo '<script>alert("Silahkan isi Kode Orang Tua / Anak ke berapa");</script>';
			header("location: ../../main.php?module=dulur&pesan=3");
			}
    } else {
			if ($pasangan == ""){
			echo '<script>alert("Silahkan isi Kode suami / istri");</script>';
			header("location: ../../main.php?module=dulur&pesan=3");
			}
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
    if($pekerjaan == ""){
        $pekerjaan = $pekerjaan2;
    }
    $query = mysqli_query($mysqli, "SELECT id FROM tbl_dulur WHERE id_dulur='$id_dulur'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    $rows = mysqli_fetch_assoc($query);
  	$cek_id = $rows['id'];
    // ambil data hasil query
    if ($cek_id == $nomor_id){ 
    
    $nama_lengkap   = strtoupper($nama_lengkap);
    $email   = strtolower($email);
    // ubah format tanggal menjadi Tahun-Bulan-Hari (Y-m-d) sebelum disimpan ke database
    $tanggal    = date('Y-m-d', strtotime($tanggal_lahir));
    $tanggal_meninggal    = date('Y-m-d', strtotime($tanggal_meninggal));
    $tanggal_update    = date('Y-m-d');
	
    // ambil data file hasil submit dari form
    $nama_file          = $_FILES['foto']['name'];
    $tmp_file           = $_FILES['foto']['tmp_name'];
    $extension          = array_pop(explode(".", $nama_file));
    // enkripsi nama file
    $nama_file_enkripsi = sha1(md5(time() . $nama_file)) . '.' . $extension;
    // tentukan direktori penyimpanan file
    $path               = "../../images/$id_dulur" . "_" . $nama_file_enkripsi;

    // mengecek data foto dari form ubah data
    // jika data foto tidak ada (foto tidak diubah)
      $foto_profil = "default.jpg";
    if ($foto_profil) {
        // sql statement untuk update data di tabel "tbl_dulur" berdasarkan "id"
        $update = mysqli_query($mysqli, "UPDATE tbl_dulur SET 
                                        id_dulur='$id_dulur',
                                        bani='$bani',
                                        nama_lengkap='$nama_lengkap',
                                        jenis_kelamin='$jenis_kelamin',
                                        tanggal_lahir='$tanggal',
                                        status='$status',
                                        pasangan='$pasangan',
                                        orang_tua='$orang_tua',
                                        anak_ke='$anak_ke',
                                        pekerjaan='$pekerjaan',
                                        provinsi='$provinsi',
                                        kota='$kota',
                                        kecamatan='$kecamatan',
                                        kelurahan='$kelurahan',
                                        alamat='$alamat',
                                        koordinat='$koordinat',
                                        tanggal_update='$tanggal_update',
                                        email='$email',
                                        whatsapp='$whatsapp',
                                        meninggal='$meninggal',
                                        tanggal_meninggal='$tanggal_meninggal'
                                        WHERE id='$nomor_id'")
                                        or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
        if ($update) {
            // alihkan ke halaman detail data dulur dan tampilkan pesan berhasil ubah data
            header("location: ../../main.php?module=tampil_detail_dulur&id=$id_dulur&pesan=1");
        }
    }
	} else {
    header("location: ../../main.php?module=tampil_detail_dulur&id=$id_dulur&pesan=2");
    }  
}