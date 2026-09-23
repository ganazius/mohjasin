
<?php
require_once "config/database.php";
$image = $_POST['image'];
$nomor_id = $_POST['nomor_id'];
$query = mysqli_query($mysqli, "SELECT * FROM tbl_dulur WHERE id=$nomor_id ") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
$data = mysqli_fetch_assoc($query);
$gambar = $data['foto_profil'];

list($type, $image) = explode(';',$image);
list(, $image) = explode(',',$image);

$image = base64_decode($image);
$image_name = time().'.png';
if (file_put_contents('images/'.$image_name, $image)){
//unlink('images/'.$gambar);
$insert = mysqli_query($mysqli, "UPDATE tbl_dulur SET foto_profil='$image_name' WHERE id=$nomor_id ") or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));
}
echo 'successfully uploaded';

?>