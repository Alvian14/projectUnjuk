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
    
    // Validasi nama (hanya huruf, 3-50 karakter) tidak boleh hanya spasi dan tidak mengandung karakter tidak diinginkan
    if (
        trim($namauser) === '' ||
        !preg_match('/^[A-Za-z\'()., ]+$/', $namauser) ||
        preg_match('/[0-9!@#$%^&*():{}|<>]/', $namauser) ||
        strlen($namauser) > 50 ||
        strlen($namauser) < 3
    ) {
        $response = array("status" => "error", "message" => "Nama hanya boleh mengandung huruf, minimal 3 karakter, maksimal 50 karakter");
        echo json_encode($response);
        exit;
    }

    // Validasi nama user agar tidak sama dengan yang sudah ada di database
    $checkQuery = "SELECT * FROM akun WHERE nama_user = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $namauser);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

  

    // Validasi nomor handphone (minimal 11 digit, maksimal 13 digit angka) tidak boleh hanya spasi dan tidak mengandung karakter tidak diinginkan
    if (!preg_match("/^08\d{9,11}$/", $notelpuser) || preg_match('/[}{~$^<!*#;%>]/', $notelpuser)) {
        $response = array("status" => "error", "message" => "Nomor handphone harus  terdiri dari 11 hingga 13 digit angka");
        echo json_encode($response);
        exit;
    }

    // Validasi alamat (maksimal 90 karakter) tidak boleh hanya spasi dan tidak mengandung karakter tidak diinginkan
    if (strlen(trim($alamatuser)) == 0 || strlen($alamatuser) > 90 || trim($alamatuser) === '' || preg_match('/[}{~$^<!*#;%>]/', $alamatuser)) {
        $response = array("status" => "error", "message" => "Alamat tidak boleh kosong, maksimal 90 karakter");
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

        $response = array("status" => "success", "message" => "Data Profil Berhasil diubah", "data" => $data);
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
