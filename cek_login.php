<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Buat kode rahasia satu kali per sesi
if (empty($_SESSION["csrf"])) {
    $_SESSION["csrf"] = bin2hex(random_bytes(32));
}

// Periksa kode setiap ada formulir yang dikirim
if ($_SERVER["REQUEST_METHOD"] === "POST"
    && !hash_equals($_SESSION["csrf"], $_POST["csrf"] ?? "")) {
    http_response_code(403);
    exit("Permintaan ditolak.");
}