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
}

// Tangani permintaan penghapusan
if (isset($_POST['id_umkm'])) {
    $id_umkm = $_POST['id_umkm'];

    if (hapusUMKM($id_umkm, $conn)) {
        echo "UMKM telah dihapus.";
    } else {
        echo "Gagal menghapus UMKM.";
    }
}

$conn->close();
?>


<?php
    include "koneksi.php";

    // Memeriksa koneksi database
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Memeriksa apakah formulir telah dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $id_kegiatan = $_POST["id_kegiatan"];
        $judul_kegiatan = $_POST["judul"];
        $tanggal_kegiatan = $_POST["tgl"];
        $jam_kegiatan = $_POST["jam"];
        $deskripsi = $_POST["deskripsi"];
        $foto = $_POST["foto"];

        // Menyimpan data ke database
        $sql = "INSERT INTO kegiatan (id_kegiatan,judul, tgl, jam, deskripsi, foto) 
                VALUES ('$id_kegiatan','$judul_kegiatan', '$tanggal_kegiatan', '$jam_kegiatan', '$deskripsi', '$foto')";

        if (mysqli_query($conn, $sql)) {
            echo "Data kegiatan berhasil ditambahkan ke database.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Tutup koneksi database
        mysqli_close($conn);
    }
?>
