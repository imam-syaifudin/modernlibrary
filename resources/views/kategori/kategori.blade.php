@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <a href="/kategori/create" class="btn btn-success mb-3 col-8">Add Kategori</a>
        <div class="col-md-8">
            <table class="table">
                <thead>
                  <tr class="table-dark">
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $i = 1;
                  @endphp
                @foreach( $kategori as $buk)
                  <tr class="table-secondary">
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $buk->nama }}</td>
                    <td>
                        <a href="{{ url('kategori/'. $buk->id .'/edit')  }}" class="btn btn-primary mx-1">Edit</a>
                        <form action="{{  route('kategori.destroy',$buk->id) }}" method="POST">
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
