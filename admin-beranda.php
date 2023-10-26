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



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Umkm Mikro</title>

  

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="https://boxicons.com/css/boxicons.min.css">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">


    <link rel="website icon" href="tem-login/images/logoUnjuk.png">

    <!-- Bootstrap core CSS -->
<link href="assets1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="assets1/dashboard.css?v=<?php echo time(); ?>">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top  flex-md-nowrap p-0 shadow" style="background-color: #235088;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" style="background-color: #235088; font-size: 27px;"
  href="#">UNjuk <br> </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse  mt-3" > 
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active"  style="font-size: 18px;"  aria-current="page" href="#" >
            <i class="bx bx-home"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  style="font-size: 18px;" href="coba.html">
            <i class='bx bx-upload' ></i>
              Update Warkop Umi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 18px;"  href="#">
            <i class='bx bx-upload' ></i>
              Update Layanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 18px;" href="?logout=true">
            <i class='bx bx-log-out' ></i>
              Keluar
            </a>
          </li>
        </ul>

        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h2>Dashboard</h2>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <section id="dasbord" class="d-flex flex-column align-items-center">
          <div class="hero-container mt-5 d-flex justify-content-center"> 
            <div class="row">
              <div class="col" style="width: 20rem;  ">
                <h5 class="card-title" style="color: black; font-weight: bold;">
                UMKM</h5>
                <hr class="line" style="margin-top: 10px;">
                <p class="card-text " style="color: black; font-size: 15px;" >
                  Total UMKM Terdaftar</p>
              </div>
            </div>
            
            <div class="row">
              <div class="col" style="width: 20rem;  ">
                <h5 class="card-title" style="color: black; font-weight: bold;">
                KECAMATAN</h5>
                <hr>
                <p class="card-text " style="color: black; font-size: 15px;" >
                  Total Wilayah Terdaftar</p>
              </div>
            </div> 
          </div>
        </section>
      </div>
      <br>
      <br>

      <h3 class="title mt-3">Total UMKM Perkecamatan</h3>
      <div class="table-responsive">
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
              <td>random</td>
              <td>data</td>
              
            </tr>
            <tr>
              <td>2</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              
            </tr>
           
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="assets1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/konfirmasi.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
