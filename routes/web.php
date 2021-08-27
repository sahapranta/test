<?php

use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ElectionController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\VoterController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\VoterLoginController;
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


Route::prefix('admin')->group(function () {

    Route::middleware(['guest:web'])->group(function(){
        Route::get('login',[AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('authenticate',[AdminLoginController::class, 'authenticate'])->name('authenticate');
    });

    Route::middleware(['auth:web',])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
        Route::resource('category', CategoryController::class);
        Route::resource('voter', VoterController::class);
        Route::resource('candidate', CandidateController::class);
        Route::get('election', [ElectionController::class, 'index'])->name('election.index');
        Route::post('election', [ElectionController::class, 'startElection'])->name('election.store');
        Route::post('endelection', [ElectionController::class, 'stopElection'])->name('election.destroy');
        Route::post('logout',[AdminLoginController::class, 'logout'])->name('logout');
    });
});

Route::prefix('voter')->group(function(){

    Route::middleware(['guest:voter'])->group(function(){
        Route::view('/login', 'voter.auth.login')->name('voterLogin');
        Route::post('/authenticate', [VoterLoginController::class, 'voterAuthenticate'])->name('voterAuthenticate');
    });
});

Route::middleware(['auth:voter'])->group(function(){
    Route::post('/logout', [VoterLoginController::class, 'voterLogout'])->name('voterLogout');
    Route::get('/', [ResultController::class, 'getElections'])->name('homepage');
    Route::post('/vote', [ResultController::class, 'insertVote'])->name('vote');
    Route::get('/home', [VoterController::class, 'show'])->name('voterhome');
});