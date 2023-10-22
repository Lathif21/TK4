@extends('app')

@section('pages')
    <div id="wrapper">
        @include('partials.sidebar.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('partials.navbar.navbar')
                <div class="container-fluid">

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <!-- Set the desired width and height for the chart -->
                                        <canvas id="myBarChart" width="400" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                 
    </div>
    <script>
        // Ambil data laporan penjualan dan barang yang dikirimkan dari controller
        var dataLaporanPenjualan = {!! json_encode($dataLaporanPenjualan) !!};
        var dataBarang = {!! json_encode($dataBarang) !!};

        // Lakukan pengolahan data di sini untuk menghitung laba/rugi dari masing-masing barang
        var labaRugiPerBarang = {};
        dataBarang.forEach(function (barang) {
            labaRugiPerBarang[barang.nama_barang] = 0; // Inisialisasi laba/rugi untuk setiap barang
            dataLaporanPenjualan.forEach(function (laporan) {
                if (laporan.barang_id === barang.id_barang) {
                    // Hitung laba/rugi dari laporan penjualan masing-masing barang
                    var hargaJualBarang = barang.hargaJual;
                    var hargaJualLaporan = laporan.hargaJual;
                    var jumlah = laporan.jumlah;
                    if (hargaJualLaporan > hargaJualBarang) {
                        labaRugiPerBarang[barang.nama_barang] += (hargaJualLaporan - hargaJualBarang) * jumlah;
                    } else {
                        labaRugiPerBarang[barang.nama_barang] -= (hargaJualBarang - hargaJualLaporan) * jumlah;
                    }
                }
            });
        });

        // Buat array data untuk grafik batang
        var labels = Object.keys(labaRugiPerBarang); // ID barang sebagai label
        var data = Object.values(labaRugiPerBarang); // Laba/rugi sebagai data

        // Buat grafik batang
        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Laba/Rugi per Barang',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
