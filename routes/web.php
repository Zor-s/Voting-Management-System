<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ballotController;
use App\Http\Controllers\candidateController;
use App\Http\Controllers\electionController;
use App\Http\Controllers\feedbackController;
use App\Http\Controllers\positionController;
use App\Http\Controllers\voterController;
use App\Models\position;
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
Route::post('/login-admin', [adminController::class, 'loginAdmin']);
Route::post('/add-election', [electionController::class, 'addElection']);
Route::post('/delete-election', [electionController::class, 'deleteElection']);
Route::post('/add-candidate', [candidateController::class, 'addCandidate']);
Route::post('/edit-election', [electionController::class, 'editElection']);
Route::post('/delete-candidate', [candidateController::class, 'deleteCandidate']);
Route::post('/delete-position', [positionController::class, 'deletePosition']);
Route::post('/vote', [ballotController::class, 'castVote']);
Route::post('/feedback', [feedbackController::class, 'submitFeedback']);
Route::post('/forgot-password', [adminController::class, 'forgotPassword']);


Route::post('/logout',  function () {
    session()->flush();

    return redirect('/');
});

Route::post('/logout-admin',  function () {
    session()->flush();

    return redirect('/admin');
});

