<?php
/**
 * Digunakan untuk mengupdate password dari users.
 */

 require "../koneksi.php";

header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // post request
        $email = $_POST['email'];
        $password = $_POST['password'];
        $epassword = password_hash($password, PASSWORD_BCRYPT);

        // get data user
        $sql = "UPDATE akun SET password = '$epassword' WHERE email = '$email'";
        $result = $conn->query($sql);

        // jika password berhasil terupdate
        if($result === true){
            $response = array("status"=>"success", "message"=>"Password berhasil diupdate");
        }else{
            $response = array("status"=>"error", "message"=>"Password gagal diupdate");
        }

        // close koneksi
        $conn->close();

    }else{
        $response = array("status"=>"error", "message"=>"method is not post");
    }

    // show response
    echo json_encode($response);
?>
