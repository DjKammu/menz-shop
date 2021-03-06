<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

    if (Auth::user()) { 

         return (new HomeController)->index();

        //return redirect('/home');
    } 
    return view('welcome');
}); 

Route::get('/login',function(){
    return redirect('/');
})->name('login');

Route::get('/register',function(){
    return redirect('/');
});

Route::get('/first-login/{id}',[App\Http\Controllers\Auth\LoginController::class, 'firstLogin'])->name('first.login');


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

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');


Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');


Route::get('/search', [App\Http\Controllers\HomeController::class,'search'])
        ->name('search');

Route::get('/{slug}', [App\Http\Controllers\HomeController::class,'belege'])
        ->name('belege');


Route::get('/download/{id}', [App\Http\Controllers\HomeController::class,'download'])
        ->name('download');

Route::get('/view/{id}', [App\Http\Controllers\HomeController::class,'view'])
        ->name('view');

Route::post('/password/email-kundennummer', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendKundennummerEmail'])->name('password.email-kundennummer');
