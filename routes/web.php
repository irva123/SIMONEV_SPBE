<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\AspekController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('/periode', PeriodeController::class)->middleware('auth');
Route::resource('/progress', ProgressController::class)->middleware('auth');
Route::resource('/domain', DomainController::class);
Route::resource('/aspek', AspekController::class);
Route::resource('/indikator', IndikatorController::class);
Route::resource('/user', UserController::class);
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');
