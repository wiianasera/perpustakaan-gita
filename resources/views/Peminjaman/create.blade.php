@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Peminjaman</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('peminjaman.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="UserID" class="col-md-4 col-form-label text-md-end">{{ __('User ID') }}</label>
                            <div class="col-md-6">
                                <select id="UserID" name="UserID" class="form-select @error('UserID') is-invalid @enderror" required>
                                    <option value="">Pilih User</option>
                                    @forelse($users as $user)
                                        <option value="{{ $user->id }}" {{ old('UserID') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @empty
                                        <option value="" disabled>Tidak ada user tersedia</option>
                                    @endforelse
                                </select>

                                @error('UserID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                        <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('Buku ID') }}</label>
                        <div class="col-md-6">
                            <select id="id" name="id" class="form-select @error('id') is-invalid @enderror" required>
                                <option value="">{{ __('Pilih Buku') }}</option>
                                @forelse($buku as $buku)
                                    <option value="{{ $buku->id }}" {{ old('id') == $buku->id ? 'selected' : '' }}>
                                        {{ $buku->Judul }}
                                    </option>
                                @empty
                                    <option value="" disabled>{{ __('Tidak ada buku tersedia') }}</option>
                                @endforelse
                            </select>
                            @error('id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                        <div class="row mb-3">
                            <label for="TanggalPeminjaman" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Peminjaman') }}</label>
                            <div class="col-md-6">
                                <input id="TanggalPeminjaman" type="date" class="form-control @error('TanggalPeminjaman') is-invalid @enderror" name="TanggalPeminjaman" value="{{ old('TanggalPeminjaman') }}" required>

                                @error('TanggalPeminjaman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="TanggalPengembalian" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Pengembalian') }}</label>
                            <div class="col-md-6">
                                <input id="TanggalPengembalian" type="date" class="form-control @error('TanggalPengembalian') is-invalid @enderror" name="TanggalPengembalian" value="{{ old('TanggalPengembalian') }}">

                                @error('TanggalPengembalian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="StatusPeminjaman" class="col-md-4 col-form-label text-md-end">{{ __('Status Peminjaman') }}</label>
                            <div class="col-md-6">
                                <input id="StatusPeminjaman" type="text" class="form-control @error('StatusPeminjaman') is-invalid @enderror" name="StatusPeminjaman" value="{{ old('StatusPeminjaman') }}" required>

                                @error('StatusPeminjaman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Peminjaman') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection