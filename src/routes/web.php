<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

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
Route::get('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'admin']);
});
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/contacts/search', [AuthController::class, 'search']);


Route::get('/', [ContactController::class, 'add']);
Route::post('/', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'create']);
Route::get('/contacts/edit',[ContactController::class, 'edit']);


