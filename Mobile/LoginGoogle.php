<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST ['email'];
    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "aplikasi_unjuk");

    // Jika koneksi gagal
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

   
    // Lakukan kueri SQL untuk memeriksa apakah email ada dalam database
    $query = "SELECT * FROM akun WHERE email = '$email'";

    $result = $conn->query($query);

    if ($result) {
        if ($result->num_rows > 0) {

            $user = $result->fetch_assoc(); // get user data
            $idUser = $user['id_akun'];

            $sql = "SELECT * FROM umkm  WHERE id_akun = '$idUser'  LIMIT 1";
            $result = $conn->query($sql);

            if($result->num_rows === 1){
                $idUmkm = $result->fetch_assoc()['id_umkm'];
                $response = array('status' => 'success', 'message' => 'Login berhasil', 'data' => $user, 'id_umkm' => $idUmkm);
            }else{
                $response = array('status' => 'success', 'message' => 'Login berhasil', 'data' => $user);
            }
            
        } else {
            // Email tidak ditemukan, Anda dapat mengembalikan respons gagal
            $response['status'] = "error";
            $response['message'] = "Email tidak ditemukan";
        }
    } else {
        // Gagal melakukan kueri, Anda dapat mengembalikan respons gagal
        $response['status'] = "error";
        $response['message'] = "Terjadi kesalahan saat memeriksa email";
    }
    echo json_encode($response);
} else {
    echo 'error';
}
?>
