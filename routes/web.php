<?php

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

Auth::routes([
  'register' => true, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...

]);

Route::namespace('App\Http\Controllers')->name('mtsn.')->middleware([])->prefix('mtsn')->group(function () {
  Route::get('/add-pelanggaran', [App\Http\Controllers\PelanggaranController::class, 'create'])->name('addpelanggaran');
  Route::post('/delete-pelanggaran', [App\Http\Controllers\PelanggaranController::class, 'store'])->name('storepelanggaran');
  Route::get('/pelanggaran', [App\Http\Controllers\PelanggaranController::class, 'index'])->name('pelanggaran');

  Route::get('/angket', [App\Http\Controllers\AngketController::class, 'index'])->name('angket');
  Route::get('/angket-kelas7', [App\Http\Controllers\AngketController::class, 'kelas7'])->name('angket-kelas7');
  Route::get('/angket-kelas8', [App\Http\Controllers\AngketController::class, 'kelas8'])->name('angket-kelas8');
  Route::get('/angket-kelas9', [App\Http\Controllers\AngketController::class, 'kelas9'])->name('angket-kelas9');
  Route::post('/angket', [App\Http\Controllers\AngketController::class, 'store'])->name('angket.store');

  Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index'])->name('siswa');
  Route::get('/siswa/add', [App\Http\Controllers\SiswaController::class, 'add'])->name('siswa.add');
  Route::post('/siswa/store', [App\Http\Controllers\SiswaController::class, 'store'])->name('siswa.store');
  Route::get('/siswa/edit/{id}', [App\Http\Controllers\SiswaController::class, 'edit'])->name('siswa.edit');
  Route::put('/siswa/update/{id}', [App\Http\Controllers\SiswaController::class, 'update'])->name('siswa.update');
  Route::get('/siswa/delete/{id}', [App\Http\Controllers\SiswaController::class, 'delete'])->name('siswa.delete');
  
});

Route::get('/', function(){
  return redirect()->route('mtsn.angket');
})->name('/');


