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

Route::get('/', function () {
    return view('School');
});

Route::get('/ItemAdd', function () {
    return view('Itemadd');
});

Route::get('/CatAdd', function () {
    return view('catadd');
});

Route::post('/Addsuppliers', [App\Http\Controllers\AddSupplier::class, 'addsup']);

Route::post('/Catadd', [App\Http\Controllers\CatAddController::class, 'addcat']);

Route::post('/addorder', [App\Http\Controllers\Ordercontroller::class, 'addorder']);