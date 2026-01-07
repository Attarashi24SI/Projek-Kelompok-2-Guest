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
                    <h4 class="text-uppercase text-primary">Menu CRUD User</h4>
                </div>

                <a href="{{ route('user.create') }}" class="btn btn-primary mb-3"><img
                        src="https://cdn-icons-png.flaticon.com/128/6711/6711405.png" style="width:15%; height:15%;"
                        alt="">Tambah User</a>

                {{-- paginate --}}
                <div class="mt-3">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>

                {{-- Filter --}}
                <form method="GET" action="{{ route('user.index') }}">
                    <div class="row">
                        <div class="col-md-2">
                            <select name="gender" class="form-select" onchange="this.form.submit()" class="mb-3">
                                <option value="">All</option>
                                <option value="">All</option>

                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" id="exampleInputIconRight"
                                    value="{{ request('search') }}" placeholder="Search" aria-label="Search">
                                <button type="submit" class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    @if (request('search'))
                                        <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                            class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                                    @endif
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($users->isEmpty())
                    <div class="alert alert-warning text-center">
                        Belum ada data user.
                    </div>
                @else
                    <div class="row">
                        @foreach ($users as $user)
                            <div class="col-md-4">
                                <div class="card mb-3 shadow-sm border-0">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $user->name }}</h5>
                                        <p class="card-text mb-1">Email: {{ $user->email }}</p>
                                        <p class="card-text">
                                            Dibuat pada:
                                            <strong>{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</strong>
                                        </p>

                                        @if (auth()->check() && auth()->user()->role === 'admin')
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <img src="https://cdn-icons-png.flaticon.com/128/14034/14034300.png"
                                                        style="width:15%;" alt="">
                                                    Edit
                                                </a>

                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">
                                                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828843.png"
                                                            style="width:15%; height:15%;" alt="">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        @endif



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
