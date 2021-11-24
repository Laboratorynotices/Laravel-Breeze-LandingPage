<?php

use Illuminate\Support\Facades\Route;

// Основной контроллер
use App\Http\Controllers\LandingPageController;


use App\Http\Controllers\AmenityController;
use App\Models\Amenity;


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

// Добавляем префикс "admin/" к этим адресам
Route::prefix('admin')
	// пользователи должны быть авторизованными
	->middleware(['auth'])
	// объединяем всё в группу
	->group(function () {

	// Место для блоков услуг и "о нас"

	// Добавляем префикс 'amenities'. Блок с удобствами.
	Route::prefix('amenities')->group(function () {

		// Список удобств
		Route::get('/',
			[AmenityController::class, 'index']
		)->name('amenity.index');

		// Форма для редактирования записи
		Route::get('/edit/{amenity}',
			// указание на контроллер и метод
			[AmenityController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('amenity')
		// наименование маршрута
		->name('amenity.edit');

		// Обработка данных, полученных от формы
		Route::post('/update/{amenity}',
			// указание на контроллер и метод
			[AmenityController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('amenity')
		// наименование маршрута
		->name('amenity.update');

		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[AmenityController::class, 'create']
		)
		// наименование маршрута
		->name('amenity.create');

		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[AmenityController::class, 'store']
		)
		// наименование маршрута
		->name('amenity.store');

		// Удаление записи
		Route::get('/destroy/{amenity}',
			// указание на контроллер и метод
			[AmenityController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('amenity')
		// наименование маршрута
		->name('amenity.destroy');
	});

	// Место для остальных блоков

});

require __DIR__.'/auth.php';
