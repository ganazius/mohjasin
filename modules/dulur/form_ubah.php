<?php
include("head.php");
date_default_timezone_set('Asia/Jakarta');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); 
// panggil file "database.php" untuk koneksi ke database

// mengecek data GET "id_dulur"
if (isset($_GET['id'])) {
    // ambil data GET dari tombol ubah
    $id_dulur = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "tbl_dulur" berdasarkan "id_dulur"
    $query = mysqli_query($mysqli, "SELECT * FROM tbl_dulur WHERE id_dulur='$id_dulur'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
  
    // membetulkan format tanggal
    $tanggal_lahir = $data['tanggal_lahir'];
    $tanggal    = date('d-m-Y', strtotime($tanggal_lahir));
    $tgl_meninggal = $data['meninggal'];
    $meninggal    = date('d-m-Y', strtotime($tgl_meninggal));
  
}
// anak
if ($data['anak_ke']) {$anak_ke = $data['anak_ke'];}else{$anak_ke = "";}

//ambil nomor id
$nomor_id = $data['id'];

// pekerjaan
$idpekerjaan = $data['pekerjaan'];
$queryp = mysqli_query($mysqli, "SELECT * FROM tbl_pekerjaan WHERE id='$idpekerjaan'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$datap = mysqli_fetch_assoc($queryp);
$pekerjaan = $datap['pekerjaan'];

// tampil nama bani
$id_bani = $data['bani'];
$query2 = mysqli_query($mysqli, "SELECT * FROM tbl_bani WHERE id='$id_bani'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data2 = mysqli_fetch_assoc($query2);

// tampil data alamat
$provinsi = $data['provinsi'];
$query3 = mysqli_query($mysqli, "SELECT * FROM provinces WHERE id='$provinsi'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data3 = mysqli_fetch_assoc($query3);
$kota = $data['kota'];
$query4 = mysqli_query($mysqli, "SELECT * FROM regencies WHERE id='$kota'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data4 = mysqli_fetch_assoc($query4);
$kecamatan = $data['kecamatan'];
$query5 = mysqli_query($mysqli, "SELECT * FROM districts WHERE id='$kecamatan'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data5 = mysqli_fetch_assoc($query5);
$kelurahan = $data['kelurahan'];
$query6 = mysqli_query($mysqli, "SELECT * FROM villages WHERE id='$kelurahan'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data6 = mysqli_fetch_assoc($query6);

?>
<link rel="stylesheet" href="select2-4.0.6-rc.1/dist/css/select2.min.css">
<script src="modules/dulur/jquery-3.3.1.min.js"></script>
<script src="modules/dulur/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
<script src="modules/dulur/app2.js"></script>
<div class="bg-white rounded-4 shadow-sm p-4 mb-4">
    <!-- judul form -->
    <div class="alert alert-secondary rounded-4 mb-5" role="alert">
        <i class="fas fa-user-plus me-2"></i> Ubah Data dulur
    </div>
<?php
// menampilkan pesan sesuai dengan proses yang dijalankan
// jika pesan tersedia
if (isset($_GET['pesan'])) {
    // jika pesan = 0
    if ($_GET['pesan'] == 0) {
        // tampilkan pesan sukses simpan data
        echo '<div class="alert alert-danger alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle me-2"></i>Maaf!</strong> Data GAGAL disimpan, Silahkan cek ID.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    // jika pesan = 1
    elseif ($_GET['pesan'] == 1) {
        // tampilkan pesan sukses hapus data
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle me-2"></i>Sukses!</strong> Data BERHASIL disimpan.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

}
?>
    <!-- form entri data -->
    <form action="modules/dulur/proses_ubah.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-xl-6">
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">ID <span class="text-danger">*</span></label>
                  <input type="hidden" name="nomor_id" id="nomor_id" value="<?php echo $nomor_id; ?>" class="form-control">
                    <input type="text" name="id_dulur" id="id_dulur" value="<?php echo $id_dulur; ?>" class="form-control" disabled>
                    <div class="invalid-feedback">ID tidak boleh kosong.</div>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Bani <span class="text-danger">*</span></label>
                    <select name="bani" class="form-select" autocomplete="off" >
                        <option selected value="<?php echo $data['bani']; ?>"><?php echo $data2['bani']; ?></option>
                        <option value="1">MUSAMAH</option>
                        <option value="2">Hj. CALIMAH</option>
                        <option value="3">H. ALI IRFAN</option>
                        <option value="4">H. MOH. ROSYAD</option>
                        <option value="5">DJUDIAH</option>
                        <option value="6A">MOH. CHOLIL MARIYATOEN</option>
                        <option value="6B">MOH. CHOLIL MUCHANAH</option>
                        <option value="6C">MOH. CHOLIL SITI SODIQOH</option>
                        <option value="7">H. ACHMAD ZEIN</option>
                        <option value="8">H. ACHMAD</option>
                        <option value="9">Hj. MAIMUNATUN</option>
                    </select>
                    <div class="invalid-feedback">Jenis dulur tidak boleh kosong.</div>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" class="form-control" autocomplete="off" style="text-transform:uppercase" value="<?php echo $data['nama_lengkap']; ?>" >
                    <div class="invalid-feedback">Nama lengkap tidak boleh kosong.</div>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select name="jenis_kelamin" class="form-select" autocomplete="off" >
                        <option selected value="<?php echo $data['jenis_kelamin']; ?>"><?php echo $data['jenis_kelamin']; ?> </option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <div class="invalid-feedback">status tidak boleh kosong.</div>
                </div>
                    <div class="mb-3 pe-xl-3">
                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tanggal_lahir" class="form-control datepicker" autocomplete="off" value="<?php echo $tanggal;?>">
                        <div class="invalid-feedback">Tanggal lahir tidak boleh kosong.</div>
                    </div>
            </div>

            <div class="col-xl-6">
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">status dulur <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" autocomplete="off" >
                        <option selected value="<?php echo $data['status']; ?>"><?php if ($data['status'] == 1){echo "Keturunan";}else{echo "Menantu";} ?> </option>
                        <option value="1">Keturunan</option>
                        <option value="2">Menantu</option>
                    </select>
                    <div class="invalid-feedback">Jenis dulur tidak boleh kosong.</div>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">ID Suami / Istri <span class="text-danger">*</span></label>
                    <input type="text" name="pasangan" class="form-control" autocomplete="off" pattern="^[1-9A-Z]{1,11}$" style="text-transform:uppercase" value="<?php echo $data['pasangan']; ?>" >
                        * Wajib diisi jika Menantu.
                </div>

                <div class="mb-3 pe-xl-3">
                    <label class="form-label">ID Orang Tua <span class="text-danger">*</span></label>
                    <input type="text" name="orang_tua" class="form-control" autocomplete="off" pattern="^[1-9A-Z]{1,11}$" style="text-transform:uppercase" value="<?php echo $data['orang_tua']; ?>" >
                    * Wajib diisi jika Keturunan.
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Anak ke <span class="text-danger">*</span></label>
                    <select name="anak_ke" id="anak_ke" class="form-select" autocomplete="off" >
                        <option selected value="<?php echo $anak_ke; ?>"><?php echo $anak_ke; ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="A">10</option>
                        <option value="B">11</option>
                        <option value="C">12</option>
                        <option value="D">13</option>
                        <option value="E">14</option>
                        <option value="F">15</option>
                    </select>
                    * Wajib diisi jika Keturunan.
                </div>
                <div class="mb-3 pe-xl-3">
                   <?php
                    // sql menampilkan pekerjaan
                    $sql = mysqli_query($mysqli,"SELECT * FROM tbl_pekerjaan ORDER BY id ASC");
                   ?>
                    <label class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                    <select name="pekerjaan" id="pekerjaan" class="form-control" autocomplete="off" required>
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
            </div>
        </div>

        <hr class="mb-4-2">

        <div class="row">
            <div class="col-xl-6">
                <div class="mb-3 pe-xl-3">
                   <?php                    
                   // sql menampilkan provinsi
                    $sql_provinsi = mysqli_query($mysqli,"SELECT * FROM provinces ORDER BY name ASC");
                   ?>
                    <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                    <select name="provinsi" id="provinsi" class="form-control" autocomplete="off" required>
                        <option selected value="<?php echo $data3['id']; ?>"><?php echo $data3['name']; ?></option>
                    <?php                       
                        while($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)){ 
                           echo '<option value="'.$rs_provinsi['id'].'">'.$rs_provinsi['name'].'</option>';
                        }                        
                      ?>
                    </select>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Kabupaten <span class="text-danger">*</span></label>
                    <select name="kota" id="kota" class="form-control" autocomplete="off" required>
                        <option selected value="<?php echo $data4['id']; ?>"><?php echo $data4['name']; ?></option>
                    </select>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Kecamatan <span class="text-danger">*</span></label>
                    <select name="kecamatan" id="kecamatan" class="form-control" autocomplete="off" required>
                        <option selected value="<?php echo $data5['id']; ?>"><?php echo $data5['name']; ?></option>
                    </select>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Kelurahan <span class="text-danger">*</span></label>
                    <select name="kelurahan" id="kelurahan" class="form-control" autocomplete="off" required>
                        <option selected value="<?php echo $data6['id']; ?>"><?php echo $data6['name']; ?></option>
                    </select>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea name="alamat" rows="4" class="form-control" autocomplete="off" ><?php echo $data['alamat']; ?></textarea>
                    <div class="invalid-feedback">Alamat tidak boleh kosong.</div>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Koordinat Google Map <span class="text-danger">*</span></label>
                    <input type="text" name="koordinat" class="form-control" autocomplete="off" value="<?php echo $data['koordinat']; ?>" >
                    <div class="invalid-feedback">Koordinat tidak boleh kosong.</div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" autocomplete="off" value="<?php echo $data['email']; ?>">
                    <div class="invalid-feedback">Email tidak boleh kosong.</div>
                </div>

                <div class="mb-3 pe-xl-3">
                    <label class="form-label">WhatsApp <span class="text-danger">*</span></label>
                    <input type="text" name="whatsapp" class="form-control" maxlength="13" autocomplete="off" pattern="^(0)[2-9]\d{7,11}$" value="<?php echo $data['whatsapp']; ?>" required>
                    <div class="invalid-feedback">Silahkan isi dengan benar.</div>
                </div>
				<?php if ($data['meninggal'] == '1') { ?>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Meninggal <br>
                    <input type="checkbox" name="meninggal"  id="meninggal"value="1" checked> Meninggal

 
                </div>

				<?php } else { ?>
                <div class="mb-3 pe-xl-3">
					<label class="form-label">Meninggal </label><br>
                    <input type="checkbox" name="meninggal" id="meninggal" value="1"> Meninggal


                </div>
                  
				<?php } ?>
                <div class="mb-3 pe-xl-3" name="tgl" id="tgl">
                    <label class="form-label">Tanggal Meninggal </label><br>
                    <input type="text" name="tanggal_meninggal" id="tanggal_meninggal" class="form-control datepicker" autocomplete="off" value="<?php echo $tanggal_meninggal;?>">

                </div>

                    <div class="foto-profil-detail mt-5">
                        <img src="images/<?php echo $data['foto_profil']; ?>" alt="Foto Profil" class="img-fluid rounded-circle">
                    </div>

            </div>

				

            </div>
        </div>

        <div class="pt-4 pb-2 mt-5 border-top">
            <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1">
                <!-- button simpan data -->
                <input type="submit" name="simpan" value="Simpan" class="btn btn-outline-brand px-4">
                <!-- button kembali ke halaman tampil data -->
                <a href="?module=dulur" class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </div>
    </form>
</div>
  <script>
  $(function() {
		  if($("#meninggal").is(":checked")) {
			$("#tgl").show();
		  }
		  else
		  {
			$("#tgl").hide();
		  }
	$("#meninggal").change(function() {  
		  if($(this).is(":checked")) {
			$("#tgl").show();
		  }
		  else
		  {
			$("#tgl").hide();
		  }
	  });
  });
  </script>