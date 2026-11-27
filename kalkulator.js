const input1 = document.getElementById("angka1");
const input2 = document.getElementById("angka2");
const operator = document.getElementById("operator");
const hasil = document.getElementById("hasil");

document.getElementById("tombol-hitung").addEventListener("click", function () {
  if (input1.value === "" || input2.value === "") {
    hasil.textContent = "Isi kedua angka dulu";
    return;
  }

  const a = Number(input1.value);
  const b = Number(input2.value);
  let nilai;

  if (operator.value === "+") {
    nilai = a + b;
  } else if (operator.value === "-") {
    nilai = a - b;
  } else if (operator.value === "*") {
    nilai = a * b;
  } else if (b === 0) {
    nilai = "tidak bisa dibagi 0";
  } else {
    nilai = a / b;
  }

  hasil.textContent = "Hasil: " + nilai;
});