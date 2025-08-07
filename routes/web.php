<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingController;
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

// Route::get('/landing', function () {
//     return view('landing');
// });
Route::get('/landing', [LandingController::class, 'index'])->name('landing');


Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::get('/register', [UserController::class, 'register_index'])->name('register');

Route::post('/logout', [UserController::class, 'logout'])->name('logout.post');

Route::get('/admin/addberita', [BeritaController::class, 'ShowAddFrom'])->name('form.addberita');
Route::post('/admin/post-berita', [BeritaController::class, 'store'])->name('addberita.store');
Route::put('/admin/update-berita/{id}', [BeritaController::class, 'update'])->name('addberita.update');
Route::delete('admin/delete-berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

// Route::get('/dashboard', [ArtikelController::class, 'index'])->name('dashboard');

// Route::get('/dashboard', [ArtikelController::class, 'index'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [ArtikelController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/kelola-berita', [ArtikelController::class, 'artikel'])->name('admin.artikel');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [ArtikelController::class, 'userDashboard'])->name('user.dashboard');
});

// Route::get('/dashboard', function () {
//     return view('admin.index');
// });