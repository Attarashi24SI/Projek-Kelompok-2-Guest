<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Page Lembaga</title>
    <style>

    </style>
</head>
@extends('layouts.auth.app')
@section('content')
<body>
    <div class="container">
        <div class="left-section">
            <h2>Selamat Datang di Website Perangkat dan Lembaga Desa</h2>
            <p>Melalui media ini, kami berkomitmen untuk mewujudkan pelayanan yang transparan, akuntabel, dan
                berorientasi pada kesejahteraan masyarakat desa.</p>
            {{-- <div class="logo">
                <!-- Gambar logo atau ilustrasi, bisa diganti src nya -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="120">
            </div> --}}
        </div>
        <div class="right-section">
            <div class="form-box">
                <h3>Welcome!</h3>
                <div style="margin-bottom:12px;color:#666;font-size:0.97rem;">Please login to your account.</div>
                <form action="{{ route('auth.process') }}" method="POST">
                    @csrf
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit">Login</button>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>

            </div>
        </div>
    </div>
</body>

</html>
