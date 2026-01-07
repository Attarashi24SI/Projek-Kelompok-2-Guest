@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid feature bg-light py-5">
        <div class="container mt-5">
            <h3 class="mb-4">Edit Data RW</h3>

            <form action="{{ route('rw.update', $rw->rw_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nomor RW</label>
                    <input type="text" name="nomor_rw" class="form-control" value="{{ old('nomor_rw', $rw->nomor_rw) }}"
                        required>
                </div>

                <select name="ketua_rw_warga_id" class="form-control">
                    <option value="">-- Pilih Ketua RW --</option>
                    @foreach ($warga as $item)
                        <option value="{{ $item->warga_id }}"
                            {{ $rw->ketua_rw_warga_id == $item->warga_id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>


                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $rw->keterangan) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('rw.index') }}" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>

    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>
@endsection
