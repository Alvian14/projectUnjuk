function konfirmasiKeluar() {
    var konfirmasi = confirm("Apakah Anda yakin ingin keluar?");
    if (konfirmasi) {
        window.location.href = "tem-login/tem-login-admin.php";
    }
}