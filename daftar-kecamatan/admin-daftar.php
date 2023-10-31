
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
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">


    <link rel="website icon" href="../tem-login/images/logoUnjuk.png">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
   

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

    
    <!-- template tabel data -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="../assets/js/tabel-daftar.js"></script>


    <!-- <link href="assets/dashboard.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../assets/dashboard.css?v=<?php echo time(); ?>">
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
            <a class="nav-link active"  style="font-size: 18px;"  aria-current="page" href="../admin-beranda.php" >
            <i class="bx bx-home"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  style="font-size: 18px;" href="../admin-warkopUmi.php">
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
      <h3 class="title mt-3">Daftar</h3>
      <h6 class="title "> Daftar /
        <a  style="text-decoration: none;" href="../admin-beranda.php">Dashboard</a>
      </h6>
        <!-- <div class="container">
          <div class="d-flex justify-content-end " >
              <button class="btn btn-primary mt-4" style="margin-right: 5px">
                  <a class="nav-link" href="../admin-tambah.php">
                  <i class='bx bx-plus' style='color:#fafafa'></i> 
                  Tambah </a>
              </button>
          </div>
        </div> -->



        <!-- ###################### TABEL UMKM ###################### -->
        <div class="table-responsive mt-5">
          <table id="example" class="table table-striped" style="width:100%">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Nama UMKM</th>
                      <th>Jenis Usaha</th>
                      <th>NIB</th>
                      <th>Nomor telepon</th>
                      <th>Alamat</th>
                      <th>ID Akun</th>
                      <th>foto UMKM</th>
                      <th>Aksi</th> <!-- Tambahkan kolom "Aksi" -->
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1</td>
                      <td>Keripik pisang</td>
                      <td>Makanan</td>
                      <td>61</td>
                      <td>032292039323</td>
                      <td>Kertosono</td>
                      <td>2030</td>
                      <td></td>
                      <td>
                          <button class="btn btn-danger">Hapus</button>
                          <button class="btn btn-primary">Edit</button>
                      </td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td>Kencur</td>
                      <td>Minuman</td>
                      <td>61</td>
                      <td>032292039323</td>
                      <td>Sukomoro</td>
                      <td>2031</td>
                      <td></td>
                      <td>
                          <button class="btn btn-danger">Hapus</button>
                          <button class="btn btn-primary">Edit</button>
                      </td>
                  </tr>
                  <tr>
                      <td>3</td>
                      <td>Keripik pisang</td>
                      <td>Makanan</td>
                      <td>61</td>
                      <td>032292039323</td>
                      <td>Kertosono</td>
                      <td>2032</td>
                      <td></td>
                      <td>
                          <button class="btn btn-danger">Hapus</button>
                          <button class="btn btn-primary">Edit</button>
                      </td>
                  </tr>
              </tbody>
              <tfoot>
                  <tr>
                      <th>No.</th>
                      <th>Nama UMKM</th>
                      <th>Jenis Usaha</th>
                      <th>NIB</th>
                      <th>Nomor telepon</th>
                      <th>Alamat</th>
                      <th>ID Akun</th>
                      <th>foto UMKM</th>
                      <th>Aksi</th> <!-- Tambahkan kolom "Aksi" di bagian bawah juga -->
                  </tr>
              </tfoot>
          </table>
      </div>


       

      
        </div>
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/js/tabel-daftar.js"></script> -->
    <script src="../assets/js/konfirmasi.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
