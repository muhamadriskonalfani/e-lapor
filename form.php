<?php
    include('koneksi.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengaduan Masyarakat - Form</title>

    <!-- bootstrap 5 link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- google icon font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

        .white-box .box-login {
            position: absolute;
            width: 24rem;
            height: 30rem;
            background: var(--white);
            box-shadow: 0 2px 4px rgba(0, 0, 0, .8);
            padding: 3rem;
            transition: 1s ease-in-out;

            border: var(--border);
        }
        
        .white-box .box-login h1 {
            text-align: center;
            color: var(--blue);
            padding-top: 2.3rem;

            border: var(--border);
        }

        .white-box .box-login h6 {
            text-align: center;
            padding: .8rem;

            border: var(--border);
        }

        .white-box .box-login form {
            display: grid;
            gap: 1.2rem;

            border: var(--border);
        }

        .white-box .box-login form label {
            font-size: 13px;
        }

        .white-box .box-login form .submit button {
            width: 100%;
            padding: .3rem;
            background: var(--blue);
            color: var(--white);
            font-weight: 500;
            letter-spacing: .5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .8);
            margin-top: .4rem;
            transition: .2s;

            border: var(--border);
        }

        .white-box .box-login form .submit:hover button {
            letter-spacing: 1.5px;
        }


        .white-box .box-daftar {
            position: absolute;
            width: 24rem;
            height: 35.2rem;
            background: var(--white);
            box-shadow: 0 2px 4px rgba(0, 0, 0, .8);
            padding: 3rem;
            transform: translateX(100vw);
            transition: 1s ease-in-out;
            z-index: 2;

            border: var(--border);
        }
        
        .white-box .box-daftar h1 {
            text-align: center;
            color: var(--blue);
            padding-top: 2.3rem;

            border: var(--border);
        }

        .white-box .box-daftar h6 {
            text-align: center;
            padding: .8rem;

            border: var(--border);
        }

        .white-box .box-daftar form {
            display: grid;
            gap: 1.2rem;

            border: var(--border);
        }

        .white-box .box-daftar form label {
            font-size: 13px;
        }

        .white-box .box-daftar form .submit button {
            width: 100%;
            padding: .3rem;
            background: var(--blue);
            color: var(--white);
            font-weight: 500;
            letter-spacing: .5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .8);
            margin-top: .4rem;
            transition: .2s;

            border: var(--border);
        }

        .white-box .box-daftar form .submit:hover button {
            letter-spacing: 1.5px;
        }



    </style>

</head>
<body>
    <div class="container-fluid">
        <div class="white-box">
            <div class="box-login">
                <h1>Login!</h1>
                <h6>Silahkan login terlebih dahulu</h6>
                <form method="POST" action="proses.php">
                    <div>
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" class="form-control" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="form-control" required>
                    </div>
                    <div class="submit">
                        <button type="submit" name="login">Login</button>
                    </div>
                </form>
                <h6 class="mt-1">Belum punya akun? <a href="#" class="daftar">Daftar</a></h6>
            </div>

            <div class="box-daftar">
                <h1>Daftar!</h1>
                <h6>Silahkan daftarkan diri anda</h6>
                <form method="POST" action="proses.php">
                    <div>
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" class="form-control" required>
                    </div>
                    <div>
                        <label for="phone">Nomor Telepon</label>
                        <input id="phone" name="nomor_telepon" type="text" class="form-control" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="form-control" required>
                    </div>
                    <div class="submit">
                        <button type="submit" name="daftar">Daftar</button>
                    </div>
                </form>
                <h6 class="mt-1">Sudah punya akun? <a href="#" class="login">Login</a></h6>
            </div>
        </div>
    </div>
    
    <script>
        document.querySelector('.daftar').addEventListener('click', () => {
            document.querySelector('.box-login').style.transform = 'translateX(-100vw)';
            document.querySelector('.box-daftar').style.transform = 'translateX(0)';
        })

        document.querySelector('.login').addEventListener('click', () => {
            document.querySelector('.box-daftar').style.transform = 'translateX(100vw)';
            document.querySelector('.box-login').style.transform = 'translateX(0)';
        })
    </script>
</body>
</html>
