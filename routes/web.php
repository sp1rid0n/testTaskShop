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
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/product/{any}', function () {
    return view('index');
})->where('any', '.*');
        
// Route::get('/any-route/{vue_capture?}', function () {
//     return view('index');
// })->where('vue_capture', '.*');

// Route::get('/{any}', function () {
//     return view('index');
// })->where('any', '.*');