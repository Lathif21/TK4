@extends('app')

@section('pages')
    <div id="wrapper">
        @include('partials.sidebar.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('partials.navbar.navbar')
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Barang</h1>
                        <a href="{{ route('admin.barang') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.barang.update', ['id' => $barang->id_barang]) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required value="{{ $barang->nama_barang }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $barang->keterangan }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="satuan">Satuan</label>
                                            <input type="text" class="form-control" id="satuan" name="satuan" required value="{{ $barang->satuan }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="hargaJual">Harga Jual</label>
                                            <input type="number" class="form-control" id="hargaJual" name="hargaJual" required value="{{ $barang->hargaJual }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="idPengguna">ID Pengguna</label>
                                            <select class="form-control" id="id_pengguna" name="id_pengguna" required>
                                                <option value="">-- Select Pengguna --</option>
                                                @foreach ($penggunaData as $pengguna)
                                                    <option value="{{ $pengguna->id_pengguna }}" {{ $pengguna->id_pengguna == $barang->id_pengguna ? 'selected' : '' }}>
                                                        {{ $pengguna->nama_pengguna }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Barang</button>
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
