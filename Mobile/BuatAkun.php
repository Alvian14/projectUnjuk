<?php
/**
 * Digunakan untuk register manual.
 */

require "../koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // post request
    $nama_user = $_POST['nama_user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $notelp_user = $_POST['notelp_user'];
    $alamat_user = $_POST['alamat_user'];
    $Level = $_POST['Level'];

    // Fungsi untuk memeriksa validitas alamat email
    function is_valid_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Periksa apakah email sudah terdaftar
    $checkQuery = "SELECT * FROM akun WHERE email = '$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Email sudah terdaftar, berikan respons error
        $response = array("status" => "error", "message" => "Email sudah terdaftar");
    } else {
        // Periksa apakah email valid
        if (is_valid_email($email)) {
            // Periksa kekuatan kata sandi menggunakan ekspresi reguler
            if (preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/', $password)) {
                // Periksa nomor telepon minimal 11 karakter
                if (strlen($notelp_user) >= 11) {
                    $epassword = password_hash($password, PASSWORD_BCRYPT);

                    // get data user
                    $sql = "INSERT INTO akun (email, password, nama_user, alamat_user, notelp_user, Level) VALUES ('$email', '$epassword',
                     '$nama_user', '$alamat_user', '$notelp_user', 'user')";
                    $result = $conn->query($sql);

                    if ($result === true) {
                        $response = array("status" => "success", "message" => "Register Success");
                    } else {
                        $response = array("status" => "error", "message" => "Register Gagal", "error_details" => $conn->error);
                    }
                } else {
                    $response = array("status" => "error", "message" => "Nomor telepon minimal 11 karakter");
                }
            } else {
                $response = array("status" => "error", "message" => "Kata sandi harus memiliki minimal 8 karakter, huruf kapita, angka, dan simbol");
            }
        } else {
            $response = array("status" => "error", "message" => "Alamat email tidak valid");
        }
    }

    // close koneksi
    $conn->close();
} else {
    $response = array("status" => "error", "message" => "not post method");
}

// show response
echo json_encode($response);
?>
