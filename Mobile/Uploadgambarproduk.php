<?php

require "../koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // post request
    $idproduk = $_POST['id_produk'];
    $gambarproduk1 = $_POST['gambar_produk1'];
    $gambarproduk2 = $_POST['gambar_produk2'];
    $gambarproduk3 = $_POST['gambar_produk3'];

    // cek produk exist atau tidak
    $sql = "SELECT id_produk FROM produk WHERE id_produk = '$idproduk' LIMIT 1";
    if ($conn->query($sql)->num_rows == 1) {
        // saving photo1
        $gambarproduk1 = str_replace('data:image/png;base64,', '', $gambarproduk1);
        $gambarproduk1 = str_replace(' ', '+', $gambarproduk1);
        $data = base64_decode($gambarproduk1);
        // echo $gambarproduk1;
        $filename1 = uniqid() . '.png';
        $file1 = '../public/img/produk-photo/' . $filename1;
        file_put_contents($file1, $data);


        // saving photo2
        $gambarproduk2 = str_replace('data:image/png;base64,', '', $gambarproduk2);
        $gambarproduk2 = str_replace(' ', '+', $gambarproduk2);
        $data2 = base64_decode($gambarproduk2);
        $filename2 = uniqid() . '.png';
        $file2 = '../public/img/produk-photo/' . $filename2;
        file_put_contents($file2, $data2);

        // saving photo3
        $gambarproduk3 = str_replace('data:image/png;base64,', '', $gambarproduk3);
        $gambarproduk3 = str_replace(' ', '+', $gambarproduk3);
        $data3 = base64_decode($gambarproduk3);
        $filename3 = uniqid() . '.png';
        $file3 = '../public/img/produk-photo/' . $filename3;
        file_put_contents($file3, $data3);

        // Simpan nama file gambar ke dalam database
        $sql = "UPDATE produk SET gambar_produk1 = '$filename1', gambar_produk2 = '$filename2', gambar_produk3 = '$filename3' WHERE id_produk = '$idproduk'";
        $result = $conn->query($sql);

        if ($result === true) {
            $response = array("status" => "success", "message" => "Foto produk berhasil diunggah");
        } else {
            $response = array("status" => "error", "message" => "Gagal mengupdate database");
        }
    } else {
        $response = array("status"=> "error", "message"=> "Produk tidak ditemukan");
    }

    // Tutup koneksi
    $conn->close();
} else {
    $response = array("status" => "error", "message" => "Metode bukan POST");
}

// Tampilkan respons
echo json_encode($response);

?>
