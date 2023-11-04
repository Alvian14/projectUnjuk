<?php
// Pastikan Anda memiliki koneksi ke basis data
include "koneksi.php";
// Fungsi untuk menghapus data UMKM berdasarkan ID
function hapusUMKM($id_umkm, $conn) {
    $sql = "DELETE FROM umkm WHERE id_umkm = " . $id_umkm;
    
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
};

// Tangani permintaan penghapusan
if (isset($_POST['id_umkm'])) {
    $id_umkm = $_POST['id_umkm'];

    if (hapusUMKM($id_umkm, $conn)) {
        echo "UMKM telah dihapus.";
    } else {
        echo "Gagal menghapus UMKM.";
    }
};



?>



