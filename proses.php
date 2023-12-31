<?php
    include('koneksi.php');
    session_start();

    if(isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sqlUser = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE username = '$user' AND password = '$pass'");
        $dataUser = mysqli_fetch_array($sqlUser);
        $checkUser = mysqli_num_rows($sqlUser);
        
        if(!$checkUser) {
            $sqlAdmin = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username = '$user' AND password = '$pass'");
            $dataAdmin = mysqli_fetch_array($sqlAdmin);
            $checkAdmin = mysqli_num_rows($sqlAdmin);

            if($checkAdmin) {
                $_SESSION['adminID'] = $dataAdmin['id_admin'];
                header('location: admin/admin-beranda.php');
            } else {
                $_SESSION['gagal'] = 'Username atau Password salah, Silahkan coba lagi';
                header('location: form.php');
            }

        } else {
            $_SESSION['userID'] = $dataUser['id_pengguna'];
            header('location: user/user-beranda.php');
        }

    }

    if(isset($_POST['daftar'])) {
        $user = $_POST['username'];
        $phone = $_POST['nomor_telepon'];
        $pass = $_POST['password'];

        $sqlInsert = mysqli_query($koneksi, "INSERT INTO tb_pengguna (username, password, nomor_telepon) VALUES('$user', '$pass', '$phone')");
        if($sqlInsert) {
            $dataDaftar = array(
                'email' => $user,
                'pass' => $pass
            );
            $_SESSION['dataDaftar'] = $dataDaftar;
            header('location: form.php');
        } else {
            $_SESSION['gagal'] = 'Username atau Password sudah digunakan, Silahkan coba lagi';
            header('location: form.php');
        }

    }

    if(isset($_GET['logout'])) {
        session_destroy();
        header('location: form.php');
    }

?>
