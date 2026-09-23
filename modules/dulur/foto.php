<?php
include('head.php');
$nomor_id = $_GET['id'];
$id_dulur = $_GET['ids'];
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<script src="modules/dulur/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

<style>
/* Pastikan croppie-container memiliki ukuran default yang terdefinisi */
.croppie-container {
    width: 300px;
    height: 300px;
}

/* Memusatkan kontainer card utama untuk input file */
.card {
    max-width: 500px; /* Batasi lebar */
    margin: 0 auto;   /* Otomatis memusatkan card */
    padding: 20px;
    text-align: center; /* Memusatkan konten di dalam card */
}

/* Memastikan konten di dalam .card dipusatkan */
.card input[type="file"],
.card .btn-upload-image {
    margin: 0 auto;
    display: block;
}

/* Aturan CSS tambahan untuk memastikan kontainer croppie dan preview tampil rapi */
#upload-demo,
#preview-crop-image {
    /* Set ukuran yang sama untuk kedua kotak */
    width: 300px !important; 
    height: 300px !important;
}

/* Mengatasi isu flex item di layar kecil */
.d-flex.flex-wrap.justify-content-center > div {
    /* Tambahkan margin bawah di layar kecil untuk pemisah antar kotak */
    margin-bottom: 20px; 
}

/* Hapus padding yang mungkin mengganggu ukuran */
.p-4 {
    padding: 0 !important;
}
.container-gambar {
  position: relative;
  display: inline-block; /* atau block, tergantung layout */
}
.container-gambar img {
  position: absolute;
  top: 0;
  left: 0;
  width: auto; /* Sesuaikan dengan kebutuhan */
  height: 100%
}
.container-gambar img:nth-child(2) {
  /* Atur posisi gambar kedua agar tumpang tindih */
  top: 0px;
  left: 0px;
}
</style>

<div class="mb-5">
    <div class="row flex-lg-row-reverse align-items-center">
        <div class="col-lg-5 col-xl-3">
            <a href="main.php?module=tampil_detail_dulur&id=<?php echo $id_dulur; ?>" class="btn btn-secondary float-lg-end px-4 mb-4 mb-lg-0">
                <i class="fas fa-angle-left me-2"></i> Kembali
            </a>
        </div>
    </div>
</div>
<div class="bg-white rounded-4 shadow-sm p-4 mb-4">  
<div class="container">
  <div class="card">

        <strong>Masukkan file gambar:</strong><br>
        <input type="file" id="image">
        <button class="btn btn-success btn-upload-image" style="margin-top:20px;">Terapkan sebagai foto profil</button>
</div>
</div>
  <br><br>
<div class="container">

<div class="d-flex flex-wrap justify-content-center align-items-center gap-4">

<div class="p-4" id="upload-demo"></div>

<div class="p-4 container-gambar" id="preview-crop-image" style="background:#9d9d9d;width:300px;height:300px;"></div>

<input type="hidden" name="nomor_id" id="nomor_id" value="<?php echo $nomor_id; ?>" class="form-control">

</div>
</div>
</div>
<script type="text/javascript">


var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { 
        width: 200,
        height: 200,
        type: 'square' //square
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#image').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});


$('.btn-upload-image').on('click', function (ev) {
  var nomor_id = $("#nomor_id").val();
  resize.croppie('result', {
    type: 'canvas',
    size: 'original'
  }).then(function (img) {
    $.ajax({
      url: "croppie.php",
      type: "POST",
      data: {"image":img,
             "nomor_id":nomor_id},
      success: function (data) {
        html = '<img src="' + img + '" />';
        $("#preview-crop-image").html(html);
        alert("sukses");
      }
    });
  });
});


</script>