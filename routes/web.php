<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, DashboardController, KelasController, SiswaController, GuruController, MapelController, NilaiController};
use App\Http\Middleware\AdminOnly;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth', AdminOnly::class])->group(function () {
    Route::get('/', fn () => redirect()->route('dashboard'));
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kelas', KelasController::class)->except('show')->parameters(['kelas' => 'kela']);
    Route::resource('siswa', SiswaController::class)->parameters(['siswa' => 'siswa']);
    Route::resource('guru', GuruController::class)->except('show')->parameters(['guru' => 'guru']);
    Route::resource('mapel', MapelController::class)->except('show')->parameters(['mapel' => 'mapel']);
    Route::resource('nilai', NilaiController::class)->except('show')->parameters(['nilai' => 'nilai']);
});
