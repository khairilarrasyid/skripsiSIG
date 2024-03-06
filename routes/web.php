<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/wisata', [App\Http\Controllers\HomeController::class, 'wisata'])->name('wisata');
Route::get('/peta', [App\Http\Controllers\HomeController::class, 'peta'])->name('peta');
Route::get('/fetch-peta', [App\Http\Controllers\HomeController::class, 'fetchPeta'])->name('peta.api');
Route::get('/peta/detail/{destination}', [App\Http\Controllers\HomeController::class, 'petaDetail'])->name('peta.detail');
Route::get('/tour-guide', [App\Http\Controllers\HomeController::class, 'tourGuide'])->name('tour-guide');
Route::get('/tour-guide/detail/{tour_guide}', [App\Http\Controllers\HomeController::class, 'tourGuideDetail'])->name('tour-guide.detail');
Route::get('/penginapan', [App\Http\Controllers\HomeController::class, 'penginapan'])->name('penginapan');
Route::get('/penginapan/detail/{destination}', [App\Http\Controllers\HomeController::class, 'penginapanDetail'])->name('penginapan.detail');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('destinations', App\Http\Controllers\Admin\DestinationController::class);
    Route::get('destinations/{destination}/galeri', [App\Http\Controllers\Admin\DestinationController::class, 'galeri'])->name('destinations.galeri');

    Route::get('/penginapan', [App\Http\Controllers\Admin\DestinationController::class,'penginapanIndex'])->name('penginapan.index');
    Route::get('/penginapan/{destination}/edit', [App\Http\Controllers\Admin\DestinationController::class,'penginapanEdit'])->name('penginapan.edit');
    Route::get('/penginapan/create', [App\Http\Controllers\Admin\DestinationController::class,'penginapanCreate'])->name('penginapan.create');
    Route::post('/penginapan', [App\Http\Controllers\Admin\DestinationController::class,'penginapanStore'])->name('penginapan.store');
    Route::put('/penginapan/{destination}', [App\Http\Controllers\Admin\DestinationController::class,'penginapanUpdate'])->name('penginapan.update');
    Route::delete('/penginapan/{destination}', [App\Http\Controllers\Admin\DestinationController::class,'penginapanDelete'])->name('penginapan.delete');
    Route::get('/penginapan/{destination}/galeri', [App\Http\Controllers\Admin\DestinationController::class, 'penginapanGaleri'])->name('penginapan.galeri');

    Route::resource('/tour-guides', App\Http\Controllers\Admin\TourGuideController::class);


    Route::resource('gallerys', App\Http\Controllers\Admin\GalleryController::class);    
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);

    Route::get('/profile', [App\Http\Controllers\Admin\UserController::class, 'profile'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\Admin\UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/change-password', [App\Http\Controllers\Admin\UserController::class, 'updatePassword'])->name('profile.password');
});
