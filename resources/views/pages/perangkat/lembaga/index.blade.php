@extends('layouts.guest.app')

@section('content')

<div class="container-fluid feature bg-light py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pt-5 pb-5 wow fadeInUp"
            data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-uppercase text-primary">Menu CRUD Lembaga</h4>
        </div>

        <a href="{{ route('pages.perangkat.lembaga.create') }}"
            class="btn btn-primary mb-3 d-inline-flex align-items-center" aria-label="Tambah data lembaga">
            <img src="{{ asset('images/icons/add.png') }}" alt="" class="me-2"
                style="width:20px; height:20px; object-fit:contain;">
            Tambah Data
        </a>

        {{-- Pagination atas --}}
        <div class="mt-3">
            {{ $dataLembaga->links('pagination::bootstrap-5') }}
        </div>

        {{-- Filter --}}
        <form method="GET" action="{{ route('pages.perangkat.lembaga.index') }}" class="mb-3">
            <div class="row">
                <div class="col-md-2">
                    <select name="gender" class="form-select" onchange="this.form.submit()">
                        <option value="">All</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            value="{{ request('search') }}"
                            placeholder="Search" aria-label="Search">

                        <button type="submit" class="input-group-text" id="basic-addon2">
                            <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        @if (request('search'))
                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                class="btn btn-outline-secondary ms-2" id="clear-search">Clear</a>
                        @endif
                    </div>
                </div>
            </div>
        </form>

        {{-- LIST DATA --}}
        <div class="row">
            @foreach ($dataLembaga as $lembaga)
                <div class="col-md-4">
                    <div class="card mb-3 shadow-sm">

                        {{-- FOTO DI ATAS CARD --}}
                        @php
                            $img = $lembaga->media->first();
                            $placeholder = 'https://via.placeholder.com/400x250?text=No+Image';

                            if ($img && $img->file_url) {
                                // normalisasi path agar cocok dengan asset()
                                $cleanPath = ltrim($img->file_url, '/'); // remove leading slash
                                $imgUrl = asset($cleanPath);
                            } else {
                                $imgUrl = $placeholder;
                            }
                        @endphp

                        <img src="{{ $imgUrl }}"
                             class="card-img-top"
                             style="width:100%; height:220px; object-fit:cover;"
                             alt="Foto Lembaga">

                        <div class="card-body">
                            <h5 class="card-title">{{ $lembaga->nama_lembaga }}</h5>

                            <p class="card-text text-truncate" style="max-height:3.6rem;">
                                {{ $lembaga->deskripsi }}
                            </p>

                            <p class="card-text">Kontak: {{ $lembaga->kontak }}</p>

                            {{-- Tombol EDIT --}}
                            <a href="{{ route('pages.perangkat.lembaga.edit', $lembaga->lembaga_id) }}"
                                class="btn btn-primary mb-2">
                                <img src="https://cdn-icons-png.flaticon.com/128/14034/14034300.png"
                                     style="width:15%; height:15%;" alt=""> Edit
                            </a>

                            {{-- Tombol DELETE --}}
                            <form action="{{ route('pages.perangkat.lembaga.destroy', $lembaga->lembaga_id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger mb-2" type="submit">
                                    <img src="https://cdn-icons-png.flaticon.com/128/1828/1828843.png"
                                         style="width:15%; height:15%;" alt=""> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination bawah --}}
        <div class="mt-3">
            {{ $dataLembaga->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>

{{-- Back to Top --}}
<a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top">
    <i class="fa fa-arrow-up"></i>
</a>

@endsection
