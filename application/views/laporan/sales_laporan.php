<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Laporan Sales</h2>
            <a class="btn btn-primary" href="<?php echo base_url('sales/tambah'); ?>">Tambah Sales</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
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
            url: 'http://localhost/penjualan/api/sales',
            method: 'GET',
            success: function(response) {
                $('#customerTableBody').empty(); 
                response.forEach(function(sales, index) {
                    var row = '<tr data-id="' + sales.id + '">';
                    row += '<td>' + (index + 1) + '</td>';
                    row += '<td>' + sales.nama + '</td>';
                    row += '<td>' + sales.email + '</td>';
                    row += '<td>' + sales.alamat + '</td>';
                    row += '<td>' + sales.telepon + '</td>';
                    row += '<td>';
                    row += '<button class="btn btn-sm btn-danger ms-1" onclick="deleteCustomer(' + sales.id + ')">Hapus</button>';
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
    if (confirm('Apakah Anda yakin ingin menghapus data sales ini?')) {
        $.ajax({
            url: 'http://localhost/penjualan/api/sales/' + id,
            method: 'DELETE',
            success: function(response) {
                alert('Data sales berhasil dihapus.');
                $('#customerTableBody').find('tr[data-id="' + id + '"]').remove();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat menghapus data sales.');
            }
        });
    }
}
</script>
