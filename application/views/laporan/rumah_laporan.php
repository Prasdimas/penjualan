<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Laporan Rumah</h2>
            <a class="btn btn-primary" href="<?php echo base_url('rumah/tambah'); ?>">Tambah Rumah</a>
        </div>
        <table class="table table-striped">
        <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Harga</th>
                    <th>Luas Tanah</th>
                    <th>Luas Bangunan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="customerTableBody">
                
            </tbody>
        </table>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    function loadDataCustomer() {
        $.ajax({
            url: 'http://localhost/penjualan/api/rumah',
            method: 'GET',
            success: function(response) {
                $('#customerTableBody').empty();
                response.forEach(function(rumah, index) {
                    var row = '<tr data-id="' + rumah.id + '">';
                    row += '<td>' + (index + 1) + '</td>';
                    row += '<td>' + rumah.nama + '</td>';
                    row += '<td>' + rumah.alamat + '</td>';
                    row += '<td>' + rumah.harga + '</td>';
                    row += '<td>' + rumah.luas_tanah + '</td>';
                    row += '<td>' + rumah.luas_bangunan + '</td>';
                    row += '<td>';
                    row += '<button class="btn btn-sm btn-danger ms-1" onclick="deleteCustomer(' + rumah.id + ')">Hapus</button>';
                    row += '</td>';
                    row += '</tr>';
                    $('#customerTableBody').append(row);
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    loadDataCustomer();
});

function deleteCustomer(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data rumah ini?')) {
        $.ajax({
            url: 'http://localhost/penjualan/api/rumah/' + id,
            method: 'DELETE',
            success: function(response) {
                alert('Data rumah berhasil dihapus.');
                $('#customerTableBody').find('tr[data-id="' + id + '"]').remove();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat menghapus data rumah.');
            }
        });
    }
}
</script>
