<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MontecarloController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\RespondenController;
use App\Http\Controllers\UserController;



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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/montecarlo', [App\Http\Controllers\MontecarloController::class, 'index'])->name('montecarlo.index');



Route::middleware(['auth', 'user-access:responden'])->name('responden.')->prefix('responden')->group(function () {
  
    Route::get('/', [RespondenController::class, 'index'])->name('index');
    Route::get('/data-diri', [RespondenController::class, 'data_diri'])->name('data_diri');
    Route::get('/password', [RespondenController::class, 'password'])->name('password');
    Route::name('kuesioner.')->prefix('kuesioner')->group(function () {
        Route::get('/', [QuestionnaireController::class, 'index'])->name('index');
        Route::post('/add/wbs', [QuestionnaireController::class, 'add_wbs'])->name('add.wbs');
        Route::post('/add/rba', [QuestionnaireController::class, 'add_rba'])->name('add.rba');
    });

});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-access:admin'])->name('admin.')->prefix('admin')->group(function () {
  
    Route::get('/', [AdminController::class, 'index'])->name('index');
});


  
// /*------------------------------------------
// --------------------------------------------
// All Admin Routes List
// --------------------------------------------
// --------------------------------------------*/
// Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
//     Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
// });