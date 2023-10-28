const currentURL = window.location.href;
// Ambil semua tautan menu
const menuLinks = document.querySelectorAll('nav ul li a');
// Loop melalui tautan menu untuk menentukan tautan yang sesuai dengan URL saat ini
menuLinks.forEach(link => {
    if (currentURL === link.href) {
        link.classList.add('active');
    }
});