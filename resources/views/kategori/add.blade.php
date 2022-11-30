@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <h1>Tambah Buku</h1>
            <div class="col-md-8">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama"
                            name="nama">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success btn-block" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
