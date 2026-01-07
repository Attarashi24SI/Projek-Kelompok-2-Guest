@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid feature bg-light py-5">
        <div class="container mt-5">

            <h3 class="mb-4">Tambah RT</h3>

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

            <form action="{{ route('rt.store') }}" method="POST">
                @csrf

                {{-- Pilih RW --}}
                <div class="mb-3">
                    <label class="form-label">Pilih RW</label>
                    <select name="rw_id" class="form-control" required>
                        <option value="">-- Pilih RW --</option>

                        @foreach ($rw as $item)
                            <option value="{{ $item->rw_id }}">
                                RW {{ $item->nomor_rw }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Nomor RT --}}
                <div class="mb-3">
                    <label class="form-label">Nomor RT</label>
                    <input type="text" name="nomor_rt" class="form-control" required>
                </div>

                {{-- Ketua RT --}}
                <div class="mb-3">
                    <label class="form-label">Ketua RT (Opsional)</label>
                    <select name="ketua_rt_warga_id" class="form-control">
                        <option value="">-- Pilih Ketua RT --</option>

                        @foreach ($warga as $item)
                            <option value="{{ $item->warga_id }}">
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Keterangan --}}
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('rt.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>
@endsection
