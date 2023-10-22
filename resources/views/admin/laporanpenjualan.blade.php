@extends('app')

@section('pages')
    <div id="wrapper">
        @include('partials.sidebar.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('partials.navbar.navbar')
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Penjualan</h1>
                        <a href="{{ route('admin.laporanpenjualan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Laporan</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan Penjualan</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga Jual</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- Loop through the barang data and display them in rows --}}
                                                @foreach ($laporanPenjualan as $index => $laporan)
                                                <tr>
                                                    <td>{{ $laporan->id }}</td>
                                                    <td>{{ $laporan->barang->nama_barang }}</td>
                                                    <td>{{ $laporan->jumlah }}</td>
                                                    <td>{{ $laporan->hargaJual }}</td>
                                                
                                                        
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
