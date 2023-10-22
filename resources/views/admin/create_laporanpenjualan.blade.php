@extends('app')

@section('pages')
    <div id="wrapper">
        @include('partials.sidebar.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('partials.navbar.navbar')
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Laporan Penjualan</h1>
                        <a href="{{ route('admin.laporanpenjualan') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <!-- Your form for adding new barang here -->
                                    <form method="POST" action="{{ route('admin.laporanpenjualan.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="namaBarang">Nama Barang</label>
                                            <select class="form-control" id="barang_id" name="barang_id" required>
                                                <option value="">-- Select Barang --</option>
                                                @foreach ($barangs as $barang)
                                                    <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>                                        
                                        <div class="form-group">
                                            <label for="hargaJual">Jumlah</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="hargaJual">Harga Jual</label>
                                            <input type="number" class="form-control" id="hargaJual" name="hargaJual" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Tambah Laporan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
