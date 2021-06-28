<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/test-email', [App\Http\Controllers\MailController::class, 'sendEmail'])->name('test-email');
Route::get('/verify', [App\Http\Controllers\MailController::class, 'verify'])->name('verify');
Route::get('/comic', [App\Http\Controllers\GmailController::class, 'comic'])->name('comic');