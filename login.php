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
        echo "Username atau password salah. Silakan coba lagi.";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>umkm mikro</title>
    <link rel="website icon" href="assets/img/logoUnjuk.png">

    <link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
      body{
        background-color: #235088;
      }

      form{
        width: 448px;
        height: 454px;
        background-color: white;
        position: relative;
        left: 560px;
        top: 160px;
        border-radius: 30px;
      }

      div{
        position: relative;
        top: 100px;
        justify-content: center;
        align-items: center;
        left: 15%
      }

      input{
        width :70%;
        height: 40px;
        border-radius: 15px;
      }

      #masuk{
        background-color: #235088;
        color: white;
      }

      img{
        position: relative;
        left: 30%;
        top: 45px;
        width: 170px;
        height: 160px;
      }

      #kembali{
        width: 100px;
        height: 50px;
        background-color: red;
        position: relative;
        top: 450%;
        right: 900%;
      }
    </style>
  </head>
  <body>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
  <img src="assets/img/logoUnjuk.png" >
     <div>
        <input  class="username"type="text" id="username" name="username" required><br><br>
        <input type="password" id="password" name="password" required><br><br>
        <input id="masuk" type="submit" value="Masuk">
      </div>   
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>