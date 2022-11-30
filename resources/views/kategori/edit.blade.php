@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <h1>Tambah Buku</h1>
            <div class="col-md-8">
                <form action="{{ route('kategori.update',$kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama"
                            name="nama" value="{{ $kategori->nama }}">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success btn-block" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
