<?php

use App\Http\Controllers\UrlShortenerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/encode', [UrlShortenerController::class, 'encode']);
Route::post('/decode', [UrlShortenerController::class, 'decode']);

