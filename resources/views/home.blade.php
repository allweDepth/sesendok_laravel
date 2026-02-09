@extends('layouts.auth')

@section('main-content')
<div class="ui container center aligned" style="padding: 5rem 1rem;">
    <h1 class="ui massive inverted header">Selamat Datang di Dashboard DPUPR</h1>
    <p class="ui inverted text container" style="max-width: 800px; margin: 2rem auto;">
        Gunakan menu di sebelah kiri untuk mengelola data anggaran, realisasi, referensi, standar harga, kepegawaian, pesan, pengaturan, dan profil.
    </p>

    <div class="ui raised inverted segment">
        <h3 class="ui inverted header">Dashboard Overview</h3>
        <p>Anggaran & Realisasi Kabupaten Pasangkayu - Tahun 2026</p>
    </div>

    <button class="ui huge primary button">Mulai Kelola Anggaran</button>
</div>
@endsection