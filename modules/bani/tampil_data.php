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
        <!-- button kembali ke halaman tampil data -->
        <a href="?module=dashboard_bani" class="btn btn-outline-secondary px-4 me-sm-auto">
            <i class="fas fa-angle-left me-2"></i> Kembali
        </a>
</div>

<?php
// Menampilkan Usia
$tanggal_lahir = $data['tanggal_lahir'];
$tahun_lahir = date('Y', strtotime($tanggal_lahir)); // Ambil tahun dari tanggal lahir
$tahun_sekarang = date('Y'); // Ambil tahun sekarang
if ($tanggal_lahir == ""){
$umur = "00";
} else {
$umur = $tahun_sekarang - $tahun_lahir;
}
$meninggal = $data['meninggal'];
if ($meninggal == "1"){
    $umur = "00";
}

?>

<div class="bg-white rounded-4 shadow-sm p-4 mb-4">
    <!-- judul form -->
    <div class="alert alert-secondary rounded-4 mb-5" role="alert">
        <i class="fas fa-user-check me-2"></i> Riwayat Bani <strong><?php echo $data['nama_lengkap']; ?></strong>
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
 // Menampilkan nama pasangan
if ($data['pasangan'] == "") {
	echo "";
} else {
  	
	$nama_lengkap = $data['nama_lengkap'];
	$id_pasangan = $data['pasangan'];
  	echo "Pasangan dari $nama_lengkap adalah :<br>";
    $query8 = mysqli_query($mysqli, "SELECT * FROM tbl_dulur WHERE id_dulur='$id_pasangan'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    while ($data8 = mysqli_fetch_assoc($query8)) {
    $pasangan = $data8['nama_lengkap'];
  	echo "- $pasangan";
    }
  }
$nama_lengkap = $data['nama_lengkap'];
?>
<br>
    <div class="alert alert-secondary rounded-4 mb-5" role="alert">
        <i class="fas fa-user-check me-2"></i> Silsilah Bani <strong><?php echo $data['nama_lengkap']; ?></strong>
    </div>
<div class="row">
<pre class="mermaid">
---

config:
  theme: base
  themeVariables:
    primaryColor: "#dee2e6"
    lineColor: '#F8B229'
    
---
flowchart LR
<?php
echo "A[fa:fa-share $nama_lengkap <br> fa:fa-share $pasangan]
";
if ($data5) {
    $no = 0;
   // sql menampilkan semua anak
    $query6 = mysqli_query($mysqli, "SELECT id_dulur, nama_lengkap FROM tbl_dulur WHERE orang_tua='$id_dulur' ORDER BY id_dulur ASC") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    while ($data6 = mysqli_fetch_assoc($query6)) {
        $no++;
        $id_anak = $data6['id_dulur'];
        $anak = $data6['nama_lengkap'];
        echo "A --> ".$no."($anak)
        ";
        echo 'click ' .$no. ' "?module=bani&id=' .$id_anak. '" "' .$anak. '"
        ';
    $query9 = mysqli_query($mysqli, "SELECT id_dulur, nama_lengkap FROM tbl_dulur WHERE orang_tua='$id_anak' ORDER BY id_dulur ASC") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    $no2 = $no;
    while ($data9 = mysqli_fetch_assoc($query9)) {
    $no++;
    $id_anak2 = $data9['id_dulur'];
    $anak2 = $data9['nama_lengkap'];
    echo $no2." --> ".$no."($anak2)
        ";
    echo 'click ' .$no. ' "?module=bani&id=' .$id_anak2. '" "' .$anak2. '"
        ';
      

    }
    }
}
?>
</pre>
<?php

?>
</div>
    <script type="module">
      import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@11/dist/mermaid.esm.min.mjs';
      mermaid.initialize({ startOnLoad: true });
    </script>
</div>

<div class="mb-5">

            <!-- button ubah data -->
            <a href="?module=form_entri_bani&id=<?php echo $id_dulur; ?>" class="btn btn-outline-brand px-4">
                <i class="far fa-edit me-2"></i> Tambah Anak
            </a>

</div>