<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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

route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
route::get('/admin/create',[AdminController::class,'create'])->name('admin.create');
Route::post('/admin/save',[AdminController::class,'save'])->name('admin.save');
Route::get('/admin/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
Route::put('/admin/update/{id}',[AdminController::class,'update'])->name('admin.update');
Route::get('/admin/delete/{id}',[AdminController::class,'delete'])->name('admin.delete');

require __DIR__.'/auth.php';
