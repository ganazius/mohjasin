<?php
// Ambil seluruh statistik bani dalam satu query agar dashboard tidak menjalankan
// satu query COUNT untuk setiap kartu statistik.
$bani_counts = [];
$stats_query = mysqli_query($mysqli, "SELECT bani, COUNT(*) AS jumlah FROM tbl_dulur GROUP BY bani")
    or die('Ada kesalahan pada query statistik dashboard : ' . mysqli_error($mysqli));
while ($stats = mysqli_fetch_assoc($stats_query)) {
    $bani_counts[(string) $stats['bani']] = (int) $stats['jumlah'];
}
?>
<div class="d-flex flex-column flex-lg-row mb-4">
    <!-- judul halaman -->
    <div class="flex-grow-1 d-flex align-items-center">
        <i class="fas fa-chart-line icon-title"></i>
        <h3>Dashboard</h3>
    </div>

</div>
<style>
a {
color : black!important;
text-decoration: none;
}
</style>
<!-- tampilkan pesan selamat datang -->
<div class="bg-white rounded-4 shadow-sm p-4 mb-5">
    <div class="row align-items-center justify-content-between">
        <div class="col-lg-3 d-block mt-xxl-n4">
            <img class="img-fluid px-xl-4 mt-xxl-n5" src="assets/img/cute-vector-islamic-family_10781319.png">
        </div>
        <div class="col-lg-9">
            <h4 class="mt-3 mt-lg-0 mb-2">Silahkan pantau <strong>Informasi</strong>!</h4>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="?module=dulur" target="_self" class="btn btn-outline-brand">Lihat Dulur <i class="fas fa-angle-right ms-3"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="bg-white rounded-4 shadow-sm p-4 mb-5">
    <div class="row align-items-center justify-content-between">
            <h4 class="mt-3 mt-lg-0 mb-2">Jumlah Dulur per Bani!</h4>
    </div>
  </div>
<div class="row">
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-6 col-xl-3">
    <a href="?module=dulur_bani&id=1">
        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <p class="text-muted mb-1">BANI MUSAMAH</p>
                  <p class="text-muted mb-1">SULAEMAN</p>
                    <?php $jumlah_dulur = $bani_counts['1'] ?? 0; ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0"><?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-6 col-xl-3">
    <a href="?module=dulur_bani&id=2">
        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <p class="text-muted mb-1">BANI Hj. CALIMAH</p>
                  <p class="text-muted mb-1">H. KOSIM</p>
                    <?php $jumlah_dulur = $bani_counts['2'] ?? 0; ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0"><?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
    </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-6 col-xl-3">
    <a href="?module=dulur_bani&id=3">
        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <p class="text-muted mb-1">BANI H. ALI IRFAN</p>
                  <p class="text-muted mb-1">ROHMATUN</p>
                    <?php $jumlah_dulur = $bani_counts['3'] ?? 0; ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0"><?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-6 col-xl-3">
    <a href="?module=dulur_bani&id=4">
        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <p class="text-muted mb-1">BANI H. MOH. ROSYAD</p>
                  <p class="text-muted mb-1">Hj. TASLIMAH</p>
                    <?php $jumlah_dulur = $bani_counts['4'] ?? 0; ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0"><?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-6 col-xl-3">
    <a href="?module=dulur_bani&id=5">
        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <p class="text-muted mb-1">BANI DJUDIAH</p>
                  <p class="text-muted mb-1">FAUZAN</p>
                    <?php $jumlah_dulur = $bani_counts['5'] ?? 0; ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0"><?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-6 col-xl-3">
    <a href="?module=dulur_bani&id=6A">
        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <p class="text-muted mb-1">BANI MOH. CHOLIL</p>
                  <p class="text-muted mb-1">MARIYATOEN</p>
                    <?php $jumlah_dulur = $bani_counts['6A'] ?? 0; ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0"><?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-6 col-xl-3">
    <a href="?module=dulur_bani&id=6B">
        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <p class="text-muted mb-1">BANI MOH. CHOLIL</p>
                  <p class="text-muted mb-1">MUCHANAH</p>
                    <?php $jumlah_dulur = $bani_counts['6B'] ?? 0; ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0"><?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-6 col-xl-3">
    <a href="?module=dulur_bani&id=6C">
        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <p class="text-muted mb-1">BANI MOH. CHOLIL</p>
                  <p class="text-muted mb-1">SITI SODIQOH</p>
                    <?php $jumlah_dulur = $bani_counts['6C'] ?? 0; ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0"><?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-6 col-xl-3">
    <a href="?module=dulur_bani&id=7">
        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <p class="text-muted mb-1">BANI H. ACHMAD ZEIN</p>
                  <p class="text-muted mb-1">Hj. ROFI'AH</p>
                    <?php $jumlah_dulur = $bani_counts['7'] ?? 0; ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0"><?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-6 col-xl-3">
    <a href="?module=dulur_bani&id=8">
        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <p class="text-muted mb-1">BANI H. ACHMAD</p>
                  <p class="text-muted mb-1">Hj. CHAMIDAH</p>
                    <?php $jumlah_dulur = $bani_counts['8'] ?? 0; ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0"><?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
    <!-- menampilkan informasi jumlah dulur -->
    <div class="col-lg-6 col-xl-3">
    <a href="?module=dulur_bani&id=9">
        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
            <div class="d-flex align-items-center justify-content-start">
                <div class="me-4">
                    <i class="fas fa-user-friends icon-widget"></i>
                </div>
                <div>
                    <p class="text-muted mb-1">BANI Hj. MAIMUNATUN</p>
                  <p class="text-muted mb-1">H. MOH. MUSTARI</p>
                    <?php $jumlah_dulur = $bani_counts['9'] ?? 0; ?>
                    <!-- tampilkan data -->
                    <h5 class="fw-bold mb-0"><?php echo number_format($jumlah_dulur, 0, '', '.'); ?></h5>
                </div>
            </div>
        </div>
        </a>
    </div>
</div>
