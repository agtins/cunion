<?php
$host = "localhost";
$user = "root"; // default user XAMPP
$pass = "";     // kosongkan kalau belum pakai password
$db   = "ksp_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
