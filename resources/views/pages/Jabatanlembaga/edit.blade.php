@extends('layouts.guest.app')
@section('content')

    <div class="container-fluid feature bg-light py-5">
        <div class="container mt-5">
            <h3 class="mb-4">Edit Data User</h3>

            <form action="{{ route('jabatanlembaga.update', $jabatan->jabatan_id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Jabatan --}}
                <div class="mb-3">
                    <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan"
                        value="{{ $jabatan->nama_jabatan }}" required>
                </div>

                {{-- Lembaga --}}
                <div class="mb-3">
                    <label for="lembaga_id" class="form-label">Lembaga</label>
                    <select name="lembaga_id" id="lembaga_id" class="form-select" required>
                        @foreach($lembaga as $l)
                            <option value="{{ $l->lembaga_id }}" {{ $jabatan->lembaga_id == $l->lembaga_id ? 'selected' : '' }}>
                                {{ $l->nama_lembaga }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Level --}}
                <div class="mb-3">
                    <label for="level" class="form-label">Level</label>
                    <input type="text" class="form-control" id="level" name="level" value="{{ $jabatan->level }}">
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('jabatanlembaga.index') }}" class="btn btn-secondary">Kembali</a>
            </form>

        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>

@endsection
