<?php include('user-header.php'); ?>

                <style>
                    .main .form form {
                        display: grid;
                        gap: 1rem; 
                    }

                    .main .form form label {
                        font-weight: 500;
                        margin-bottom: .5rem;
                    }

                    .main .form form .kirim button {
                        font-weight: 500;
                        padding: .5rem 2rem;
                        letter-spacing: .5px;
                        background: #f72516;
                        color: var(--white);
                        transition: .2s;
                    }

                    .main .form form .kirim button:hover {
                        transform: translateY(2px);
                        background: #e01709;
                    }

                </style>

                <div class="main">
                    <div class="title">
                        <h2>Tulis Laporan</h2>
                    </div>

                    <div class="form">
                        <form method="POST" action="proses-user.php" enctype="multipart/form-data">
                            <input type="hidden" name="id_pengguna" value="<?php echo $_SESSION['userID']; ?>">
                            <div class="deskripsi">
                                <label for="deskripsi">Deskripsi Laporan</label>
                                <textarea id="deskripsi" name="deskripsi" rows="6" placeholder="Ketik isi laporan anda" class="form-control"></textarea>
                            </div>
                            <div class="bukti">
                                <label for="bukti">Bukti Foto <span>(jika ada)</span></label>
                                <input id="bukti" name="file_bukti" type="file" class="form-control">
                            </div>
                            <div class="kirim">
                                <button type="button" name="laporkan" class="btn kirim-laporan">Lapor!</button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    // Window Onload
                    window.addEventListener('load', () => {
                        document.querySelector('.main').style.transform = 'translateY(0)';
                    })
                </script>
                    
<?php include('user-footer.php'); ?>
