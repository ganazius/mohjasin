<?php
	$status=$_POST['status'];
	$orang_tua=$_POST['orang_tua'];
	$anak_ke=$_POST['anak_ke'];
	$pasangan=$_POST['pasangan'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
    if ($status == "1") {
        $id_dulur = "$orang_tua$anak_ke";
    } else {
        if ($jenis_kelamin == "1") {
            $id_dulur = "$pasangan" . "s";
        } else {
            $id_dulur = "$pasangan" . "i";
        }
    }
$data = $id_dulur;
echo $data;
?>