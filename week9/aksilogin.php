<?php
    include "connection.php";
    session_start();  // Memulai session untuk menyimpan data login

    // Pastikan email dan password sudah dikirim
    if (isset($_POST['email']) && isset($_POST['katasandi'])) {
        $e = $_POST['email'];
        $p = $_POST['katasandi'];

        // Memperbaiki query dengan menutup tanda kutip yang hilang setelah WHERE
        $dbh = $koneksi->query("SELECT * FROM users WHERE email = '".$e."' AND password = '".$p."' AND active = 1");

        // Memperbaiki sintaksis pada pengecekan rowCount
        if ($dbh->rowCount() == 1) {
            // Mengambil data pengguna
            $users = $dbh->fetch(PDO::FETCH_ASSOC);

            // Menyimpan data pengguna ke session
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['userid'] = $users['id'];  // Menyimpan ID pengguna
            $_SESSION['username'] = $users['username'];  // Menyimpan username pengguna

            // Pengalihan ke halaman home.php setelah berhasil login
            header("Location: home.php");
            exit();
        } else {
            echo "Email atau password salah";
        }
    } else {
        echo "Email atau password belum diisi.";
    }
?>
