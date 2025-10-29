<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Page Mirip Cisco</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f7fcfe;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .left-section {
            flex: 1;
            background: #f1f9fc;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 40px;
        }

        .left-section h2 {
            font-size: 2rem;
            color: #444;
            margin-bottom: 12px;
            text-align: center;
        }

        .left-section p {
            color: #666;
            font-size: 1rem;
            max-width: 420px;
            text-align: center;
            margin-bottom: 32px;
        }

        .logo {
            margin: 32px 0;
        }

        .left-section img {
            max-width: 220px;
            margin-bottom: 14px;
        }

        .right-section {
            flex: 1;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px 0;
            min-width: 360px;
            box-shadow: -4px 0 24px rgba(0, 0, 0, 0.05);
        }

        .form-box {
            width: 340px;
            background: #fff;
            padding: 36px;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
        }

        .form-box h3 {
            font-size: 1.5rem;
            margin-bottom: 12px;
            color: #222;
        }

        .form-box label {
            display: block;
            margin-top: 18px;
            margin-bottom: 5px;
            color: #444;
            font-weight: 500;
        }

        .form-box input[id="name"],
        .form-box input[id="password"] {
            width: 100%;
            padding: 12px 10px;
            margin-bottom: 10px;
            border: 1px solid #dbe2eb;
            border-radius: 6px;
            font-size: 1rem;
        }

        .form-box .forgot {
            color: #1a8c3b;
            float: right;
            font-size: 0.92rem;
            text-decoration: none;
            margin-bottom: 16px;
        }

        .form-box button {
            width: 100%;
            padding: 13px;
            background: #336f9d;
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 1.08rem;
            margin-bottom: 18px;
            cursor: pointer;
            transition: background .3s;
        }

        .form-box button:hover {
            background: #215075;
        }

        .or {
            text-align: center;
            color: #aaaaaa;
            font-size: 0.92rem;
            margin: 14px 0;
            position: relative;
        }

        .or:before,
        .or:after {
            content: '';
            display: inline-block;
            width: 38%;
            height: 1px;
            background: #eee;
            vertical-align: middle;
            margin: 0 8px;
        }

        .google-btn {
            width: 100%;
            background: #fff;
            border: 1px solid #dbe2eb;
            padding: 12px;
            border-radius: 25px;
            color: #444;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .signup-box {
            text-align: center;
            background: #f1f1f1;
            padding: 22px 0 14px 0;
            color: #333;
            border-radius: 8px;
            font-size: 1rem;
            width: 100%;
        }

        .signup-box a {
            color: #1a8c3b;
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
        }

        @media (max-width: 950px) {
            .container {
                flex-direction: column;
            }

            .right-section,
            .left-section {
                min-width: 0;
                width: 100%;
                box-shadow: none;
                padding: 20px 0;
            }

            .form-box {
                width: 98%;
                padding: 24px;
                margin: auto;
            }
        }
    </style>
</head>

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
