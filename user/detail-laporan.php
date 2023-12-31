<?php include('user-header.php'); ?>

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
                        padding-left: 0;
                    }

                    .main .detail-container .detail-item .item .content {
                        height: 2.4rem;
                    }

                    .main .detail-container .detail-item .item-wide {
                        padding-right: 1.5rem;
                        margin-bottom: 1rem;
                    }

                    .main .detail-container .detail-item .item-wide .title {
                        margin-bottom: .5rem;
                    }

                    
                    .main .detail-container .detail-item .respon {
                        display: flex;
                        justify-content: flex-start;
                        align-items: center;
                        padding: 2rem 0;
                    }

                    .main .detail-container .detail-item .respon button,
                    .main .detail-container .detail-item .respon a {
                        transition: .2s;
                    }

                    .main .detail-container .detail-item .respon button:hover,
                    .main .detail-container .detail-item .respon a:hover {
                        transform: translateY(2px);
                    }
                    
                    #deleted-respon {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 4rem;
                        background: #eee;
                        font-weight: 500;
                    }
                    

                </style>

                <div class="main">
                    <div class="title">
                        <a href="daftar-laporan.php">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#0366fc" height="26" width="24" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                        </a>
                        <h2>Detail Laporan</h2>
                    </div>

                    <div class="detail-container">
                        <?php
                            if(isset($_GET['detail-laporan'])) {
                                $reportID = $_GET['detail-laporan'];
                                $sqlDetail = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE id_pengaduan = '$reportID'");
                                $reportData = mysqli_fetch_array($sqlDetail);
                        ?>
                            <div class="detail-item">
                                <div class="item-wide">
                                    <div class="title">Deskripsi</div>
                                    <textarea class="content form-control" rows="4"><?php echo $reportData['deskripsi'] ?></textarea>
                                </div>
                                
                                <?php
                                    if($reportData['status'] == "Selesai") {
                                        $sqlRespon = mysqli_query($koneksi, "SELECT * FROM tb_tanggapan WHERE id_pengaduan = '$reportID'");
                                        $result = mysqli_fetch_array($sqlRespon);
                                        $sqlResponCheck = mysqli_num_rows($sqlRespon);
                                        if($sqlResponCheck) {
                                ?>
                                    <div class="item-wide">
                                        <div class="title" style="color: #f72516;">Tanggapan</div>
                                        <textarea class="content form-control" rows="4"><?php echo $result['tanggapan'] ?></textarea>
                                    </div>
                                <?php
                                        } else {
                                ?>
                                    <div class="item-wide">
                                        <div class="title" style="color: #f72516;">Tanggapan</div>
                                        <div id="deleted-respon">Tanggapan telah dihapus</div>
                                    </div>
                                <?php
                                        }
                                    }
                                ?>

                                <div class="item mt-4">
                                    <div class="title">ID Pengaduan</div>
                                    <div class="content form-control"><?php echo $reportData['id_pengaduan'] ?></div>
                                </div>
                                <div class="item">
                                    <div class="title">ID Pengguna</div>
                                    <div class="content form-control"><?php echo $reportData['id_pengguna'] ?></div>
                                </div>
                                <div class="item">
                                    <div class="title">Tgl Pengaduan</div>
                                    <div class="content form-control"><?php echo $reportData['tanggal_pengaduan'] ?></div>
                                </div>
                                <div class="item">
                                    <div class="title">Status</div>
                                    <div class="content form-control"><?php echo $reportData['status'] ?></div>
                                </div>

                                <?php if($reportData['status'] == "Selesai") { ?>
                                    <div class="respon">
                                        <a href="proses-admin.php?hapus-laporan=<?php echo $reportData['id_pengaduan'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">hapus!</a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="detail-item">
                                <div class="title" style="margin-bottom: .5rem;">File Bukti</div>
                                <div class="card card-body">
                                    <?php if($reportData['file_bukti'] !== '') { ?>
                                        <img src="../assets/file_bukti/<?php echo $reportData['file_bukti'] ?>" alt="" width="100%">
                                    <?php } else { ?>
                                        <h6>Bukti tidak disertakan</h6>
                                    <?php } ?>
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
                    
<?php include('user-footer.php'); ?>
