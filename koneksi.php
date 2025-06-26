<?php
// Koneksi ke database MySQL
try {
    $link = mysqli_connect("localhost", "root", "");
    if (!$link) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
    mysqli_select_db($link,"pertemuan11");
} catch (Exception $e) {
    die("Database Error: " . $e->getMessage());
}
?>