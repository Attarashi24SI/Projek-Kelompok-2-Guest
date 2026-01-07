@extends('layouts.guest.app')

@section('content')

<div class="container-fluid feature bg-light py-5">
    <div class="container mt-5">

        <h3 class="mb-4">Tambah Perangkat Desa</h3>

        {{-- Alert error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('perangkat.store') }}" method="POST">
            @csrf

            {{-- Pilih Warga --}}
            <div class="mb-3">
                <label class="form-label">Pilih Warga</label>
                <select name="warga_id" class="form-control" required>
                    <option value="">-- Pilih Warga --</option>
                    @foreach ($warga as $w)
                        <option value="{{ $w->warga_id }}">
                            {{ $w->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Jabatan --}}
            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <input type="text" name="jabatan" class="form-control">
            </div>

            {{-- NIP --}}
            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control">
            </div>

            {{-- Kontak --}}
            <div class="mb-3">
                <label class="form-label">Kontak</label>
                <input type="text" name="kontak" class="form-control">
            </div>

            {{-- Periode Mulai --}}
            <div class="mb-3">
                <label class="form-label">Periode Mulai</label>
                <input type="date" name="periode_mulai" class="form-control">
            </div>

            {{-- Periode Selesai --}}
            <div class="mb-3">
                <label class="form-label">Periode Selesai</label>
                <input type="date" name="periode_selesai" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('perangkat.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>

<a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top">
    <i class="fa fa-arrow-up"></i>
</a>

@endsection
