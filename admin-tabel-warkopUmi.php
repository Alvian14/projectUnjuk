
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="assets/js/tabel-daftar.js"></script>
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


      .form-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="file"] {
            cursor: pointer;
        }

        .form-group input[type="file"]::file-selector-button {
            background-color: #007bff;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Membuat input gambar responsif */
        .responsive-image {
            max-width: 100%;
            height: auto;
        }

        .notifikasi {
          background-color: green;
          color: white;
          text-align: center;
          
          padding: 10px;
          position: fixed;
          top: 15%; /* Menengahkan vertikal */
          left: 50%; /* Menengahkan horizontal */
          transform: translate(-50%, -50%); /* Mencentralkan elemen */
          border-radius: 5px;
        }

        .eror {
          background-color: #ff0000;
          color: white;
          text-align: center;
          padding: 10px;
          position: fixed;
          top: 15%; /* Menengahkan vertikal */
          left: 50%; /* Menengahkan horizontal */
          transform: translate(-50%, -50%); /* Mencentralkan elemen */
          border-radius: 5px;
        }
  
    </style>
  

    
    
      
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
            <a class="nav-link"  style="font-size: 18px;"  aria-current="page" href="admin-beranda.php" >
            <i class="bx bx-home"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active"  style="font-size: 18px;" href="admin-warkopUmi.php">
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
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h3 class="title mt-3">Detail Warkop Umi</h3>
      <h6 class="title ">  
        <a  style="text-decoration: none;" href="admin-warkopUmi.php">Update Warkop Umi</a>
        / Detail Warkop Umi
      </h6>
        
        <div class="table-responsive mt-5">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Id</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                
                include "koneksi.php";
                // Buat kueri SQL untuk mengambil data dari tabel kegiatan
                $sql = "SELECT * FROM kegiatan";
                $result = $conn->query($sql);

                // Tampilkan data dalam tabel HTML
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $row['id_kegiatan'] . "</td>";
                        echo "<td>" . $row['judul'] . "</td>";
                        echo "<td>" . $row['tgl'] . "</td>";
                        echo "<td>" . $row['jam'] . "</td>";
                        echo "<td>" . $row['deskripsi'] . "</td>";
                        echo "<td><a href='" . $row['foto'] . "' target='_blank'><img src='" . $row['foto'] . "' alt='Foto UMKM' style='max-width: 100px; max-height: 100px;'></a></td>";
                        echo "<td>";
                        echo '<a class="btn btn-success" role="button" href="admin-edit-warkopUmi.php?id=' . htmlentities($row['id_kegiatan']) . '">
                            <i class="bx bx-edit"></i>
                            </a>';
                        echo '<a class="btn btn-danger mt-1" role="button" href="hapus-kegiatan.php?id=' . htmlentities($row['id_kegiatan']) . '"
                            onclick="return confirm(\'Apakah anda ingin menghapus data?\')">
                            <i class="bx bx-trash"></i>
                            </a>';
                        echo "</td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "Tidak ada data UMKM yang ditemukan.";
                }

                // Tutup koneksi
                $conn->close();
            ?>
                </tbody>
            </table>
            </div>
        </div>


    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/js/tabel-daftar.js"></script> -->

    <script >
      function konfirmasiKeluar() {
        var konfirmasi = confirm("Apakah Anda yakin ingin keluar?");
        if (konfirmasi) {
          window.location.href = "tem-login/tem-login-admin.php";
        }
      };

      setTimeout(function() {
          var notifikasi = document.querySelector('.eror');
          if (notifikasi) {
              notifikasi.style.display = 'none';
          }
      }, 2000); // 5000 m

      // document.getElementById("tambahButton").addEventListener("click", function() {
      //       document.getElementById("konfirmasiNotifikasi").style.display = "block";
      //   });

      //   document.getElementById("konfirmasiYa").addEventListener("click", function() {
      //       // Tambahkan logika untuk menambahkan data ke database di sini
      //       alert("Data berhasil ditambahkan");
      //       document.getElementById("konfirmasiNotifikasi").style.display = "none";
      //   });

      //   document.getElementById("konfirmasiBatal").addEventListener("click", function() {
      //       document.getElementById("konfirmasiNotifikasi").style.display = "none";
      //   });

    </script>

    <script src="assets/js/login.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>