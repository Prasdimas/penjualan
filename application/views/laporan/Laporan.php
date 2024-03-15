<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-5">
        <a href="<?php echo base_url('dashboard/penjualan'); ?>" class="btn btn-success">Tambah Penjualan</a>
        <h2 class="mb-4">Filter Tanggal Penjualan</h2>
        <div class="row">
            <div class="col-md-6">
                <form id="dateFilterForm">
                    <div class="form-group">
                        <label for="startDate" class="form-label">Tanggal Mulai:</label>
                        <input type="date" class="form-control" id="startDate" name="startDate">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="endDate" class="form-label">Tanggal Berakhir:</label>
                        <input type="date" class="form-control" id="endDate" name="endDate">
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                        <div class="col-md-6 mt-2">
                            <button type="button" class="btn btn-secondary" id="showAllBtn">Tampilkan Semua</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="mt-4">
            <div id="penjualanData" class="table-responsive">
            </div>
        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        loadAllPenjualanData();
        $('#dateFilterForm').submit(function(e) {
            e.preventDefault();
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();
            if (startDate === '' || endDate === '') {
                alert('Mohon isi kedua tanggal sebelum melakukan filter.');
                return;
            }
            $.ajax({
                url: 'http://localhost/penjualan/index.php/api/penjualan/filter/' + startDate + '/' + endDate,
                method: 'GET',
                success: function(response) {
                    displayPenjualanData(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
        $('#showAllBtn').click(function() {
            loadAllPenjualanData();
        });
        function loadAllPenjualanData() {
            $.ajax({
                url: 'http://localhost/penjualan/index.php/api/penjualan',
                method: 'GET',
                success: function(response) {
                    displayPenjualanData(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        function displayPenjualanData(penjualan) {
            var penjualanTable = '<table class="table table-striped table-sm"><thead><tr><th>Tanggal</th><th>Rumah</th><th>Harga</th><th>Jenis Pembayaran</th><th>Customer</th><th>Sales</th></tr></thead><tbody>';
            penjualan.forEach(function(item) {
                penjualanTable += '<tr>';
                penjualanTable += '<td>' + item.tanggal + '</td>';
                penjualanTable += '<td>' + item.nama_rumah + '</td>';
                penjualanTable += '<td>' + item.harga + '</td>';
                penjualanTable += '<td>' + item.jenis_pembayaran + '</td>';
                penjualanTable += '<td>' + item.nama_customer + '</td>';
                penjualanTable += '<td>' + item.nama_sales + '</td>';
                penjualanTable += '</tr>';
            });
            penjualanTable += '</tbody></table>';
            $('#penjualanData').html(penjualanTable);
        }
    });
</script>
