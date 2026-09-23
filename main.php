<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi Pengelolaan Data Dulur">
    <meta name="author" content="Mbah Yasin">

    <!-- Title -->
    <title>Aplikasi Dulur</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/mbahyasin.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="assets/bootstrap.min.css" rel="stylesheet">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="assets/flatpickr.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Sidebar Menu -->
    <section class="sidebar-menu d-none d-md-block shadow-sm">
        <!-- Brand -->
        <div class="brand text-center mb-5">
            <!-- Logo -->
            <img src="assets/img/mbahyasin.png" alt="Logo">
            <!-- Title -->
            <h3 class="mt-4 mb-3"> Mbah<strong>Yasin</strong> </h3>
        </div>
        <div class="menus">

            <!-- panggil file "sidebar_menu.php" untuk menampilkan menu sidebar -->
            <?php include "sidebar_menu.php"; ?>

        </div>
    </section>

    <!-- Main Content -->
    <main class="content-wrapper d-block">
        <div class="container">

            <!-- panggil file "content.php" untuk menampilkan halaman konten -->
            <?php include "content.php"; ?>

        </div>
    </main>

    <!-- Mobile Menu -->
    <section class="mobile-menu d-block d-md-none">
        <div class="row bottom-navigation">
            <div class="col-12 col-lg-12">
                <div class="card-menu shadow-lg">
                    <div class="row justify-content-center">

                        <!-- panggil file "mobile_menu.php" untuk menampilkan menu mobile -->
                        <?php include "mobile_menu.php"; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Popper and Bootstrap JS -->
    <script src="assets/popper.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>

    <!-- Flatpickr JS -->
    <script src="assets/flatpickr.min.js"></script>
    <script src="assets/id.js"></script>

    <!-- Custom Scripts -->
    <script src="assets/js/flatpickr.js"></script>
    <script src="assets/js/form-validation.js"></script>
</body>

</html>