@extends('admin.layout.index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Produk</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home"><a href="#"><i class="icon-home"></i></a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Product</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Edit</a></li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Edit Produk</h4>
                        </div>
                        <div class="card-body">
                            <form action="/Product/update/{{ $Product->id }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Produk</label>
                                    <input name="nama" type="text" class="form-control" id="nama"
                                        value="{{ old('nama', $Product->nama) }}" placeholder="Masukkan Nama Produk">
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi">{{ old('deskripsi', $Product->deskripsi) }}</textarea>
                                </div>

                                <!-- Harga -->
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input name="harga" type="number" class="form-control" id="harga"
                                        value="{{ old('harga', $Product->harga) }}" placeholder="Masukkan Harga Produk">
                                </div>

                                <!-- Stok -->
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input name="stok" type="number" class="form-control" id="stok"
                                        value="{{ old('stok', $Product->stok) }}" placeholder="Masukkan Stok Produk">
                                </div>

                                <!-- Level -->
                                <div class="mb-3">
                                    <label for="level" class="form-label">Jenis Kerajinan</label>
                                    <select name="level" id="level" class="form-control">
                                        <option value="">-- Pilih Jenis Kerajinan --</option>
                                        @php
                                            $levels = ['Rajutan', 'Ukiran', 'Anyaman', 'Batik', 'Daur Ulang', 'Keramik', 'Aksesoris', 'Kayu'];
                                        @endphp
                                        @foreach ($levels as $lvl)
                                            <option value="{{ $lvl }}" {{ old('level', $Product->level) == $lvl ? 'selected' : '' }}>
                                                {{ $lvl }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Foto -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto Produk</label>
                                    <input type="file" name="foto" class="form-control" id="foto">
                                    @if ($Product->foto)
                                        <div class="mt-2">
                                            <small>Foto saat ini:</small><br>
                                            <img src="{{ asset('storage/' . $Product->foto) }}" alt="Foto Produk" width="150">
                                        </div>
                                    @endif
                                </div>

                                <!-- Tombol Submit -->
                                <button type="submit" class="btn btn-success">Update Produk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
