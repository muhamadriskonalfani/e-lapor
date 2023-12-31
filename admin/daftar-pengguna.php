<?php include('admin-header.php'); ?>

                <style>

                </style>
                
                <div class="main">
                    <div class="title">
                        <h2>Daftar Pengguna</h2>
                    </div>

                    <div class="table-responsive">
                        <table id="example" class="table align-middle table-hover">
                            <thead>
                                <tr>
                                    <th>User ID</th>
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
                                    $sqlSelectUser = mysqli_query($koneksi, "SELECT * FROM tb_pengguna");
                                    while($dataUser = mysqli_fetch_array($sqlSelectUser)) {
                                ?>
                                    <tr>
                                        <td><?php echo $dataUser['id_pengguna'] ?></td>
                                        <td><?php echo $dataUser['username'] ?></td>
                                        <td><?php echo $dataUser['password'] ?></td>
                                        <td><?php echo $dataUser['nama_lengkap'] ?></td>
                                        <td><?php echo $dataUser['nomor_telepon'] ?></td>
                                        <td><?php echo $dataUser['alamat_email'] ?></td>
                                        <td>
                                            <a href="detail-pengguna.php?detail-pengguna=<?php echo $dataUser['id_pengguna'] ?>" class="btn btn-primary btn-sm">detail</a>
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
                    document.querySelectorAll('.links a')[2].classList.add('active');
                </script>

<?php include('admin-footer.php'); ?>
