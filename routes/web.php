<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Models\Alumni;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Views', [SessionController::class, 'index']);
Route::post('/Views/login', [SessionController::class, 'dashboard']);


// Route Admin
Route::middleware(['auth', 'role:Admin BKK'])->group(function () {
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/alumni-chart', [StatusController::class, 'index']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::post('/upload', [UsersController::class, 'import'])->name('import');
    Route::get('/alumni', [App\Http\Controllers\AlumniController::class, 'index']);
    Route::get('/alumni/{nik}/edit', [\App\Http\Controllers\AlumniController::class, 'edit'])->name('editalumni');
    Route::put('/alumni/{nik}', [App\Http\Controllers\AlumniController::class, 'update'])->name('alumni.update');
    Route::get('/perusahaan', [\App\Http\Controllers\PerusahaanController::class, 'perusahaan'])->name('perusahaan');
    Route::get('/perusahaan/{id_perusahaan}/edit', [\App\Http\Controllers\PerusahaanController::class, 'edit'])->name('editperusahaan');
    Route::put('/perusahaan/{id_perusahaan}', [\App\Http\Controllers\PerusahaanController::class, 'update'])->name('perusahaan.update');
    Route::get('/tambahakunperusahaan', [\App\Http\Controllers\PerusahaanController::class, 'create'])->name('tambahakunperusahaan');
    Route::post('/perusahaan', [\App\Http\Controllers\PerusahaanController::class, 'store'])->name('perusahaan.store');
    Route::delete('/perusahaan/{username}', [\App\Http\Controllers\PerusahaanController::class, 'destroy'])->name('perusahaan.destroy');
    Route::get('/akunpengguna', [\App\Http\Controllers\AlumniController::class, 'alumniperusahaanakun'])->name('akunpengguna');
    Route::get('/dataloker', [\App\Http\Controllers\PerusahaanController::class, 'dataloker'])->name('dataloker');
    Route::get('/datalokermasuk', [\App\Http\Controllers\PerusahaanController::class, 'datalokermasuk'])->name('datalokermasuk');    
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Route::middleware(['auth', 'role:Alumni'])->group(function () {
    Route::get('/DashboardAlumni', [\App\Http\Controllers\AlumniController::class, 'index'])->name('DashboardAlumni');
    Route::get('/profilealumni', [\App\Http\Controllers\AlumniController::class, 'profilealumni'])->name('profilealumni');
    Route ::get('/loker', [\App\Http\Controllers\AlumniController::class, 'loker'])->name('loker');
    Route::get('/tambahloker1', [\App\Http\Controllers\PerusahaanController::class, 'create'])->name('perusahaan.create');
    Route::post('/tambahloker1', [\App\Http\Controllers\PerusahaanController::class, 'store'])->name('perusahaan.store');
    
    Route::get('/dataloker1', [PerusahaanController::class, 'index'])->name('loker.index');

    // Route::get('/alumni/search', [AlumniController::class, 'search'])->name('alumni.search');
    // Route::get('/dataloker1', [\App\Http\Controllers\AlumniController::class, 'dataloker1'])->name('dataloker1');
});

Route::middleware(['auth', 'role:Perusahaan'])->group(function () {
    Route::get('/DashboardPerusahaan', [\App\Http\Controllers\PerusahaanController::class, 'index'])->name('Dashboarderusahaan');
    Route::get('/dataloker1', [\App\Http\Controllers\PerusahaanController::class, 'dataloker1'])->name('dataloker1');
    Route::get('/tambahloker1', [\App\Http\Controllers\PerusahaanController::class, 'tambahloker1'])->name('tambahloker1');
    // Route::get('/tambahloker1', [\App\Http\Controllers\PerusahaanController::class, 'createLoker'])->name('perusahaan.createLoker');
    Route::post('/perusahaan/tambah-loker', [\App\Http\Controllers\PerusahaanController::class, 'tambahloker'])->name('perusahaan.tambahloker');
    Route::post('/perusahaan/tambah-loker', [PerusahaanController::class, 'tambahloker'])->name('perusahaan.tambahloker');
    Route::get('/profilePerusahaan', [\App\Http\Controllers\PerusahaanController::class, 'profilePerusahaan'])->name('profilePerusahaan');
});

// Route::prefix('auth')->group(function () {
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// });

// Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HalamanController::class, 'dashboard'])->name('dashboard');
});

Route::get('/dashboard', [App\Http\Controllers\HalamanController::class, 'dashboard'])->name('dashboard');
