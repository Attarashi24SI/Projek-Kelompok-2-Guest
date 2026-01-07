@extends('layouts.guest.app')

@section('content')

    <div class="container-fluid feature bg-light py-5">
        <div class="container mt-5">

            <h3 class="mb-4">Edit Data Perangkat Desa</h3>

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

            <form action="{{ route('perangkat.update', $perangkat->perangkat_id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Pilih Warga --}}
                <div class="mb-3">
                    <label class="form-label">Pilih Warga</label>
                    <select name="warga_id" class="form-control" required>
                        <option value="">-- Pilih Warga --</option>

                        @foreach ($warga as $w)
                            <option value="{{ $w->warga_id }}"
                                {{ $perangkat->warga_id == $w->warga_id ? 'selected' : '' }}>
                                {{ $w->nama }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- Jabatan --}}
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control"
                        value="{{ old('jabatan', $perangkat->jabatan) }}">
                </div>

                {{-- NIP --}}
                <div class="mb-3">
                    <label class="form-label">NIP</label>
                    <input type="text" name="nip" class="form-control" value="{{ old('nip', $perangkat->nip) }}">
                </div>

                {{-- Kontak --}}
                <div class="mb-3">
                    <label class="form-label">Kontak</label>
                    <input type="text" name="kontak" class="form-control"
                        value="{{ old('kontak', $perangkat->kontak) }}">
                </div>

                {{-- Periode Mulai --}}
                <div class="mb-3">
                    <label class="form-label">Periode Mulai</label>
                    <input type="date" name="periode_mulai" class="form-control"
                        value="{{ old('periode_mulai', $perangkat->periode_mulai) }}">
                </div>

                {{-- Periode Selesai --}}
                <div class="mb-3">
                    <label class="form-label">Periode Selesai</label>
                    <input type="date" name="periode_selesai" class="form-control"
                        value="{{ old('periode_selesai', $perangkat->periode_selesai) }}">
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('perangkat.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>

@endsection
