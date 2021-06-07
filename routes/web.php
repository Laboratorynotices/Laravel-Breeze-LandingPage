<?php

use Illuminate\Support\Facades\Route;

// Основной контроллер
use App\Http\Controllers\LandingPageController;

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

Route::get('/',
	[LandingPageController::class, 'view']
)->name('home');

Route::post('/',
	[LandingPageController::class, 'contact']
)->name('home');


Route::get('/welcome', function () {
	return view('welcome');
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
