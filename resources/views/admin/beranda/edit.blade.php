@extends('admin.layout.index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">DataTables.Net</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#"><i class="icon-home"></i></a>
                    </li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Tables</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Datatables</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic</h4>
                        </div>
                        <div class="card-body">
                            <form action="/Beranda/update/{{ $Beranda->id }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input name="nama" type="text" class="form-control" id="nama"
                                        value="{{ old('nama', $Beranda->nama) }}" placeholder="Masukkan Nama Berandatsss">
                                </div>

                                <div class="mb-3">
                                    <label for="waktu" class="form-label">waktu</label>
                                    <input name="waktu" type="text" class="form-control" id="waktu"
                                        value="{{ old('waktu', $Beranda->waktu) }}"
                                        placeholder="Masukkan waktu Berandatsss">
                                </div>

                                <div class="mb-3">
                                    <label for="level" class="form-label">Level</label>
                                    <select name="level" id="level" class="form-control" required>
                                        <option value="" disabled
                                            {{ old('level', $Beranda->level) ? '' : 'selected' }}>Pilih level</option>
                                        <option value="sangat mudah"
                                            {{ old('level', $Beranda->level) == 'sangat mudah' ? 'selected' : '' }}>Sangat
                                            Mudah</option>
                                        <option value="mudah"
                                            {{ old('level', $Beranda->level) == 'mudah' ? 'selected' : '' }}>Mudah
                                        </option>
                                        <option value="sulit"
                                            {{ old('level', $Beranda->level) == 'sulit' ? 'selected' : '' }}>Sulit
                                        </option>
                                        <option value="sangat sulit"
                                            {{ old('level', $Beranda->level) == 'sangat sulit' ? 'selected' : '' }}>Sangat
                                            Sulit</option>
                                    </select>
                                </div>



                                <div class="mb-3">
                                    <label for="link" class="form-label">link</label>
                                    <input name="link" type="text" class="form-control" id="link"
                                        value="{{ old('link', $Beranda->link) }}" placeholder="Masukkan link Berandatsss">
                                </div>


                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi">{{ old('deskripsi', $Beranda->deskripsi) }}</textarea>
                                </div>

                                <!-- Foto -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" name="foto" class="form-control" id="foto">
                                    @if ($Beranda->foto)
                                        <div class="mt-2">
                                            <small>Foto saat ini:</small><br>
                                            <img src="{{ asset('storage/' . $Beranda->foto) }}" alt="Foto Beranda"
                                                width="150">
                                        </div>
                                    @endif
                                </div>

                                <!-- Tombol Submit -->
                                <button type="submit"
                                    class="btn btn-success waves-effect waves-light m-r-30">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
