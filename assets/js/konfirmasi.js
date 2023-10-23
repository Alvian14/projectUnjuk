document.getElementById("logout-link").addEventListener("click", function (e) {
    e.preventDefault(); // Mencegah tautan langsung diikuti

    var konfirmasi = confirm("Anda yakin ingin keluar?");

    if (konfirmasi) {
        // Lakukan tindakan logout di sini jika pengguna mengonfirmasi
     window.location.href = "tem-login/tem-login-admin.php";
    }
});