@extends('admin.layout.index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">FROM EDIT</h3>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="/Blog/update/{{ $Blog->id }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Judul -->
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input name="judul" type="text" class="form-control" id="judul"
                                        value="{{ old('judul', $Blog->judul) }}" placeholder="Masukkan Judul Blog">
                                </div>
                               
                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi">{{ old('deskripsi', $Blog->deskripsi) }}</textarea>
                                </div>

                                <!-- Foto -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" name="foto" class="form-control" id="foto">
                                    @if ($Blog->foto)
                                        <div class="mt-2">
                                            <small>Foto saat ini:</small><br>
                                            <img src="{{ asset('storage/' . $Blog->foto) }}" alt="Foto Blog"
                                                width="150">
                                        </div>
                                    @endif
                                </div>

                                <!-- Tombol Submit -->
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ url('/Blog') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
