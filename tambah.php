<?php
require "cek_login.php";
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"]);
    $alamat = trim($_POST["alamat"]);

    if ($nama !== "" && $alamat !== "") {
        $perintah = mysqli_prepare($koneksi, "INSERT INTO anggota (nama, alamat) VALUES (?, ?)");
        mysqli_stmt_bind_param($perintah, "ss", $nama, $alamat);
        mysqli_stmt_execute($perintah);

        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Tambah Anggota</title>
</head>
<body>
  <h1>Tambah Anggota</h1>
  <form method="post">
    <input type="hidden" name="csrf" value="<?= $_SESSION["csrf"] ?>">
    <p><input type="text" name="nama" placeholder="Nama" required></p>
    <p><input type="text" name="alamat" placeholder="Alamat" required></p>
    <button type="submit">Simpan</button>
  </form>
  <p><a href="index.php">Kembali</a></p>
</body>
</html>