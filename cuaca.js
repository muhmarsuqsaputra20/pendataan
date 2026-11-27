const inputKota = document.getElementById("kota");
const hasil = document.getElementById("hasil");

async function cariCuaca() {
  const nama = inputKota.value.trim();
  if (nama === "") return;

  hasil.textContent = "Memuat...";

  try {
    // 1. Cari koordinat kota
    const resKota = await fetch(
      "https://geocoding-api.open-meteo.com/v1/search?count=1&name=" + encodeURIComponent(nama)
    );
    const dataKota = await resKota.json();

    if (!dataKota.results) {
      hasil.textContent = "Kota tidak ditemukan";
      return;
    }

    const kota = dataKota.results[0];

    // 2. Ambil cuaca berdasarkan koordinat
    const resCuaca = await fetch(
      "https://api.open-meteo.com/v1/forecast?latitude=" + kota.latitude +
      "&longitude=" + kota.longitude + "&current=temperature_2m,wind_speed_10m"
    );
    const dataCuaca = await resCuaca.json();

    hasil.textContent =
      kota.name + ": " + dataCuaca.current.temperature_2m + "°C, angin " +
      dataCuaca.current.wind_speed_10m + " km/jam";
  } catch (error) {
    hasil.textContent = "Gagal mengambil data. Periksa internet.";
  }
}

document.getElementById("tombol-cari").addEventListener("click", cariCuaca);