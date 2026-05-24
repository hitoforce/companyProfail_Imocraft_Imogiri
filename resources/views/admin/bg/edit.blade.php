@extends('admin.layout.index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">FROM Edit</h3>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">From</h4>
                        </div>
                        <div class="card-body">
                            <form action="/Bg/update/{{ $Bg->id }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input name="nama" type="text" class="form-control" id="nama"
                                        value="{{ old('nama', $Bg->nama) }}"
                                        placeholder="Masukkan Nama Bgtsss">
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi">{{ old('deskripsi', $Bg->deskripsi) }}</textarea>
                                </div>

                                <!-- Foto -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" name="foto" class="form-control" id="foto">
                                    @if ($Bg->foto)
                                        <div class="mt-2">
                                            <small>Foto saat ini:</small><br>
                                            <img src="{{ asset('storage/' . $Bg->foto) }}" alt="Foto Bg" width="150">
                                        </div>
                                    @endif
                                </div>

                                <!-- Tombol Submit -->
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
