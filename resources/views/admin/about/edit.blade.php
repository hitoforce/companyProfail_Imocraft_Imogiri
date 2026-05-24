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
                            <form action="/About/update/{{ $About->id }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- link -->
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input name="nama" type="text" class="form-control" id="nama"
                                        value="{{ old('nama', $About->nama) }}" placeholder="Masukkan Nama Abouttsss">
                                </div>


                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi">{{ old('deskripsi', $About->deskripsi) }}</textarea>
                                </div>

                                <!-- Foto -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" name="foto" class="form-control" id="foto">
                                    @if ($About->foto)
                                        <div class="mt-2">
                                            <small>Foto saat ini:</small><br>
                                            <img src="{{ asset('storage/' . $About->foto) }}" alt="Foto About"
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
