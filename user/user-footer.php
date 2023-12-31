
            </div>
        </div>
    </div>

    <script src="../assets/sweetalert/sweetalert2.all.min.js"></script>

    <script>

        // DataTables
        new DataTable('#example');

        // Validasi Form
        const reportButton = document.querySelector('.kirim-laporan');
        function validateForm() {
            reportButton.removeEventListener('click', validateForm);

            const deskripsi = document.querySelector('textarea[name="deskripsi"]').value;

            if(deskripsi.trim() !== '') {
                Swal.fire({
                    title: "Kirim laporan?",
                    text: "",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        reportButton.type = 'submit';
                        reportButton.click();
                    } else {
                        reportButton.addEventListener('click', validateForm);
                    }
                });

            } else {
                Swal.fire({
                    title: "Tulis laporan anda!",
                    icon: "info"
                });
                reportButton.addEventListener('click', validateForm);
            }
        }
        reportButton.addEventListener('click', validateForm);

        
        
    </script>
</body>
</html>
