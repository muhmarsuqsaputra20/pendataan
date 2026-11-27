const tombol = document.getElementById("tombol-tema");

tombol.addEventListener("click", function () {
  const gelap = document.body.classList.toggle("gelap");
  tombol.textContent = gelap ? "Mode Terang" : "Mode Gelap";
});