<?php include('admin-header.php'); ?>

                <style>
                    .main .notification {
                        display: flex;
                        gap: 1.5rem;
                    }

                    .main .notification .red,
                    .main .notification .green {
                        padding: 1.6rem;
                        width: 20.2rem;
                        background: var(--a);
                        border-radius: 2px;
                        box-shadow: 0 2px 2px rgba(0, 0, 0, .5);
                        transition: .2s;
                    }

                    .main .notification .red:hover,
                    .main .notification .green:hover {
                        transform: translateY(2px);
                        background: var(--b);
                    }

                    .main .notification .red h5,
                    .main .notification .green h5 {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        color: var(--white);
                        font-weight: 400;
                        letter-spacing: .5px;
                        font-size: 23px;
                    }

                    

                </style>

                <div class="main">
                    <div class="title">
                        <h2>Beranda (Admin)</h2>
                    </div>

                    <?php
                        $sqlProses = mysqli_query($koneksi, "SELECT COUNT(*) as statusY FROM tb_pengaduan WHERE status = 'Proses'");
                        $sqlSelesai = mysqli_query($koneksi, "SELECT COUNT(*) as statusX FROM tb_pengaduan WHERE status = 'Selesai'");
                        $result1 = mysqli_fetch_assoc($sqlProses);
                        $result2 = mysqli_fetch_assoc($sqlSelesai);
                    ?>

                    <div class="notification">
                        <div class="red" style="--a: #f72516; --b: #e01709;">
                            <h5>Laporan Masuk <span><?php echo $result1['statusY']; ?></span></h5>
                        </div>
                        <div class="green" style="--a: #00ff00; --b: #00dd00;">
                            <h5>Laporan Selesai <span><?php echo $result2['statusX']; ?></span></h5>
                        </div>
                    </div>
                </div>

                <script>
                    // Report Buttons
                    document.querySelector('.red').addEventListener('click', () => window.location.href = 'daftar-laporan.php?status=Proses');
                    document.querySelector('.green').addEventListener('click', () => window.location.href = 'daftar-laporan.php?status=Selesai');
                
                    // Window Onload
                    window.addEventListener('load', () => {
                        document.querySelector('.main').style.transform = 'translateY(0)';
                    })

                    // Active Button
                    document.querySelectorAll('.links a')[0].classList.add('active');
                </script>
                    
<?php include('admin-footer.php'); ?>
