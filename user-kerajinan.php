<?php
// Membuat koneksi ke database
  include "koneksi.php";
// Menjalankan kueri SQL
$query = "SELECT pd.gambar_produk1, pd.nama_produk, um.nama_umkm, um.notelp_umkm, pd.harga_prooduk
          FROM produk AS pd
          INNER JOIN umkm AS um
          ON pd.id_umkm = um.id_umkm
          WHERE pd.katergori_produk = 'Kerajinan'";

$result = mysqli_query($conn, $query);

// Memeriksa hasil kueri
if (!$result) {
    die("Kesalahan dalam eksekusi kueri: " . mysqli_error($conn));
}

// Sekarang Anda dapat menggunakan hasil kueri dengan aman
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Umkm mikro</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- icon web -->
  <link rel="website icon" href="assets/img/logoUnjuk.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top  " style="background-color: #235088;">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">UNjuk</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Warkop Umi</a></li>
          <li><a class="nav-link scrollto" href="user-layanan.php">Layanan</a></li>
          <li class="dropdown active"><a href="#"><span>Produk</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="user-makanan.php">Makanan</a></li>
              <li><a href="user-minuman.php">Minuman</a></li>
              <li><a href="user-jasa.php">Jasa</a></li>
              <li><a href="user-kerajinan.php">Kerajinan</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="user-tentangKami.php">Tentang Kami</a></li>
          <li><a class="getstarted scrollto" href="tem-login/tem-login-admin.php">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <!-- makanan -->
  <section id="user-kerajinan.php">
    <div id="wrapper" >
      <div class="kotak">
          <h1 style="font-family: 'Jost', sans-serif ; color: white; font-size: 27px; margin-left: 10px;">
          Kerajinan</h1>
          <input type="search" id="searchInput" name="search" placeholder="   Cari Makanan...">
      </div>
    </div>

    <!-- menampilkan card produk -->
    <div class="container mt-4">
      <div class="row">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <div class="col-6 col-md-4 col-lg-3 mb-4">
                  <div class="card">
                      <a href="index.php">
                          <img src="assets/img/makanan.png" class="card-img-top" alt="Gambar Produk">
                      </a>
                      <div class="card-body">
                          <h5 class="card-title" ><?php echo $row['nama_produk']; ?></h5>
                          <p class="card-text" style="margin: 10px 0;"><?php echo $row['nama_umkm']; ?></p>
                          <p class="card-text" style="margin: 7px 0;"><?php echo $row['notelp_umkm']; ?></p>
                          <p class="card-text" style="color: #47B2E4; font-weight:bold;">Rp <?php echo $row['harga_prooduk']; ?></p>
                      </div>
                  </div>
              </div>
          <?php } ?>
      </div>
  </div>
      <!-- selesai menampilkan card produk -->
 </section>
 

 
  <!-- end makanan -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/klik-menu.js"></script>
</body>

</html>