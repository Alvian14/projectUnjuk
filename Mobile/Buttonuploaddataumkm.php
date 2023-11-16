<?php
/**
 * Digunakan untuk register manual.
 */

require "../koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // post request
    $idakun = $_POST['id_akun'];
    $idumkm = $_POST['id_umkm'];
    $namaumkm = $_POST['nama_umkm'];
    $jenisusahaumkm = $_POST['Jenis_usahaumkm'];
    $nibumkm  = $_POST['Nib_umkm'];
    $notelpumkm = $_POST['notelp_umkm'];
    $kecamatanumkm = $_POST['kecamatan_umkm'];
    $alamatumkm = $_POST['alamat_umkm'];
    $umkmfoto = $_POST['umkm_foto'];
    
    // Validasi nama UMKM (hanya huruf)
    if (!preg_match("/^[a-zA-Z ]+$/", $namaumkm)) {
        $response = array("status" => "error", "message" => "Nama UMKM hanya boleh mengandung huruf dan spasi");
        echo json_encode($response);
        exit;
    }

    // Validasi NIB (13 digit angka)
    if (!preg_match("/^\d{13}$/", $nibumkm)) {
        $response = array("status" => "error", "message" => "NIB harus terdiri dari 13 digit angka");
        echo json_encode($response);
        exit;
    }

    // Validasi nomor telepon (minimal 11 digit, maksimal 13 digit angka)
    if (!preg_match("/^\d{11,13}$/", $notelpumkm)) {
        $response = array("status" => "error", "message" => "Nomor telepon harus terdiri dari 11 hingga 13 digit angka");
        echo json_encode($response);
        exit;
    }
    
    // Check if id_akun already has an id_umkm
    $checkSql = "SELECT id_umkm FROM umkm WHERE id_akun = '$idakun'";
    $checkResult = $conn->query($checkSql);
    $idUmkm = $checkResult->fetch_assoc();
    
    if ($checkResult && $checkResult->num_rows > 0) {
        // id_akun already has an id_umkm, so we can't insert a new one
        $response = array("status" => "error", "message" => "Data UMKM sudah terisi");
    } else {
        // Perform the INSERT operation
        $sql = "INSERT INTO umkm (id_umkm, id_akun, nama_umkm, Jenis_usahaumkm, Nib_umkm, notelp_umkm, kecamatan_umkm, alamat_umkm, umkm_foto) VALUES ('$idumkm', '$idakun', '$namaumkm', '$jenisusahaumkm', '$nibumkm', '$notelpumkm', '$kecamatanumkm', '$alamatumkm', '$umkmfoto')";
        $result = $conn->query($sql);
        
    
        if ($result == true) {
            
            $checkSql = "SELECT id_umkm FROM umkm WHERE id_akun = '$idakun'";
            $checkResult = $conn->query($checkSql);
            $idUmkm = $checkResult->fetch_assoc();

            $response = array("status" => "success", "message" => "Data inserted successfully", "id_umkm"=>$idUmkm['id_umkm']);
        } else {
            $response = array("status" => "error", "message" => "Data insertion failed -> $sql", "error_details" => $conn->error);
        }
    }

    // Close the connection
    $conn->close();
} else {
    $response = array("status" => "error", "message" => "not post method");
}

// Show response
echo json_encode($response);
?>
