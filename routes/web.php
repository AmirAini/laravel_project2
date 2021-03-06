<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
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
    return view('welcome');
});

// Route::get('/companies', [CompanyController::class, 'index']);
// Route::any('/company/edit/{id}', [CompanyController::class, 'edit'])
// ->middleware('signed2')
// ->name('company.edit');
Route::post('/company/edit/{id}', [CompanyController::class, 'edit']);

Route::any('/login',[AuthController::class, 'login'])->name('login');
Route::any('/register',[AuthController::class, 'register'])->name('register');
Route::any('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    //
    Route::get('/companies', [CompanyController::class, 'index']);
    Route::any('/company/edit/{id}', [CompanyController::class, 'edit'])
    ->middleware('signed2')
    ->name('company.edit');
});