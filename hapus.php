<?php
<?php
require "cek_login.php";
require "koneksi.php";
require "cek_login.php";
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = (int) $_POST["id"];
    $perintah = mysqli_prepare($koneksi, "DELETE FROM anggota WHERE id = ?");
    mysqli_stmt_bind_param($perintah, "i", $id);
    mysqli_stmt_execute($perintah);
}

header("Location: index.php");
exit;