<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
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

Route::get('/certificate', function () {
    return view('certificate');
});

Route::get('/register', [RegisterController::class,'create']);
Route::post('/register', [RegisterController::class,'store']);
Route::patch('/update',[RegisterController::class,'update']);