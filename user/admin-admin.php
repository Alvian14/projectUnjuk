<?php
// Mulai session PHP jika belum dimulai
session_start();

if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    // Lakukan tindakan logout di sini (seperti unset($_SESSION['user']) atau sesuai kebutuhan)

    // Mengatur header cache agar halaman tidak bisa dikembalikan
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Redirect ke halaman login atau halaman lain setelah logout
    header("Location: tem-login/tem-login-admin.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Umkm mikro</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logoUnjuk.png" rel="website icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/dashboard.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Button untuk mode mobile======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header" style="background-color: #235088;">
    <div class="d-flex flex-column">

      <div class="profile">
      <img src="assets/img/logoUnjuk.png" alt="" class="img-fluid rounded-circle" style="border: none">
        <h1 class="text-light"><a href="index.html">Dinas Koperasi & <br> Umkm Nganjuk</a></h1>
        
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="admin-dashboard.php" class="nav-link scrollto "><i class="bx bx-home"></i><span>Dashboard</span></a></li>
          <li><a href="admin-notifikasi.php" class="nav-link scrollto"><i class='bx bx-bell' ></i><span>Notifikasi</span></a></li>
          <li><a href="admin-admin.php" class="nav-link scrollto active"><i class='bx bx-user-circle'></i><span>Admin</span></a></li>
          <li><a href="?logout=true" id="logout-link" class="nav-link scrollto"><i class='bx bx-log-out' ></i> <span>Keluar</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center"> 
    <div class="hero-container">
      <h1>aku disini admin</h1>
    </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    

    <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Jumlah UMKM</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td><a href="admin-daftar.php">Bagor</a></td>
                <td>data</td>
                
              </tr>
              <tr>
                <td>2</td>
                <td>Baron</td>
                <td>irrelevant</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Berbek</td>
                <td>irrelevant</td>
              </tr>
            
            </tbody>
          </table>

    

    
    
    

  <!-- ======= Footer ======= -->
  <footer id="footer" style="background-color: 235088;">
    <div class="container">
      <div class="copyright">
      Copyright &copy; 2023 <strong><span>M-fast</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/dropDown.js"></script>
  <script src="assets/js/konfirmasi.js"></script>
  
</body>

</html>