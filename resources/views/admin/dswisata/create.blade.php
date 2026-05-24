@extends('admin.layout.index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">From Create</h3>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">From</h4>
                        </div>
                        <div class="card-body">
                            <form action="/Dswisata/store" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- Nama -->
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">Nama</label>
                                    <input name="nama" type="text" class="form-control" id="nama"
                                        placeholder="Masukkan Nama " required>
                                </div>
                                <!-- Deskripsi -->
                                <div class="form-group">
                                    <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi" required></textarea>
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
