<?php

use Illuminate\Support\Facades\Route;

// Основной контроллер
use App\Http\Controllers\LandingPageController;


use App\Http\Controllers\AboutBlockController;
use App\Models\AboutBlock;
use App\Http\Controllers\AmenityController;
use App\Models\Amenity;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use App\Http\Controllers\ExerciseController;
use App\Models\Exercise;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use App\Http\Controllers\TestimonialController;
use App\Models\Testimonial;


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

	// Добавляем префикс 'service'. Блок с сервисами (услугами).
	Route::prefix('service')->group(function () {
	
		// Список удобств
		Route::get('/',
			[ServiceController::class, 'index']
		)->name('service.index');
	
		// Форма для редактирования записи
		Route::get('/edit/{service}',
			// указание на контроллер и метод
			[ServiceController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('service')
		// наименование маршрута
		->name('service.edit');
	
		// Обработка данных, полученных от формы
		Route::post('/update/{service}',
			// указание на контроллер и метод
			[ServiceController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('service')
		// наименование маршрута
		->name('service.update');
	
		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[ServiceController::class, 'create']
		)
		// наименование маршрута
		->name('service.create');
	
		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[ServiceController::class, 'store']
		)
		// наименование маршрута
		->name('service.store');
	
		// Удаление записи
		Route::get('/destroy/{service}',
			// указание на контроллер и метод
			[ServiceController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('service')
		// наименование маршрута
		->name('service.destroy');
	});

	// Добавляем префикс 'about'. Блок "о нас".
	Route::prefix('about')->group(function () {
	
		// Список удобств
		Route::get('/',
			[AboutBlockController::class, 'index']
		)->name('aboutBlock.index');
	
		// Форма для редактирования записи
		Route::get('/edit/{aboutBlock}',
			// указание на контроллер и метод
			[AboutBlockController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('aboutBlock')
		// наименование маршрута
		->name('aboutBlock.edit');
	
		// Обработка данных, полученных от формы
		Route::post('/update/{aboutBlock}',
			// указание на контроллер и метод
			[AboutBlockController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('aboutBlock')
		// наименование маршрута
		->name('aboutBlock.update');
	
		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[AboutBlockController::class, 'create']
		)
		// наименование маршрута
		->name('aboutBlock.create');
	
		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[AboutBlockController::class, 'store']
		)
		// наименование маршрута
		->name('aboutBlock.store');
	
		// Удаление записи
		Route::get('/destroy/{aboutBlock}',
			// указание на контроллер и метод
			[AboutBlockController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('aboutBlock')
		// наименование маршрута
		->name('aboutBlock.destroy');
	});

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


	// Место для блоков портфолио


	// Добавляем префикс 'employees'. Блок с сотрудниками.
	Route::prefix('employees')->group(function () {

		// Список удобств
		Route::get('/',
			[EmployeeController::class, 'index']
		)->name('employee.index');

		// Форма для редактирования записи
		Route::get('/edit/{employee}',
			// указание на контроллер и метод
			[EmployeeController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('employee')
		// наименование маршрута
		->name('employee.edit');

		// Обработка данных, полученных от формы
		Route::post('/update/{employee}',
			// указание на контроллер и метод
			[EmployeeController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('employee')
		// наименование маршрута
		->name('employee.update');

		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[EmployeeController::class, 'create']
		)
		// наименование маршрута
		->name('employee.create');

		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[EmployeeController::class, 'store']
		)
		// наименование маршрута
		->name('employee.store');

		// Удаление записи
		Route::get('/destroy/{employee}',
			// указание на контроллер и метод
			[EmployeeController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('employee')
		// наименование маршрута
		->name('employee.destroy');
	});

	// Добавляем префикс 'exercises'. Блок с удобствами.
	Route::prefix('exercises')->group(function () {

		// Список удобств
		Route::get('/',
			[ExerciseController::class, 'index']
		)->name('exercise.index');

		// Форма для редактирования записи
		Route::get('/edit/{exercise}',
			// указание на контроллер и метод
			[ExerciseController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('exercise')
		// наименование маршрута
		->name('exercise.edit');

		// Обработка данных, полученных от формы
		Route::post('/update/{exercise}',
			// указание на контроллер и метод
			[ExerciseController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('exercise')
		// наименование маршрута
		->name('exercise.update');

		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[ExerciseController::class, 'create']
		)
		// наименование маршрута
		->name('exercise.create');

		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[ExerciseController::class, 'store']
		)
		// наименование маршрута
		->name('exercise.store');

		// Удаление записи
		Route::get('/destroy/{exercise}',
			// указание на контроллер и метод
			[ExerciseController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('exercise')
		// наименование маршрута
		->name('exercise.destroy');
	});

	// Добавляем префикс 'testimonials'. Блок с удобствами.
	Route::prefix('testimonials')
		->name('testimonial.')
		->group(function () {

		// Список удобств
		Route::get('/',
			[TestimonialController::class, 'index']
		)->name('index');

		// Форма для редактирования записи
		Route::get('/edit/{testimonial}',
			// указание на контроллер и метод
			[TestimonialController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('testimonial')
		// наименование маршрута
		->name('edit');

		// Обработка данных, полученных от формы
		Route::post('/update/{testimonial}',
			// указание на контроллер и метод
			[TestimonialController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('testimonial')
		// наименование маршрута
		->name('update');

		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[TestimonialController::class, 'create']
		)
		// наименование маршрута
		->name('create');

		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[TestimonialController::class, 'store']
		)
		// наименование маршрута
		->name('store');

		// Удаление записи
		Route::get('/destroy/{testimonial}',
			// указание на контроллер и метод
			[TestimonialController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('testimonial')
		// наименование маршрута
		->name('destroy');
	});

	// Место для остальных блоков

});

require __DIR__.'/auth.php';
