<?php
/**
 * Digunakan untuk register manual.
 */

require "../koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // post request
    $idproduk = $_POST['id_produk'];
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
    $idumkm = $_POST['id_umkm'];

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

    // Menambahkan jalur /public/img/produk-photo/ pada nama file gambar sebelum menyimpannya ke dalam database
    $filename1 = '/public/img/produk-photo/' . $filename1;
    $filename2 = '/public/img/produk-photo/' . $filename2;
    $filename3 = '/public/img/produk-photo/' . $filename3;

    // Simpan nama file gambar ke dalam database
    $sql = "INSERT INTO produk (nama_produk, harga_produk, kategori_produk, deskripsi_produk, pirt_produk, bpom_produk, idhalal_produk, gambar_produk1, gambar_produk2, gambar_produk3, id_umkm) VALUES ('$namaproduk', '$hargaproduk', '$kategoriproduk', '$deskripsiproduk', '$pirtproduk', '$bpomproduk', '$idhalalproduk', '$filename1', '$filename2', '$filename3', '$idumkm')";
    $result = $conn->query($sql);

    if ($result === true) {
        $response = array("status" => "success", "message" => "Upload berhasil");
    } else {
        $response = array("status" => "error", "message" => "Upload Gagal $sql", "error_details" => $conn->error);
    }

    // close koneksi
    $conn->close();
} else {
    $response = array("status" => "error", "message" => "not post method");
}

// show response
echo json_encode($response);
?>
