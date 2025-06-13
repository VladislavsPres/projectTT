<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Models\User;
use App\Models\Photo;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard', function () {
    $usersCount  = User::count();
    $photosCount = Photo::count();
    return view('dashboard', compact('usersCount','photosCount'));
})
->middleware(['auth','verified'])
->name('dashboard');


Route::resource('user', UserController::class);
Route::resource('photos', \App\Http\Controllers\PhotoController::class);
Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
Route::get('/photos/{photo}', [PhotoController::class, 'show'])->name('photos.show');
Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
Route::put('/photos/{photo}', [PhotoController::class, 'update'])->name('photos.update');
Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
require __DIR__.'/auth.php';
