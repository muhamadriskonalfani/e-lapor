<?php
    include('../koneksi.php');
    session_start();

    if(isset($_SESSION['adminID'])) {
        $adminID = $_SESSION['adminID'];
        $sqlAdmin = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin = '$adminID'");
        $dataAdmin = mysqli_fetch_array($sqlAdmin);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengaduan Masyarakat - Beranda</title>

    <!-- bootstrap 5 link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- google icon font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- datatables css dan javascript -->
    <link rel="stylesheet" href="../assets/datatables/datatables.css">
    <script src="../assets/datatables/datatables.js"></script>

    <style>
        :root {
            --white: #fff;
            --blue: #0366fc;
            --light-blue: #03a9fc;

            /* --border: 1px solid black; */
            --border: none;
        }
        
        body {
            background: var(--white);
        }

        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: var(--blue);
        }

        .white-box {
            position: fixed;
            top: .7rem;
            right: .7rem;
            bottom: .7rem;
            left: .7rem;
            background: var(--white);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .white-box::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 10.5rem;
            height: 6.8rem;
            background: var(--blue);
            border-bottom-left-radius: 1.5rem;
        }

        .white-box::after {
            content: '';
            position: absolute;
            top: -.7rem;
            right: -.7rem;
            width: 9.5rem;
            height: 6rem;
            background: var(--light-blue);
            border-bottom-left-radius: 1rem;
        }


        .box {
            display: grid;
            grid-template-areas: 'sidebar main';
            grid-template-columns: 1.1fr 4fr;
            background: var(--white);
            width: 100%;
            height: 100%;
        }

        .box .sidebar {
            grid-area: sidebar;
            display: grid;
            grid-template-rows: 1fr 2.9fr;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .6);

            border: var(--border);
        }
        
        .box .sidebar .profile {
            padding: 1.2rem;
            display: grid;
            gap: 1.5rem;

            border: var(--border);
        }

        .box .sidebar .profile .image {
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            overflow: hidden;

        }

        .box .sidebar .profile .username {
            border: var(--border);
        }

        .box .sidebar .feature {
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            border: var(--border);
        }

        .box .sidebar .feature .links {
            display: flex;
            flex-direction: column;

            border: var(--border);
        }

        .box .sidebar .feature .links a,
        .box .sidebar .feature .logout a {
            text-decoration: none;
            color: grey;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: .8rem;
            gap: 2rem;

            border: var(--border);
        }

        .box .sidebar .feature .links a:hover,
        .box .sidebar .feature .logout a:hover {
            background: #eee;
        }


        .box .main {
            grid-area: main;
            padding: 2rem 3rem;
            transform: translateY(100vh);
            transition: 1s;

            border: var(--border);
        }

        .box .main .title {
            padding: 0 .5rem;
            margin-bottom: 1.4rem;

            border: var(--border);
        }

        .box .main .title h2 {
            color: var(--blue);
        }

        
        hr {
            margin: 0;
        }

        .active {
            background: #eee;
        }



    </style>

</head>
<body>
    <div class="container-fluid">
        <div class="white-box">
            <div class="box">
                <div class="sidebar">
                    <div class="profile">
                        <div class="image">
                            <img src="../assets/img/profile.jpeg" width="100%" alt="">
                        </div>
                        <div class="username">
                            <?php echo $dataAdmin['username']; ?>
                        </div>
                    </div>
                    <div class="feature">
                        <div class="links"><hr>
                            <a href="admin-beranda.php"><i class="material-icons">dashboard</i>Beranda</a>
                            <a href="daftar-petugas.php"><i class="material-icons">featured_play_list</i>Petugas</a></a>
                            <a href="daftar-pengguna.php"><i class="material-icons">account_box</i>Pengguna</a></a>
                            <a href="daftar-laporan.php"><i class="material-icons">report</i>Pengaduan</a></a>
                            <a href="daftar-tanggapan.php"><i class="material-icons">question_answer</i>Tanggapan</a></a>
                        </div>

                        <div class="logout"><hr>
                            <a href="../proses.php?logout=<?php echo $_SESSION['adminID']; ?>" onclick="return confirm('Apakah anda yakin ?')"><i class="material-icons">logout</i>Logout</a>
                        </div>
                    </div>
                </div>

                