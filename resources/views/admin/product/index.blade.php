@extends('admin.layout.index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">DATA Product</h3>
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
                            <h4 class="card-title">FORM</h4>
                            <a href="Product/create" class="btn btn-primary mb-3">Tambah Data</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Level</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Product as $p)
                                            <tr>
                                                <td>{{ $p->id }}</td>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->deskripsi }}</td>
                                                <td>Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
                                                <td>{{ $p->stok }}</td>
                                                <td>{{ $p->level }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($p->foto) }}" style="width: 100px"
                                                        alt="Foto Produk">
                                                </td>
                                                <td>
                                                    <a href="/Product/edit/{{ $p->id }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="/Product/destroy/{{ $p->id }}"
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
