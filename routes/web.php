<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\EpisodeController;
use Illuminate\Support\Facades\Route;
use Softonic\GraphQL\ClientBuilder;

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

Route::get('/store', [EpisodeController::class, 'store']);
Route::get('/episodes', [EpisodeController::class, 'read'])->name('episodes.read');