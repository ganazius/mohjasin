<?php
// pengecekan menu aktif
// jika menu dashboard dipilih, menu dashboard aktif
if ($_GET['module'] == 'dashboard') { ?>
	<div class="item active d-flex align-items-center">
		<i class="fas fa-chart-line"></i>
		<a href="?module=dashboard"> Dashboard </a>
	</div>
<?php
}
// jika tidak dipilih, menu dashboard tidak aktif
else { ?>
	<div class="item d-flex align-items-center">
		<i class="fas fa-chart-line"></i>
		<a href="?module=dashboard"> Dashboard </a>
	</div>
<?php
}

// jika menu dulur (tampil data / tampil detail / form entri / form ubah / tampil pencarian) dipilih, menu dulur aktif
if ($_GET['module'] == 'bani' || $_GET['module'] == 'dashboard_bani' || $_GET['module'] == 'form_entri_bani' || $_GET['module'] == 'dulur_bani') { ?>
	<div class="item active d-flex align-items-center">
		<i class="far fa-user"></i>
		<a href="?module=dashboard_bani"> Bani </a>
	</div>
<?php
}
// jika tidak dipilih, menu member tidak aktif
else { ?>
	<div class="item d-flex align-items-center">
		<i class="far fa-user"></i>
		<a href="?module=dashboard_bani"> Bani </a>
	</div>
<?php
}

// jika menu laporan dipilih, menu laporan aktif
if ($_GET['module'] == 'dulur' || $_GET['module'] == 'tampil_detail_dulur' || $_GET['module'] == 'form_entri_dulur' || $_GET['module'] == 'form_ubah_dulur' || $_GET['module'] == 'tampil_pencarian_dulur') { ?>
	<div class="item active d-flex align-items-center">
		<i class="far fa-file-alt"></i>
		<a href="?module=dulur"> Dulur </a>
	</div>
<?php
}
// jika tidak dipilih, menu laporan tidak aktif
else { ?>
	<div class="item d-flex align-items-center">
		<i class="far fa-file-alt"></i>
		<a href="?module=dulur"> Dulur </a>
	</div>
<?php
}

// jika menu tentang aplikasi dipilih, menu tentang aplikasi aktif
if ($_GET['module'] == 'tentang') { ?>
	<div class="item active d-flex align-items-center">
		<i class="fas fa-info"></i>
		<a href="?module=tentang"> Informasi </a>
	</div>
<?php
}
// jika tidak dipilih, menu tentang aplikasi tidak aktif
else { ?>
	<div class="item d-flex align-items-center">
		<i class="fas fa-info"></i>
		<a href="?module=tentang"> Informasi </a>
	</div>
<?php
}
?>