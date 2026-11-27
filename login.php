<?php
session_start();
require "koneksi.php";
$pesan = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $p = mysqli_prepare($koneksi, "SELECT * FROM pengguna WHERE username = ?");
    mysqli_stmt_bind_param($p, "s", $_POST["username"]);
    mysqli_stmt_execute($p);
    $user = mysqli_fetch_assoc(mysqli_stmt_get_result($p));

    if ($user && password_verify($_POST["password"], $user["password"])) {
        session_regenerate_id(true);
        $_SESSION["login"] = $user["username"];
        header("Location: index.php");
        exit;
    }
    $pesan = "Username atau password salah";
}
?>
<link rel="stylesheet" href="style.css">
<h1>Login</h1>
<p><?= $pesan ?></p>
<form method="post">
  <p><input type="text" name="username" placeholder="Username" required></p>
  <p><input type="password" name="password" placeholder="Password" required></p>
  <button type="submit">Masuk</button>
</form>