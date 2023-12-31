<?php include('admin-header.php'); ?>

                <style>
                    .main .title {
                        display: flex;
                        justify-content: flex-start;
                        align-items: center;
                        gap: 1rem;
                    }

                    .main .title a {
                        transform: translateY(-2px);
                    }

                    .main .detail-container {
                        display: grid;
                        grid-template-columns: repeat(2, 1fr);
                        height: 29rem;
                        overflow: auto;
                    }

                    .detail-container::-webkit-scrollbar {
                        width: .8rem;
                    }

                    .detail-container::-webkit-scrollbar-track {
                        background: transparent;
                    }

                    .detail-container::-webkit-scrollbar-thumb {
                        display: none;
                    }
                    
                    .main .detail-container .detail-item {
                        color: black;
                    }

                    .main .detail-container .detail-item .item {
                        padding-right: 1.5rem;
                        display: grid;
                        grid-template-columns: 1fr 2fr;
                    }

                    .main .detail-container .detail-item .title {
                        font-weight: 500;
                    }

                    .main .detail-container .detail-item .item .content {
                        height: 2.4rem;
                    }

                    .main .detail-container .detail-item .item-wide {
                        padding-right: 1.5rem;
                    }

                    
                    .main .detail-container .detail-item .respon {
                        display: flex;
                        justify-content: flex-start;
                        align-items: center;
                        padding: 2rem 0;
                        gap: .5rem;
                    }

                    .main .detail-container .detail-item .respon a {
                        transition: .2s;
                    }

                    .main .detail-container .detail-item .respon a:hover {
                        transform: translateY(2px);
                    }


                    .main .detail-container .detail-item .card-body {
                        width: 17rem;
                        height: 17rem;
                        
                    }
                    

                </style>

                <div class="main">
                    <div class="title">
                        <a href="daftar-petugas.php">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#0366fc" height="26" width="24" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                        </a>
                        <h2>Detail Petugas</h2>
                    </div>

                    <div class="detail-container">
                        <?php
                            if(isset($_GET['detail-petugas'])) {
                                $adminID = $_GET['detail-petugas'];
                                $sqlDetail = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin = '$adminID'");
                                $dataAdmin = mysqli_fetch_array($sqlDetail);
                        ?>
                            <div class="detail-item">
                                <div class="item">
                                    <div class="title">ID Petugas</div>
                                    <div class="content form-control"><?php echo $dataAdmin['id_admin']; ?></div>
                                </div>
                                <div class="item">
                                    <div class="title">Username</div>
                                    <div class="content form-control"><?php echo $dataAdmin['username']; ?></div>
                                </div>
                                <div class="item">
                                    <div class="title">Password</div>
                                    <div class="content form-control"><?php echo $dataAdmin['password']; ?></div>
                                </div>
                                <div class="item">
                                    <div class="title">Nama Lengkap</div>
                                    <div class="content form-control"><?php echo $dataAdmin['nama_lengkap']; ?></div>
                                </div>
                                <div class="item">
                                    <div class="title">Nomor Telepon</div>
                                    <div class="content form-control"><?php echo $dataAdmin['nomor_telepon']; ?></div>
                                </div>
                                <div class="item">
                                    <div class="title">Alamat Email</div>
                                    <div class="content form-control"><?php echo $dataAdmin['alamat_email']; ?></div>
                                </div>
                                
                                <?php if(isset($_SESSION['adminID'])) { ?>
                                    <div class="respon">
                                        <a href="daftar-petugas.php" class="btn btn-primary">kembali</a>
                                        <?php
                                            $sqlSuperAdmin = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE role = '1'");
                                            while($row = mysqli_fetch_assoc($sqlSuperAdmin)) {
                                                $superAdminID = $row['id_admin'];
                                            }
                                            if($_SESSION['adminID'] === $superAdminID) {
                                        ?>
                                            <a href="proses-admin.php?hapus-petugas=<?php echo $dataAdmin['id_admin'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">hapus!</a>
                                        <?php
                                            } else {
                                        ?>
                                            <a href="#" class="btn btn-secondary" title="Hanya Super Admin yang boleh menghapus!">hapus</a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="detail-item">
                                <div class="card card-body">
                                    <img src="../assets/foto_profil/<?php echo $dataAdmin['foto_profil']; ?>" alt="" width="100%">
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>

                <script>
                    // Window Onload
                    window.addEventListener('load', () => {
                        document.querySelector('.main').style.transform = 'translateY(0)';
                    })
                </script>
                    
<?php include('admin-footer.php'); ?>
