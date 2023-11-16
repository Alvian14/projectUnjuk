<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil kunci teks pencarian dari POST request
    $searchKeyword = $_POST['search_keyword'];
    $idumkm = $_POST ['id_umkm'];
    
    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "aplikasi_unjuk");

    // Jika koneksi gagal
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Lakukan kueri SQL untuk mencari produk berdasarkan kunci teks
    $query = "SELECT * FROM produk WHERE id_umkm = '$idumkm' AND (nama_produk LIKE '%$searchKeyword%' OR deskripsi_produk LIKE '%$searchKeyword%') ORDER BY id_produk DESC";

    $result = $conn->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            // Produk ditemukan, Anda dapat mengembalikan respons sukses
            $response['status'] = "success";
            $response['message'] = "Data ditemukan";
            $response['data'] = array(); // Inisialisasi array kosong

            while ($row = $result->fetch_assoc()) {
                $response['data'][] = $row; // Menambahkan setiap baris ke dalam array $response['data']
            }
        } else {
            // Produk tidak ditemukan, Anda dapat mengembalikan respons dengan pesan bahwa tidak ada hasil
            $response['status'] = "success";
            $response['message'] = "Tidak ada hasil ditemukan";
        }
    } else {
        // Gagal melakukan kueri, Anda dapat mengembalikan respons gagal
        $response['status'] = "error";
        $response['message'] = "Terjadi kesalahan saat mencari data produk";
    }
    
    echo json_encode($response);
} else {
    echo 'error';
}
?>
