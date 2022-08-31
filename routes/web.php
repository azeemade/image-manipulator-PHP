<?php

use App\Http\Controllers\ImageController;
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

Route::get('/', [ImageController::class, 'index'])->name('overview');

Route::post('/image/upload', [ImageController::class, 'convert'])->name('upload');

Route::get('/image/download', [ImageController::class, 'download'])->name('download');
