<?php
    include "koneksi.php";

    $id_kegiatan = $_GET['id'];

    $query = "SELECT * FROM kegiatan WHERE id_kegiatan = $id_kegiatan";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $judul = $data['judul'];
        $tgl = $data['tgl'];
        $jam = $data['jam'];
        $deskripsi = $data['deskripsi'];
        $gambar = $data['foto']; // Sesuaikan dengan kolom di tabel Anda
    } else {
        echo "Data tidak ditemukan.";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $judul_baru = $_POST['judul'];
        $tgl_baru = $_POST['tgl'];
        $jam_baru = $_POST['jam'];
        $deskripsi_baru = $_POST['deskripsi'];

        $file_foto = '';
        if ($_FILES['file']['name'] !== '') {
            $file_foto = 'assets1/' . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $file_foto);
        } else {
            $file_foto = $gambar;
        }

        $update_query = "UPDATE kegiatan SET
                            judul = '$judul_baru',
                            tgl = '$tgl_baru',
                            jam = '$jam_baru',
                            deskripsi = '$deskripsi_baru',
                            foto = '$file_foto'
                            WHERE id_kegiatan = $id_kegiatan";

        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            header("Location: admin-tabel-warkopUmi.php");
            exit();
        } else {
            echo "Gagal menyunting data: " . mysqli_error($conn);
        }
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
  

  <link rel="stylesheet" href="assets/dashboard.css?v=<?php echo time(); ?>">
    
      
    <!-- <link href="assets/dashboard.css" rel="stylesheet"> -->
    
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
        <h3 class="title mt-3">Ubah Warkop Umi</h3>
        <h6 class="title ">
            <a style="text-decoration: none;" href="admin-warkopUmi.php">Update Warkop Umi </a> /
            <a style="text-decoration: none;" href="admin-tabel-warkopUmi.php">Detail Warkop Umi</a>
            / Ubah Warkop Umi
        </h6>
        <div class="group mt-5">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" id="judul" name="judul" value="<?php echo $judul; ?>" placeholder="Masukkan judul">
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal:</label>
                    <input type="date" id="tgl" name="tgl" value="<?php echo $tgl; ?>">
                </div>
                <div class="form-group">
                    <label for="jam">Jam:</label>
                    <input type="time" id="jam" name="jam" value="<?php echo isset($_POST['jam']) ? $_POST['jam'] : date('H:i', strtotime($jam)); ?>">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" style="width: 100%"
                        placeholder="Masukkan deskripsi"><?php echo $deskripsi; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="file">Unggah Gambar:</label>
                    <input type="file" id="file" name="file" accept="image/*" placeholder="Pastikan anda memasukkan foto">
                </div>
                <button class="btn btn-primary mt-1" style="margin-right: 5px; height: 40px" type="submit">
                <i class="bx bx-edit"></i> Ubah perubahan
                </button>
            </form>
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
      }, 2000); 

    </script>

    <script src="assets/js/login.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
