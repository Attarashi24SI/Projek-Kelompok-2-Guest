@extends('layouts.guest.app')
@section('content')

    <body>

        <!-- feature Start -->
        <div class="container-fluid feature bg-light py-5">
            <div class="container py-5">

                <div class="text-center mx-auto pt-5 pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-uppercase text-primary">Menu CRUD RW</h4>
                </div>

                {{-- Button Tambah --}}
                <a href="{{ route('rw.create') }}"
                    class="btn btn-primary btn-sm rounded-pill d-inline-flex align-items-center gap-2 px-4 py-2 mb-3 w-auto">

                    <img src="https://cdn-icons-png.flaticon.com/128/6711/6711405.png" style="width:18px; height:18px;"
                        alt="">
                    Tambah RW
                </a>


                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $rws->links('pagination::bootstrap-5') }}
                </div>

                {{-- Search (opsional, nanti bisa diaktifkan jika butuh) --}}
                {{-- 
            <form method="GET" action="{{ route('rw.index') }}">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                    placeholder="Search" value="{{ request('search') }}">
                            <button type="submit" class="input-group-text" id="basic-addon2">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            --}}

                <div class="row">
                    @foreach ($rws as $rw)
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">

                                    <p class="card-text">#{{ $rw->rw_id }}</p>

                                    <h5 class="card-title">
                                        RW : {{ $rw->nomor_rw }}
                                    </h5>

                                    <p class="card-text">
                                        Ketua:
                                        <strong>
                                            {{ $rw->ketua ? $rw->ketua->nama : '-' }}
                                        </strong>
                                    </p>

                                    <p class="card-text">
                                        {{ $rw->keterangan ?? '-' }}
                                    </p>

                                    {{-- Dropdown Aksi --}}
                                    <div class="dropdown mb-3">
                                        <button
                                            class="btn btn-primary btn-sm dropdown-toggle rounded-pill w-auto px-4 d-inline-block"
                                            type="button" data-bs-toggle="dropdown">
                                            <img src="https://cdn-icons-png.flaticon.com/128/14034/14034300.png"
                                                style="width:15%; height:15%;" alt="">
                                            Aksi
                                        </button>

                                        <ul class="dropdown-menu">

                                            {{-- Edit --}}
                                            <li>
                                                <a class="dropdown-item" href="{{ route('rw.edit', $rw->rw_id) }}">
                                                    <img src="https://cdn-icons-png.flaticon.com/128/14034/14034300.png"
                                                        style="width:12%; height:12%;" alt="">
                                                    Edit
                                                </a>
                                            </li>

                                            {{-- Delete --}}
                                            <li>
                                                <form action="{{ route('rw.destroy', $rw->rw_id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="dropdown-item text-danger">
                                                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828843.png"
                                                            style="width:12%; height:12%;" alt="">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <!-- feature End -->

        <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top">
            <i class="fa fa-arrow-up"></i>
        </a>

    </body>
@endsection
