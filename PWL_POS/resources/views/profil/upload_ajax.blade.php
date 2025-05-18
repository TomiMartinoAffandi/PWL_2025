<form action="{{ url('/profil/update_profil') }}" method="POST" id="form-upload" enctype="multipart/form-data">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Foto Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Foto Profile</label>
                    <input type="file" name="foto" id="foto" class="form-control" required>
                    <small id="error-foto" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>
<script>
    // Menunggu sampai seluruh halaman selesai dimuat (DOM Ready)
    $(document).ready(function() {

        // Mengaktifkan validasi pada form dengan ID 'form-upload'
        $("#form-upload").validate({
            // Aturan validasi input
            rules: {
                foto: {
                    required: true, // Wajib diisi
                    extension: "jpg|jpeg|png", // Hanya file dengan ekstensi ini yang diizinkan                    
                }
            },

            // Fungsi ini akan dijalankan jika form lolos validasi
            submitHandler: function(form) {
                // Mengirim data form menggunakan AJAX
                $.ajax({
                    url: form.action, // URL tujuan, diambil dari atribut 'action' pada form
                    type: form.method, // Metode pengiriman, diambil dari atribut 'method' (biasanya POST)
                    data: new FormData(form), // Mengambil data form sebagai FormData (agar bisa mengirim file)
                    cache: false,
                    contentType: false, // Agar jQuery tidak mengubah tipe konten (wajib untuk upload file)
                    processData: false, // Jangan proses data (biarkan FormData yang menangani)

                    // Jika request berhasil (HTTP 200)
                    success: function(response) {
                        if (response.status) {
                            // Menutup modal
                            $('#myModal').modal('hide');

                            // Menampilkan alert sukses dari SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });

                            // Mengganti foto profil dengan foto baru
                            // `?t=` digunakan untuk menghindari cache (memaksa browser memuat ulang gambar)
                            $('#foto-profil').attr('src', response.profile_url + '?t=' + new Date().getTime());
                        } else {
                            // Reset semua pesan error
                            $('.error-text').text('');

                            // Menampilkan pesan error spesifik berdasarkan field
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });

                            // Menampilkan alert error
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });

                // Mencegah form dikirim secara default (karena sudah pakai AJAX)
                return false;
            },

            // Customisasi elemen untuk pesan error
            errorElement: 'span',

            // Menentukan di mana letak pesan error ditampilkan
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback'); // Tambahkan class Bootstrap
                element.closest('.form-group').append(error); // Tempel error di bawah input
            },

            // Tambahkan class 'is-invalid' jika input error
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },

            // Hapus class 'is-invalid' jika input valid
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>