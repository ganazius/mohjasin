<?php
// panggil file "database.php" untuk koneksi ke database
require_once "config/database.php";
// panggil file "fungsi_tanggal_indo.php" untuk membuat format tanggal indonesia
require_once "helper/fungsi_tanggal_indo.php";
$module = $_GET['module'] ?? 'dashboard';

// pemanggilan file halaman konten sesuai "module" yang dipilih
// jika module yang dipilih "dashboard"
if ($module == 'dashboard') {
    // panggil file tampil data dashboard
    include "modules/dashboard/tampil_data.php";
}
// jika module yang dipilih "dulur"
elseif ($module == 'dulur') {
    // panggil file tampil data dulur
    include "modules/dulur/tampil_data.php";
}
// jika module yang dipilih "form_entri_dulur"
elseif ($module == 'form_entri_dulur') {
    // panggil file form entri dulur
    include "modules/dulur/form_entri.php";
}
// jika module yang dipilih "form_ubah_dulur"
elseif ($module == 'form_ubah_dulur') {
    // panggil file form ubah dulur
    include "modules/dulur/form_ubah.php";
}
// jika module yang dipilih "tampil_detail_dulur"
elseif ($module == 'tampil_detail_dulur') {
    // panggil file tampil detail dulur
    include "modules/dulur/tampil_detail.php";
}
// jika module yang dipilih "tampil_pencarian_dulur"
elseif ($module == 'tampil_pencarian_dulur') {
    // panggil file tampil pencarian dulur
    include "modules/dulur/tampil_pencarian.php";
}
// jika module yang dipilih "pencarian"
elseif ($module == 'pencarian') {
    include "modules/pencarian/tampil_data.php";
}
// jika module yang dipilih "tentang"
elseif ($module == 'tentang') {
    // panggil file tampil data tentang
    include "modules/tentang/tampil_data.php";
}
// jika module yang dipilih "bani"
elseif ($module == 'dulur_bani') {
    // panggil file tampil data tentang
    include "modules/dulur/tampil_bani.php";
}
// jika module yang dipilih "bani"
elseif ($module == 'bani') {
    // panggil file tampil data tentang
    include "modules/bani/tampil_data.php";
}
// jika module yang dipilih "bani"
elseif ($module == 'dashboard_bani') {
    // panggil file tampil data tentang
    include "modules/bani/tampil_bani.php";
}
// jika module yang dipilih "form_entri_dulur"
elseif ($module == 'form_entri_bani') {
    // panggil file form entri dulur
    include "modules/dulur/form_entri_bani.php";
}
// jika module yang dipilih "form_entri_dulur"
elseif ($module == 'ubah_foto') {
    // panggil file form entri dulur
    include "modules/dulur/foto.php";
}
