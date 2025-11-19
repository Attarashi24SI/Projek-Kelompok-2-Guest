@extends('layouts.guest.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@section('content')

    <body>

        <div class="container-fluid feature bg-light py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pt-5 pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-uppercase text-primary">Menu CRUD Anggota Lembaga</h4>
                </div>

                <a href="{{ route('anggotalembaga.create') }}" class="btn btn-primary mb-3"><img
                        src="https://cdn-icons-png.flaticon.com/128/6711/6711405.png" style="width:15%; height:15%;"
                        alt="">Tambah Anggota</a>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($anggota_lembaga->isEmpty())
                    <div class="alert alert-warning text-center">
                        Belum ada data Anggota Lembaga
                    </div>
                @else
                    <div class="row">
                        @foreach($anggota_lembaga as $anggota)
                            <div class="col-md-4">
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $anggota->warga->nama ?? '-' }}</h5>
                                        <p class="card-text mb-1">
                                            Lembaga: <strong>{{ $anggota->lembaga->nama_lembaga ?? '-' }}</strong>
                                        </p>
                                        <p class="card-text mb-1">
                                            Jabatan: <strong>{{ $anggota->jabatan->nama_jabatan ?? '-' }}</strong>
                                        </p>
                                        <p class="card-text mb-1">
                                            Level: {{ $anggota->jabatan->level ?? '-' }}
                                        </p>
                                        <p class="card-text mb-1">
                                            Tanggal Mulai: {{ $anggota->tgl_mulai }}
                                        </p>
                                        <p class="card-text mb-1">
                                            Tanggal Selesai: {{ $anggota->tgl_selesai ?? '-' }}
                                        </p>

                                        <div class="d-flex gap-2 mt-2">
                                            <a href="{{ route('anggotalembaga.edit', $anggota->anggota_id) }}"
                                                class="btn btn-primary btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('anggotalembaga.destroy', $anggota->anggota_id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

@endsection

</body>

</html>
