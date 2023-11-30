<?php
header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // koneksi ke database
        $conn = new mysqli("localhost", "root", "", "aplikasi_unjuk");

        // jika koneksi gagal
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // post request
        $email = $_POST['email'];
        $password = $_POST['password'];

        // get data user
        $sql = "SELECT * FROM akun  WHERE email = '$email'   LIMIT 1";
        $result = $conn->query($sql);

        // jika username exist
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc(); // get user data
            // jika password match
            if (password_verify($password, $user['password'])) {

                $idUser = $user['id_akun'];

                $sql = "SELECT * FROM umkm  WHERE id_akun = '$idUser'  LIMIT 1";
                $result = $conn->query($sql);

                if($result->num_rows === 1){
                    $idUmkm = $result->fetch_assoc()['id_umkm'];
                    $response = array('status' => 'success', 'message' => 'Berhasil Masuk', 'data' => $user, 'id_umkm' => $idUmkm);
                }else{
                    $response = array('status' => 'success', 'message' => 'Login berhasil', 'data' => $user);
                }

            } else {
                // Kata sandi salah
                $response = array('status' => 'error', 'message' => 'Kata sandi salah');
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Pengguna tidak ditemukan');
        }

        // close koneksi
        $conn->close();

        echo json_encode($response);
    }else{
        echo 'error';
    }
?>