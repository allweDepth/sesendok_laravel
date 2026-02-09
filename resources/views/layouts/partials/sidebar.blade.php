{{-- Sidebar --}}
<div class="ui inverted left vertical sidebar menu push" id="main-sidebar">

    {{-- Logo --}}
    <div class="item">
        <h2 class="ui inverted center red aligned icon header dash_header">
            <i class="circular colored blue building icon"></i>
            <div class="content">
                seSendok
                <span id="kopku" style="color: darkcyan!important;font-style: italic"></span>
                <div class="sub header">pemerintahan</div>
                <a class="ui blue center basic label inverted" id="set_tahun_anggaran">2026</a>
            </div>
        </h2>
    </div>

    {{-- Search --}}
    <div class="item">
        <div class="ui inverted transparent icon input">
            <input type="text" placeholder="Menu...">
            <i class="search icon"></i>
        </div>
    </div>

    {{-- Home --}}
    <a class="item active" href="{{ route('home') }}">
        <i class="home icon"></i> Home
    </a>

    {{-- Anggaran --}}
    <div class="ui accordion inverted item">
        <div class="title item">
            <i class="dropdown icon"></i> Anggaran
        </div>
        <div class="content">
            <a class="item" href="{{ url('/anggaran/renstra') }}">
                <span><i class="toggle on icon"></i></span>
                <i class="purple sitemap icon"></i> RENSTRA
            </a>
            <a class="item" href="{{ url('/anggaran/renja-dpa') }}">
                <span><i class="toggle on icon"></i></span>
                <i class="violet tag icon"></i> RENJA
            </a>
            <a class="item" href="{{ url('/anggaran/dppa') }}">
                <span><i class="toggle on icon"></i></span>
                <i class="yellow tags icon"></i> DPPA
            </a>
        </div>
    </div>

    {{-- Kontrak --}}
    <a class="item" href="{{ url('/kontrak') }}"><i class="file contract icon"></i> Kontrak</a>

    {{-- Realisasi --}}
    <div class="ui accordion inverted item">
        <div class="title item"><i class="dropdown icon"></i> Realisasi</div>
        <div class="content">
            <a class="item" href="{{ url('/realisasi/input') }}">
                <span><i class="toggle on icon"></i></span>
                <i class="purple chart pie icon"></i> Input Realisasi
            </a>
            <a class="item" href="{{ url('/realisasi/spj') }}">
                <span><i class="toggle on icon"></i></span>
                <i class="violet chartline icon"></i> SPJ
            </a>
            <a class="item" href="{{ url('/realisasi/laporan') }}">
                <span><i class="toggle on icon"></i></span>
                <i class="yellow chart bar icon"></i> Laporan
            </a>
        </div>
    </div>

    {{-- Referensi --}}
    <div class="ui accordion inverted item">
        <div class="title item"><i class="dropdown icon"></i> Referensi</div>
        <div class="content">
            <a class="item" href="{{ url('/referensi/bidang-urusan') }}">
                <span><i class="toggle on blue icon"></i></span><i class="user plus icon"></i> Bidang Urusan
            </a>
            <a class="item" href="{{ url('/referensi/program') }}">
                <span><i class="toggle on blue icon"></i></span><i class="users icon"></i> Program
            </a>
            <a class="item" href="{{ url('/referensi/kegiatan') }}">
                <span><i class="toggle on blue icon"></i></span><i class="outdent icon"></i> Kegiatan
            </a>
            <a class="item" href="{{ url('/referensi/sub-kegiatan') }}">
                <span><i class="toggle on blue icon"></i></span><i class="layer group icon"></i> Sub Kegiatan
            </a>
            <a class="item" href="{{ url('/referensi/rekanan') }}">
                <span><i class="toggle on blue icon"></i></span><i class="book reader icon"></i> Rekanan
            </a>
            <a class="item" href="{{ url('/referensi/satuan') }}">
                <span><i class="toggle on blue icon"></i></span><i class="calculator icon"></i> Satuan
            </a>
            <a class="item" href="{{ url('/referensi/mapping') }}">
                <span><i class="toggle on blue icon"></i></span><i class="stream icon"></i> Mapping
            </a>
            <a class="item" href="{{ url('/referensi/neraca') }}">
                <span><i class="toggle on blue icon"></i></span><i class="calendar alternate icon"></i> Neraca
            </a>
            <a class="item" href="{{ url('/referensi/akun') }}">
                <span><i class="toggle on blue icon"></i></span><i class="calendar alternate outline icon"></i> Akun
            </a>
            <a class="item" href="{{ url('/referensi/sumber-dana') }}">
                <span><i class="toggle on blue icon"></i></span><i class="money check alternate icon"></i> Sumber Dana
            </a>
            <a class="item" href="{{ url('/referensi/organisasi') }}">
                <span><i class="toggle on blue icon"></i></span><i class="id card icon"></i> Organisasi
            </a>
            <a class="item" href="{{ url('/referensi/peraturan') }}">
                <span><i class="toggle on blue icon"></i></span><i class="balance scale icon"></i> Peraturan
            </a>
            <a class="item" href="{{ url('/referensi/wilayah') }}">
                <span><i class="toggle on blue icon"></i></span><i class="globe icon"></i> Wilayah
            </a>
        </div>
    </div>

    {{-- Standar Harga Satuan --}}
    <div class="ui accordion inverted item">
        <div class="title item"><i class="dropdown icon"></i> Standar Harga Satuan</div>
        <div class="content">
            <a class="item" href="{{ url('/standar-harga/ssh') }}"><span><i class="toggle on blue icon"></i></span><i class="file icon"></i> SSH</a>
            <a class="item" href="{{ url('/standar-harga/hspk') }}"><span><i class="toggle on blue icon"></i></span><i class="file alternate icon"></i> HSPK</a>
            <a class="item" href="{{ url('/standar-harga/asb') }}"><span><i class="toggle on blue icon"></i></span><i class="file alternate outline icon"></i> ASB</a>
            <a class="item" href="{{ url('/standar-harga/sbu') }}"><span><i class="toggle on blue icon"></i></span><i class="file outline icon"></i> SBU</a>
        </div>
    </div>

    {{-- Kepegawaian --}}
    <div class="ui accordion inverted item">
        <div class="title item"><i class="dropdown icon"></i> Kepegawaian</div>
        <div class="content">
            <a class="item" href="{{ url('/kepegawaian/asn') }}"><span><i class="toggle on blue icon"></i></span><i class="users icon"></i> ASN</a>
            <a class="item" href="{{ url('/kepegawaian/surat-keputusan') }}"><span><i class="toggle on blue icon"></i></span><i class="users icon"></i> Surat Keputusan (SK)</a>
            <a class="item" href="{{ url('/kepegawaian/register-surat') }}"><span><i class="toggle on blue icon"></i></span><i class="users icon"></i> Register Surat</a>
            <a class="item" href="{{ url('/kepegawaian/tata-naskah') }}"><span><i class="toggle on blue icon"></i></span><i class="users icon"></i> Tata Naskah</a>
        </div>
    </div>

    {{-- Lainnya --}}
    <a class="item" href="{{ url('/berita') }}"><i class="newspaper icon"></i> Halaman Berita</a>
    <a class="item" href="{{ url('/reset') }}"><i class="erase icon"></i> Reset Tabel</a>
    <a class="item" href="{{ url('/pengaturan') }}"><i class="toolbox icon"></i> Pengaturan</a>
    <a class="item" href="{{ url('/wallchat') }}"><i class="comments outline icon"></i> Pesan</a>
    <a class="item" href="{{ url('/profil') }}"><i class="user icon"></i> Profil</a>

</div>
