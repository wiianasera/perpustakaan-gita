@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Buku</h2>

    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

       
        <div class="form-group">
            <label for="nama">Nama Buku</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $buku->nama) }}" required>
            @error('nama')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        
        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis', $buku->penulis) }}" required>
            @error('penulis')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        
        <div class="form-group">
            <label for="tahun">Tahun Terbit</label>
            <input type="number" name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $buku->tahun) }}" required>
            @error('tahun')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
            @error('deskripsi')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        
        <button type="submit" class="btn btn-primary mt-3">Perbarui Buku</button>
    </form>
</div>
@endsection