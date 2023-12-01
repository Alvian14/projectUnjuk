<?php
// Check if 'id' parameter is set in the GET request
if (isset($_GET['id'])) {
    // Get the 'id' from the GET request
    $id = $_GET['id'];

    // Your database connection code goes here
    require("koneksi.php");

    // SQL query to delete the record
    $sql = "DELETE FROM `umkm` WHERE id_umkm = $id";

    // Execute the query
    $eksekusi = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($eksekusi) {
        // Redirect back to the previous page
        header("Location: daftar-kecamatan/ daftar-perkecamatan.php ");
        exit();
    } else {
        // If the query fails, display an error message
        echo "Error: " . $sql . "<br>" . mysqli_error($konek);
    }

    // Close the database connection
    mysqli_close($konek);
} else {
    // If 'id' parameter is not set, display an error message
    echo "Invalid request. 'id' parameter is missing.";
}
?>