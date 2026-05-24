@extends('admin.layout.index')

@section('content')
    {{-- resources/views/admin/about_index.blade.php --}}

    <div class="container-fluid mt-4">

        <h1 class="h3 mb-2 text-gray-800">Tables About</h1>
        <p class="mb-4">
            Harap data yg di isi sesuai prosedur dan tidak melakakukan pelanggaran data
            harus sesuai dengan apa yg ada. Ketika kamu memberikan informasi yg salah maka akan
            mendapatkan pelanggaran dan hukuman sesuai apa yg kamu lakukan.
        </p>

        <div class="card shadow mb-4">
              <div class="card-body">
                    <div class="table-responsive">
                        <a href="/User/create" class="btn btn-primary mb-3">+ Tambah User</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>Nama</th>
                                    <th>Email</th>

                                    <th>password</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($User as $User)
                                    <tr>

                                        <td>{{ $User->name }}</td>
                                        <td>{{ $User->email }}</td>
                                         <td>{{ $User->password }}</td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="/User/destroy/{{ $User->id }}" class="btn btn-danger btn-sm"
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
@endsection
