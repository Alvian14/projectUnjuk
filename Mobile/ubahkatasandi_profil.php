<?php
/**
 * Digunakan untuk mengupdate password dari users.
 */

require "../koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // post request
    $email = $_POST['email'];
    $oldPassword = $_POST['oldPassword']; // Tambahkan input untuk kata sandi lama
    $newPassword = $_POST['newPassword'];

    // Validasi password baru
    if (
        strlen($newPassword) < 8 || // Minimal 8 digit
        strlen($newPassword) > 20 || // Maksimal 20 digit
        !preg_match('/[a-z]/', $newPassword) || // Mengandung huruf kecil
        !preg_match('/[A-Z]/', $newPassword) || // Mengandung huruf besar
        !preg_match('/[0-9]/', $newPassword) || // Mengandung angka
        !preg_match('/[!@#$%^&*(),.?":{}|<>_]/', $newPassword) // Mengandung simbol
    ) {
        $response = array("status" => "error", "message" => "Password baru tidak memenuhi persyaratan");
        echo json_encode($response);
        exit; // Hentikan eksekusi jika password tidak memenuhi persyaratan
    }

    // get data user
    $sql = "SELECT password FROM akun WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verifikasi kata sandi lama
        if (password_verify($oldPassword, $hashedPassword)) {
            // Kata sandi lama benar, lakukan pembaruan
            $epassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $updateSql = "UPDATE akun SET password = '$epassword' WHERE email = '$email'";
            $updateResult = $conn->query($updateSql);

            if ($updateResult === true) {
                $response = array("status" => "success", "message" => "Password berhasil diupdate");
            } else {
                $response = array("status" => "error", "message" => "Password gagal diupdate");
            }
        } else {
            $response = array("status" => "error", "message" => "Kata sandi lama salah");
        }
    } else {
        $response = array("status" => "error", "message" => "User dengan email tersebut tidak ditemukan");
    }

    // close koneksi
    $conn->close();
} else {
    $response = array("status" => "error", "message" => "Method is not POST");
}

// show response
echo json_encode($response);
?>
