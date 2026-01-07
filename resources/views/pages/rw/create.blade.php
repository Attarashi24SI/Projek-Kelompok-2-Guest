@extends('layouts.guest.app')

@section('content')
    <!-- feature Start -->
    <div class="container-fluid feature bg-light py-5">
        <div class="container mt-5">

            <h3 class="mb-4">Tambah RW</h3>

            <form action="{{ route('rw.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nomor RW</label>
                    <input type="text" name="nomor_rw" class="form-control" required>
                </div>

                <select name="ketua_rw_warga_id" class="form-control">
                    <option value="">-- Pilih Ketua RW --</option>
                    @foreach ($warga as $item)
                        <option value="{{ $item->warga_id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('rw.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
    <!-- feature End -->
@endsection
