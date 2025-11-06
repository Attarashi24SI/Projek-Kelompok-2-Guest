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

                <a href="{{ route('user.create') }}" class="btn btn-primary mb-3"><img src="https://cdn-icons-png.flaticon.com/128/6711/6711405.png" style="width:15%; height:15%;" alt="">Tambah User</a>

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

                                        <div class="d-flex gap-2">
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm"><img src="https://cdn-icons-png.flaticon.com/128/14034/14034300.png" style="width:15%;" alt="">Edit</a>

                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"><img src="https://cdn-icons-png.flaticon.com/128/1828/1828843.png" style="width:15%; height:15%;" alt="">Hapus</button>
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
