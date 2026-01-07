@extends('layouts.guest.app')
@section('content')

    <body>

        <div class="container-fluid feature bg-light py-5">
            <div class="container py-5">

                <div class="text-center mx-auto pt-5 pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    @if (auth()->check() && auth()->user()->role === 'admin')
                    <h4 class="text-uppercase text-primary">
                        Menu CRUD Perangkat Desa
                    </h4>
                    @else
                    <h1 class="display-5 mb-4">
                        Data Perangkat Desa
                    </h1>
                    @endif
                </div>

                {{-- Tombol Tambah --}}
                @if (auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('perangkat.create') }}"
                        class="btn btn-primary btn-sm rounded-pill d-inline-flex align-items-center gap-2 px-4 py-2 mb-3 w-auto">
                        <img src="https://cdn-icons-png.flaticon.com/128/6711/6711405.png" style="width:18px; height:18px;">
                        Tambah Data
                    </a>
                @endif
                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $perangkat->links('pagination::bootstrap-5') }}
                </div>

                <div class="row">

                    @foreach ($perangkat as $item)
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">

                                    <p class="card-text">#{{ $item->perangkat_id }}</p>

                                    <h5 class="card-title">
                                        {{ $item->warga ? $item->warga->nama : '-' }}
                                    </h5>

                                    <p class="card-text">
                                        Jabatan :
                                        <strong>{{ $item->jabatan ?? '-' }}</strong>
                                    </p>

                                    <p class="card-text">
                                        NIP :
                                        <strong>{{ $item->nip ?? '-' }}</strong>
                                    </p>

                                    <p class="card-text">
                                        Kontak :
                                        <strong>{{ $item->kontak ?? '-' }}</strong>
                                    </p>

                                    <p class="card-text">
                                        Periode :
                                        <strong>
                                            {{ $item->periode_mulai ?? '-' }}
                                            s/d
                                            {{ $item->periode_selesai ?? '-' }}
                                        </strong>
                                    </p>

                                    {{-- Dropdown Aksi --}}
                                    @if (auth()->check() && auth()->user()->role === 'admin')
                                        <div class="dropdown mb-3">
                                            <button
                                                class="btn btn-primary btn-sm dropdown-toggle rounded-pill w-auto px-4 d-inline-block"
                                                type="button" data-bs-toggle="dropdown">
                                                <img src="https://cdn-icons-png.flaticon.com/128/14034/14034300.png"
                                                    style="width:15%; height:15%;">
                                                Aksi
                                            </button>

                                            <ul class="dropdown-menu">

                                                {{-- Edit --}}
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('perangkat.edit', $item->perangkat_id) }}">
                                                        <img src="https://cdn-icons-png.flaticon.com/128/14034/14034300.png"
                                                            style="width:12%; height:12%;">
                                                        Edit
                                                    </a>
                                                </li>

                                                {{-- Delete --}}
                                                <li>
                                                    <form action="{{ route('perangkat.destroy', $item->perangkat_id) }}"
                                                        method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="dropdown-item text-danger">
                                                            <img src="https://cdn-icons-png.flaticon.com/128/1828/1828843.png"
                                                                style="width:12%; height:12%;">
                                                            Hapus
                                                        </button>

                                                    </form>
                                                </li>

                                            </ul>
                                        </div>
                                    @endif
                                    {{-- close dropdown aksi --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>

        <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top">
            <i class="fa fa-arrow-up"></i>
        </a>

    </body>
@endsection
