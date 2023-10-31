<?php
// Hubungkan ke database Anda
include "koneksi.php";

// Query SQL dengan INNER JOIN
$query = "SELECT pd.gambar_produk1, pd.nama_produk, um.nama_umkm, um.notelp_umkm, pd.pirt_produk, pd.harga_prooduk
        FROM produk AS pd
        INNER JOIN umkm AS um
        ON pd.id_umkm = um.id_umkm";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Daftar Produk</title>
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Daftar Produk</h1>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                    <a href="index.php">
                        <img src="assets/img/makanan.png" class="card-img-top" alt="Gambar Produk">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
                        <p class="card-text"><?php echo $row['nama_umkm']; ?></p>
                        <p class="card-text"><?php echo $row['notelp_umkm']; ?></p>
                        <p class="card-text"><?php echo $row['pirt_produk']; ?></p>
                        <p class="card-text">Rp <?php echo $row['harga_prooduk']; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
