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

    // Validasi nama produk (5-100 karakter) tidak boleh hanya spasi dan tidak mengandung karakter tidak diinginkan
    if (strlen(trim($namaproduk)) < 5 || strlen(trim($namaproduk)) > 50 || preg_match('/[}{~$^<!*#;%>]/', $namaproduk)) {
        $response = array("status" => "error", "message" => "Nama produk harus terdiri dari 5-50 karakter");
        echo json_encode($response);
        exit;
    }

        // Validasi Harga produk (tidak boleh kosong)
        if (empty($hargaproduk)) {
            $response = array("status" => "error", "message" => "Harga produk tidak boleh kosong");
            echo json_encode($response);
            exit;
        }

    // validasi kategori produk
    if (empty($kategoriproduk) || $kategoriproduk === "Pilih Kategori") {
        $response = array("status" => "error", "message" => "Silakan pilih kategori produk");
        echo json_encode($response);
        exit;
    }

    // Validasi deskripsi produk (tidak boleh kosong)
    if (empty($deskripsiproduk)) {
        $response = array("status" => "error", "message" => "Deskripsi produk tidak boleh kosong");
        echo json_encode($response);
        exit;
    }

    // Validasi PIRT tidak boleh hanya spasi
    if (trim($pirtproduk) !== '-' && !preg_match('/^[\d-]{16}$/', $pirtproduk)) {
        $response = array("status" => "error", "message" => "Format PIRT tidak valid");
        echo json_encode($response);
        exit;
    }

    // Validasi BPOM tidak boleh hanya spasi
    if (trim($bpomproduk) !== '-' && !preg_match('/^[a-zA-Z\d-]{15}$/', $bpomproduk)) {
        $response = array("status" => "error", "message" => "Format BPOM tidak valid");
        echo json_encode($response);
        exit;
    }


    // Validasi ID Halal tidak boleh hanya spasi
    if (trim($idhalalproduk) !== '-' && !preg_match('/^\d{5,25}$/', $idhalalproduk)) {
        $response = array("status" => "error", "message" => "Format ID Halal tidak valid");
        echo json_encode($response);
        exit;
    }



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
