<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

        <!-- feature Start -->
        <div class="container-fluid feature bg-light py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pt-5 pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-uppercase text-primary">Menu CRUD Warga</h4>
                </div>
                <a href="{{ route('pages.warga.create') }}" class="btn btn-primary mb-3"><img
                        src="https://cdn-icons-png.flaticon.com/128/6711/6711405.png" style="width:15%; height:15%;"
                        alt="">Tambah Data</a>

                {{-- paginate --}}
                <div class="mt-3">
                    {{ $dataWarga->links('pagination::bootstrap-5') }}
                </div>

                {{-- Filter --}}
                {{-- Filter --}}
                <form method="GET" action="{{ route('pages.warga.index') }}">
                    <div class="row">
                        <div class="col-md-2">
                            <select name="gender" class="form-select" onchange="this.form.submit()" class="mb-3">
                                <option value="">All</option>
                            </select>

                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" id="exampleInputIconRight"
                                    value="{{request('search')}}" placeholder="Search" aria-label="Search">
                                <button type="submit" class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    @if(request('search'))
							<a href="{{ request()->fullUrlWithQuery(['search'=> null]) }}" class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
					@endif
                                </button>
                            </div>
                        </div>


                    </div>
                    <br>
                </form>

                <div class="row">
                    @foreach ($dataWarga as $warga)
                        <div class="col-md-4">
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <p class="card-tesxt">#{{ $warga->warga_id }}</p>
                                    <h5 class="card-title">{{ $warga->nama }}</h5>
                                    <p class="card-text">No Telp: {{ $warga->telp }}</p>
                                    <p class="card-text">Email: {{ $warga->email }}</p>

                                    <div class="dropdown mb-3">
                                        <button class="btn btn-primary dropdown-toggle rounded-pill" type="button"
                                            data-bs-toggle="dropdown">
                                            <img src="https://cdn-icons-png.flaticon.com/128/14034/14034300.png"
                                                style="width:15%; height:15%;" alt=""> Aksi
                                        </button>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('pages.warga.edit', $warga->warga_id) }}">
                                                    <img src="https://cdn-icons-png.flaticon.com/128/14034/14034300.png"
                                                        style="width:12%; height:12%;" alt="">
                                                    Edit
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item text-danger"
                                                    href="{{ route('pages.warga.delete', $warga->warga_id) }}"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <img src="https://cdn-icons-png.flaticon.com/128/1828/1828843.png"
                                                        style="width:12%; height:12%;" alt="">
                                                    Hapus
                                                </a>
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

        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>



    </body>
@endsection

</html>
