
<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "aplikasi_unjuk";

// $server = "103.247.11.134";
// $user = "tifz1761_root";
// $pass = "tifnganjuk321";
// $database = "tifz1761_aplikasi_unjuk";


$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>