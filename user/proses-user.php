<?php
    include('../koneksi.php');
    session_start();

    if(isset($_POST['laporkan'])) {
        $userID = $_POST['id_pengguna'];
        $deskripsi = $_POST['deskripsi'];
        $bukti = $_FILES['file_bukti']['name'];

        $dir = "../assets/file_bukti/";
        $tmpFile = $_FILES['file_bukti']['tmp_name'];

        move_uploaded_file($tmpFile, $dir.$bukti);

        $sqlInsertReport = mysqli_query($koneksi, "INSERT INTO tb_pengaduan (id_pengguna, deskripsi, file_bukti, tanggal_pengaduan, status) VALUES('$userID', '$deskripsi', '$bukti', NOW(), 'Proses')");

        if($sqlInsertReport) {
            $_SESSION['report'] = "Berhasil dilaporkan";
            header('location: daftar-laporan.php');
        } 
    }

    if(isset($_GET['hapus-laporan'])) {
        $reportID = $_GET['hapus-laporan'];

        $sqlDeleteReport = mysqli_query($koneksi, "DELETE FROM tb_pengaduan WHERE id_pengaduan = '$reportID'");

        if($sqlDeleteReport) {
            header('location: daftar-laporan.php');
        }
    }
?>