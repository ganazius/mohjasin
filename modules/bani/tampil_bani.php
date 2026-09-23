<div class="d-flex flex-column flex-lg-row mb-4">
    <!-- judul halaman -->
    <div class="flex-grow-1 d-flex align-items-center">
        <i class="fas fa-chart-line icon-title"></i>
        <h3>Bani</h3>
    </div>

</div>
<style>
a {
color : black!important;
text-decoration: none;
}
</style>
<div class="bg-white rounded-4 shadow-sm p-4 mb-4">
    <div class="row align-items-center justify-content-between">
            <h4 class="mt-3 mt-lg-0 mb-2"></h4>
    </div>
<div class="row">
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-12 col-xl-12">
    <a href="?module=bani&id=1">
        <div class="bg-white border border-3 rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <h4><p class="text-muted mb-1">BANI MUSAMAH</p>
                  	<p class="text-muted mb-1">SULAEMAN</p></h4>
                    <?php
                    // sql statement untuk menampilkan jumlah data pada tabel "tbl_dulur" berdasarkan "jenis_dulur"
                    $query = mysqli_query($mysqli, "SELECT COUNT(id_dulur) as jumlah FROM tbl_dulur WHERE orang_tua='1'")
                                                    or die('Ada kesalahan pada query jumlah data dulur : ' . mysqli_error($mysqli));
                    // ambil data hasil query
                    $data = mysqli_fetch_assoc($query);
                    // buat variabel untuk menampilkan data
                    $jumlah_dulur = $data['jumlah'];
                    ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0">Keturunan : <?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-12 col-xl-12">
    <a href="?module=bani&id=2">
        <div class="bg-white border border-3 rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                  <h4><p class="text-muted mb-1">BANI Hj. CALIMAH</p>
                  <p class="text-muted mb-1">H. KOSIM</p></h4>
                    <?php
                    // sql statement untuk menampilkan jumlah data pada tabel "tbl_dulur" berdasarkan "jenis_dulur"
                    $query = mysqli_query($mysqli, "SELECT COUNT(id_dulur) as jumlah FROM tbl_dulur WHERE orang_tua='2'")
                                                    or die('Ada kesalahan pada query jumlah data dulur : ' . mysqli_error($mysqli));
                    // ambil data hasil query
                    $data = mysqli_fetch_assoc($query);
                    // buat variabel untuk menampilkan data
                    $jumlah_dulur = $data['jumlah'];
                    ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0">Keturunan : <?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
    </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-12 col-xl-12">
    <a href="?module=bani&id=3">
        <div class="bg-white border border-3 rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <h4><p class="text-muted mb-1">BANI H. ALI IRFAN</p>
                      <p class="text-muted mb-1">ROHMATUN</p></h4>
                    <?php
                    // sql statement untuk menampilkan jumlah data pada tabel "tbl_dulur" berdasarkan "jenis_dulur"
                    $query = mysqli_query($mysqli, "SELECT COUNT(id_dulur) as jumlah FROM tbl_dulur WHERE orang_tua='3'")
                                                    or die('Ada kesalahan pada query jumlah data dulur : ' . mysqli_error($mysqli));
                    // ambil data hasil query
                    $data = mysqli_fetch_assoc($query);
                    // buat variabel untuk menampilkan data
                    $jumlah_dulur = $data['jumlah'];
                    ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0">Keturunan : <?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-12 col-xl-12">
    <a href="?module=bani&id=4">
        <div class="bg-white border border-3 rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <h4><p class="text-muted mb-1">BANI H. MOH. ROSYAD</p>
                  	<p class="text-muted mb-1">Hj. TASLIMAH</p></h4>
                    <?php
                    // sql statement untuk menampilkan jumlah data pada tabel "tbl_dulur" berdasarkan "jenis_dulur"
                    $query = mysqli_query($mysqli, "SELECT COUNT(id_dulur) as jumlah FROM tbl_dulur WHERE orang_tua='4'")
                                                    or die('Ada kesalahan pada query jumlah data dulur : ' . mysqli_error($mysqli));
                    // ambil data hasil query
                    $data = mysqli_fetch_assoc($query);
                    // buat variabel untuk menampilkan data
                    $jumlah_dulur = $data['jumlah'];
                    ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0">Keturunan : <?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-12 col-xl-12">
    <a href="?module=bani&id=5">
        <div class="bg-white border border-3 rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                 	<h4><p class="text-muted mb-1">BANI DJUDIAH</p>
                  	<p class="text-muted mb-1">FAUZAN</p></h4>
                    <?php
                    // sql statement untuk menampilkan jumlah data pada tabel "tbl_dulur" berdasarkan "jenis_dulur"
                    $query = mysqli_query($mysqli, "SELECT COUNT(id_dulur) as jumlah FROM tbl_dulur WHERE orang_tua='5'")
                                                    or die('Ada kesalahan pada query jumlah data dulur : ' . mysqli_error($mysqli));
                    // ambil data hasil query
                    $data = mysqli_fetch_assoc($query);
                    // buat variabel untuk menampilkan data
                    $jumlah_dulur = $data['jumlah'];
                    ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0">Keturunan : <?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-12 col-xl-12">
    <a href="?module=bani&id=6A">
        <div class="bg-white border border-3 rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                  <h4><p class="text-muted mb-1">BANI MOH. CHOLIL</p>
                  <p class="text-muted mb-1">MARIYATOEN</p></h4>
                    <?php
                    // sql statement untuk menampilkan jumlah data pada tabel "tbl_dulur" berdasarkan "jenis_dulur"
                    $query = mysqli_query($mysqli, "SELECT COUNT(id_dulur) as jumlah FROM tbl_dulur WHERE orang_tua='6A'")
                                                    or die('Ada kesalahan pada query jumlah data dulur : ' . mysqli_error($mysqli));
                    // ambil data hasil query
                    $data = mysqli_fetch_assoc($query);
                    // buat variabel untuk menampilkan data
                    $jumlah_dulur = $data['jumlah'];
                    ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0">Keturunan : <?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-12 col-xl-12">
    <a href="?module=bani&id=6B">
        <div class="bg-white border border-3 rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                  <h4><p class="text-muted mb-1">BANI MOH. CHOLIL</p>
                  <p class="text-muted mb-1">MUCHANAH</p></h4>
                    <?php
                    // sql statement untuk menampilkan jumlah data pada tabel "tbl_dulur" berdasarkan "jenis_dulur"
                    $query = mysqli_query($mysqli, "SELECT COUNT(id_dulur) as jumlah FROM tbl_dulur WHERE orang_tua='6B'")
                                                    or die('Ada kesalahan pada query jumlah data dulur : ' . mysqli_error($mysqli));
                    // ambil data hasil query
                    $data = mysqli_fetch_assoc($query);
                    // buat variabel untuk menampilkan data
                    $jumlah_dulur = $data['jumlah'];
                    ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0">Keturunan : <?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-12 col-xl-12">
    <a href="?module=bani&id=6C">
        <div class="bg-white border border-3 rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                  <h4><p class="text-muted mb-1">BANI MOH. CHOLIL</p>
                  <p class="text-muted mb-1">SITI SODIQOH</p></h4>
                    <?php
                    // sql statement untuk menampilkan jumlah data pada tabel "tbl_dulur" berdasarkan "jenis_dulur"
                    $query = mysqli_query($mysqli, "SELECT COUNT(id_dulur) as jumlah FROM tbl_dulur WHERE orang_tua='6C'")
                                                    or die('Ada kesalahan pada query jumlah data dulur : ' . mysqli_error($mysqli));
                    // ambil data hasil query
                    $data = mysqli_fetch_assoc($query);
                    // buat variabel untuk menampilkan data
                    $jumlah_dulur = $data['jumlah'];
                    ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0">Keturunan : <?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-12 col-xl-12">
    <a href="?module=bani&id=7">
        <div class="bg-white border border-3 rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                  <h4><p class="text-muted mb-1">BANI H. ACHMAD ZEIN</p>
                  <p class="text-muted mb-1">Hj. ROFI'AH</p></h4>
                    <?php
                    // sql statement untuk menampilkan jumlah data pada tabel "tbl_dulur" berdasarkan "jenis_dulur"
                    $query = mysqli_query($mysqli, "SELECT COUNT(id_dulur) as jumlah FROM tbl_dulur WHERE orang_tua='7'")
                                                    or die('Ada kesalahan pada query jumlah data dulur : ' . mysqli_error($mysqli));
                    // ambil data hasil query
                    $data = mysqli_fetch_assoc($query);
                    // buat variabel untuk menampilkan data
                    $jumlah_dulur = $data['jumlah'];
                    ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0">Keturunan : <?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-12 col-xl-12">
    <a href="?module=bani&id=8">
        <div class="bg-white border border-3 rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                  <h4><p class="text-muted mb-1">BANI H. ACHMAD</p>
                  <p class="text-muted mb-1">Hj. CHAMIDAH</p></h4>
                    <?php
                    // sql statement untuk menampilkan jumlah data pada tabel "tbl_dulur" berdasarkan "jenis_dulur"
                    $query = mysqli_query($mysqli, "SELECT COUNT(id_dulur) as jumlah FROM tbl_dulur WHERE orang_tua='8'")
                                                    or die('Ada kesalahan pada query jumlah data dulur : ' . mysqli_error($mysqli));
                    // ambil data hasil query
                    $data = mysqli_fetch_assoc($query);
                    // buat variabel untuk menampilkan data
                    $jumlah_dulur = $data['jumlah'];
                    ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0">Keturunan : <?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-12 col-xl-12">
    <a href="?module=bani&id=9">
        <div class="bg-white border border-3 rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                  <h4><p class="text-muted mb-1">BANI Hj. MAIMUNATUN</p>
                  <p class="text-muted mb-1">H. MOH. MUSTARI</p></h4>
                    <?php
                    // sql statement untuk menampilkan jumlah data pada tabel "tbl_dulur" berdasarkan "jenis_dulur"
                    $query = mysqli_query($mysqli, "SELECT COUNT(id_dulur) as jumlah FROM tbl_dulur WHERE orang_tua='9'")
                                                    or die('Ada kesalahan pada query jumlah data dulur : ' . mysqli_error($mysqli));
                    // ambil data hasil query
                    $data = mysqli_fetch_assoc($query);
                    // buat variabel untuk menampilkan data
                    $jumlah_dulur = $data['jumlah'];
                    ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0">Keturunan : <?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
</div>
  </div>