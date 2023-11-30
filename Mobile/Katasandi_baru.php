<?php
/**
 * Digunakan untuk mengupdate password dari users.
 */

require "../koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // post request
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Tambahkan ketentuan kata sandi
    if (preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,20}$/', $password)) {
        $epassword = password_hash($password, PASSWORD_BCRYPT);

        // get data user
        $sql = "UPDATE akun SET password = '$epassword' WHERE email = '$email'";
        $result = $conn->query($sql);

        // jika password berhasil terupdate
        if ($result === true) {
            $response = array("status" => "success", "message" => "Password berhasil diupdate");
        } else {
            $response = array("status" => "error", "message" => "Password gagal diupdate");
        }
    } else {
        $response = array("status" => "error", "message" => "Password tidak memenuhi ketentuan");
    }

    // close koneksi
    $conn->close();

} else {
    $response = array("status" => "error", "message" => "Method is not post");
}

// show response
echo json_encode($response);
?>
