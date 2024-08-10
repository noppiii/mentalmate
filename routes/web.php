<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\ClientArtikelController;
use App\Http\Controllers\ClientKonsultasiController;
use App\Http\Controllers\ClientPsikologController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaDashboardController;
use App\Http\Controllers\MahasiswaKonsultasiController;
use App\Http\Controllers\MasterAdminController;
use App\Http\Controllers\MasterArticleController;
use App\Http\Controllers\MasterBidangPsikologController;
use App\Http\Controllers\MasterCategoryArticleController;
use App\Http\Controllers\MasterKonsultasiController;
use App\Http\Controllers\MasterMahasiswaController;
use App\Http\Controllers\MasterPsikologController;
use App\Http\Controllers\MasterPsikologFavoritController;
use App\Http\Controllers\MasterTagArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PsikologArticleController;
use App\Http\Controllers\PsikologDashboardController;
use App\Http\Controllers\PsikologFavoritController;
use App\Http\Controllers\PsikologJadwalController;
use App\Http\Controllers\PsikologKonsultasiController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthMahasiswa;
use App\Http\Middleware\AuthPsikolog;
use App\Http\Middleware\AuthUser;
use Illuminate\Support\Facades\Route;

Route::get('/signin', [AuthUserController::class, 'showSigninForm'])->name('signin');
Route::post('/signin', [AuthUserController::class, 'signin'])->name('postSignin');
Route::get('/psikolog/signup', [AuthUserController::class, 'showPsikologSignupForm'])->name('psikolog.signup');
Route::post('/psikolog/signup', [AuthUserController::class, 'psikologSignup'])->name('psikolog.postSignup');
Route::get('/mahasiswa/signup', [AuthUserController::class, 'showMahasiswaSignupForm'])->name('mahasiswa.signup');
Route::post('/mahasiswa/signup', [AuthUserController::class, 'mahasiswaSignup'])->name('mahasiswa.postSignup');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/konsultasi', [ClientKonsultasiController::class, 'index'])->name('client.konsultasi');
Route::get('/artikel', [ClientArtikelController::class, 'index'])->name('client.artikel');
Route::get('/artikel/{slug}', [ClientArtikelController::class, 'show'])->name('client.detailArtikel');
Route::post('/artikel/{slug}/post-comment', [ClientArtikelController::class, 'postComment'])->name('client.postComment');
Route::get('/list-psikolog', [ClientPsikologController::class, 'index'])->name('client.psikolog');
Route::get('/list-psikolog/{username}', [ClientPsikologController::class, 'show'])->name('client.detailPsikolog');

Route::prefix('admin')->middleware([AuthUser::class, AuthAdmin::class])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [AuthUserController::class, 'logout'])->name('admin.logout');
    Route::resource('admin', MasterAdminController::class);
    Route::resource('psikolog', MasterPsikologController::class);
    Route::resource('mahasiswa', MasterMahasiswaController::class);
    Route::resource('kategori-artikel', MasterCategoryArticleController::class);
    Route::resource('tag-artikel', MasterTagArticleController::class);
    Route::resource('artikel', MasterArticleController::class);
    Route::put('artikel/status/{id}/update', [MasterArticleController::class, 'updateStatus'])->name('artikel.updateStatus');
    Route::resource('bidang-psikolog', MasterBidangPsikologController::class);
    Route::resource('psikolog-favorit', MasterPsikologFavoritController::class);
    Route::resource('konsultasi', MasterKonsultasiController::class);
});
// Group routes for psikolog
Route::prefix('psikolog')->middleware([AuthUser::class, AuthPsikolog::class])->group(function () {
    Route::get('dashboard', [PsikologDashboardController::class, 'index'])->name('psikolog.dashboard');
    Route::get('logout', [AuthUserController::class, 'logout'])->name('psikolog.logout');
    Route::resource('my-artikel', PsikologArticleController::class);
    Route::resource('my-jadwal', PsikologJadwalController::class);
    Route::resource('my-konsultasi', PsikologKonsultasiController::class);
});
// Group routes for mahasiswa
Route::prefix('mahasiswa')->middleware([AuthUser::class, AuthMahasiswa::class])->group(function () {
    Route::get('dashboard', [MahasiswaDashboardController::class, 'index'])->name('mahasiswa.dashboard');
    Route::get('logout', [AuthUserController::class, 'logout'])->name('mahasiswa.logout');
    // In routes/web.php

    Route::get('konsultasi-ku/{receiverId}/{receiverType}', [MahasiswaKonsultasiController::class, 'index'])->name('mahasiswa.konsultasi.index');
    Route::post('konsultasi-ku/store', [MahasiswaKonsultasiController::class, 'store'])->name('mahasiswa.konsultasi.store');
    // Route::resource('konsultasi-ku', MahasiswaKonsultasiController::class)->except(['index']);
});