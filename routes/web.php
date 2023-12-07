<?php

use App\Http\Controllers\voterController;
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
    return view('login');
});

Route::get('/signup-page', function () {
    return view('signup');
});

Route::get('/admin', function () {
    return view('admin');
});


Route::post('/signup', [voterController::class, 'signup']);
Route::post('/login', [voterController::class, 'login']);

