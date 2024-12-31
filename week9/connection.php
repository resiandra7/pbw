<?php
try {
    $koneksi = new PDO("mysql:host=localhost;dbname=akademik", "root", "");
    // Menambahkan atribut untuk menangani error PDO dengan lebih baik
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    // Tambahkan exit agar script berhenti jika koneksi gagal
    exit();
}
?>
