<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    $exitCode = Artisan::call('storage:link', [] );
    echo $exitCode;
});

Route::get('/migration', function () {
    Artisan::call('migrate');
    $exitCode = Artisan::call('migrate', [] );
    echo $exitCode;
});

Route::get('/admin:install', function () {
    Artisan::call('admin:install');
    $exitCode = Artisan::call('admin:install', [] );
    echo $exitCode;
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
