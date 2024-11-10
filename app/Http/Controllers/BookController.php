<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index ()
     {
       return view('book');
     }

public function store (BookRequest $request)
    {
        $validated = $request->validated();

        $databuku = [
            'kode_buku' => $validated['kode_buku'],
            'nama_buku' => $validated['nama_buku'],
            'penerbit_buku' => $validated['penerbit_buku'],
            'penulis_buku' => $validated['penulis_buku'],
            'tahun_terbit' => $validated['tahun_terbit'],
        ];

        if ($databuku) {
            dd($databuku);
        } else {
            return back()->withErrors($validated)->withInput();
        }
    }

}
