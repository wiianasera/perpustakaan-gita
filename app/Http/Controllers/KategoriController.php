<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Exception;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all(); // atau paginate()
        return view('kategori.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|unique:kategori,KategoriID', 
            'nama_kategori' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Kategori::create([
            'KategoriID' => $request->kategori_id, 
            'NamaKategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function create()
    {
        return view('kategori.create'); 
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan');
        }

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'KategoriID' => 'required|integer', 
        'NamaKategori' => 'required|string|max:255',
    ]);

    $kategori = Kategori::find($id);

    if (!$kategori) {
        return redirect()->route('kategori.index')->with('error', 'Kategori tidak ditemukan');
    }

    $kategori->KategoriID = $request->KategoriID;
    $kategori->NamaKategori = $request->NamaKategori;
    $kategori->save();

    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }



    public function destroy(string $KategoriID)
    {
        $kategori = Kategori::find($KategoriID);

        try {
            $kategori->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Kategori gagal dihapus');
        }

        return redirect()->back()->with('success', 'Kategori berhasil dihapus');
    }
}