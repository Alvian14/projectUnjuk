<?php
  include "koneksi.php";
  
  // Query SQL untuk mengambil total UMKM
  $query = "SELECT COUNT(*) AS total_umkm FROM umkm";
  $result = mysqli_query($conn, $query);
  
  if ($result) {
      $row = mysqli_fetch_assoc($result);
      $total_umkm = $row['total_umkm'];
  } else {
      $total_umkm = "Gagal mengambil data";
  }
  
  // Tutup koneksi database
  mysqli_close($conn);
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
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">


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

    
    <!-- template tabel data-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

      <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
      <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
      <script defer src="assets/js/tabel-daftar.js"></script>
    <!-- <link href="assets/dashboard.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="assets/dashboard.css?v=<?php echo time(); ?>">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top  flex-md-nowrap p-0 shadow" style="background-color: #235088;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center" style="background-color: #235088; font-size: 27px;"
  href="#">UNJUK <br> </a>
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
            <a class="nav-link"  style="font-size: 18px;" href="admin-warkopUmi.php">
            <i class='bx bx-upload' ></i>
              Update Warkop Umi
            </a>
          <li class="nav-item">
            <a class="nav-link" style="font-size: 18px;" href="#" onclick="konfirmasiKeluar()">
            <i class='bx bx-log-out' ></i>
              Keluar
            </a>
          </li>
        </ul>

        
      </div>
    </nav>
    <!-- ##################### pendataan kotak  ####################-->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h2>Dashboard</h2>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <section id="dasbord" class="d-flex flex-column align-items-center">
          <div class="hero-container mt-5  justify-content-center"> 
          <div class="row">
              <div class="col" style="width: 20rem;">
                  <h5 class="card-title" style="color: black; font-weight: bold;">UMKM</h5><br>
                  <span class="umkm-count"  style="color: black; font-weight: bold; font-size: 18px;"><?php echo $total_umkm; ?></span>
                  <hr style="border-top: 1px solid black; margin-top: 10px;">
                  <p class="card-text" style="color: black; font-size: 15px;">Total UMKM Terdaftar</p>
              </div>
          </div>
            
            <div class="row">
              <div class="col" style="width: 20rem;">
                <h5 class="card-title" style="color: black; font-weight: bold;">KECAMATAN</h5><br>
                <span class="umkm-count"  style="color: black; font-weight: bold; font-size: 18px;">20</span>
                <hr style="border-top: 1px solid black; margin-top: 10px;">
                <p class="card-text" style="color: black; font-size: 15px;">Total Wilayah Terdaftar</p>
              </div>
            </div>
          </div>
        </section>
      </div>
      <br>
      <br>
      <!-- ############# selesai pendataan kotak ################## -->

      <!-- ############# Tabel kecamataan ####################### -->
      <h3 class="title mt-3">Total UMKM Perkecamatan</h3>
      <div class="table-responsive">
      <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kecamatan</th>
                    <th>Jumlah UMKM</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td>1</td>
                  <td><a href='daftar-kecamatan/daftar-Bagor.php?'>Bagor</a></td>
                  <td>30</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td><a href='daftar-kecamatan/daftar-baron.php?'>Baron</a></td>
                  <td>30</td>
                </tr>   
                <tr>
                  <td>3</td>
                  <td><a href='daftar-kecamatan/daftar-berbek.php?'>Berbek</a></td>
                  <td>30</td>
                </tr>   
                <tr>
                  <td>4</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Gondang</a></td>
                  <td>30</td>
                </tr>   
                <tr>
                  <td>5</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Jatikalen</a></td>
                  <td>30</td>
                </tr>   
                <tr>
                  <td>6</td>
                  <td><a href='daftar-kecamatan/daftar-kertosono.php?'>Kertosono</a></td>
                  <td>30</td>
                </tr>   
                <tr>
                  <td>7</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Lengkong</a></td>
                  <td>30</td>
                </tr> 
                <tr>
                  <td>8</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Loceret</a></td>
                  <td>30</td>
                </tr> 
                <tr>
                  <td>9</td>
                  <td><a href='daftar-kecamatan/daftar-nganjuk.php?'>Nganjuk</a></td>
                  <td>30</td>
                </tr> 
                <tr>
                  <td>10</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Ngetos</a></td>
                  <td>30</td>
                </tr> 
                <tr>
                  <td>11</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Ngluyu</a></td>
                  <td>30</td>
                </tr> 
                <tr>
                  <td>12</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Ngronggot</a></td>
                  <td>30</td>
                </tr> 
                <tr>
                  <td>13</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Pace</a></td>
                  <td>30</td>
                </tr> 
                <tr>
                  <td>14</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Patianrowo</a></td>
                  <td>30</td>
                </tr> 
                <tr>
                  <td>15</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Prambon</a></td>
                  <td>30</td>
                </tr>
                <tr>
                  <td>16</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Rejoso</a></td>
                  <td>30</td>
                </tr>     
                <tr>
                  <td>17</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Sawahan</a></td>
                  <td>30</td>
                </tr>  
                <tr>
                  <td>18</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Sukomoro</a></td>
                  <td>30</td>
                </tr>  
                <tr>
                  <td>19</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Tanjunganom</a></td>
                  <td>30</td>
                </tr>  
                <tr>
                  <td>20</td>
                  <td><a href='daftar-kecamatan/admin-daftar.php?'>Wilangan</a></td>
                  <td>30</td>
                </tr>                      
            </tbody>
        </table>
      </div>

      <!-- ################ selesai tabel kecamatan ####################### -->

    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script >
      function konfirmasiKeluar() {
        var konfirmasi = confirm("Apakah Anda yakin ingin keluar?");
        if (konfirmasi) {
          window.location.href = "tem-login/tem-login-admin.php";
        }
      }
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
            function updateTotalUMKM() {
          // Lakukan pengambilan data dengan AJAX
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (xhttp.readyState === 4 && xhttp.status === 200) {
              var totalUMKM = xhttp.responseText;
              document.getElementById('total-umkm').textContent = totalUMKM;
            }
          };
          xhttp.open('GET', 'admin-beranda.php', true); // Ganti "ambil_total_umkm.php" dengan skrip yang sesuai
          xhttp.send();
        }

        // Perbarui total UMKM secara berkala (contoh setiap 30 detik)
        setInterval(updateTotalUMKM, 30000); // 30000 milidetik = 30 detik
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
