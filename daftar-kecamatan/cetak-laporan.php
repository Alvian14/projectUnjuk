<?php
    // Sertakan file koneksi atau bagian koneksi yang dibutuhkan
    include "../koneksi.php";

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
 
    // Ambil nilai kecamatan dari URL atau sumber data lainnya
    $kecamatan = isset($_GET['kecamatan']) ? $_GET['kecamatan'] : '';
 
    // Validasi kecamatan untuk menghindari serangan SQL injection
    $kecamatan = $conn->real_escape_string($kecamatan);
 
    // Buat query SQL untuk mengambil data UMKM berdasarkan kecamatan
    $query = "SELECT * FROM umkm WHERE kecamatan_umkm = '$kecamatan'";
 
    $result = $conn->query($query);
?>
<html>
<head>
  <title>
  <?php
        // Ambil nilai kecamatan dari URL atau sumber data lainnya
        $kecamatan = isset($_GET['kecamatan']) ? $_GET['kecamatan'] : '';

        // Validasi kecamatan untuk menghindari serangan SQL injection
        $kecamatan = htmlspecialchars($kecamatan);

        // Tampilkan title sesuai kecamatan yang dipilih
        echo "Laporan UMKM - Kecamatan " . $kecamatan;
        ?>
  </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
                <h2>Laporan UMKM - Kecamatan <?php echo $kecamatan; ?></h2>
				<div class="data-tables datatable-dark">
					
                <table id="mauexport" class="table table-striped" style="width:100%">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Nama UMKM</th>
                      <th>Jenis Usaha</th>
                      <th>NIB</th>
                      <th>Nomor Telepon</th>
                      <th>Alamat</th>
                      <th>ID Akun</th>
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
                              echo "<td>" . $row['id_akun'] . "</td>";
                              echo "</tr>";
                              $no++;
                          }
                      } else {
                          echo "Tidak ada data UMKM yang ditemukan.";
                      }
                  ?>
              </tbody>
          </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>