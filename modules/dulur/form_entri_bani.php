<?php include("head.php"); ?>
<link rel="stylesheet" href="select2-4.0.6-rc.1/dist/css/select2.min.css">
<script src="modules/dulur/jquery-3.3.1.min.js"></script>
<script src="modules/dulur/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
<script src="modules/dulur/app.js"></script>
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); 
$id_orang_tua = $_GET['id'];
$query = mysqli_query($mysqli, "SELECT * FROM tbl_dulur WHERE id_dulur='$id_orang_tua'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data = mysqli_fetch_assoc($query);
$id_bani = $data['bani'];
$query2 = mysqli_query($mysqli, "SELECT * FROM tbl_bani WHERE id='$id_bani'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data2 = mysqli_fetch_assoc($query2);
$namabani = $data2['bani'];
?>
<div class="bg-white rounded-4 shadow-sm p-4 mb-4">
    <!-- judul form -->
    <div class="alert alert-secondary rounded-4 mb-5" role="alert">
        <i class="fas fa-user-plus me-2"></i> Entri Data dulur
    </div>
    <!-- form entri data -->
    <form action="modules/dulur/proses_simpan.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="row">

            <div class="col-xl-6">
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">ID <span class="text-danger">*</span></label>
                    <input type="text" name="id_dulur" id="id_dulur" class="form-control" autocomplete="off" disabled>
                    <div class="invalid-feedback">ID tidak boleh kosong.</div>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Bani <span class="text-danger">*</span></label>
                    <select name="bani" class="form-select" autocomplete="off" required>
                        <option selected value="<?php echo $id_orang_tua; ?>"><?php echo $namabani; ?></option>
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
                    <input type="text" name="nama_lengkap" class="form-control" autocomplete="off" style="text-transform:uppercase" required>
                    <div class="invalid-feedback">Nama lengkap tidak boleh kosong.</div>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" autocomplete="off" required>
                        <option selected disabled value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <div class="invalid-feedback">Jenis dulur tidak boleh kosong.</div>
                </div>
                    <div class="mb-3 pe-xl-3">
                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tanggal_lahir" class="form-control datepicker" autocomplete="off" required>
                        <div class="invalid-feedback">Tanggal lahir tidak boleh kosong.</div>
                    </div>

            </div>

            <div class="col-xl-6">
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-select" autocomplete="off" required>
                        <option disabled value="">-- Pilih --</option>
                        <option selected value="1">Keturunan</option>
                        <option value="2">Menantu</option>
                    </select>
                    <div class="invalid-feedback">Jenis dulur tidak boleh kosong.</div>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">ID Suami / Istri <span class="text-danger">*</span></label>
                    <input type="text" name="pasangan" id="pasangan" class="form-control" autocomplete="off" pattern="^[1-9A-Z]{1,11}$" style="text-transform:uppercase" >
                        * Isi kolom ini jika Menantu.
                </div>

                <div class="mb-3 pe-xl-3">
                    <label class="form-label">ID Orang Tua <span class="text-danger">*</span></label>
                    <input type="text" name="orang_tua" id="orang_tua" class="form-control" autocomplete="off" pattern="^[1-9A-Z]{1,11}$" style="text-transform:uppercase" value="<?php echo $id_orang_tua; ?>" >
                    * Isi kolom ini jika Keturunan.
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Anak ke <span class="text-danger">*</span></label>
                    <select name="anak_ke" id="anak_ke" class="form-select" autocomplete="off" >
                        <option selected disabled value="">-- Pilih --</option>
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
                    * Isi kolom ini jika Keturunan.
                </div>
                <div class="mb-3 pe-xl-3">
                   <?php                    
                    $sql = mysqli_query($mysqli,"SELECT * FROM tbl_pekerjaan ORDER BY id ASC");
                   ?>
                    <label class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                    <select name="pekerjaan" id="pekerjaan" class="form-control" autocomplete="off" required>
                        <option selected disabled value="">-- Pilih --</option>
                    <?php                       
                        while($pekerjaan = mysqli_fetch_assoc($sql)){ 
                           echo '<option value="'.$pekerjaan['id'].'">'.$pekerjaan['pekerjaan'].'</option>';
                        }                        
                      ?>
                    </select>
                </div>
            </div>
        </div>

        <hr class="mb-4-2">

        <div class="row">
            <div class="col-xl-6">
                <div class="mb-3 pe-xl-3">
                   <?php                    
                    $sql_provinsi = mysqli_query($mysqli,"SELECT * FROM provinces ORDER BY name ASC");
                   ?>
                    <label class="form-label">Propinsi <span class="text-danger">*</span></label>
                    <select name="provinsi" id="provinsi" class="form-control" autocomplete="off" required>
                        <option selected disabled value="">-- Pilih --</option>
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
                        <option selected disabled value="">-- Pilih --</option>
                    </select>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Kecamatan <span class="text-danger">*</span></label>
                    <select name="kecamatan" id="kecamatan" class="form-control" autocomplete="off" required>
                        <option selected disabled value="">-- Pilih --</option>
                    </select>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Kelurahan <span class="text-danger">*</span></label>
                    <select name="kelurahan" id="kelurahan" class="form-control" autocomplete="off" required>
                        <option selected disabled value="">-- Pilih --</option>
                    </select>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea name="alamat" rows="4" class="form-control" autocomplete="off" required></textarea>
                    <div class="invalid-feedback">Alamat tidak boleh kosong.</div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Koordinat Google Map <span class="text-danger">*</span></label>
                    <input type="text" name="koordinat" class="form-control" autocomplete="off">
                    <div class="invalid-feedback">Nama lengkap tidak boleh kosong.</div>
                </div>
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" autocomplete="off">
                    <div class="invalid-feedback">Email tidak boleh kosong.</div>
                </div>

                <div class="mb-3 pe-xl-3">
                    <label class="form-label">WhatsApp <span class="text-danger">*</span></label>
                    <input type="text" name="whatsapp" class="form-control" maxlength="13" autocomplete="off" pattern="^(0)[2-9]\d{7,11}$" required>
                    <div class="invalid-feedback">Silahkan isi dengan benar.</div>
                </div>


            </div>
        </div>

        <div class="pt-4 pb-2 mt-5 border-top">
            <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1">
                <!-- button simpan data -->
                <input type="submit" name="simpan" value="Simpan" class="btn btn-outline-brand px-4">
                <!-- button kembali ke halaman tampil data -->
                <a href="?module=bani&id=<?php echo $id_orang_tua; ?> " class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </div>
    </form>
</div>
