document.getElementById("logout-link").addEventListener("click", function () {
    var konfirmasi = confirm("Apakah Anda yakin ingin keluar?");
    if (konfirmasi) {
        window.location.href = "login.php";
    }
});