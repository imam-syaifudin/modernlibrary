@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <a href="/buku/create" class="btn btn-success mb-3 col-8">Add Buku</a>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Sinopsis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Kategori</th>
                            @if (auth()->user()->role === 'admin')
                                <th scope="col">Hidden</th>
                            @endif
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                          $i = 1;
                      @endphp
                        @foreach ($buku as $buk)
                            <tr class="table-secondary">
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $buk->isbn }}</td>
                                <td>{{ $buk->judul }}</td>
                                <td>{{ $buk->sinopsis }}</td>
                                <td>{{ $buk->penerbit }}</td>
                                <td><img src="{{ asset('storage/' . $buk->cover) }}" alt="" width='200'></td>
                                <td>{{ $buk->kategori ? $buk->kategori->nama : '' }}</td>
                                @if (auth()->user()->role === 'admin')
                                    <td>{{ $buk->hidden ? 'ya' : 'tidak' }}</td>
                                @endif
                                <td>
                                    <a href="{{ url('buku/' . $buk->id . '/edit') }}" class="btn btn-primary mx-1">Edit</a>
                                    @if (auth()->user()->role === 'admin')
                                    <a href="{{ url('buku/hidden/' . $buk->id) }}" class="btn btn-warning mx-1">{{  $buk->hidden ? 'unhide' : 'hide' }}</a>
                                    @endif
                        <form action="{{ route('buku.destroy', $buk->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button href="" class="btn btn-danger mx-1">Delete</button>
                        </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
