<?php
    $host       = 'localhost';
    $user       = 'root';
    $pass       = '';
    $database   = 'db_e_lapor';

    $koneksi = mysqli_connect($host, $user, $pass, $database);
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }
?>
