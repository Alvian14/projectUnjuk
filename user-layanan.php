
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

  <style>
   .kotak {
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out; /* Animasi saat hovered */
  }

  .kotak:hover {
    transform: scale(1.05); /* Membesar saat hovered */
  }

  .card-body {
    padding: 20px;
  }
  
  </style>

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


  <!-- makanan -->
  <section id="layanan">
    <div id="wrapper" >
      <div class="kotak">
          <h1 style="font-family: 'Jost', sans-serif ; color: white; font-size: 27px; margin-left: 10px;">
          Layanan</h1>
      </div>
    </div>
    
                <div class="container mt-5">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="kotak text-center" style=" box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.1), 0px 4px 6px rgba(0, 0, 0, 0.1);">
                                <i class='bx bxs-clinic bx-tada bx-lg' style='color:#47b2e4' ></i>
                                <div class="card-body">
                                    <h5 class="card-title">Klinik UMKM Go Digital</h5>
                                    <p class="card-text mt-3">Membantu penjualan platfrom digital.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="kotak text-center" style="box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.1), 0px 4px 6px rgba(0, 0, 0, 0.1);">
                                <i class='bx bxs-file-doc bx-tada bx-lg' style='color:#47b2e4'  ></i>
                                <div class="card-body">
                                    <h5 class="card-title">Fasilitas Perizinan</h5>
                                    <p class="card-text mt-3">Untuk Perizinan NIB / PIRT/ HALAL.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="kotak text-center" style="box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.1), 0px 4px 6px rgba(0, 0, 0, 0.1);">
                                <i class='bx bxs-magic-wand bx-tada bx-lg' style='color:#47b2e4' ></i>
                                <div class="card-body">
                                    <h5 class="card-title">Design Kemasan</h5>
                                    <p class="card-text mt-3">Membantu para UMKM untuk membuat desain.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mt-5 ">
                    <div class="row g-4 justify-content-center align-items-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="kotak text-center " style=" box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.1), 0px 4px 6px rgba(0, 0, 0, 0.1);">
                                <i class='bx bxs-store bx-tada bx-lg' style='color:#47b2e4' ></i>
                                <div class="card-body">
                                    <h5 class="card-title">Market Hub</h5>
                                    <p class="card-text mt-3">Layanan Marketplace.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="kotak text-center " style="box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.1), 0px 4px 6px rgba(0, 0, 0, 0.1);">
                                  <i class='bx bx-trending-up bx-tada bx-lg' style='color:#47b2e4' ></i>
                                  <div class="card-body">
                                    <h5 class="card-title">Affiliate Program</h5>
                                      <p class="card-text mt-3">Membantu menjual produk pelaku UMKM.</p>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="informasi container mt-5 ">
                        <p>Terimakasih Telah menggunakan layanan klinik UMKM Digital Dinas Koperasi & Usaha Mikro Kab Nganjuk</p>
                        <p>Untuk Pelayanan melalui form Klik dibawah ini:</p>
                        <a href="https://forms.gle/x1r1v2UeVDaYXkpP7" target="_blank">Klik Disini</a>
                        <p>Untuk Layanan :</p>
                        <ol>
                            <li>Klinik UMKM Go Digital</li>
                            <li>Fasilitasi Perizinan NIB / PIRT /Halal</li>
                            <li>Design Kemasan</li>
                            <li>Market Hub</li>
                            <li>Affiliate Program</li>
                        </ol>
                        <p>Info lebih lanjut bisa via WhatsApp (WA)</p>
                        <p><a href="https://api.whatsapp.com/send?phone=+62 856-4892-0999" target="_blank">Hubungi Kami di WhatsApp</a></p>
                        
                </div> 
  



  </section>
 <!-- end makanan -->




 <!-- footer -->
  <footer id="footer">
    <div class="footer-top mt-5">
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
      </div>
    </div>
  </footer><!-- End Footer -->


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