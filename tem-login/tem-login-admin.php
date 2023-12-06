<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../koneksi.php");

$pesan = ''; // Inisialisasi pesan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM akun WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['Level'] === 'admin') {
            // Menggunakan header
            echo '<script>window.location.href = "../admin-beranda.php";</script>';
            exit();
        } else {
            $pesan = "Anda bukan admin. Silakan coba lagi.";
        }
    } else {
        $queryUsername = "SELECT * FROM akun WHERE email = '$username'";
        $resultUsername = mysqli_query($conn, $queryUsername);

        $queryPassword = "SELECT * FROM akun WHERE password = '$password'";
        $resultPassword = mysqli_query($conn, $queryPassword);

        if (mysqli_num_rows($resultUsername) == 0 && mysqli_num_rows($resultPassword) == 0) {
            $pesan = "Username dan password salah. Silakan coba lagi.";
        } elseif (mysqli_num_rows($resultUsername) == 0) {
            $pesan = "Username salah. Silakan coba lagi.";
        } elseif (mysqli_num_rows($resultPassword) == 0) {
            $pesan = "Password salah. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Umkm mikro</title>
    <link rel="website icon" href="../assets/img/logoUnjuk.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <?php if (!empty($pesan)) { ?>
                <div class="notifikasi  notifikasi-1">
                    <?php echo $pesan; ?>
                </div>
            <?php } ?>

            <div class="col-md-7 col-lg-5">
                <div class="login-wrap p-4 p-md-5">
                    <div class=" justify-content-center">
                        <img src="../assets/img/logoUnjuk.png">
                    </div>

                    <form action="" class="login-form" method="POST">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control rounded-left" placeholder="Username" required>
                        </div>
                        <div class="form-group d-flex">
                            <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
                        </div>
                        <div class="form-group" >
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Masuk</button>
                        </div>
                    </form>

                    <div class="form-group  text-center">
                        <p><a href="../index.php">Keluar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="../assets/js/login.js"></script>

<!-- Redirect menggunakan JavaScript jika header tidak berfungsi -->
<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.login-form').addEventListener('submit', function(event) {
            // Matikan aksi formulir default
            event.preventDefault();
            // Redirect menggunakan JavaScript
            window.location.href = "../admin-beranda.php";
        });
    });
</script> -->

</body>
</html>
