<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class, 'about']);
Route::post('/about', [HomeController::class, 'about']);

Route::post('/Youtube', [HomeController::class, 'Youtube']);
Route::get('/Youtube', [HomeController::class, 'Youtube']);


Route::get('/Portfolio', [HomeController::class, 'Portfolio']);
Route::post('/Portfolio', [HomeController::class, 'Portfolio']);
