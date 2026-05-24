@extends('admin.layout.index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Tambah Produk</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Product</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Create</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Tambah Produk</h4>
                        </div>
                        <div class="card-body">
                            <form action="/Product/store" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- Nama -->
                                <div class="form-group">
                                    <label for="nama">Nama Produk</label>
                                    <input name="nama" type="text" class="form-control" id="nama"
                                        placeholder="Masukkan Nama Produk" required>
                                </div>

                                <!-- Deskripsi -->
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="Masukkan Deskripsi Produk"
                                        required></textarea>
                                </div>

                                <!-- Harga -->
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input name="harga" type="number" class="form-control" id="harga"
                                        placeholder="Masukkan Harga Produk" required>
                                </div>

                                <!-- Stok -->
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input name="stok" type="number" class="form-control" id="stok"
                                        placeholder="Masukkan Stok Produk" required>
                                </div>

                                <!-- Level -->
                         
                                <div class="form-group">
                                    <label for="level">Jenis Kerajinan</label>
                                    <select name="level" id="level" class="form-control" required>
                                        <option value="">-- Pilih Jenis Kerajinan --</option>
                                        <option value="Rajutan">Rajutan</option>
                                        <option value="Ukiran">Ukiran</option>
                                        <option value="Anyaman">Anyaman</option>
                                        <option value="Batik">Batik</option>
                                        <option value="Daur Ulang">Daur Ulang</option>
                                        <option value="Keramik">Keramik</option>
                                        <option value="Aksesoris">Aksesoris</option>
                                        <option value="Kayu">Kayu</option>
                                    </select>
                                </div>


                                <!-- Foto -->
                                <div class="form-group">
                                    <label for="foto">Foto Produk</label>
                                    <input type="file" name="foto" class="form-control-file" id="foto" required>
                                </div>

                                <!-- Submit -->
                                <button type="submit" class="btn btn-success mt-3">Simpan Produk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
