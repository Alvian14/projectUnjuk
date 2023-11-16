<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idproduk = $_POST ['id_produk'];
    
    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "aplikasi_unjuk");

    // Jika koneksi gagal
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

   
    // Lakukan kueri SQL untuk memeriksa apakah email ada dalam database
    $query = "SELECT * FROM produk WHERE id_produk = '$idproduk'";

    $result = $conn->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            // Email ditemukan, Anda dapat mengembalikan respons sukses
            $response['status'] = "success";
            $response['message'] = "Data valid";
            $response['data'] = array(); // Inisialisasi array kosong

while ($row = $result->fetch_assoc()) {
    $response['data'][] = $row; // Menambahkan setiap baris ke dalam array $response['data']
}
            
        } else {
            // Email tidak ditemukan, Anda dapat mengembalikan respons gagal
            $response['status'] = "error";
            $response['message'] = "Data produk tidak ditemukan";
        }
    } else {
        // Gagal melakukan kueri, Anda dapat mengembalikan respons gagal
        $response['status'] = "error";
        $response['message'] = "Terjadi kesalahan saat memeriksa Data produk";
    }
    echo json_encode($response);
} else {
    echo 'error';
}
?>
