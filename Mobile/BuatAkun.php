<?php
/**
 * Digunakan untuk register manual.
 */

require "../koneksi.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // post request
    $nama_user = $_POST['nama_user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $notelp_user = $_POST['notelp_user'];
    $alamat_user = $_POST['alamat_user'];
    $Level = $_POST['Level'];

    // Fungsi untuk memeriksa validitas alamat email
    function is_valid_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Fungsi untuk memeriksa kriteria nama user
    function is_valid_nama_user($nama_user, $conn) {
        // Pemeriksaan nama user sesuai dengan kondisi yang diminta
        if (
            trim($nama_user) === '' ||
            !preg_match('/^[A-Za-z\'()., ]+$/', $nama_user) ||
            preg_match('/[0-9!@#$%^&*():{}|<>]/', $nama_user) ||
            strlen($nama_user) > 50 ||
            strlen($nama_user) < 3
        ) {
            return 'tidak_valid';
        }

        $checkQuery = "SELECT * FROM akun WHERE nama_user = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $nama_user);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        // Jika nama sudah terdaftar, return 'terdaftar', jika tidak, return 'valid'
        return ($checkResult->num_rows === 0) ? 'valid' : 'terdaftar';
    }

    // Periksa apakah email sudah terdaftar
    $checkQueryEmail = "SELECT * FROM akun WHERE email = ?";
    $checkStmtEmail = $conn->prepare($checkQueryEmail);
    $checkStmtEmail->bind_param("s", $email);
    $checkStmtEmail->execute();
    $checkResultEmail = $checkStmtEmail->get_result();

    // Fungsi untuk memeriksa kriteria alamat user
    function is_valid_alamat_user($alamat_user) {
        return (trim($alamat_user) !== '' && strlen($alamat_user) >= 3 && strlen($alamat_user) <= 90);
    }

    // Periksa nomor telepon dimulai dengan angka 08
    function is_valid_no_telp($notelp_user) {
        return (preg_match('/^08/', $notelp_user));
    }

    if ($checkResultEmail->num_rows > 0) {
        // Email sudah terdaftar, berikan respons error
        $response = array("status" => "error", "message" => "Email sudah terdaftar");
    } else {
        // Periksa kriteria nama user
        $namaValidation = is_valid_nama_user($nama_user, $conn);

        if ($namaValidation === 'valid') {
            // Periksa apakah email valid
            if (is_valid_email($email)) {
                // Periksa kekuatan kata sandi menggunakan ekspresi reguler
                if (preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
                    // Periksa nomor telepon minimal 11 karakter
                    if (strlen($notelp_user) >= 11 && is_valid_no_telp($notelp_user)) {
                        // Periksa kriteria alamat user
                        if (is_valid_alamat_user($alamat_user)) {
                            $epassword = password_hash($password, PASSWORD_BCRYPT);

                            // Gunakan prepared statement untuk insert data
                            $sql = "INSERT INTO akun (email, password, nama_user, alamat_user, notelp_user, Level) VALUES (?, ?, ?, ?, ?, 'user')";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("sssss", $email, $epassword, $nama_user, $alamat_user, $notelp_user);
                            $result = $stmt->execute();

                            if ($result === true) {
                                $response = array("status" => "success", "message" => "Register Success");
                            } else {
                                $response = array("status" => "error", "message" => "Register Gagal", "error_details" => $stmt->error);
                            }
                        } else {
                            $response = array("status" => "error", "message" => "Alamat tidak boleh kosong, minimal 3 karakter, dan maksimal 90 karakter");
                        }
                    } else {
                        $response = array("status" => "error", "message" => "Nomor telepon  minimal 11 karakter, harus dimulai dengan angka 08");
                    }
                } else {
                    $response = array("status" => "error", "message" => "Kata sandi harus memiliki minimal 8 karakter, huruf kapital, angka, dan simbol");
                }
            } else {
                $response = array("status" => "error", "message" => "Alamat email tidak valid");
            }
        } elseif ($namaValidation === 'terdaftar') {
            // Nama sudah terdaftar, berikan respons error khusus
            $response = array("status" => "error", "message" => "Nama sudah terdaftar");
        } else {
            // Nama tidak memenuhi kriteria validitas
            $response = array("status" => "error", "message" => "Nama tidak memenuhi kriteria");
        }
    }

    // close koneksi
    $conn->close();
} else {
    $response = array("status" => "error", "message" => "not post method");
}

// show response
echo json_encode($response);
?>
