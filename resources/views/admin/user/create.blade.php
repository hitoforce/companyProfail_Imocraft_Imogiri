@extends('admin.layout.index')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Data Tokoh</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="/User/store" method="POST">
                    @csrf

                    <input type="text" name="name" class="form-control mb-2" placeholder="Nama" required>
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
