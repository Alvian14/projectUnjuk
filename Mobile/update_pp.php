<?php

require "../koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // post request
    $email = $_POST['email'];
    $photo = $_POST['photo'];

    // cek email exist atau tidak
    $sql = "SELECT email FROM akun WHERE email = '$email' LIMIT 1";
    if ($conn->query($sql)->num_rows == 1) {
        // saving photo
        $photo = str_replace('data:image/png;base64,', '', $photo);
        $photo = str_replace(' ', '+', $photo);
        $data = base64_decode($photo);
        $filename = uniqid() . '.png';
        $file = '../../../public/img/user-photo/' . $filename;
        file_put_contents($file, $data);

        // get data user
        $sql = "UPDATE akun SET user_foto = '$filename' WHERE email = '$email'";
        $result = $conn->query($sql);

        // jika foto profile berhasil diupdate
        if ($result === true) {
            $sql = "SELECT user_foto FROM users WHERE email = '$email' LIMIT 1";
            $result = $conn->query($sql);
            $photo = $result->fetch_assoc();

            if ($result->num_rows == 1) {
                $response = array("status" => "success", "message" => "photo profile berhasil diupdate", "data" => $photo);
            } else {
                $response = array("status" => "success", "message" => "photo profile berhasil diupdate");
            }
        } else {
            $response = array("status" => "error", "message" => "photo profile gagal diupdate");
        }
    }else{
        $response = array("status"=> "error", "message"=> "Email tidak ditemukan");
    }

    // close koneksi
    $conn->close();
} else {
    $response = array("status" => "error", "message" => "method is not post");
}

// show response
echo json_encode($response)

?>