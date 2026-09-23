<script>
$(document).ready(function() {
    // 1. Tentukan URL file PHP yang akan memproses pencarian
    const searchUrl = 'modules/pencarian/proses_pencarian.php';

    // 2. Fungsi untuk melakukan pencarian AJAX
    function lakukanPencarian() {
        // Tampilkan loading indicator
        $('#hasilPencarian').html('<div class="col-12 text-center"><i class="fas fa-spinner fa-spin fa-2x"></i> Memuat data...</div>');

        // Ambil data form
        const formData = $('#formPencarianDulur').serialize();

        $.ajax({
            type: 'POST',
            url: searchUrl,
            data: formData, // Kirim data form
            dataType: 'html',
            success: function(response) {
                // Tampilkan hasil respons ke div#hasilPencarian
                $('#hasilPencarian').html(response);
            },
            error: function() {
                // Tampilkan pesan error jika terjadi kegagalan
                $('#hasilPencarian').html('<div class="col-12"><div class="alert alert-danger rounded-4" role="alert"><i class="fas fa-exclamation-triangle me-2"></i> Terjadi kesalahan saat memuat data.</div></div>');
            }
        });
    }

    // 3. Bind event ke tombol "Cari Data"
    $('#btnCari').on('click', function(e) {
        e.preventDefault(); // Mencegah form submission default
        lakukanPencarian();
    });

    // Opsional: Lakukan pencarian saat input kata kunci di-enter
    $('#kata_kunci').on('keypress', function(e) {
        if (e.which === 13) {
            e.preventDefault();
            lakukanPencarian();
        }
    });

    // Anda juga dapat memicu pencarian ketika filter (provinsi, kota, pekerjaan) berubah
    $('#provinsi, #kota, #pekerjaan').on('change', function() {
        // lakukanPencarian(); // Non-aktifkan jika ingin mencari hanya dengan klik tombol
    });
});
  </script>