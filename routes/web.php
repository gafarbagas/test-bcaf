<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubmissionController;

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

Route::post('/authenticate',[LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');
Route::get('/login',[LoginController::class, 'login'])->name('login');

Route::middleware(['auth','checkrole: 1'])->group(function () {
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'pengajuan', 'as' => 'sub.'], function(){
        Route::put('/{id}',[SubmissionController::class, 'approval'])->name('approval');
        Route::post('/{id}',[SubmissionController::class, 'update'])->name('update');
        Route::post('/',[SubmissionController::class, 'store'])->name('store');
        Route::get('/{id}/hapus',[SubmissionController::class, 'delete'])->name('delete');
        Route::get('/{id}/edit',[SubmissionController::class, 'edit'])->name('edit');
        Route::get('/{id}/lihat',[SubmissionController::class, 'show'])->name('show');
        Route::get('/tambah',[SubmissionController::class, 'create'])->name('create');
        Route::get('/',[SubmissionController::class, 'index'])->name('index');
    });
});
