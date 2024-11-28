<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use Exception;

class BukuController extends Controller
{
    public function index()
    { 
        $buku = Buku::paginate(5); 
        return view('buku.index')->with('buku', $buku);  
    }
    public function create()
    {
        $kategori = kategori::all();
        return view('buku.create',compact('kategori'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'Judul' => 'required|unique:buku|min:5',
            'TahunTerbit' => 'required|integer',
            'Penerbit' => 'required|string',
            'Penulis' => 'required|string',
        ]);
       
        try {
            $buku = Buku::create([
                'Judul' => $request->Judul,
                'TahunTerbit' => $request->TahunTerbit,
                'Penerbit' => $request->Penerbit,
                'Penulis' => $request->Penulis,
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }

        return redirect('buku')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit(string $id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return redirect()->back()->with('error', 'Buku Tidak Ditemukan');
        }
        return view('buku.edit', ['buku' => $buku]);
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'Judul' => ['required', 'string', 'unique:buku,Judul,' . $id . ',BukuID'],
            'TahunTerbit' => 'required|integer',
            'Penerbit' => 'required|string',
            'Penulis' => 'required|string',
        ]);
          
        try {
            $buku = Buku::find($id); 
            if (!$buku) {
                return redirect()->back()->with('error', 'Buku Tidak Ditemukan');
            }

            $buku->Judul = $request->Judul;
            $buku->TahunTerbit = $request->TahunTerbit;
            $buku->Penerbit = $request->Penerbit;
            $buku->Penulis = $request->Penulis;
            $buku->save();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }

        return redirect('buku')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy(string $id)
    {
        $buku = Buku::find($id);

        try {
            if (!$buku) {
                return redirect()->back()->with('error', 'Buku Tidak Ditemukan');
            }
            $buku->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Buku Gagal dihapus');
        }
        return redirect()->back()->with('success', 'Buku Berhasil dihapus');
    }
}