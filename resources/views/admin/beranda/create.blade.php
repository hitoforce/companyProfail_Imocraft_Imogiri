@extends('admin.layout.index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">DataTables.Net</h3>
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
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Datatables</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic</h4>
                        </div>
                        <div class="card-body">
                            <form action="/Beranda/store" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- Nama -->
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">Nama</label>
                                    <input name="nama" type="text" class="form-control" id="nama"
                                        placeholder="Masukkan Nama Atau Judul" required>
                                </div>
                                <div class="form-group">
                                    <label for="waktu" class="form-control-label">Waktu</label>
                                    <input name="waktu" type="text" class="form-control" id="waktu"
                                        placeholder="Masukkan waktu Atau Judul" required>
                                </div>
                                <div class="form-group">
                                    <label for="level" class="form-control-label">Level</label>
                                    <select name="level" id="level" class="form-control" required>
                                        <option value="" disabled selected>Pilih level</option>
                                        <option value="sangat mudah">Sangat Mudah</option>
                                        <option value="mudah">Mudah</option>
                                        <option value="sulit">Sulit</option>
                                        <option value="sangat sulit">Sangat Sulit</option>
                                    </select>
                                </div>

                                <!-- Deskripsi -->
                                <div class="form-group">
                                    <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="link" class="form-control-label">link</label>
                                    <input name="link" type="text" class="form-control" id="link"
                                        placeholder="Masukkan link Atau " required>
                                </div>

                                <!-- Foto -->
                                <div class="form-group">
                                    <label for="foto" class="form-control-label">Foto</label>
                                    <input type="file" name="foto" class="form-control-file" id="foto" required>
                                </div>

                                <!-- Submit -->
                                <button type="submit"
                                    class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
