<?php include("head.php"); ?>
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
<link rel="stylesheet" href="select2-4.0.6-rc.1/dist/css/select2.min.css">
<script src="modules/dulur/jquery-3.3.1.min.js"></script>
<script src="modules/dulur/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
<script src="modules/dulur/app2.js"></script>
<div class="mb-5">
    <div class="row flex-lg-row-reverse align-items-center">



            <h3>Pencarian Dulur</h3>
            

            <form action="?module=tampil_pencarian_dulur" method="post" class="form-search needs-validation" novalidate>

<div class="row">
                <div class="col-xl-12">
                    <div class="col-md-12 mb-3">
                        <input type="text" name="kata_kunci" id="kata_kunci" class="form-control rounded-pill" placeholder="Cari Dulur ..." autocomplete="off">
                        <div class="invalid-feedback">Masukan ID atau Nama Dulur yang ingin Anda cari.</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                           <?php                    
                           // sql menampilkan provinsi
                            $sql_provinsi = mysqli_query($mysqli,"SELECT * FROM provinces ORDER BY name ASC");
                           ?>
                            <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                            <select name="provinsi" id="provinsi" class="form-control" autocomplete="off" >
                                <option selected value="<?php echo $data3['id']; ?>"><?php echo $data3['name']; ?></option>
                            <?php                       
                                while($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)){ 
                                   echo '<option value="'.$rs_provinsi['id'].'">'.$rs_provinsi['name'].'</option>';
                                }                        
                              ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Kabupaten <span class="text-danger">*</span></label>
                            <select name="kota" id="kota" class="form-control" autocomplete="off" >
                                <option selected value="<?php echo $data4['id']; ?>"><?php echo $data4['name']; ?></option>
                            </select>
                        </div>
                        <div class="col-md-3">
                           <?php
                            // sql menampilkan pekerjaan
                            $sql = mysqli_query($mysqli,"SELECT * FROM tbl_pekerjaan ORDER BY id ASC");
                           ?>
                            <label class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                            <select name="pekerjaan" id="pekerjaan" class="form-control" autocomplete="off">
                                <option selected disabled value="<?php echo $idpekerjaan; ?>"><?php echo $datap['pekerjaan']; ?></option>
                            <?php                       
                                while($sp = mysqli_fetch_assoc($sql)){ 
                                $pekerjaan = $sp['pekerjaan'];
                                $idpekerjaan = $sp['id'];
                                   echo '<option value="'.$idpekerjaan.'">'.$pekerjaan.'</option>';
                                }                      
                              ?>
                            </select>
                            <input type="hidden" name="pekerjaan2" class="form-control" value="<?php echo $data['pekerjaan']; ?>" >
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <input type="submit" id="btnCari" value="Cari Data" class="btn btn-primary w-100">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<br>

<div class="row">
    <?php

    // mengecek data hasil submit dari form
  
    if (isset($_POST['kata_kunci'])) {
        // ambil data hasil submit dari form
        $kata_kunci = $_POST['kata_kunci'];
      	$kota = $_POST['kota'];
      	$pekerjaan = $_POST['pekerjaan'];
    ?>
        <div class="col-12">
            <div class="alert alert-secondary rounded-4 mb-5" role="alert">
                <i class="far fa-hand-point-right me-2"></i> Hasil Pencarian <span class="fw-bold fst-italic">"<?php echo $kata_kunci; ?>"</span>
            </div>
        </div>

<?php
// Bangun kondisi WHERE secara dinamis
$where_clauses = [];

if (!empty($kata_kunci)) {
    $where_clauses[] = "(id_dulur LIKE '%$kata_kunci%' OR nama_lengkap LIKE '%$kata_kunci%')";
}
// Tambahkan kondisi lain jika filter lainnya (provinsi, kota, pekerjaan) juga dikirim
if (!empty($kota) && $kota != 'null') { // Asumsi 'null' atau default value yang tidak ingin difilter
    $where_clauses[] = "kota = '$kota'";
}
if (!empty($pekerjaan) && $pekerjaan != 'null') {
    $where_clauses[] = "pekerjaan = '$pekerjaan'";
}
$where_sql = '';
if (count($where_clauses) > 0) {
    $where_sql = ' WHERE ' . implode(' AND ', $where_clauses);
}


// sql statement untuk menampilkan data
$query = mysqli_query($mysqli, "SELECT id_dulur, nama_lengkap, foto_profil, meninggal FROM tbl_dulur "
                                . $where_sql .
                                "ORDER BY id_dulur DESC")
                                or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
        // ambil jumlah data hasil query
        $rows = mysqli_num_rows($query);
        $cari = $rows;
        // cek hasil query
        // jika data dulur ada
        if ($rows <> 0) {
            // ambil data hasil query
            while ($data = mysqli_fetch_assoc($query)) { ?>
                <!-- tampilkan data -->
            <div class="col-lg-6 col-xl-3">
<?php
$meninggal = $data['meninggal'];
if ($meninggal == "1"){
    echo '<div class="rounded-4 shadow-sm text-center p-4 p-lg-4-2 mb-4" style="background:gainsboro;">';
} else {
    echo '<div class="bg-white rounded-4 shadow-sm text-center p-4 p-lg-4-2 mb-4">';
}
?>

                    <div class="foto-profil mb-4  container-gambar">
                        <img src="images/<?php echo $data['foto_profil']; ?>" alt="Foto Profil" class="img-fluid rounded-circle">
<?php
$meninggal = $data['meninggal'];
if ($meninggal == "1"){
    $umur = "00";
    echo '<img src="modules/dulur/meninggal.png" alt="Foto Profil" class="img-fluid ">';
}
?>
                    </div>
                    <h6><?php echo $data['nama_lengkap']; ?></h6>
                    <p class="text-muted mb-4">ID : <?php echo $data['id_dulur']; ?></p>
                    <!-- button detail data -->
                    <a href="?module=tampil_detail_dulur&id=<?php echo $data['id_dulur']; ?>" class="btn btn-outline-brand btn-sm px-4">
                        Detail <i class="fas fa-angle-right ms-2"></i>
                    </a>
                </div>
            </div>

            <?php
            }
        echo '<div class="col-12">
                <i class="fas fa-user-circle me-1"></i>
                Menampilkan <strong>' . $cari . '</strong> data
            </div>';
        }
        
        // jika data dulur tidak ada
        else { ?>
            <!-- tampilkan pesan data tidak ditemukan -->
            <div class="col-12">
                <i class="far fa-question-circle me-1"></i>
                Data dulur dengan kata kunci <span class="text-brand fst-italic px-2">"<?php echo $kata_kunci; ?>"</span> tidak ditemukan.
            </div>
    <?php
        }
    }

    ?>
    
</div>
