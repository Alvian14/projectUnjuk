if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    // Redirect pengguna seluler ke halaman lain (misalnya, halaman seluler.html)
    window.location.href = "not-found.html";
}