@extends('layouts.guest.app')
@section('content')

    <div class="container-fluid feature bg-light py-5">
        <div class="container mt-5">
            <h3 class="mb-4">Edit Data User</h3>

            <form action="{{ route('anggotalembaga.update', $anggota->anggota_id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Field form --}}
                <div class="mb-3">
                    <label for="lembaga_id" class="form-label">Lembaga</label>
                    <select name="lembaga_id" id="lembaga_id" class="form-select" required>
                        @foreach($lembaga as $l)
                            <option value="{{ $l->lembaga_id }}" {{ $anggota->lembaga_id == $l->lembaga_id ? 'selected' : '' }}>
                                {{ $l->nama_lembaga }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="warga_id" class="form-label">Warga</label>
                    <select name="warga_id" id="warga_id" class="form-select" required>
                        @foreach($warga as $w)
                            <option value="{{ $w->warga_id }}" {{ $anggota->warga_id == $w->warga_id ? 'selected' : '' }}>
                                {{ $w->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jabatan_id" class="form-label">Jabatan</label>
                    <select name="jabatan_id" id="jabatan_id" class="form-select" required>
                        @foreach($jabatan as $j)
                            <option value="{{ $j->jabatan_id }}" {{ $anggota->jabatan_id == $j->jabatan_id ? 'selected' : '' }}>
                                {{ $j->nama_jabatan }} (Level: {{ $j->level }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control"
                        value="{{ $anggota->tgl_mulai }}" required>
                </div>

                <div class="mb-3">
                    <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control"
                        value="{{ $anggota->tgl_selesai }}">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('anggotalembaga.index') }}" class="btn btn-secondary">Kembali</a>
            </form>

        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>

@endsection
