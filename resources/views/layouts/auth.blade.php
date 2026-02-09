<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Sesendok - DPUPR') }} - Dashboard</title>

    {{-- FOMANTIC CSS --}}
    <link rel="stylesheet" href="{{ asset('vendor/fomantic/semantic.min.css') }}">

    {{-- JQUERY (WAJIB SEBELUM FOMANTIC JS) --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/fomantic/semantic.min.js') }}"></script>

    {{-- APP JS --}}
    @vite(['resources/js/app.js'])
</head>

<body style="margin:0">

    {{-- ===== NAVBAR (FIXED, DI LUAR PUSHABLE) ===== --}}
    @include('layouts.partials.navbar')

    {{-- ===== PUSHABLE CONTEXT ===== --}}
    <div class="ui pushable">

        {{-- SIDEBAR --}}
        @include('layouts.partials.sidebar')

        {{-- PUSHER --}}
        <div class="pusher">
                @yield('main-content')
        </div>

    </div>

</body>
</html>
