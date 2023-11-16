<?php
/**
 * Digunakan untuk register manual.
 */

require "../koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // post request
    $idakun = $_POST['id_akun'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $namauser  = $_POST['nama_user'];
    $alamatuser = $_POST['alamat_user'];
    $notelpuser = $_POST['notelp_user'];
    $userfoto = $_POST['user_foto'];
    $kodeotp = $_POST['Kode_OTP'];
    $level = $_POST['Level'];
    
    // Validasi nama (hanya huruf)
    if (!preg_match("/^[a-zA-Z ]+$/", $namauser)) {
        $response = array("status" => "error", "message" => "Nama hanya boleh mengandung huruf dan spasi");
        echo json_encode($response);
        exit;
    }

    // Validasi nomor handphone (minimal 11 digit, maksimal 13 digit angka)
    if (!preg_match("/^\d{11,13}$/", $notelpuser)) {
        $response = array("status" => "error", "message" => "Nomor handphone harus terdiri dari 11 hingga 13 digit angka");
        echo json_encode($response);
        exit;
    }

    // get data user
    $sql = "UPDATE akun SET nama_user = '$namauser', notelp_user = '$notelpuser', alamat_user = '$alamatuser', user_foto = '$userfoto' WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result === true) {

        $sql = "SELECT * FROM akun WHERE email = '$email' LIMIT 1";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();


        $response = array("status" => "success", "message" => "Data Profil Berhasil diubah", "data"=>$data);
    } else {
        $response = array("status" => "error", "message" => "Data Profil Gagal diubah -> $sql", "error_details" => $conn->error);
    }

    // close koneksi
    $conn->close();
} else {
    $response = array("status" => "error", "message" => "not post method");
}

// show response
echo json_encode($response);
?>
