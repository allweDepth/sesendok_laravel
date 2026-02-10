<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\RealisasiController;
use App\Http\Controllers\ReferensiController;
use App\Http\Controllers\StandarHargaController;
use App\Http\Controllers\KepegawaianController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProfileController;

// Halaman guest (tanpa login)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/berita', [BeritaController::class, 'index'])
    ->name('berita.index');

// Halaman setelah login (semua pakai middleware auth)
Route::middleware(['auth', 'verified'])->group(function () {

    // Home / Dashboard utama
    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');

    // Anggaran + sub-menu
    Route::prefix('anggaran')->name('anggaran.')->group(function () {
        Route::get('/renstra',        [AnggaranController::class, 'renstra'])->name('renstra');
        // ← tambahkan baris ini (untuk load tabel via AJAX)
        Route::get('/renstra/table',  [AnggaranController::class, 'renstraTable'])->name('renstra.table');
        Route::get('/renja-dpa',      [AnggaranController::class, 'renjaDpa'])->name('renja-dpa');
        Route::get('/renja-perubahan', [AnggaranController::class, 'renjaPerubahan'])->name('renja-perubahan');
        Route::get('/dppa',           [AnggaranController::class, 'dppa'])->name('dppa');
        Route::get('/renstra/table', [AnggaranController::class, 'renstraTable'])->name('renstra.table');
    });

    // Kontrak
    Route::get('/kontrak', [KontrakController::class, 'index'])
        ->name('kontrak.index');

    // Realisasi + sub-menu
    Route::prefix('realisasi')->name('realisasi.')->group(function () {
        Route::get('/input',    [RealisasiController::class, 'input'])->name('input');
        Route::get('/spj',      [RealisasiController::class, 'spj'])->name('spj');
        Route::get('/laporan',  [RealisasiController::class, 'laporan'])->name('laporan');
    });

    // Referensi + sub-menu (banyak sekali)
    Route::prefix('referensi')->name('referensi.')->group(function () {
        Route::get('/bidang-urusan', [ReferensiController::class, 'bidangUrusan'])->name('bidang-urusan');
        Route::get('/program',       [ReferensiController::class, 'program'])->name('program');
        Route::get('/kegiatan',      [ReferensiController::class, 'kegiatan'])->name('kegiatan');
        Route::get('/sub-kegiatan',  [ReferensiController::class, 'subKegiatan'])->name('sub-kegiatan');
        Route::get('/rekanan',       [ReferensiController::class, 'rekanan'])->name('rekanan');
        Route::get('/satuan',        [ReferensiController::class, 'satuan'])->name('satuan');
        Route::get('/mapping',       [ReferensiController::class, 'mapping'])->name('mapping');
        Route::get('/neraca',        [ReferensiController::class, 'neraca'])->name('neraca');
        Route::get('/akun',          [ReferensiController::class, 'akun'])->name('akun');
        Route::get('/sumber-dana',   [ReferensiController::class, 'sumberDana'])->name('sumber-dana');
        Route::get('/organisasi',    [ReferensiController::class, 'organisasi'])->name('organisasi');
        Route::get('/peraturan',     [ReferensiController::class, 'peraturan'])->name('peraturan');
        Route::get('/wilayah',       [ReferensiController::class, 'wilayah'])->name('wilayah');
    });

    // Standar Harga Satuan
    Route::prefix('standar-harga')->name('standar-harga.')->group(function () {
        Route::get('/ssh',  [StandarHargaController::class, 'ssh'])->name('ssh');
        Route::get('/hspk', [StandarHargaController::class, 'hspk'])->name('hspk');
        Route::get('/asb',  [StandarHargaController::class, 'asb'])->name('asb');
        Route::get('/sbu',  [StandarHargaController::class, 'sbu'])->name('sbu');
    });

    // Kepegawaian
    Route::prefix('kepegawaian')->name('kepegawaian.')->group(function () {
        Route::get('/asn',              [KepegawaianController::class, 'asn'])->name('asn');
        Route::get('/surat-keputusan',  [KepegawaianController::class, 'suratKeputusan'])->name('surat-keputusan');
        Route::get('/register-surat',   [KepegawaianController::class, 'registerSurat'])->name('register-surat');
        Route::get('/tata-naskah',      [KepegawaianController::class, 'tataNaskah'])->name('tata-naskah');
    });

    // Pesan, Pengaturan, Profil
    Route::get('/pesan',       [PesanController::class, 'index'])->name('pesan.index');
    Route::get('/pengaturan',  [PengaturanController::class, 'index'])->name('pengaturan.index');

    // Profile (dari Breeze, dipertahankan)
    Route::get('/profile',       [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',     [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',    [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
