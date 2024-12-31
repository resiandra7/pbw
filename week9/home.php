<?php
include "connection.php";  // Pastikan file koneksi di-include di sini

// Pastikan koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal");
}

$dbh = $koneksi->query("SELECT * FROM buku WHERE isdel = 0");
?>

<a href="logout.php">Tambah Logout</a>
<a href="input.php">Tambah Data</a>

<table border="1">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Tahun Terbit</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    while ($bukus = $dbh->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $bukus['judul']; ?></td>
            <td><?php echo $bukus['tahun']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $bukus['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $bukus['id']; ?>">Hapus</a>
            </td>
        </tr>
    <?php
        $no++;
    }
    ?>
</table>
