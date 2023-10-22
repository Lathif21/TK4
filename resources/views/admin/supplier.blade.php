@extends('app')

@section('pages')
    <div id="wrapper">
        @include('partials.sidebar.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('partials.navbar.navbar')
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Supplier</h1>
                        {{-- <a href="{{ route('admin.barang.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Barang</a> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tabel Supplier</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID Supplier</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Alamat</th>
                                                    <th>Telepon</th>
                                                    <th>Email</th>
                                                    <th>Keterangan</th>
                                                    <th>Barang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- Loop through the barang data and display them in rows --}}
                                                @foreach ($supplierData as $s)
                                                    <tr>
                                                        <td>{{ $s->idSupplier }}</td>
                                                        <td>{{ $s->namaSupplier }}</td>
                                                        <td>{{ $s->alamat }}</td>
                                                        <td>{{ $s->telepon }}</td>
                                                        <td>{{ $s->email }}</td>
                                                        <td>{{ $s->keterangan }}</td>
                                                        <td>{{ $s->barang->nama_barang }}</td>
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
