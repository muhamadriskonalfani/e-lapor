<?php include('user-header.php'); ?>

                <style>
                    #example_filter {
                        position: relative;
                    }
                </style>

                <div class="main">
                    <div class="title">
                        <h2>Daftar Laporan <?php if(isset($_GET['status'])): echo "- ".$_GET['status']; endif; ?></h2>
                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table align-middle table-hover">
                            <thead>
                                <tr>
                                    <th>Report ID</th>
                                    <th>User ID</th>
                                    <th>Deskripsi</th>
                                    <th>Bukti</th>
                                    <th>Tanggal Laporan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $userID = $_SESSION['userID'];
                                    if(isset($_GET['status'])) {
                                        $status = $_GET['status'];
                                        $query = "SELECT * FROM tb_pengaduan WHERE id_pengguna = '$userID' AND status = '$status'";
                                    } else {
                                        $query = "SELECT * FROM tb_pengaduan WHERE id_pengguna = '$userID'";
                                    }
                                    $sqlSelectReport = mysqli_query($koneksi, $query);
                                    while($dataReport = mysqli_fetch_array($sqlSelectReport)) {
                                ?>
                                    <tr>
                                        <td><?php echo $dataReport['id_pengaduan'] ?></td>
                                        <td><?php echo $dataReport['id_pengguna'] ?></td>
                                        <td><?php echo $dataReport['deskripsi'] ?></td>
                                        <td><?php echo $dataReport['file_bukti'] ?></td>
                                        <td><?php echo $dataReport['tanggal_pengaduan'] ?></td>
                                        <td><?php echo $dataReport['status'] ?></td>
                                        <td>
                                            <a href="detail-laporan.php?detail-laporan=<?php echo $dataReport['id_pengaduan'] ?>" class="btn btn-primary btn-sm">detail</a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="hapus-get">
                        <?php
                            if(isset($_GET['status'])) {
                                $currentUrl = $_SERVER['REQUEST_URI'];
                                $newUrl = strtok($currentUrl, '?');
                        ?>
                            <script>
                                window.history.replaceState({}, document.title, "<?php echo $newUrl; ?>");
                            </script>
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
