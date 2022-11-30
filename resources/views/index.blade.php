@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @foreach ($buku as $buk)
                <div class="col-lg-4">

                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $buk->cover) }}" class="card-img-top" alt="..." height="200">
                        <div class="card-body">
                            <h5 class="card-title">{{ $buk->judul }}</h5>
                            <p class="card-text">{{ Str::limit($buk->sinopsis, 30) }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">isbn : {{ $buk->isbn }}</li>
                            <li class="list-group-item">penerbit : {{ $buk->penerbit }}</li>
                            <li class="list-group-item">kategori : {{ $buk->kategori->nama }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="/login" class="card-link">Login</a>
                            <a href="/buku" class="card-link">Edit</a>
                        </div>
                    </div>

                </div>
            @endforeach
       
        </div>
    </div>
@endsection
