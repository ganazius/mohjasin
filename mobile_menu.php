<?php
// pengecekan menu aktif
// jika menu dashboard dipilih, menu dashboard aktif
if ($_GET['module'] == 'dashboard') { ?>
    <div class="col-3 item-menu active text-center">
        <a href="?module=dashboard">
            <i class="fas fa-chart-line"></i>
        </a>
    </div>
<?php
}
// jika tidak dipilih, menu dashboard tidak aktif
else { ?>
    <div class="col-3 item-menu text-center">
        <a href="?module=dashboard">
            <i class="fas fa-chart-line"></i>
        </a>
    </div>
<?php
}

// jika menu dulur (tampil data / tampil detail / form entri / form ubah / tampil pencarian) dipilih, menu dulur aktif
if ($_GET['module'] == 'dashboard_bani' || $_GET['module'] == 'dashboard_bani' || $_GET['module'] == 'form_entri_bani'  || $_GET['module'] == 'dulur_bani') { ?>
    <div class="col-3 item-menu active text-center">
        <a href="?module=dashboard_bani">
            <i class="far fa-user"></i>
        </a>
    </div>
<?php
}
// jika tidak dipilih, menu dulur tidak aktif
else { ?>
    <div class="col-3 item-menu text-center">
        <a href="?module=dashboard_bani">
            <i class="far fa-user"></i>
        </a>
    </div>
<?php
}

// jika menu laporan dipilih, menu laporan aktif
if ($_GET['module'] == 'dulur' || $_GET['module'] == 'tampil_detail_dulur' || $_GET['module'] == 'form_entri_dulur' || $_GET['module'] == 'form_ubah_dulur' || $_GET['module'] == 'tampil_pencarian_dulur') { ?>
    <div class="col-3 item-menu active text-center">
        <a href="?module=dulur">
            <i class="far fa-file-alt"></i>
        </a>
    </div>
<?php
}
// jika tidak dipilih, menu laporan tidak aktif
else { ?>
    <div class="col-3 item-menu text-center">
        <a href="?module=dulur">
            <i class="far fa-file-alt"></i>
        </a>
    </div>
<?php
}

// jika menu tentang aplikasi dipilih, menu tentang aplikasi aktif
if ($_GET['module'] == 'tentang') { ?>
    <div class="col-3 item-menu active text-center">
        <a href="?module=tentang">
            <i class="fas fa-info"></i>
        </a>
    </div>
<?php
}
// jika tidak dipilih, menu tentang aplikasi tidak aktif
else { ?>
    <div class="col-3 item-menu text-center">
        <a href="?module=tentang">
            <i class="fas fa-info"></i>
        </a>
    </div>
<?php
}
?>