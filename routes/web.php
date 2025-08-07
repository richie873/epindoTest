<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\InvoiceController;


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
    return view('welcome');
});

// incoming
Route::get('/incoming', [IncomingController::class, 'index'])->name('incoming.index');
Route::get('/incoming/create', [IncomingController::class, 'create'])->name('incoming.create');
Route::post('/incoming', [IncomingController::class, 'store'])->name('incoming.store');
Route::get('/incoming/{id}/edit', [IncomingController::class, 'edit'])->name('incoming.edit');
Route::put('/incoming/{id}', [IncomingController::class, 'update'])->name('incoming.update');
Route::delete('/incoming/{id}', [IncomingController::class, 'destroy'])->name('incoming.destroy');

// produksi
Route::get('/produksi', 'ProduksiController@index')->name('produksi.index');
Route::get('/produksi/create', 'ProduksiController@create')->name('produksi.create');
Route::post('/produksi', 'ProduksiController@store')->name('produksi.store');
Route::get('/produksi/{id}/edit', 'ProduksiController@edit')->name('produksi.edit');
Route::put('/produksi/{id}', 'ProduksiController@update')->name('produksi.update');
Route::delete('/produksi/{id}', 'ProduksiController@destroy')->name('produksi.destroy');

// invoice
Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
Route::post('/invoice', [InvoiceController::class, 'store'])->name('invoice.store');
Route::get('/invoice/{id}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
Route::put('/invoice/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
Route::delete('/invoice/{id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
Route::get('/invoice/{id}/download', [InvoiceController::class, 'download'])->name('invoice.download');