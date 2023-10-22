@extends('app')

@section('pages')
    <div id="wrapper">
        @include('partials.sidebar.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('partials.navbar.navbar')
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Barang</h1>
                        <a href="{{ route('admin.barang.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Barang</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tabel Barang</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Keterangan</th>
                                                    <th>Satuan</th>
                                                    <th>Harga Jual</th>
                                                    <th>ID Pengguna</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- Loop through the barang data and display them in rows --}}
                                                @foreach ($barangData as $barang)
                                                    <tr>
                                                        <td>{{ $barang->id_barang }}</td>
                                                        <td>{{ $barang->nama_barang }}</td>
                                                        <td>{{ $barang->keterangan }}</td>
                                                        <td>{{ $barang->satuan }}</td>
                                                        <td>{{ $barang->hargaJual }}</td>
                                                        <td>{{ $barang->id_pengguna }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.barang.edit', ['id' => $barang->id_barang]) }}" class="btn btn-info btn-sm">Edit</a>
                                                                <br>  
                                                                <form method="POST" action="{{ route('admin.barang.delete', ['id' => $barang->id_barang]) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this barang?')">Delete</button>
                                                                </form>

{{--                                                             
                                                            <a href="{{ route('admin.barang.delete', ['id' => $barang->id_barang]) }}" class="btn btn-danger btn-sm">Hapus</a> --}}
                                                        </td>
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
