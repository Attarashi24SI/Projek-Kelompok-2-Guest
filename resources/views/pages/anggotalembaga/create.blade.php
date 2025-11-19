@extends('layouts.guest.app')

@section('content')
    <div class="container mt-5">
        <h2>Tambah User Baru</h2>

        <form action="{{ route('anggotalembaga.store') }}" method="POST">
            @csrf

            {{-- Lembaga --}}
            <div class="mb-3">
                <label for="lembaga_id" class="form-label">Lembaga</label>
                <select name="lembaga_id" id="lembaga_id" class="form-select" required>
                    <option value="">-- Pilih Lembaga --</option>
                    @foreach($lembaga as $l)
                        <option value="{{ $l->lembaga_id }}">{{ $l->nama_lembaga }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Warga --}}
            <div class="mb-3">
                <label for="warga_id" class="form-label">Warga</label>
                <select name="warga_id" id="warga_id" class="form-select" required>
                    <option value="">-- Pilih Warga --</option>
                    @foreach($warga as $w)
                        <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Jabatan --}}
            <div class="mb-3">
                <label for="jabatan_id" class="form-label">Jabatan</label>
                <select name="jabatan_id" id="jabatan_id" class="form-select" required>
                    <option value="">-- Pilih Jabatan --</option>
                    @foreach($jabatan as $j)
                        <option value="{{ $j->jabatan_id }}">{{ $j->nama_jabatan }} (Level: {{ $j->level }})</option>
                    @endforeach
                </select>
            </div>

            {{-- Tanggal Mulai --}}
            <div class="mb-3">
                <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" required>
            </div>

            {{-- Tanggal Selesai --}}
            <div class="mb-3">
                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
