<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $buku = auth()->user()->role == 'admin' ? Buku::all() : Buku::where('hidden',0)->get();
        $kategori = Kategori::all();
        return view('buku.buku',compact('buku','kategori'));
    }

    public function hidden($id){

        $buku = Buku::findOrFail($id);
        if ( $buku->hidden == true ){
            $buku->update([
                'hidden' => false
            ]);
        } else if ( $buku->hidden == false ){
            $buku->update([
                'hidden' => true
            ]);
        }
        return redirect('/buku');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('buku.add',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $buku = Buku::create([
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'sinopsis' => $request->sinopsis,
            'penerbit' => $request->penerbit,
            'cover' => $request->file('cover')->store('image-buku'),
            'user_id' => auth()->user()->id,
            'kategori_id' => $request->kategori,
        ]);

        return redirect('/buku');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        $buku = Buku::find($id);
        if ( $buku->hidden == true ){
            return redirect('/buku');
        }
        $kategori = Kategori::all();
        return view('buku.edit',compact('buku','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        //
        $buku->update([
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'sinopsis' => $request->sinopsis,
            'penerbit' => $request->penerbit,
            'cover' => $request->file('cover') ? $request->file('cover')->store('public') : $buku->cover,
            'user_id' => auth()->user()->id,
            'kategori_id' => $request->kategori,
        ]);

        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        //
        if ( $buku->hidden == true ){
            return redirect('/buku');
        }
        Storage::delete($buku->cover);
        $buku->delete();
        return redirect('/buku');
    }
}
