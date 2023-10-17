// Mengambil elemen dropdown dan tombol toggle
const dropdownToggle = document.getElementById("dropdown-toggle");
const dropdownMenu = document.getElementById("dropdown-menu");

// Menambahkan event click ke tombol toggle
dropdownToggle.addEventListener("click", function(event) {
  event.preventDefault(); // Menghentikan tindakan bawaan
  if (dropdownMenu.style.display === "block") {
    dropdownMenu.style.display = "none";
  } else {
    dropdownMenu.style.display = "block";
  }
});

// Menambahkan event click ke setiap item dropdown
const dropdownItems = dropdownMenu.getElementsByClassName("dropdown-item");
for (let i = 0; i < dropdownItems.length; i++) {
  dropdownItems[i].addEventListener("click", function() {
    dropdownMenu.style.display = "none"; // Menyembunyikan dropdown setelah item dipilih
  });
}
