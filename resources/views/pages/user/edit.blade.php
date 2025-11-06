@extends('layouts.guest.app')
@section('content')

<div class="container-fluid feature bg-light py-5">
    <div class="container mt-5">
        <h3 class="mb-4">Edit Data User</h3>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Isi jika ingin mengubah password">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<!-- Back to Top -->
<a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top">
    <i class="fa fa-arrow-up"></i>
</a>

@endsection
