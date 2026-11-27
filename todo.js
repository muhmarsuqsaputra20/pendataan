const input = document.getElementById("input-tugas");
const tombol = document.getElementById("tombol-simpan");
const daftar = document.getElementById("daftar");
const KUNCI = "daftar-tugas";

let tugas = JSON.parse(localStorage.getItem(KUNCI)) || [];

// ubah data lama (teks biasa) ke format baru
tugas = tugas.map(function (t) {
  return typeof t === "string" ? { teks: t, selesai: false } : t;
});

function simpan() {
  localStorage.setItem(KUNCI, JSON.stringify(tugas));
}

function tampilkan() {
  daftar.innerHTML = "";

  for (let i = 0; i < tugas.length; i++) {
    const item = document.createElement("li");
    if (tugas[i].selesai) item.classList.add("selesai");

    const centang = document.createElement("input");
    centang.type = "checkbox";
    centang.checked = tugas[i].selesai;
    centang.addEventListener("change", function () {
      tugas[i].selesai = centang.checked;
      simpan();
      tampilkan();
    });

    const teks = document.createElement("span");
    teks.textContent = tugas[i].teks;

    const hapus = document.createElement("button");
    hapus.textContent = "Hapus";
    hapus.addEventListener("click", function () {
      tugas.splice(i, 1);
      simpan();
      tampilkan();
    });

    item.appendChild(centang);
    item.appendChild(teks);
    item.appendChild(hapus);
    daftar.appendChild(item);
  }
}

tombol.addEventListener("click", function () {
  if (input.value.trim() === "") return;

  tugas.push({ teks: input.value.trim(), selesai: false });
  simpan();
  input.value = "";
  tampilkan();
});

input.addEventListener("keydown", function (e) {
  if (e.key === "Enter") {
    tombol.click();
  }
});

tampilkan();