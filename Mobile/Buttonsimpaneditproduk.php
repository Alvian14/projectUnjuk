<?php
/**
 * Digunakan untuk mengupdate data produk.
 */

require "../koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Post request
    $idproduk = $_POST['id_produk']; // Anda memerlukan ID produk yang akan diperbarui
    $namaproduk = $_POST['nama_produk'];
    $hargaproduk = $_POST['harga_produk'];
    $kategoriproduk = $_POST['kategori_produk'];
    $deskripsiproduk = $_POST['deskripsi_produk'];
    $pirtproduk = $_POST['pirt_produk'];
    $bpomproduk = $_POST['bpom_produk'];
    $idhalalproduk = $_POST['idhalal_produk'];
    $gambarproduk1 = $_POST['gambar_produk1'];
    $gambarproduk2 = $_POST['gambar_produk2'];
    $gambarproduk3 = $_POST['gambar_produk3'];

    // Menambahkan kode untuk meng-handle upload gambar

    $filename1 = $filename2 = $filename3 = "";

    // saving photo1
    if (!empty($gambarproduk1)) {
        $gambarproduk1 = str_replace('data:image/png;base64,', '', $gambarproduk1);
        $gambarproduk1 = str_replace(' ', '+', $gambarproduk1);
        $data = base64_decode($gambarproduk1);
        $filename1 = uniqid() . '.png';
        $file1 = '../public/img/produk-photo/' . $filename1;
        file_put_contents($file1, $data);
    } else {
        $response = array("status" => "error", "message" => "Gambar produk ke-1 harus diisi");
        echo json_encode($response);
        exit; // Keluar dari skrip jika gambar ke-1 kosong
    }

    // saving photo2
    if (!empty($gambarproduk2)) {
        $gambarproduk2 = str_replace('data:image/png;base64,', '', $gambarproduk2);
        $gambarproduk2 = str_replace(' ', '+', $gambarproduk2);
        $data2 = base64_decode($gambarproduk2);
        $filename2 = uniqid() . '.png';
        $file2 = '../public/img/produk-photo/' . $filename2;
        file_put_contents($file2, $data2);
    }

    // saving photo3
    if (!empty($gambarproduk3)) {
        $gambarproduk3 = str_replace('data:image/png;base64,', '', $gambarproduk3);
        $gambarproduk3 = str_replace(' ', '+', $gambarproduk3);
        $data3 = base64_decode($gambarproduk3);
        $filename3 = uniqid() . '.png';
        $file3 = '../public/img/produk-photo/' . $filename3;
        file_put_contents($file3, $data3);
    }

    // Perbarui data produk dengan menggunakan UPDATE query
    $sql = "UPDATE produk SET 
            nama_produk = '$namaproduk',
            harga_produk = '$hargaproduk',
            kategori_produk = '$kategoriproduk',
            deskripsi_produk = '$deskripsiproduk',
            pirt_produk = '$pirtproduk',
            bpom_produk = '$bpomproduk',
            idhalal_produk = '$idhalalproduk',
            gambar_produk1 = '$filename1',
            gambar_produk2 = '$filename2',
            gambar_produk3 = '$filename3'
        WHERE id_produk = $idproduk";

    $result = $conn->query($sql);

    if ($result === true) {
        $response = array("status" => "success", "message" => "Data produk berhasil diperbarui");
    } else {
        $response = array("status" => "error", "message" => "Gagal memperbarui data produk: $sql", "error_details" => $conn->error);
    }

    // Tutup koneksi
    $conn->close();
} else {
    $response = array("status" => "error", "message" => "Bukan metode POST");
}

// Tampilkan respons
echo json_encode($response);
?>
