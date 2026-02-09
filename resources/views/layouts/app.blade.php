<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sesendok - DPUPR Kabupaten Pasangkayu</title>

    <link rel="stylesheet" href="{{ asset('vendor/fomantic/semantic.min.css') }}">

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/fomantic/semantic.min.js') }}"></script>

    <!-- Hapus sementara vite bundling (kita balikin nanti kalau mau) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background: #1b1c1d; color: #f8f8f8; margin: 0;">

    <!-- Menu Atas Fomantic-UI -->
    <div class="ui inverted fixed menu">
        <div class="ui container">
            <a class="header item" href="/">Halaman Utama</a>
            <a class="item" href="/berita">Halaman Berita</a>
            <div class="right menu">
                <a class="item" href="#" onclick="$('#loginModal').modal('show')">Login</a>
                <a class="item" href="#" onclick="$('#registerModal').modal('show')">Register</a>
            </div>
        </div>
    </div>

    <!-- Konten Utama -->
    <main style="padding-top: 70px;">
        @yield('content')
    </main>

    <!-- Modal Login Fomantic-UI -->
    <!-- Modal Login -->
    <div class="ui small modal" id="loginModal">
        <i class="close icon"></i>
        <div class="header">Login</div>
        <div class="content">
            <form class="ui form" method="POST" action="{{ route('login') }}">
                @csrf
                <!-- WAJIB ADA ini, kalau tidak ada token CSRF error 419 -->
                <div class="field">
                    <label>Email/NIP</label>
                    <input type="text" name="email" placeholder="Email atau NIP" required autofocus>
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" name="remember">
                        <label>Ingat Saya</label>
                    </div>
                </div>
                <button class="ui primary fluid button" type="submit">Login</button>
            </form>
        </div>
    </div>

    <!-- Modal Register Fomantic-UI -->
    <div class="ui small modal" id="registerModal">
        <i class="close icon"></i>
        <div class="header">Register</div>
        <div class="content">
            <form class="ui form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="field">
                    <label>Nama</label>
                    <input type="text" name="name" required>
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="field">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required>
                </div>
                <button class="ui primary fluid button" type="submit">Register</button>
            </form>
        </div>
    </div>

</body>

</html>