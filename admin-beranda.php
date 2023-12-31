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


  include "koneksi.php";  
  // menampilkan jumlah produk terdaftar
  $query = "SELECT COUNT(*) AS total_produk FROM produk";
  $result = mysqli_query($conn, $query);
  
  if ($result) {
      $row = mysqli_fetch_assoc($result);
      $total_produk = $row['total_produk'];
  } else {
      $total_produk = "Gagal mengambil data";
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
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
      <h2 class="mt-4 mb-4">Dashboard</h2>
      <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card bg-light">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title" style="color: black; font-weight: bold;">UMKM</h5>
                        <p class="card-text" style="color: black; font-size: 18px;"><?php echo $total_umkm; ?></p>
                        <hr style="border-top: 1px solid black; margin-top: 10px;">
                        <p class="card-text" style="color: black; font-size: 15px;">Total UMKM Terdaftar</p>
                    </div>
                    <i class='bx bxs-store bx-lg'></i> 
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card bg-light">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title" style="color: black; font-weight: bold;">PRODUK</h5>
                        <p class="card-text" style="color: black; font-size: 18px;"><?php echo $total_produk?></p>
                        <hr style="border-top: 1px solid black; margin-top: 10px;">
                        <p class="card-text" style="color: black; font-size: 15px;">Total Produk Terdaftar</p>
                    </div>
                    <i class='bx bxs-box bx-lg'></i> <!-- Ganti dengan ikon Boxicons sesuai kebutuhan -->
                </div>
            </div>
        </div>
    </div>
      <br>
      <br>
      <!-- ############# selesai pendataan kotak ################## -->

      <!-- ############# Tabel kecamataan ####################### -->
      <?php
        if (isset($_GET['kecamatan'])) {
            $kecamatan = $_GET['kecamatan'];
            header("Location: daftar-perkecamatan.php/daftar-$kecamatan.php");
            exit();
        }

        
          // data bagor
          include "koneksi.php";
          $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Bagor'";

          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
              // Ambil hasil dari query
              $row = mysqli_fetch_assoc($result);
              $jumlah_umkm_bagor = $row["jumlah_umkm"];
          } else {
              $jumlah_umkm_bagor = 0;
          }
          mysqli_close($conn);


          // data baron
        include "koneksi.php";
        $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Baron'";

          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
              // Ambil hasil dari query
              $row = mysqli_fetch_assoc($result);
              $jumlah_umkm_baron = $row["jumlah_umkm"];
          } else {
              $jumlah_umkm_baron = 0;
          }
          mysqli_close($conn);


          // data berbek
          include "koneksi.php";
          $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Berbek'";
  
            $result = mysqli_query($conn, $sql);
  
            if (mysqli_num_rows($result) > 0) {
                // Ambil hasil dari query
                $row = mysqli_fetch_assoc($result);
                $jumlah_umkm_berbek = $row["jumlah_umkm"];
            } else {
                $jumlah_umkm_berbek = 0;
            }
            mysqli_close($conn);


            // data gondang
          include "koneksi.php";
          $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Gondang'";
  
            $result = mysqli_query($conn, $sql);
  
            if (mysqli_num_rows($result) > 0) {
                // Ambil hasil dari query
                $row = mysqli_fetch_assoc($result);
                $jumlah_umkm_gondang = $row["jumlah_umkm"];
            } else {
                $jumlah_umkm_gondang = 0;
            }
            mysqli_close($conn);


            // data jatikalen
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Jatikalen'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_jatikalen = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_jatikalen = 0;
              }
              mysqli_close($conn);  


              // data kertosono
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Kertosono'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_kertosono = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_kertosono = 0;
              }
              mysqli_close($conn);  


              // data lengkong
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Lengkong'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_lengkong = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_lengkong = 0;
              }
              mysqli_close($conn);


              // data loceret
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Loceret'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_loceret = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_loceret = 0;
              }
              mysqli_close($conn);

              
              // data prambon
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Prambon'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_prambon = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_prambon = 0;
              }
              mysqli_close($conn);


              // data nganjuk
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Nganjuk'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_nganjuk = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_nganjuk = 0;
              }
              mysqli_close($conn);


              // data ngetos
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Ngetos'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_ngetos = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_ngetos = 0;
              }
              mysqli_close($conn);


              // data ngluyu
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Ngluyu'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_ngluyu = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_ngluyu = 0;
              }
              mysqli_close($conn);


              // data ngronggot
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Ngronggot'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_ngronggot = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_ngronggot = 0;
              }
              mysqli_close($conn);


              // data pace
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Pace'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_pace = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_pace = 0;
              }
              mysqli_close($conn);


              // data patianrowo
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Patianrowo'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_patianrowo = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_patianrowo = 0;
              }
              mysqli_close($conn);


              // data rejoso
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Rejoso'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_rejoso = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_rejoso = 0;
              }
              mysqli_close($conn);


              // data sawahan
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Sawahan'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_sawahan = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_sawahan = 0;
              }
              mysqli_close($conn);


              // data sukomoro
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Sukomoro'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_sukomoro = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_sukomoro = 0;
              }
              mysqli_close($conn);


              // data tanjunganom
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Tanjunganom'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_tanjunganom = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_tanjunganom = 0;
              }
              mysqli_close($conn);

              
              // data wilangan
            include "koneksi.php";
            $sql = "SELECT COUNT(*) as jumlah_umkm FROM umkm WHERE kecamatan_umkm = 'Wilangan'";
    
              $result = mysqli_query($conn, $sql);
    
              if (mysqli_num_rows($result) > 0) {
                  // Ambil hasil dari query
                  $row = mysqli_fetch_assoc($result);
                  $jumlah_umkm_wilangan = $row["jumlah_umkm"];
              } else {
                  $jumlah_umkm_wilangan = 0;
              }
              mysqli_close($conn);
        ?>


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
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Bagor'>Bagor</a></td>
                  <td><?php echo $jumlah_umkm_bagor; ?></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Baron'>Baron</a></td>
                  <td><?php echo $jumlah_umkm_baron; ?></td>
                </tr>   
                <tr>
                  <td>3</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Berbek'>Berbek</a></td>
                  <td><?php echo $jumlah_umkm_berbek; ?></td>
                </tr>   
                <tr>
                  <td>4</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Gondang'>Gondang</a></td>
                  <td><?php echo $jumlah_umkm_gondang; ?></td>
                </tr>   
                <tr>
                  <td>5</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Jatikalen'>Jatikalen</a></td>
                  <td><?php echo $jumlah_umkm_jatikalen; ?></td>
                </tr>   
                <tr>
                  <td>6</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Kertosono'>Kertosono</a></td>
                  <td><?php echo $jumlah_umkm_kertosono; ?></td>
                </tr>   
                <tr>
                  <td>7</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Lengkong'>Lengkong</a></td>
                  <td><?php echo $jumlah_umkm_lengkong; ?></td>
                </tr> 
                <tr>
                  <td>8</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Loceret'>Loceret</a></td>
                  <td><?php echo $jumlah_umkm_loceret; ?></td>
                </tr> 
                <tr>
                  <td>9</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Nganjuk'>Nganjuk</a></td>
                  <td><?php echo $jumlah_umkm_nganjuk; ?></td>
                </tr> 
                <tr>
                  <td>10</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Ngetos'>Ngetos</a></td>
                  <td><?php echo $jumlah_umkm_ngetos; ?></td>
                </tr> 
                <tr>
                  <td>11</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Ngluyu'>Ngluyu</a></td>
                  <td><?php echo $jumlah_umkm_ngluyu; ?></td>
                </tr> 
                <tr>
                  <td>12</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Ngronggot'>Ngronggot</a></td>
                  <td><?php echo $jumlah_umkm_ngronggot; ?></td>
                </tr> 
                <tr>
                  <td>13</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Pace'>Pace</a></td>
                  <td><?php echo $jumlah_umkm_pace; ?></td>
                </tr> 
                <tr>
                  <td>14</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Patianrowo'>Patianrowo</a></td>
                  <td><?php echo $jumlah_umkm_patianrowo; ?></td>
                </tr> 
                <tr>
                  <td>15</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Prambon'>Prambon</a></td>
                  <td><?php echo $jumlah_umkm_prambon; ?></td>
                </tr>
                <tr>
                  <td>16</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Rejoso'>Rejoso</a></td>
                  <td><?php echo $jumlah_umkm_rejoso; ?></td>
                </tr>     
                <tr>
                  <td>17</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Sawahan'>Sawahan</a></td>
                  <td><?php echo $jumlah_umkm_sawahan; ?></td>
                </tr>  
                <tr>
                  <td>18</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Sukomoro'>Sukomoro</a></td>
                  <td><?php echo $jumlah_umkm_sukomoro; ?></td>
                </tr>  
                <tr>
                  <td>19</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Tanjunganom'>Tanjunganom</a></td>
                  <td><?php echo $jumlah_umkm_tanjunganom; ?></td>
                </tr>  
                <tr>
                  <td>20</td>
                  <td><a href='daftar-kecamatan/daftar-perkecamatan.php?kecamatan=Wilangan'>Wilangan</a></td>
                  <td><?php echo $jumlah_umkm_wilangan; ?></td>
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
        Swal.fire({
          title: 'Konfirmasi Keluar',
          text: 'Apakah Anda yakin ingin keluar?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Keluar!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "tem-login/tem-login-admin.php";
          }
        });
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
