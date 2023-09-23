<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\TahapanController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\AspekController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\PenilaianMandiriController;
use App\Http\Controllers\PenilaianEksternalController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/a', function () {
    return view('auth.login');
});

Route::get('/penilaian2', function () {
    return view('tampilan_opd.penilaian2');
});

Auth::routes();

Route::get('getAspek/{id}', function ($id) {
    $aspek = App\Models\AspekModel::where('id_domain',$id)->get();
    return response()->json($aspek);
});

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'index']);

Route::get('reload-captcha', [LoginController::class, 'reloadCaptcha']);
Route::get('filter', [PenilaianMandiriController::class, 'index']);
Route::get('/penilaian/{id}/create', [PenilaianMandiriController::class, 'create']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('/periode', PeriodeController::class)->middleware('auth');
Route::resource('/progress', ProgressController::class)->middleware('auth');
Route::resource('/domain', DomainController::class)->middleware('auth');
Route::resource('/aspek', AspekController::class)->middleware('auth');
Route::resource('/indikator', IndikatorController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');
Route::resource('/opd', OpdController::class)->middleware('auth');
Route::resource('/penilaian', PenilaianMandiriController::class);
Route::resource('/penilaian_eks', PenilaianEksternalController::class);
//Route::get('/penilaian_eks2/{id}', [App\Http\Controllers\PenilaianEksternalController::class, 'index2']);
Route::get('/penilaian_eks2/{id}', [PenilaianEksternalController::class, 'index2'])->name('penilaian_eks2.index2');
Route::get('/penilaian2', [App\Http\Controllers\PenilaianMandiriController::class, 'index2']);
//Route::post('/jawaban2', [PenilaianMandiriController::class, 'jawaban']);
//Route::put('/jawaban/{id}', [PenilaianMandiriController::class, 'jawaban'])->name('jawaban.save');
Route::post('/jawaban', [PenilaianMandiriController::class, 'jawaban'])->name('jawaban.save');
Route::post('/jawaban2', [PenilaianEksternalController::class, 'jawaban2'])->name('jawaban2.save');
Route::delete('/jawaban/{id}', 'JawabanController@destroy')->name('jawaban.destroy');
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');
