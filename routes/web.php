<?php

use App\Http\Controllers\DownloadCvController;
use App\Http\Controllers\Userprofile;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserProfileController::class, 'index'])->name('index');
Route::get('/user/{id}', [UserProfileController::class, 'view'])->name('user.profile.view');
Route::get('/create', [UserProfileController::class, 'create'])->name('user.profile.create');
Route::post('/store', [UserProfileController::class, 'store'])->name('store');
Route::get('/edit/{id}', [UserProfileController::class, 'edit'])->name('edit');
Route::post('/update', [UserProfileController::class, 'update'])->name('update');
Route::post('/destroy/{id}', [UserProfileController::class, 'destroy'])->name('destroy');
Route::get('/download-cv/{id}',[DownloadCvController::class,'download'])->name('download.cv');