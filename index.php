<?php
  //   // Hubungkan ke database MySQL (ganti dengan informasi koneksi Anda)
  include "koneksi.php";

  // Ambil data kegiatan dan urutkan berdasarkan tanggal secara descending
  $sql = "SELECT * FROM kegiatan ORDER BY id_kegiatan DESC";
  $result = mysqli_query($conn, $sql);
  
  if (!$result) {
      echo "Gagal mengambil data kegiatan: " . mysqli_error($conn);
      exit; // Keluar dari skrip jika terjadi kesalahan
  }


    date_default_timezone_set('Asia/Jakarta');

    // Hapus data kegiatan yang sudah lewat
    $sqlDelete = "DELETE FROM kegiatan WHERE STR_TO_DATE(CONCAT(tgl, ' ', jam), '%Y-%m-%d %H:%i:%s') < NOW()";
    mysqli_query($conn, $sqlDelete);
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
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="assets/css/warta.css?v=<?php echo time(); ?>">


  <!-- bootstrap css -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top  " style="background-color: #235088;">
    <div class="container d-flex align-items-center">
      <!-- <img src="assets/img/logoUnjuk.png" width="80px"> -->
      <h1 class="logo me-auto "><a href="index.php">UNjuk</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Warkop Umi</a></li>
          <li><a class="nav-link scrollto" href="user-layanan.php">Layanan</a></li>
          <li class="dropdown"><a href="#"><span>Produk</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="user-makanan.php">Makanan</a></li>
              <li><a href="user-minuman.php">Minuman</a></li>
              <li><a href="user-jasa.php">Jasa</a></li>
              <li><a href="user-kerajinan.php">Kerajinan</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#footer">Tentang Kami</a></li>
          <li><a class="getstarted scrollto" href="tem-login/tem-login-admin.php">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->



 <section id="index.php">
    <div id="wrapper" >
      <div class="kotak">
          <h1 >
          Warta Koperasi Usaha Mikro</h1>
      </div>
    </div>

    <!-- pembuatan kegiatan -->
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="container-kotak mt-4">';
        echo '<div class="image-container">';
        echo '<img class="image" src="' . $row['foto'] . '" alt="Gambar">';
        echo '</div>';
        echo '<div class="content">';
        echo '<div class="title">' . $row['judul'] . '</div>';
        echo 'Tanggal: ' . $row['tgl'] . '<br>';
        echo 'Jam: ' . $row['jam'];
        echo '<div class="description">' . $row['deskripsi'] . '</div>';
        echo '<div class="datetime">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>


 </section>
 

 



  

    
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<!-- <section id="tentang-kami"> -->
  <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 footer-contact mx-auto ml-auto">
              <h3 class= "deskripsi" style="position: relative; top: 1px; font-weight:bold;">UNjuk</h3>
              <p style="font-size: 15px; position: relative; top: 12px;" >
                UNjuk merupakan wadah bagi para UMKM <br>
                makanan, minuman, dan jasa di seluruh kabupaten
                Nganjuk untuk menjual produk-produk mereka secara online.
              </p>
            </div>

            <div class="col-lg-3 col-md-6 footer-links " style="margin-right: 10%; ">
              <h4 class="h4-footer" style="font-size: 27px; font-weight: 20px;">HUBUNGI KAMI</h4>
              <ul>
                <li><i class='bx bxs-map' style='color:#47b2e4'  ></i> <a href="https://www.google.com/maps/place/Dinas+Koperasi+dan+Usaha+Mikro/@-7.6049351,111.901719,18z/data=!4m10!1m2!2m1!1sdinas+umkm+nganjuk!3m6!1s0x2e784be46b1960a5:0x58cb6e8a299f3789!8m2!3d-7.605574!4d111.9044225!15sChJkaW5hcyB1bWttIG5nYW5qdWvgAQA!16s%2Fg%2F11s7x1mw73?entry=ttu" target="_blank"> 
                  Jl. Dipojegoro No.77, Nganjuk, Ganung Kidul <br>
                </a></li>
                <li><i class='bx bxs-envelope' style='color:#47b2e4' ></i> <a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcRzDQzBpZKMkfcCQnLhscHZwHbMLVLBrMJpTctQqCCBscGhTQRmqkQTLZLsRDQWstRGbMJNr" target="_blank">
                  diskopumnganjuk@gmail.com</a></li>
                <li><i class='bx bxs-phone' style='color:#47b2e4' ></i> <a href=""> Toll Free: 0-832-1-512-555</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links" >
              <h4 style="font-size: 27px;">IKUTI KAMI</h4>
              <div class="social-links mt-3" style=" position:relative; top: -9px; left:2px;  ">
                <!-- <a href="https://www.instagram.com/diskopum_kab.nganjuk/" target="_blank" class="instagram"><i class='bx bxl-instagram-alt'></i></a> -->
                <ul>
                <li><i class='bx bxl-instagram-alt bx-sm' style='color:#47b2e4'  ></i> <a href="https://www.instagram.com/diskopum_kab.nganjuk/" target="_blank"> 
                  diskopum_kab.nganjuk <br>
                </a></li>
                <!-- <p style=" position:relative; top: -29px; left: 40px; ">@diskopum_kab.nganjuk</p> -->
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="container footer-bottom clearfix">
        <div class="copyright" id="copyright">
        Copyright &copy; 2023 <strong><span>M-fast</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
          <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
        </div>
      </div>
    </footer><!-- End Footer -->
  <!-- </section> -->

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


  <!-- js bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/klik-menu.js"></script>        
</body>

</html>

