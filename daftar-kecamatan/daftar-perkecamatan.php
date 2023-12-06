<?php
   include "../koneksi.php";

   // Periksa koneksi
   if ($conn->connect_error) {
       die("Koneksi gagal: " . $conn->connect_error);
   }
   
   $kecamatan = $_GET['kecamatan']; // Mengambil parameter kecamatan dari URL
   
   // Buat query SQL untuk mengambil data dari tabel UMKM berdasarkan kecamatan yang dipilih
   $query = "SELECT umkm.*, akun.nama_user FROM umkm
          JOIN akun ON umkm.id_akun = akun.id_akun
          WHERE umkm.kecamatan_umkm = '$kecamatan'";
   
   $result = $conn->query($query);



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
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" href="../tem-login/images/logoUnjuk.png">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
   

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
      <h6 style="font-wieght: none;">Kecamatan <?php echo $kecamatan?></h6>
      <h6 class="title ">
        <a  style="text-decoration: none;" href="../admin-beranda.php">Dashboard</a>
        / Daftar
      </h6>

        <!-- ###################### TABEL UMKM ###################### -->
        <div class="table-responsive mt-5">
          <table id="example" class="table table-striped" style="width:100%">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Nama UMKM</th>
                      <th>Jenis Usaha</th>
                      <th>NIB</th>
                      <th>Nomor Telepon</th>
                      <th>Alamat</th>
                      <th>Nama User</th>
                      <th>Foto UMKM</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                      if ($result->num_rows > 0) {
                          $no = 1;
                          while ($row = $result->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td>" . $no . "</td>";
                              echo "<td>" . $row['nama_umkm'] . "</td>";
                              echo "<td>" . $row['Jenis_usahaumkm'] . "</td>";
                              echo "<td>" . $row['Nib_umkm'] . "</td>";
                              echo "<td>" . $row['notelp_umkm'] . "</td>";
                              echo "<td>" . $row['alamat_umkm'] . "</td>";
                              echo "<td>" . $row['nama_user'] . "</td>";
                              echo '<td><img src="../public/img/umkm-photo/' . $row['umkm_foto'] . '" class="card-img-top" alt="Gambar Produk" style="max-width: 100px; max-height: 100px;"></td>';
                              echo "<td>";
                              echo '<button class="btn btn-danger mt-1" type="button" data-bs-toggle="modal" data-bs-target="#hapusModal" onclick="setHapusId(' . htmlentities($row['id_umkm']) . ')">
                                    <i class="bx bx-trash"></i>
                                      </button>';
                              echo "</td>";
                              // echo '<td><button class="btn btn-info" data-toggle="modal" data-target="#detailModal' . $row['id_umkm'] . '">Detail</button></td>';
                              echo "</tr>";
                              $no++;
                          }
                      } else {
                          echo "Tidak ada data UMKM yang ditemukan.";
                      }
                  ?>
                   <script>
                        var hapusId;

                          function setHapusId(id) {
                              hapusId = id;
                          }

                          function hapusData() {
                              var xhr = new XMLHttpRequest();
                              xhr.open('GET', ' ../hapus-data.php?id=' + hapusId, true);
                              xhr.onreadystatechange = function() {
                                  if (xhr.readyState == 4) {
                                      if (xhr.status == 200) {
                                          // Operasi penghapusan berhasil
                                          Swal.fire({
                                              icon: 'success',
                                              title: 'Berhasil!',
                                              text: 'Data berhasil dihapus.',
                                          }).then((result) => {
                                              if (result.isConfirmed || result.isDismissed) {
                                                  // Tutup modal
                                                  $('#hapusModal').modal('hide');
                                                  // Refresh tabel atau lakukan tindakan lain jika diperlukan
                                                  location.reload();
                                              }
                                          });
                                      } else {
                                          // Operasi penghapusan gagal
                                          Swal.fire({
                                              icon: 'error',
                                              title: 'Gagal!',
                                              text: 'Terjadi kesalahan saat menghapus data.',
                                          });
                                      }
                                  }
                              };
                              xhr.send();
                          }
                    </script>

                    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data UMKM</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus data UMKM?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-danger" onclick="hapusData()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>


              </tbody>
          </table>

          <a href="cetak-laporan.php?kecamatan=<?php echo $kecamatan; ?>" class="btn btn-info">Cetak Laporan</a>
        </div>

       

      
        </div>
    </main>
  </div>
</div>



    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/js/tabel-daftar.js"></script> -->

    <!-- script yang digunakan untuk konfirmasi keluar -->
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

    <script src="../assets/js/tabel-daftar.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>

<?php

$conn->close();
?>
