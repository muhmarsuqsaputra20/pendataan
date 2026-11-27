<?php
require "cek_login.php";
require "koneksi.php";

$cari = trim($_GET["cari"] ?? "");
$kata = "%" . $cari . "%";

$perintah = mysqli_prepare($koneksi, "SELECT * FROM anggota WHERE nama LIKE ? OR alamat LIKE ?");
mysqli_stmt_bind_param($perintah, "ss", $kata, $kata);
mysqli_stmt_execute($perintah);
$data = mysqli_stmt_get_result($perintah);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Data Anggota</title>
</head>
<body>
  <h1>Data Anggota</h1>
  <p><a href="logout.php">Keluar</a></p>
  <p><a href="tambah.php">+ Tambah Anggota</a></p>

  <form method="get">
    <p><input type="text" name="cari" placeholder="Cari nama atau alamat"
              value="<?= htmlspecialchars($cari) ?>"></p>
    <button type="submit">Cari</button>
    <a href="index.php">Reset</a>
  </form>
  <br>

  <table>
    <tr><th>No</th><th>Nama</th><th>Alamat</th><th>Aksi</th></tr>
    <?php $no = 1; while ($baris = mysqli_fetch_assoc($data)) : ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($baris["nama"]) ?></td>
      <td><?= htmlspecialchars($baris["alamat"]) ?></td>
      <td>
        <a href="ubah.php?id=<?= $baris["id"] ?>">Ubah</a>
        <form method="post" action="hapus.php" style="display:inline"
              onsubmit="return confirm('Hapus data ini?')">
          <input type="hidden" name="csrf" value="<?= $_SESSION["csrf"] ?>">
          <input type="hidden" name="id" value="<?= $baris["id"] ?>">
          <button type="submit">Hapus</button>
        </form>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>