<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idproduk = $_POST['id_produk'];
    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "aplikasi_unjuk");

    // Jika koneksi gagal
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Lakukan kueri SQL untuk menghapus produk berdasarkan kode produk
    $query = "DELETE FROM produk WHERE id_produk = '$idproduk'";

    if ($conn->query($query) === TRUE) {
        // Produk berhasil dihapus, Anda dapat mengembalikan respons sukses
        $response['status'] = "success";
        $response['message'] = "Produk berhasil dihapus";
    } else {
        // Gagal menghapus produk, Anda dapat mengembalikan respons gagal
        $response['status'] = "error";
        $response['message'] = "Terjadi kesalahan saat menghapus produk";
    }

    echo json_encode($response);
} else {
    echo 'error';
}
?>

