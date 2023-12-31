
            </div>
        </div>
    </div>

    <div class="modal fade" id="beriTanggapan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="proses-admin.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tanggapan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <input type="hidden" name="id_pengaduan" value="<?php echo $reportData['id_pengaduan']; ?>">
                        <input type="hidden" name="id_petugas" value="<?php echo $_SESSION['adminID']; ?>">
                        <textarea name="tanggapan" rows="6" class="form-control border-0" placeholder="Tulis tanggapan anda disini!"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger kirim-respon" name="respon">Kirimkan!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/sweetalert/sweetalert2.all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        // DataTables
        new DataTable('#example');

        // Validasi Form
        const responButton = document.querySelector('.kirim-respon');
        function validateForm() {
            responButton.removeEventListener('click', validateForm);

            const respon = document.querySelector('textarea[name="tanggapan"]').value;

            if(respon.trim() !== '') {
                Swal.fire({
                    title: "Kirim tanggapan?",
                    text: "",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        responButton.type = 'submit';
                        responButton.click();
                    } else {
                        responButton.addEventListener('click', validateForm);
                    }
                });

            } else {
                Swal.fire({
                    title: "Tulis tanggapan anda!",
                    icon: "info"
                });
                responButton.addEventListener('click', validateForm);
            }
        }
        responButton.addEventListener('click', validateForm);
        
    </script>
</body>
</html>
