@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid feature bg-light py-5">
        <div class="container mt-5">
            <h3 class="mb-4">Tambah Data Lembaga</h3>

            {{-- Pesan sukses --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Pesan error global --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pages.perangkat.lembaga.store') }}" method="POST" enctype="multipart/form-data"> {{--
                wajib untuk upload --}}
                @csrf

                <div class="mb-3">
                    <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
                    <input type="text" class="form-control @error('nama_lembaga') is-invalid @enderror" id="nama_lembaga"
                        name="nama_lembaga" value="{{ old('nama_lembaga') }}" required>
                    @error('nama_lembaga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                        rows="3">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak"
                        value="{{ old('kontak') }}">
                    @error('kontak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Upload gambar (opsional) --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Gambar (opsional)</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                        accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Format: jpg, png, gif, svg, webp. Maks 10MB.</div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('pages.perangkat.lembaga.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
