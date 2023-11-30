<?php
/**
 * Digunakan untuk mengirimkan kode otp ke email user
 */

require '../../vendor/autoload.php';
require "../../koneksi.php";
require 'EmailSender.php';

// random kode otp
function generateOTP($length = 6)
{
    $otp = '';
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $otp .= $characters[rand(0, $charactersLength - 1)];
    }
    return $otp;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $type = $_POST['type'];
    $action = $_POST['action'];
    $otp = generateOTP();

    // Tambahkan query SQL untuk memeriksa keberadaan email
    $checkEmailQuery = "SELECT * FROM akun WHERE email = '$email'";
    $checkEmailResult = $conn->query($checkEmailQuery);

    if ($checkEmailResult->num_rows == 0) {
        // Email tidak ditemukan di database
        $response = array("status" => "error", "message" => "Alamat email tidak ditemukan");
    } else {
        // Email ditemukan di database
        $startMillis = round(microtime(true) * 1000);
        $endMillis = $startMillis + 900000;

        if ($action === "new") {
            // Buat query SQL untuk memasukkan data baru
            $sql = "INSERT INTO verification (`email`, `otp`, `type`, `start_millis`, `end_millis`, `device`, `resend`) 
                    VALUES ('$email', '$otp', '$type', $startMillis, $endMillis, 'Mobile', 0)";
            $result = $conn->query($sql);
        } else if ($action === "update") {
            // Ambil data OTP sebelumnya
            $sql = "SELECT * FROM verification WHERE email = '$email' ORDER BY created_at DESC LIMIT 1";
            $result = $conn->query($sql);

            // Ambil data OTP
            if ($result->num_rows == 1) {
                $data = $result->fetch_assoc();
                $oldOtp = $data['otp'];
                $resend = $data['resend'] + 1;
            }

            // cek kode otp lama berhasil didapatkan atau tidak
            if (isset($oldOtp)) {
                // Buat query SQL untuk memperbarui data
                $sql = "UPDATE verification SET otp = '$otp', type = '$type', start_millis = '$startMillis', end_millis = '$endMillis', resend = '$resend' 
                        WHERE email = '$email' AND otp = '$oldOtp'";
                $result = $conn->query($sql);
            }
        }

        // cek apakah query berhasil dieksekusi atau tidak
        if ($result === true) {
            // Ambil data OTP setelah insert/update berhasil
            $sql = "SELECT * FROM verification WHERE email = '$email' ORDER BY created_at DESC LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $mail = new EmailSender();
                $mail->sendEmail($email, $type, $otp);
                // Kirim kode OTP
                $response = array("status" => "success", "message" => "Kode OTP berhasil dikirimkan", "data" => $result->fetch_assoc());
            } else {
                $response = array("status" => "error", "message" => "Kode OTP gagal dikirimkan");
            }
        } else {
            $response = array("status" => "error", "message" => "Kode OTP gagal dikirimkan");
        }
    }

} else {
    $response = array("status" => "error", "message" => "Method bukan POST");
}

echo json_encode($response);
?>
