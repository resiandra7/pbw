<?php
include "connection.php";

// Ambil data dari form
if (!isset($_POST['judul']) || !isset($_POST['tahun'])) {
    die("Form tidak mengirimkan data. Pastikan Anda mengisi semua field.");
}

$judul = $_POST['judul'];
$tahun = $_POST['tahun'];

// Debugging koneksi database
if (!$koneksi) {
    die("Koneksi ke database gagal.");
} else {
    echo "Koneksi database berhasil.<br>";
}

// Debugging query
try {
    $dbh = $koneksi->prepare("INSERT INTO buku (judul, tahun, created_at) VALUES (?, ?, ?)");
    $result = $dbh->execute([
        $judul,
        $tahun,
        date("Y-m-d H:i:s")
    ]);

    if ($result) {
        echo "Data berhasil disimpan.<br>";
        echo "Judul: $judul<br>";
        echo "Tahun Terbit: $tahun<br>";
        echo "Created At: " . date("Y-m-d H:i:s") . "<br>";
    } else {
        echo "Data gagal disimpan.";
    }
} catch (PDOException $e) {
    echo "Terjadi kesalahan saat menyimpan data: " . $e->getMessage();
}
?>
