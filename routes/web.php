<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\ClientAboutUsController;
use App\Http\Controllers\ClientArtikelController;
use App\Http\Controllers\ClientKonsultasController;
use App\Http\Controllers\ClientKonsultasiController;
use App\Http\Controllers\ClientPsikologController;
use App\Http\Controllers\ClientSearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaDashboardController;
use App\Http\Controllers\MahasiswaKonsultasiController;
use App\Http\Controllers\MahasiswaMeetingController;
use App\Http\Controllers\MahasiswaTransactionController;
use App\Http\Controllers\MahasiswaProfileController;
use App\Http\Controllers\MasterAdminController;
use App\Http\Controllers\MasterArticleController;
use App\Http\Controllers\MasterBannerController;
use App\Http\Controllers\MasterBidangPsikologController;
use App\Http\Controllers\MasterCategoryArticleController;
use App\Http\Controllers\MasterKonsultasiController;
use App\Http\Controllers\MasterMahasiswaController;
use App\Http\Controllers\MasterMetodeKonsultasiController;
use App\Http\Controllers\MasterPsikologController;
use App\Http\Controllers\MasterPsikologFavoritController;
use App\Http\Controllers\MasterTagArticleController;
use App\Http\Controllers\MasterTransaksiController;
use App\Http\Controllers\MasterUlasanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PsikologArticleController;
use App\Http\Controllers\PsikologDashboardController;
use App\Http\Controllers\PsikologFavoritController;
use App\Http\Controllers\PsikologJadwalController;
use App\Http\Controllers\PsikologKonsultasiController;
use App\Http\Controllers\PsikologMeetingController;
use App\Http\Controllers\PsikologProfileController;
use App\Http\Controllers\TesKesehatanMentalController;
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
Route::get('/search', [ClientSearchController::class, 'search'])->name('client.search');
Route::get('/konsultasi', [ClientKonsultasiController::class, 'index'])->name('client.konsultasi');
Route::get('/artikel', [ClientArtikelController::class, 'index'])->name('client.artikel');
Route::get('/about-us', [ClientAboutUsController::class, 'index'])->name('client.aboutus');
Route::post('/about-us/submit-rating', [ClientAboutUsController::class, 'submitRating'])->name('client.submitRating');
Route::get('/artikel/{slug}', [ClientArtikelController::class, 'show'])->name('client.detailArtikel');
Route::post('/artikel/{slug}/post-comment', [ClientArtikelController::class, 'postComment'])->name('client.postComment');
Route::get('/list-psikolog', [ClientPsikologController::class, 'index'])->name('client.psikolog');
Route::post('/list-psikolog/{id}/favorite', [ClientPsikologController::class, 'addFavoritePsikolog'])->name('client.psikolog.favorite');
Route::get('/list-psikolog/{username}', [ClientPsikologController::class, 'show'])->name('client.detailPsikolog');
Route::get('/konsultasi', [ClientKonsultasController::class, 'index'])->name('client.konsultasi');
Route::post('/konsultasi/store', [ClientKonsultasController::class, 'store'])->name('client.postKonsultasi');
Route::get('/get-psikolog/{bidangId}', [ClientKonsultasController::class, 'getPsikologByBidang'])->name('client.psikolog.getByBidang');
Route::get('/get-psikolog-detail/{psikologId}', [ClientKonsultasController::class, 'getPsikologDetail'])->name('client.psikolog.getDetail');
Route::get('/fetch-new-messages', [MahasiswaKonsultasiController::class, 'fetchNewMessages'])->name('fetch-new-messages');
Route::get('/payment/{snapToken}', function ($snapToken) {
    return view('pages.client.konsultasi.payment', compact('snapToken'));
})->name('client.paymentPage');


Route::prefix('admin')->middleware([AuthUser::class, AuthAdmin::class])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [AuthUserController::class, 'adminLogout'])->name('admin.logout');
    Route::get('profile', [AdminProfileController::class, 'index'])->name('admin.profile');
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
    Route::resource('metode-konsultasi', MasterMetodeKonsultasiController::class);
    Route::resource('transaksi', MasterTransaksiController::class);
    Route::resource('banner', MasterBannerController::class);
    Route::resource('ulasan', MasterUlasanController::class);
    Route::put('banner/status/{id}/update', [MasterBannerController::class, 'updateStatus'])->name('banner.updateStatus');
});

// Group routes for psikolog
Route::prefix('psikolog')->middleware([AuthUser::class, AuthPsikolog::class])->group(function () {
    Route::get('dashboard', [PsikologDashboardController::class, 'index'])->name('psikolog.dashboard');
    Route::get('logout', [AuthUserController::class, 'psikologLogout'])->name('psikolog.logout');
    Route::get('profile', [PsikologProfileController::class, 'index'])->name('psikolog.profile');
    Route::put('profile/{id}/update', [PsikologProfileController::class, 'update'])->name('psikolog.updateProfile');
    Route::get('profile/berkas', [PsikologProfileController::class, 'berkas'])->name('psikolog.profile.berkas');
    Route::put('profile/berkas/{id}/update', [PsikologProfileController::class, 'updateBerkas'])->name('psikolog.profile.updateBerkas');
    Route::resource('my-artikel', PsikologArticleController::class);
    Route::resource('my-jadwal', PsikologJadwalController::class);
    Route::resource('my-meeting', PsikologMeetingController::class);
    Route::post('my-meeting/{konsultasiId}/store', [PsikologMeetingController::class, 'store'])->name('psikolog.createMeeting');
    Route::get('my-konsultasi/{receiverId}/{receiverType}', [PsikologKonsultasiController::class, 'index'])->name('psikolog.konsultasi.index');
    Route::post('my-konsultasi/store', [PsikologKonsultasiController::class, 'store'])->name('psikolog.konsultasi.store');
    Route::get('/get-messages/{receiverId}/{receiverType}', [PsikologKonsultasiController::class, 'getMessages'])->name('psikolog.getMessages');
    Route::resource('my-profile', PsikologProfileController::class);

});

// Group routes for mahasiswa
Route::prefix('mahasiswa')->middleware([AuthUser::class, AuthMahasiswa::class])->group(function () {
    Route::get('dashboard', [MahasiswaDashboardController::class, 'index'])->name('mahasiswa.dashboard');
    Route::get('logout', [AuthUserController::class, 'mahasiswaLogout'])->name('mahasiswa.logout');
    Route::get('profile', [MahasiswaProfileController::class, 'index'])->name('mahasiswa.profile');
    Route::get('profile/berkas', [MahasiswaProfileController::class, 'berkas'])->name('mahasiswa.profile.berkas');
    Route::put('profile/{id}/update', [MahasiswaProfileController::class, 'update'])->name('mahasiswa.updateProfile');
    Route::put('profile/berkas/{id}/update', [MahasiswaProfileController::class, 'updateBerkas'])->name('mahasiswa.profile.updateBerkas');
    Route::get('meeting', [MahasiswaMeetingController::class, 'index'])->name('mahasiswa.listMeeting');
    Route::get('transaksi', [MahasiswaTransactionController::class, 'index'])->name('mahasiswa.listTransaksi');
    // In routes/web.php

    Route::get('konsultasi-ku/{receiverId}/{receiverType}', [MahasiswaKonsultasiController::class, 'index'])->name('mahasiswa.konsultasi.index');
    Route::post('konsultasi-ku/store', [MahasiswaKonsultasiController::class, 'store'])->name('mahasiswa.konsultasi.store');
    Route::get('/get-messages/{receiverId}/{receiverType}', [MahasiswaKonsultasiController::class, 'getMessages'])->name('mahasiswa.getMessages');
    Route::get('tes-kesehatan-mental', [TesKesehatanMentalController::class, 'index'])->name('mahasiswa.test-kesehatan-mental');
    // Route::resource('konsultasi-ku', MahasiswaKonsultasiController::class)->except(['index']);
});
