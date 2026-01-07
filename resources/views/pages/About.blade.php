@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">

            <div class="text-center mx-auto pt-5 pb-4 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 900px;">
                <h3 class="text-uppercase text-primary">Tentang Website Ini</h3>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">

                    <p>
                        Website ini merupakan media informasi yang secara khusus menampilkan data dan profil
                        <strong>Perangkat Desa</strong> serta <strong>Lembaga Desa</strong>.
                        Tujuan utama dari website ini adalah untuk memberikan gambaran yang jelas dan terstruktur
                        mengenai siapa saja yang terlibat dalam penyelenggaraan pemerintahan dan kegiatan
                        kemasyarakatan di tingkat desa.
                    </p>

                    <p>Melalui website ini, masyarakat dapat mengetahui:</p>

                    <ul>
                        <li>Struktur dan susunan Perangkat Desa</li>
                        <li>Jabatan dan tanggung jawab setiap perangkat</li>
                        <li>Profil dan peran berbagai Lembaga Desa</li>
                        <li>Keterkaitan antar lembaga dalam mendukung pembangunan desa</li>
                    </ul>

                    <hr>

                    <h5>Perangkat Desa</h5>
                    <p>
                        Perangkat desa adalah unsur yang membantu kepala desa dalam menjalankan roda pemerintahan.
                        Mereka memiliki peran penting dalam administrasi, pengelolaan data, serta pelaksanaan
                        kegiatan desa sesuai dengan bidang masing-masing.
                    </p>

                    <hr>

                    <h5>Lembaga Desa</h5>
                    <p>
                        Lembaga desa merupakan mitra pemerintah desa yang mewakili dan melibatkan masyarakat
                        dalam berbagai kegiatan. Lembaga-lembaga ini berfungsi sebagai penghubung antara warga
                        dan pemerintah desa serta sebagai penggerak partisipasi masyarakat.
                    </p>

                    <hr>

                    <p>
                        Website ini dibuat sebagai sumber referensi resmi agar masyarakat dapat dengan mudah mengenal
                        struktur organisasi desa dan memahami peran setiap pihak yang ada di dalamnya.
                    </p>

                    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">
                        Kembali ke Beranda
                    </a>

                </div>
            </div>

        </div>
    </div>

    
@endsection
