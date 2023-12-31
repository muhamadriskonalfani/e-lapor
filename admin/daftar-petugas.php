<?php include('admin-header.php'); ?>

                <style>
                    
                </style>
                
                <div class="main">
                    <div class="title">
                        <h2>Daftar Petugas</h2>
                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table align-middle table-hover">
                            <thead>
                                <tr>
                                    <th>Admin ID</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sqlSelectAdmin = mysqli_query($koneksi, "SELECT * FROM tb_admin");
                                    while($dataAdmin = mysqli_fetch_array($sqlSelectAdmin)) {
                                ?>
                                    <tr>
                                        <td><?php echo $dataAdmin['id_admin'] ?></td>
                                        <td><?php echo $dataAdmin['username'] ?></td>
                                        <td><?php echo $dataAdmin['password'] ?></td>
                                        <td><?php echo $dataAdmin['nama_lengkap'] ?></td>
                                        <td><?php echo $dataAdmin['nomor_telepon'] ?></td>
                                        <td><?php echo $dataAdmin['alamat_email'] ?></td>
                                        <td>
                                            <a href="detail-petugas.php?detail-petugas=<?php echo $dataAdmin['id_admin'] ?>" class="btn btn-primary btn-sm">detail</a>
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
                    document.querySelectorAll('.links a')[1].classList.add('active');
                </script>

<?php include('admin-footer.php'); ?>
