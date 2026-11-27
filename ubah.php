<?php
require "koneksi.php";
$id = (int) ($_GET["id"] ?? 0);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"]);
    $alamat = trim($_POST["alamat"]);

    if ($nama !== "" && $alamat !== "") {
        $perintah = mysqli_prepare($koneksi, "UPDATE anggota SET nama = ?, alamat = ? WHERE id = ?");
        mysqli_stmt_bind_param($perintah, "ssi", $nama, $alamat, $id);
        mysqli_stmt_execute($perintah);

        header("Location: index.php");
        exit;
    }
}

$perintah = mysqli_prepare($koneksi, "SELECT * FROM anggota WHERE id = ?");
mysqli_stmt_bind_param($perintah, "i", $id);
mysqli_stmt_execute($perintah);
$anggota = mysqli_fetch_assoc(mysqli_stmt_get_result($perintah));

if (!$anggota) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
  <title>Ubah Anggota</title>
</head>
<body>
  <h1>Ubah Anggota</h1>
  <form method="post">
    <p><input type="text" name="nama" value="<?= htmlspecialchars($anggota["nama"]) ?>" required></p>
    <p><input type="text" name="alamat" value="<?= htmlspecialchars($anggota["alamat"]) ?>" required></p>
    <button type="submit">Simpan Perubahan</button>
  </form>
  <p><a href="index.php">Kembali</a></p>
</body>
</html>