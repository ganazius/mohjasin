$( document ).ready(function() {
	//untuk memanggil plugin select2

	//saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
	$("#provinsi").change(function(){
	      var id_provinces = $(this).val(); 
	      $.ajax({
	         type: "POST",
	         dataType: "html",
	         url: "data-wilayah.php?jenis=kota",
	         data: "id_provinces="+id_provinces,
	         success: function(msg){
	            $("#kota").html(msg);
	            getAjaxKota();
				$("#kota").val("-- PILIH --");
				
				
	         }
	      });                    
     });  

	$("#kota").change(getAjaxKota);
     function getAjaxKota(){
          var id_regencies = $("#kota").val();
          $.ajax({
             type: "POST",
             dataType: "html",
             url: "data-wilayah.php?jenis=kecamatan",
             data: "id_regencies="+id_regencies,
             success: function(msg){
                $("#kecamatan").html(msg);
                getAjaxKecamatan();  
				$("#kecamatan").val("-- PILIH --");
             }
          });
     }

     $("#kecamatan").change(getAjaxKecamatan);
     function getAjaxKecamatan(){
          var id_district = $("#kecamatan").val();
          $.ajax({
             type: "POST",
             dataType: "html",
             url: "data-wilayah.php?jenis=kelurahan",
             data: "id_district="+id_district,
             success: function(msg){
                $("#kelurahan").html(msg);
				$("#kelurahan").val("-- PILIH --");
             }
          });
     }
     $("#anak_ke").change(otomatis);
	 $("#status").change(otomatis);
	 $("#jenis_kelamin").change(otomatis);
	 $("#pasangan").keyup(otomatis);
	 $("#orang_tua").keyup(otomatis);
     function otomatis(){
          var status = $("#status").val();
          var orang_tua = $("#orang_tua").val();
          var anak_ke = $("#anak_ke").val();
          var pasangan = $("#pasangan").val();
          var jenis_kelamin = $("#jenis_kelamin").val();
          $.ajax({
             type: "POST",
             dataType: "html",
             url: "modules/dulur/kode.php",
			 data:{
				status: status,
				orang_tua: orang_tua,
				anak_ke: anak_ke,
				pasangan: pasangan,
				jenis_kelamin: jenis_kelamin				
             },
             success: function(msg){
                $("#id_dulur").val(msg);

             }
          });
     }


});
