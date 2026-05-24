@extends('admin.layout.index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">DATA BG</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">FROM</h4>
                            <a href="Bg/create" class="btn btn-primary mb-3">Tambah Data</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>foto</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Bg as $p)
                                            <tr>
                                                <td>{{ $p->id }}</td>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->deskripsi }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($p->foto) }}" style="width: 100px"
                                                        alt="Foto Organisasi">
                                                </td>
                                                <td>
                                                    <a href="/Bg/edit/{{ $p->id }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="/Bg/destroy/{{ $p->id }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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
@endsection


