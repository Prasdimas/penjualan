<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container mt-5">
<h2>Form Rumah</h2>
<form id="rumahForm">
    <div class="form-group mb-3">
        <label for="nama">Nama Rumah:</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="form-group mb-3">
        <label for="alamat">Alamat:</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
    </div>
    <div class="form-group mb-3">
        <label for="harga">Harga:</label>
        <input type="number" class="form-control" id="harga" name="harga" required>
    </div>
    <div class="form-group mb-3">
        <label for="luas_tanah">Luas Tanah:</label>
        <input type="number" class="form-control" id="luas_tanah" name="luas_tanah" required>
    </div>
    <div class="form-group mb-3">
        <label for="luas_bangunan">Luas Bangunan:</label>
        <input type="number" class="form-control" id="luas_bangunan" name="luas_bangunan" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#rumahForm').submit(function(e) {
            e.preventDefault();
            var nama = $('#nama').val();
            var alamat = $('#alamat').val();
            var harga = $('#harga').val();
            var luas_tanah = $('#luas_tanah').val();
            var luas_bangunan = $('#luas_bangunan').val();
            $.ajax({
                url: 'http://localhost/penjualan/api/rumah', 
                method: 'POST',
                data: {
                    nama: nama,
                    alamat: alamat,
                    harga: harga,
                    luas_tanah: luas_tanah,
                    luas_bangunan: luas_bangunan
                },
                success: function(response) {
                    alert('Data rumah berhasil ditambahkan!');
                    $('#rumahForm')[0].reset();
                    window.location.href = "<?php echo base_url(); ?>";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat menambahkan data rumah.');
                }
            });
        });
    });
</script>
