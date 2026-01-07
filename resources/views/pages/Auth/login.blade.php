@extends('layouts.auth.app')

@section('content')
    <div class="container">
        <div class="left-section">
            <h2>Selamat Datang di Website Perangkat dan Lembaga Desa</h2>
            <p>Melalui media ini, kami berkomitmen untuk mewujudkan pelayanan yang transparan, akuntabel, dan
                berorientasi pada kesejahteraan masyarakat desa.</p>
        </div>

        <div class="right-section">
            <div class="form-box">
                <h3>Welcome!</h3>
                <div style="margin-bottom:12px;color:#666;font-size:0.97rem;">Please login to your account.</div>

                <form action="{{ route('auth.process') }}" method="POST">
                    @csrf

                    <label for="email">Email</label>
                    <input type="text" id="name" name="email" value="{{ old('email') }}" required>

                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit">Login</button>
                    <p style="text-align:center;">Belum punya akun?</p>

                    <a href="{{ route('user.create') }}" class="btn w-100 rounded-pill"
                        style="background:#336f9d !important; border-color:#336f9d !important; color:#fff !important;">
                        Daftar Sekarang
                    </a>
                    
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
@endsection
