<?php

use Illuminate\Support\Facades\Auth;
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

<<<<<<< HEAD
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
Route::get('/ItemAdd', function () {
    return view('Itemadd');
});

Route::post('/itemsave', [App\Http\Controllers\itemController::class, 'saveitem']);

Route::get('/CatAdd', function () {
    return view('catadd');
});

Route::post('/Addsuppliers', [App\Http\Controllers\AddSupplier::class, 'addsup']);

Route::post('/Catadd', [App\Http\Controllers\CatAddController::class, 'addcat']);

Route::post('/addorder', [App\Http\Controllers\Ordercontroller::class, 'addorder']);
>>>>>>> BAR
