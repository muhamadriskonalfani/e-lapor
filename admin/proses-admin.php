<?php
    include('../koneksi.php');
    session_start();

    if(isset($_POST['respon'])) {
        $id_pengaduan = $_POST['id_pengaduan'];
        $id_petugas = $_POST['id_petugas'];
        $respon = $_POST['tanggapan'];

        $sqlInsertRespon = mysqli_query($koneksi, "INSERT INTO tb_tanggapan (id_pengaduan, id_petugas, tanggapan, tanggal_tanggapan) VALUE('$id_pengaduan', '$id_petugas', '$respon', NOW())");

        if($sqlInsertRespon) {
            $sqlUpdateReport = mysqli_query($koneksi, "UPDATE tb_pengaduan SET status = 'Selesai' WHERE id_pengaduan = '$id_pengaduan'");
            if($sqlUpdateReport) {
                header('location: daftar-tanggapan.php');
            }
        }
    }

    if(isset($_GET['hapus-petugas'])) {
        $id_petugas = $_GET['hapus-petugas'];

        $sqlDeleteAdmin = mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id_admin = '$id_petugas'");

        if($sqlDeleteAdmin) {
            header('location: daftar-petugas.php');
        }
    }

    if(isset($_GET['hapus-pengguna'])) {
        $id_pengguna = $_GET['hapus-pengguna'];

        $sqlDeleteUser = mysqli_query($koneksi, "DELETE FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'");

        if($sqlDeleteUser) {
            header('location: daftar-pengguna.php');
        }
    }

    if(isset($_GET['hapus-laporan'])) {
        $id_pengaduan = $_GET['hapus-laporan'];

        $sqlDeleteReport = mysqli_query($koneksi, "DELETE FROM tb_pengaduan WHERE id_pengaduan = '$id_pengaduan'");

        if($sqlDeleteReport) {
            header('location: daftar-laporan.php');
        }
    }

    if(isset($_GET['hapus-tanggapan'])) {
        $responID = $_GET['hapus-tanggapan'];

        $sqlDeleteRespon = mysqli_query($koneksi, "DELETE FROM tb_tanggapan WHERE id_tanggapan = '$responID'");

        if($sqlDeleteRespon) {
            header('location: daftar-tanggapan.php');
        }
    }
?>
