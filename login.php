<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM akun WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        header("Location: dashboard.php");
        exit();
    } else {
        $pesan = "Username atau password salah.  Silakan coba lagi.";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Umkm mikro</title>
    <link rel="website icon" href="assets/img/logoUnjuk.png">
    <!-- link untuk menuju ke css -->
    <link rel="stylesheet" href="assets/css/login.css?v=<?php echo time(); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
      body{
        background-color: #235088;
      }
    </style>
   
  </head>
  <body>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
  <img src="assets/img/logoUnjuk.png" >
      <div>
        <!-- Tampilkan pesan notifikasi jika ada -->
        <?php if (!empty($pesan)) { ?>
            <div class="notifikasi">
                <?php echo $pesan; ?>
            </div>
        <?php } ?>
    
        <input  class="username"type="text" id="username" placeholder ="username"    name="username" required><br><br>
        <input type="password" id="password" placeholder="Password"  name="password" required><br><br>
        <input id="masuk" type="submit" value="Masuk">
      </div>   
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/login.js"></script>
  </body>
</html>