<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Lembaga</title>
</head>
@extends('layouts.guest.app')
@section('content')

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text btn border p-3"><i
                                class="fa fa-search text-white"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- Feature Start -->
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pt-5 pb-5  wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-uppercase text-primary">Menu CRUD Lembaga</h4>
            </div>

            <a href="{{ route('pages.perangkat.lembaga.create') }}" class="btn btn-primary mb-3"><img src="https://cdn-icons-png.flaticon.com/128/6711/6711405.png" style="width:15%; height:15%;" alt="">Tambah Data</a>

            <div class="row">
    @foreach ($dataLembaga as $lembaga)
        <div class="col-md-4">
            <div class="card mb-3 shadow-sm">
                <div class="card-body">

                    <h5 class="card-title">{{ $lembaga->nama_lembaga }}</h5>
                    <p class="card-text">{{ $lembaga->deskripsi }}</p>
                    <p class="card-text">Kontak: {{ $lembaga->kontak }}</p>

                    <a href="{{ route('pages.perangkat.lembaga.edit', $lembaga->lembaga_id) }}"
                       class="btn btn-primary mb-2">
                        <img src="https://cdn-icons-png.flaticon.com/128/14034/14034300.png"
                             style="width:15%; height:15%;" alt=""> Edit
                    </a>

                    {{-- FORM DELETE --}}
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

        </div>
    </div>
    <!-- Feature End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>

@endsection

</body>

</html>
