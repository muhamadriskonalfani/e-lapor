<?php include('admin-header.php'); ?>

                <style>
                    #example_filter {
                        position: relative;
                    }
                </style>

                <div class="main">
                    <div class="title">
                        <h2>Daftar Tanggapan</h2>
                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table align-middle table-hover">
                            <thead>
                                <tr>
                                    <th>ID Tanggapan</th>
                                    <th>ID Pengaduan</th>
                                    <th>ID Petugas</th>
                                    <th>Tanggapan</th>
                                    <th>Tanggal Tanggapan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM tb_tanggapan";
                                    $sqlSelectRespon = mysqli_query($koneksi, $query);
                                    while($dataRespon = mysqli_fetch_array($sqlSelectRespon)) {
                                ?>
                                    <tr>
                                        <td><?php echo $dataRespon['id_tanggapan'] ?></td>
                                        <td><?php echo $dataRespon['id_pengaduan'] ?></td>
                                        <td><?php echo $dataRespon['id_petugas'] ?></td>
                                        <td><?php echo $dataRespon['tanggapan'] ?></td>
                                        <td><?php echo $dataRespon['tanggal_tanggapan'] ?></td>
                                        <td>
                                            <a href="detail-tanggapan.php?detail-tanggapan=<?php echo $dataRespon['id_tanggapan'] ?>" class="btn btn-primary btn-sm">detail</a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <script>
                    // Window Onload
                    window.addEventListener('load', () => {
                        document.querySelector('.main').style.transform = 'translateY(0)';
                    })

                    // Active Button
                    document.querySelectorAll('.links a')[4].classList.add('active');
                </script>
                    
<?php include('admin-footer.php'); ?>
