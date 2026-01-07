@extends('layouts.guest.app')

@section('content')
    <!-- feature Start -->
    <div class="container-fluid feature bg-light py-5">
        <div class="container mt-5">

            <h3 class="mb-4">Tambah User Baru</h3>

            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                @if (auth()->check() && auth()->user()->role === 'admin')
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-control">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="password" class="form-label">Foto Profil</label>
                    <input type="file" name="photo">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
    <!-- feature End -->


@endsection
