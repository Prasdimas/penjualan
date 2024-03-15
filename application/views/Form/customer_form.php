<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container mt-5">
    <h2>Form Customer</h2>
    <form id="customerForm" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
            <div class="invalid-feedback">Mohon masukkan nama.</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div class="invalid-feedback">Mohon masukkan email yang valid.</div>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon:</label>
            <input type="tel" class="form-control" id="telepon" name="telepon" required>
            <div class="invalid-feedback">Mohon masukkan nomor telepon.</div>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            <div class="invalid-feedback">Mohon masukkan alamat.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#customerForm').submit(function(e) {
            e.preventDefault();
            if (this.checkValidity() === false) {
                e.stopPropagation();
            } else {
                var nama = $('#nama').val();
                var email = $('#email').val();
                var telepon = $('#telepon').val();
                var alamat = $('#alamat').val();
                $.ajax({
                    url: 'http://localhost/penjualan/api/customer',
                    method: 'POST',
                    data: {
                        nama: nama,
                        email: email,
                        telepon: telepon,
                        alamat: alamat
                    },
                    success: function(response) {
                        alert('Data customer berhasil ditambahkan!');
                        $('#customerForm')[0].reset();
                        window.location.href = "<?php echo base_url(); ?>";
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Terjadi kesalahan saat menambahkan data customer.');
                    }
                });
            }
            this.classList.add('was-validated');
        });
    });
</script>
