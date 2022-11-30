@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <h1>Tambah Buku</h1>
            <div class="col-md-8">
                <form action="{{ route('buku.update',$buku->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="isbn"
                            name="isbn" value="{{ $buku->isbn }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="judul buku"
                            name="judul" value="{{ $buku->judul }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="penerbit"
                            name="penerbit" value="{{ $buku->penerbit }}">
                    </div>
                    <img src="{{ asset('storage/'.$buku->cover) }}" alt="" width='200'>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cover</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="penerbit"
                            name="cover">
                    </div>
                    <label for="exampleFormControlInput1" class="form-label mt-1">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="kategori">
                        <option selected>kategori</option>
                        @foreach( $kategori as $kat)
                         <option value="{{ $kat->id }}" @if($buku->kategori->nama === $kat->nama ) selected @endif>{{ $kat->nama }}</option>
                        @endforeach
                      </select>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Sinopsis</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sinopsis">{{ $buku->sinopsis }}</textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success btn-block" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
