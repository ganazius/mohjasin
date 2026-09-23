<?php
// Pastikan koneksi database sudah di-include
include("../../config/database.php");
// Asumsi $mysqli sudah didefinisikan

// Ambil data yang dikirim melalui AJAX (POST)
$kata_kunci = isset($_POST['kata_kunci']) ? $_POST['kata_kunci'] : '';
$provinsi = isset($_POST['provinsi']) ? $_POST['provinsi'] : '';
$kota = isset($_POST['kota']) ? $_POST['kota'] : '';
$pekerjaan = isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : '';

// Bangun kondisi WHERE secara dinamis
$where_clauses = [];
if (!empty($kata_kunci)) {
    $where_clauses[] = "(id_dulur LIKE '%$kata_kunci%' OR nama_lengkap LIKE '%$kata_kunci%')";
}
// Tambahkan kondisi lain jika filter lainnya (provinsi, kota, pekerjaan) juga dikirim
if (!empty($kota) && $kota != 'null') { // Asumsi 'null' atau default value yang tidak ingin difilter
    $where_clauses[] = "id_kota = '$kota'";
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
                                " ORDER BY id_dulur DESC")
                                or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

$rows = mysqli_num_rows($query);
$cari = $rows;

// Tampilkan hasil pencarian
echo '<div class="col-12">';
echo '<div class="alert alert-secondary rounded-4 mb-5" role="alert">';
echo '<i class="far fa-hand-point-right me-2"></i> Hasil Pencarian <span class="fw-bold fst-italic">"' . htmlspecialchars($kata_kunci) . '"</span>';
echo '</div>';
echo '</div>';


if ($rows > 0) {
    // Loop untuk menampilkan setiap data
    while ($data = mysqli_fetch_assoc($query)) {
        $meninggal = $data['meninggal'];
        $style = ($meninggal == "1") ? 'style="background:gainsboro;"' : 'class="bg-white"';

        echo '<div class="col-lg-6 col-xl-3">';
        echo '<div class="rounded-4 shadow-sm text-center p-4 p-lg-4-2 mb-4 ' . $style . '">';
        echo '    <div class="foto-profil mb-4 container-gambar">';
        echo '        <img src="images/' . htmlspecialchars($data['foto_profil']) . '" alt="Foto Profil" class="img-fluid rounded-circle">';
        
        if ($meninggal == "1") {
            echo '        <img src="modules/dulur/meninggal.png" alt="Status Meninggal" class="img-fluid ">';
        }
        
        echo '    </div>';
        echo '    <h6>' . htmlspecialchars($data['nama_lengkap']) . '</h6>';
        echo '    <p class="text-muted mb-4">ID : ' . htmlspecialchars($data['id_dulur']) . '</p>';
        echo '    <a href="?module=tampil_detail_dulur&id=' . htmlspecialchars($data['id_dulur']) . '" class="btn btn-outline-brand btn-sm px-4">';
        echo '        Detail <i class="fas fa-angle-right ms-2"></i>';
        echo '    </a>';
        echo '</div>';
        echo '</div>';
    }

    echo '<div class="col-12">';
    echo '<i class="fas fa-user-circle me-1"></i>';
    echo 'Menampilkan <strong>' . $cari . '</strong> data';
    echo '</div>';

} else {
    // Tampilkan pesan data tidak ditemukan
    echo '<div class="col-12">';
    echo '<i class="far fa-question-circle me-1"></i>';
    echo 'Data dulur tidak ditemukan.';
    echo '</div>';
}
?>