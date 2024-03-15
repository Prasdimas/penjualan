<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Laporan Customer</h2>
            <a class="btn btn-primary" href="<?php echo base_url('customer/tambah'); ?>">Tambah Customer</a>
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
            url: 'http://localhost/penjualan/api/customer',
            method: 'GET',
            success: function(response) {
                $('#customerTableBody').empty();
                response.forEach(function(customer, index) {
                    var row = '<tr data-id="' + customer.id + '">';
                    row += '<td>' + (index + 1) + '</td>';
                    row += '<td>' + customer.nama + '</td>';
                    row += '<td>' + customer.email + '</td>';
                    row += '<td>' + customer.alamat + '</td>';
                    row += '<td>' + customer.telepon + '</td>';
                    row += '<td>';
                    row += '<button class="btn btn-sm btn-danger ms-1" onclick="deleteCustomer(' + customer.id + ')">Hapus</button>';
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
    if (confirm('Apakah Anda yakin ingin menghapus data customer ini?')) {
        $.ajax({
            url: 'http://localhost/penjualan/api/customer/' + id,
            method: 'DELETE',
            success: function(response) {
                alert('Data customer berhasil dihapus.');
                $('#customerTableBody').find('tr[data-id="' + id + '"]').remove();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat menghapus data customer.');
            }
        });
    }
}
</script>
