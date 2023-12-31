<?php
    include('koneksi.php');
    session_start();

    header('location: form.php');

    // if(!isset($_SESSION['userID'])) {
    //     header('location: form.php');
    //     exit();
    // }
?>
