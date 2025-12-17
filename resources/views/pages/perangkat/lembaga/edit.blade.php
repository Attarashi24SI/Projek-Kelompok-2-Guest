@extends('layouts.guest.app')

@section('content')
<div class="container-fluid feature bg-light py-5">
    <div class="container mt-5">
        <h3 class="mb-4">Edit Data Lembaga</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pages.perangkat.lembaga.update', $lembaga->lembaga_id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="card p-4 shadow-sm">

            @csrf
            @method('PUT')

            {{-- NAMA --}}
            <div class="mb-3">
                <label class="form-label">Nama Lembaga</label>
                <input type="text" name="nama_lembaga"
                       class="form-control @error('nama_lembaga') is-invalid @enderror"
                       value="{{ old('nama_lembaga', $lembaga->nama_lembaga) }}" required>
                @error('nama_lembaga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control @error('deskripsi') is-invalid @enderror"
                          rows="3">{{ old('deskripsi', $lembaga->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- KONTAK --}}
            <div class="mb-3">
                <label class="form-label">Kontak</label>
                <input type="text" name="kontak"
                       class="form-control @error('kontak') is-invalid @enderror"
                       value="{{ old('kontak', $lembaga->kontak) }}">
                @error('kontak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- FOTO SAAT INI --}}
            <div class="mb-3">
                <label class="form-label">Foto Saat Ini</label>

                @php
                    $img = $lembaga->media->first();
                    $placeholder = 'https://via.placeholder.com/600x400?text=No+Image';

                    $imgUrl = $img && $img->file_url
                        ? asset(ltrim($img->file_url, '/'))
                        : $placeholder;
                @endphp

                <div>
                    <img src="{{ $imgUrl }}"
                         alt="Foto Lembaga"
                         style="max-width:360px;width:100%;height:auto;
                         object-fit:cover;border:1px solid #ddd;
                         padding:4px;border-radius:6px;">
                </div>
            </div>

            {{-- UPLOAD FOTO BARU --}}
            <div class="mb-3">
                <label class="form-label">Ganti Foto (opsional)</label>
                <input type="file"
                       name="image"
                       class="form-control @error('image') is-invalid @enderror"
                       accept="image/*">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Mengupload foto baru akan mengganti foto yang lama.</div>
            </div>

            <div class="d-flex gap-2">
    <button class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ route('pages.perangkat.lembaga.index') }}" class="btn btn-secondary">Batal</a>
</div>

        </form>

        {{-- DAFTAR SEMUA FOTO (jika lebih dari satu) --}}
        @if($lembaga->media && $lembaga->media->count() > 1)
            <hr class="my-4">
            <h5>Foto Lainnya</h5>

            <div class="d-flex flex-wrap gap-3">
                @foreach($lembaga->media as $m)
                    @php
                        $mUrl = $m->file_url
                            ? asset(ltrim($m->file_url, '/'))
                            : $placeholder;
                    @endphp

                    <div style="width:150px;text-align:center;">
                        <img src="{{ $mUrl }}"
                             alt=""
                             style="width:100%;height:100px;
                             object-fit:cover;border-radius:4px;
                             border:1px solid #eee;">

                        <form action="{{ route('media.destroy', $m->media_id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus foto ini?')"
                              class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger w-100">
                                Hapus
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>
@endsection
