<?php
    require_once("koneksi.php");
    
  
    $judulMinLength = 10;
    $judulMaxLength = 100;
    $deskripsiMinLength = 20;
    $deskripsiMaxLength = 500;

    // Inisialisasi variabel input default
    $judul_kegiatan_default = '';
    $tanggal_kegiatan_default = '';
    $jam_kegiatan_default = '';
    $deskripsi_default = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari formulir
        $judul_kegiatan = $_POST["judul"];
        $tanggal_kegiatan = $_POST["tgl"];
        $jam_kegiatan = $_POST["jam"];
        $deskripsi = $_POST["deskripsi"];

        // Validasi tanggal
        $today = date("Y-m-d");
    

        if (strlen($judul_kegiatan) < $judulMinLength || strlen($judul_kegiatan) > $judulMaxLength) {
            $eror = "Judul harus memiliki panjang antara $judulMinLength dan $judulMaxLength karakter.";
        } elseif ($tanggal_kegiatan <= $today) {
            $eror = "Tanggal tidak boleh mundur dari tanggal sekarang.";
        } elseif (str_word_count($deskripsi) < 20) {
            $eror = "Deskripsi harus memiliki panjang antara 20 kata sampai 500 kata.";
        } elseif (str_word_count($deskripsi) > 500) {
            $eror = "Deskripsi tidak boleh melebihi 500 kata.";
        // } elseif (containsSpecialChars($judul_kegiatan)) {
        //     $eror = "Judul tidak boleh mengandung karakter aneh.";
        // } elseif (containsSpecialChars($deskripsi)) {
        //     $eror = "Deskripsi tidak boleh mengandung karakter aneh.";
        } elseif (strlen(trim($judul_kegiatan)) === 0) {
            $eror = "Judul tidak boleh hanya terdiri dari spasi.";
        }elseif (strlen(trim($deskripsi)) === 0){
            $eror = "Deskripsi tidak boleh hanya terdiri dari spasi.";
        }else{
        
            // Proses unggah gambar
            $uploadDir = "assets1/"; // Direktori tempat menyimpan gambar di server
            $uploadedFile = $uploadDir . basename($_FILES["file"]["name"]);

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadedFile)) {
                // Gambar berhasil diunggah
                $alamat_gambar = "assets1/" . $_FILES["file"]["name"];

                // Menyimpan data ke database (pastikan nama tabel dan kolom sesuai dengan struktur database Anda)
                $sql = "INSERT INTO kegiatan (judul, tgl, jam, deskripsi, foto) 
                        VALUES ('$judul_kegiatan', '$tanggal_kegiatan', '$jam_kegiatan', '$deskripsi', '$alamat_gambar')";

                if (mysqli_query($conn, $sql)) {
                    $pesan = "Data kegiatan berhasil ditambahkan.";

                    // Mengosongkan variabel input setelah berhasil input
                    $judul_kegiatan_default = '';
                    $tanggal_kegiatan_default = '';
                    $jam_kegiatan_default = '';
                    $deskripsi_default = '';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                $eror = "Gagal menambahkan data.";
            }
        }

        // Menutup koneksi database
        mysqli_close($conn);
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
          top: 15%; 
          left: 50%; 
          transform: translate(-50%, -50%); 
          border-radius: 5px;
        }

        .eror {
          background-color: #ff0000;
          color: white;
          text-align: center;
          padding: 10px;
          position: fixed;
          top: 15%; 
          left: 50%; 
          transform: translate(-50%, -50%); 
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
      <h3 class="title mt-3">Update Warkop Umi</h3>
      <div class="group mt-5">
        
        
                <form method="POST" action="admin-warkopUmi.php" id="yourFormId" enctype="multipart/form-data">
                    <?php if (!empty($pesan)) { ?>
                        <div class="notifikasi">
                            <?php echo $pesan; ?>
                        </div>
                    <?php } ?>

                    <?php if (!empty($eror)) { ?>
                        <div class="eror">
                            <?php echo $eror; ?>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" id="judul" name="judul" placeholder="Masukkan judul" value="<?php echo isset($_POST['judul']) ? htmlspecialchars($_POST['judul']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="tgl">Tanggal Kegiatan:</label>
                        <input type="date" id="tgl" name="tgl" value="<?php echo isset($_POST['tgl']) ? $_POST['tgl'] : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="jam">Jam kegiatan:</label>
                        <input type="time" id="jam" name="jam" value="<?php echo isset($_POST['jam']) ? $_POST['jam'] : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" style="width: 100%" placeholder="Masukkan deskripsi"><?php echo isset($_POST['deskripsi']) ? htmlspecialchars($_POST['deskripsi']) : ''; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">Unggah Gambar:</label>
                        <input type="file" id="file" name="file" accept="image/*" placeholder="Pastikan anda memasukkan foto" >
                    </div>

                    <div class="form-group">
                        <img src="" alt="" class="responsive-image">
                    </div>
                </form>

                <div class="container ml-5">
                    <div class="d-flex justify-content-end ">
                        <button class="btn btn-primary mt-1" style="margin-right: 5px; height: 40px" type="submit" form="yourFormId">
                            <i class='bx bx-plus' style='color:#fafafa'></i> Tambah
                        </button>
                        <button class="btn btn-warning mt-1" style="margin-right: 5px; height: 40px" onclick="window.location.href='admin-tabel-warkopUmi.php'">
                            <i class='bx bx-calendar-check' style='color:#282727'  ></i> Lihat
                        </button>
                    </div>
                </div>
            
      </div>
    </main>
  </div>
</div>



    


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/js/tabel-daftar.js"></script> -->

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
            window.location.href = " tem-login/tem-login-admin.php";
          }
        });
      }

    </script>

    <script src="assets/js/login.js"></script>
    <script src="assets/js/eror.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
