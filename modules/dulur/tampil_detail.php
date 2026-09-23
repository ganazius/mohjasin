<?php include("head.php"); 
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); 
// mengecek data GET "id_dulur"
if (isset($_GET['id'])) {
    // ambil data GET dari tombol detail
    $id_dulur = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "tbl_dulur" berdasarkan "id_dulur"
    $query = mysqli_query($mysqli, "SELECT * FROM tbl_dulur WHERE id_dulur='$id_dulur'")
                                    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="assets/css/style.css">
<div class="mb-5">
    <div class="d-grid gap-3 d-sm-flex flex-sm-row-reverse">
        <!-- button kembali ke halaman tampil data -->
        <a href="?module=dulur" class="btn btn-outline-secondary px-4 me-sm-auto">
            <i class="fas fa-angle-left me-2"></i> Kembali
        </a>
    </div>
</div>
<style>
.container-gambar {
  position: relative;
  display: inline-block; /* atau block, tergantung layout */
}
.container-gambar img {
  position: absolute;
  top: 0;
  left: 0;
  width: auto; /* Sesuaikan dengan kebutuhan */
  height: 100%
}
.container-gambar img:nth-child(2) {
  /* Atur posisi gambar kedua agar tumpang tindih */
  top: 0px;
  left: 0px;
}
</style>
<?php
// menampilkan pesan sesuai dengan proses yang dijalankan
// jika pesan tersedia
if (isset($_GET['pesan'])) {
    // jika pesan = 0
    if ($_GET['pesan'] == 0) {
        // tampilkan pesan sukses ubah data
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle me-2"></i>Gagal!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    // jika pesan = 1
    if ($_GET['pesan'] == 1) {
        // tampilkan pesan sukses ubah data
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle me-2"></i>Sukses!</strong> Data dulur berhasil diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if ($_GET['pesan'] == 2) {
        // tampilkan pesan sukses ubah data
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle me-2"></i>Gagal! ID dulur sudah ada</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}

// Menampilkan nama bani
$id_bani = $data['bani'];
$query2 = mysqli_query($mysqli, "SELECT * FROM tbl_bani WHERE id='$id_bani'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data2 = mysqli_fetch_assoc($query2);

// Menampilkan pekerjaan
$idpekerjaan = $data['pekerjaan'];
$queryp = mysqli_query($mysqli, "SELECT * FROM tbl_pekerjaan WHERE id='$idpekerjaan'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$datap = mysqli_fetch_assoc($queryp);
$pekerjaan = $datap['pekerjaan'];

// Menampilkan Usia
$tanggal_lahir = $data['tanggal_lahir'];
$tanggal_meninggal = $data['tanggal_meninggal'];
$tahun_lahir = date('Y', strtotime($tanggal_lahir)); // Ambil tahun dari tanggal lahir
$tahun_meninggal = date('Y', strtotime($tanggal_meninggal)); // Ambil tahun dari tanggal lahir
$tahun_sekarang = date('Y'); // Ambil tahun sekarang
if ($tanggal_lahir == ""){
$umur = "00";
} else {
$umur = $tahun_sekarang - $tahun_lahir;
}
$meninggal = $data['meninggal'];
if ($meninggal == "1"){
  	$umur_meninggal = $tahun_meninggal - $tahun_lahir;
}


?>

<div class="bg-white rounded-4 shadow-sm p-4 mb-4">
    <!-- judul form -->
    <div class="alert alert-secondary rounded-4 mb-5" role="alert">
        <i class="fas fa-user-check me-2"></i> Detail Data dulur
    </div>
    <!-- tampilkan data -->
    <div class="d-flex flex-column flex-xl-row">
        <div class="flex-shrink-0 text-center mb-5 mb-xl-0">
            <div class="foto-profil-detail container-gambar">
                <img src="images/<?php echo $data['foto_profil']; ?>" alt="Foto Profil" class="img-fluid rounded-circle">
<?php
$meninggal = $data['meninggal'];
if ($meninggal == "1"){

    echo '<img src="modules/dulur/meninggal.png" alt="Foto Profil" class="img-fluid ">';
}
?>
              <a href="?module=ubah_foto&id=<?php echo $data['id']; ?>&ids=<?php echo $data['id_dulur']; ?>" ')" class="btn btn-outline-brand px-4" style="margin-top:100%;">
                Ganti Foto
            </a>
            </div>

        </div>

        <div class="flex-grow-1 text-muted fw-light ms-xl-5">
            <div class="table-responsive">
                <table class="table table-striped lh-lg">
                    <tr>
                        <td width="200">Bani</td>
                        <td width="10">:</td>
                        <td><?php echo $data2['bani']; ?></td>
                    </tr>
                    <tr>
                        <td width="200">ID dulur</td>
                        <td width="10">:</td>
                        <td style="font-size:1.5em;"><?php echo $data['id_dulur']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><strong><?php echo $data['nama_lengkap']; ?></strong></td>
                    </tr>
<?php
$meninggal = $data['meninggal'];
if ($meninggal == "1"){
?>
                    <tr>
                        <td>Meninggal Usia</td>
                        <td>:</td>
                        <td><?php echo "  " .$umur_meninggal. "  tahun"; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><?php echo "  " .$tanggal_meninggal; ?></td>
                    </tr>
<?php
}else{
?>
                    <tr>
                        <td>Usia</td>
                        <td>:</td>
                        <td><?php echo "  " .$umur. "  tahun"; ?></td>
                    </tr>
<?php
}
?>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $data['alamat']; ?></td>
                    </tr>
<?php
$meninggal = $data['meninggal'];
if ($meninggal == "1"){}else{
?>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td><?php echo $pekerjaan; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $data['email']; ?></td>
                    </tr>
                    <tr>
                        <td>WhatsApp</td>
                        <td>:</td>
                        <td><?php echo $data['whatsapp']; ?></td>
                    </tr>
<?php
}
// mengubah nomor HP yang awalnya 0 menjadi 62
$nomor = $data['whatsapp'];
$nomor_wa = "62" . ltrim($nomor, '0');
?>
</table>
    <div class="d-grid gap-3 d-sm-flex">

            <!-- button ubah data -->
            <a href="https://wa.me/<?php echo $nomor_wa; ?>" class="btn btn-outline-hijau px-4">
                <i class="fab fa-whatsapp me-2"></i> Kirim Whatsapp
            </a>
            <!-- button hapus data -->
           <!--  <a href="modules/dulur/proses_hapus.php?id=<?php echo $data['id_dulur']; ?>" onclick="return confirm('Anda yakin ingin menghapus data dulur <?php echo $data['nama_lengkap']; ?>?')" class="btn btn-outline-brand px-4">
                <i class="far fa-trash-alt me-2"></i> Hapus
            </a>
        </div> -->
        <!-- button kembali ke halaman tampil data -->
        <a href="<?php echo $data['koordinat']; ?>" class="btn btn-outline-biru px-4 me-sm-auto">
            <i class="fas fa-map-marker-alt me-2"></i> Google Map
        </a>

</div><br>
                </table>
            </div>
        </div>
    </div>
    <div class="alert alert-secondary rounded-4 mb-5" role="alert">
        <i class="fas fa-user-check me-2"></i> Riwayat
    </div>
<?php
$orang_tua = $data['orang_tua'];
// sql menampilkan data orang tua
$query3 = mysqli_query($mysqli, "SELECT * FROM tbl_dulur WHERE id_dulur='$orang_tua'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data3 = mysqli_fetch_assoc($query3);

// sql menampilkan data pasangan
$query4 = mysqli_query($mysqli, "SELECT * FROM tbl_dulur WHERE pasangan='$id_dulur'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data4 = mysqli_fetch_assoc($query4);

// sql menampilkan data anak
if ($data['pasangan'] == "") {
$query5 = mysqli_query($mysqli, "SELECT * FROM tbl_dulur WHERE orang_tua='$id_dulur'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data5 = mysqli_fetch_assoc($query5);
}else{
$id_pasangan = $data['pasangan'];
$query5 = mysqli_query($mysqli, "SELECT * FROM tbl_dulur WHERE orang_tua='$id_dulur'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data5 = mysqli_fetch_assoc($query5);
}
// sql menampilkan data anak

if ($data3) {
    $nama_lengkap = $data['nama_lengkap'];
    $orang_tua = $data3['nama_lengkap'];
    $id_orang_tua = $data3['id_dulur'];
    
    // sql menampilkan pasangan dari orang tua
    $query7 = mysqli_query($mysqli, "SELECT * FROM tbl_dulur WHERE pasangan='$id_orang_tua'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    $data7 = mysqli_fetch_assoc($query7);
    
    if ($data7) {
        $id_orang_tua2 = $data7['id_dulur'];
        $orang_tua2 = $data7['nama_lengkap'];
    } else { 
    $orang_tua2 = "";
    }
    if ($orang_tua) {
        if ($data3['jenis_kelamin'] == "Laki-laki"){
            echo $nama_lengkap. ' Merupakan anak dari Bapak <a href="?module=tampil_detail_dulur&id=' .$id_orang_tua. '">' .$orang_tua. '</a> dan Ibu <a href="?module=tampil_detail_dulur&id=' .$id_orang_tua2. '">' .$orang_tua2. '</a><br>';
        } else {
            echo $nama_lengkap. ' Merupakan anak dari Ibu <a href="?module=tampil_detail_dulur&id=' .$id_orang_tua. '">' .$orang_tua. '</a> dan Bapak <a href="?module=tampil_detail_dulur&id=' .$id_orang_tua2. '">' .$orang_tua2. '</a><br>';
        }
    }
}
if ($data4) {
$idpasangan = $data4['id_dulur'];
$pasangan = $data4['nama_lengkap'];
    if ($pasangan) {
        if ($data4['jenis_kelamin'] == "Laki-laki"){
            echo 'Mempunyai Suami bernama <a href="?module=tampil_detail_dulur&id=' .$idpasangan. '">' .$pasangan. '</a><br>';
        } else {
            echo 'Mempunyai Istri bernama <a href="?module=tampil_detail_dulur&id=' .$idpasangan. '">' .$pasangan. '</a><br>';
        }
    }
}
if ($data5) {
    echo "<br>Pasangan ini mempunyai anak bernama :<br>";
    
    // sql menampilkan semua anak
    $query6 = mysqli_query($mysqli, "SELECT * FROM tbl_dulur WHERE orang_tua='$id_dulur' ORDER BY id_dulur ASC") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    while ($data6 = mysqli_fetch_assoc($query6)) {
        $id_anak = $data6['id_dulur'];
        $anak = $data6['nama_lengkap'];
        echo '- <a href="?module=tampil_detail_dulur&id=' .$id_anak. '">' .$anak. '</a><br>';
    }
}
if ($data['pasangan'] == "") {
	echo "";
} else {
	$nama_lengkap = $data['nama_lengkap'];
	$id_pasangan = $data['pasangan'];
    $query8 = mysqli_query($mysqli, "SELECT * FROM tbl_dulur WHERE id_dulur='$id_pasangan'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    $data8 = mysqli_fetch_assoc($query8);
	$pasangan = $data8['nama_lengkap'];
    if ($data['jenis_kelamin'] == "Laki-laki") {
            echo $nama_lengkap. ' adalah suami dari <a href="?module=tampil_detail_dulur&id=' .$id_pasangan. '">' .$pasangan. '</a>.<br>';
        } else {
            echo $nama_lengkap. ' adalah istri dari <a href="?module=tampil_detail_dulur&id=' .$id_pasangan. '">' .$pasangan. '</a>.<br>';
        }
    }
?>
</div>

<div class="mb-5">
    <div class="d-grid gap-3 d-sm-flex flex-sm-row-reverse">
        <div class="d-grid gap-3 d-sm-flex">
            <!-- button ubah data -->
            <a href="?module=form_ubah_dulur&id=<?php echo $data['id_dulur']; ?>" class="btn btn-outline-brand px-4">
                <i class="far fa-edit me-2"></i> Ubah
            </a>
            <!-- button hapus data -->

        </div>
    </div>
</div>
