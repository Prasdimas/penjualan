<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-5">
        <h2>Form Penjualan</h2>
        <form id="penjualanForm">
            <div class="form-group mb-3">
                <label for="nama_rumah">Nama Rumah:</label>
                <select class="form-control" id="nama_rumah" name="nama_rumah" required>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="nama_customer">Nama Customer:</label>
                <select class="form-control" id="nama_customer" name="id_customer" required>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="nama_sales">Nama Sales:</label>
                <select class="form-control" id="nama_sales" name="id_sales" required>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="tanggal">Tanggal:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="form-group mb-3">
                <label for="jenis_pembayaran">Jenis Pembayaran:</label>
                <select class="form-control" id="jenis_pembayaran" name="jenis_pembayaran" required>
                    <option value="Tunai">Tunai</option>
                    <option value="Kredit">Kredit</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'http://localhost/penjualan/api/rumah',
            method: 'GET',
            success: function(response) {
                response.forEach(function(rumah) {
                    $('#nama_rumah').append('<option value="' + rumah.id + '">' + rumah.nama + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
        $.ajax({
            url: 'http://localhost/penjualan/api/customer',
            method: 'GET',
            success: function(response) {
                response.forEach(function(customer) {
                    $('#nama_customer').append('<option value="' + customer.id + '">' + customer.nama + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
        $.ajax({
            url: 'http://localhost/penjualan/api/sales',
            method: 'GET',
            success: function(response) {
                response.forEach(function(sales) {
                    $('#nama_sales').append('<option value="' + sales.id + '">' + sales.nama + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
        $('#penjualanForm').submit(function(e) {
            e.preventDefault();
            var nama_rumah = $('#nama_rumah').val();
            var id_customer = $('#nama_customer').val();
            var id_sales = $('#nama_sales').val();
            var tanggal = $('#tanggal').val();
            var jenis_pembayaran = $('#jenis_pembayaran').val();
            $.ajax({
                url: 'http://localhost/penjualan/api/penjualan',
                method: 'POST',
                data: {
                    id_rumah: nama_rumah,
                    id_customer: id_customer,
                    id_sales: id_sales,
                    tanggal: tanggal,
                    jenis_pembayaran: jenis_pembayaran
                },
                success: function(response) {
                    alert('Data penjualan berhasil ditambahkan!');
                    window.location.href = 'http://localhost/penjualan'; 
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat menambahkan data penjualan.');
                }
            });
        });
    });
</script>
