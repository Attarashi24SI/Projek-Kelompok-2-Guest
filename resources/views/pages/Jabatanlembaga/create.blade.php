@extends('layouts.guest.app')

@section('content')
<div class="container mt-5">
    <h2>Tambah Jabatan Baru</h2>

    <form action="{{ route('jabatanlembaga.store') }}" method="POST">
        @csrf

        <div class="mb-3">
    <label for="lembaga_id" class="form-label">Lembaga</label>
    <select name="lembaga_id" id="lembaga_id" class="form-control" required>
        <option value="">-- Pilih Lembaga --</option>
        @foreach ($lembaga as $l)
            <option value="{{ $l->lembaga_id }}">{{ $l->nama_lembaga }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
    <input
        type="text"
        name="nama_jabatan"
        id="nama_jabatan"
        class="form-control"
        required
    >
</div>

<div class="mb-3">
    <label for="level" class="form-label">Level Jabatan</label>
    <input
        type="number"
        name="level"
        id="level"
        class="form-control"
        min="1"
        required
    >
</div>


        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('jabatanlembaga.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
