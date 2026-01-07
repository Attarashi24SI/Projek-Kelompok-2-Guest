@extends('layouts.guest.app')
@section('content')

    <body>

        <!-- feature Start -->
        <div class="container-fluid feature bg-light py-5">
            <div class="container py-5">

                <div class="text-center mx-auto pt-5 pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-uppercase text-primary">Menu CRUD RT</h4>
                </div>

                {{-- Button Tambah --}}
                <a href="{{ route('rt.create') }}"
                    class="btn btn-primary btn-sm rounded-pill d-inline-flex align-items-center gap-2 px-4 py-2 mb-3 w-auto">
                    <img src="https://cdn-icons-png.flaticon.com/128/6711/6711405.png" style="width:18px; height:18px;">
                    Tambah RT
                </a>

                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $rts->links('pagination::bootstrap-5') }}
                </div>

                <div class="row">

                    @foreach ($rts as $rt)
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">

                                    <p class="card-text">#{{ $rt->rt_id }}</p>

                                    <h5 class="card-title">
                                        RT : {{ $rt->nomor_rt }}
                                    </h5>

                                    <p class="card-text">
                                        RW :
                                        <strong>
                                            {{ $rt->rw ? $rt->rw->nomor_rw : '-' }}
                                        </strong>
                                    </p>

                                    <p class="card-text">
                                        Ketua :
                                        <strong>
                                            {{ $rt->ketua ? $rt->ketua->nama : '-' }}
                                        </strong>
                                    </p>

                                    <p class="card-text">
                                        {{ $rt->keterangan ?? '-' }}
                                    </p>

                                    {{-- Dropdown Aksi --}}
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
                                                <a class="dropdown-item" href="{{ route('rt.edit', $rt->rt_id) }}">
                                                    <img src="https://cdn-icons-png.flaticon.com/128/14034/14034300.png"
                                                        style="width:12%; height:12%;">
                                                    Edit
                                                </a>
                                            </li>

                                            {{-- Delete --}}
                                            <li>
                                                <form action="{{ route('rt.destroy', $rt->rt_id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus RT ini?')">
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
