<?php

use Illuminate\Support\Facades\Route;

// Основной контроллер
use App\Http\Controllers\LandingPageController;


use App\Http\Controllers\AboutBlockController;
use App\Models\AboutBlock;
use App\Http\Controllers\AmenityController;
use App\Models\Amenity;
use App\Http\Controllers\PortfolioFilterController;
use App\Models\PortfolioFilter;
use App\Http\Controllers\PortfolioController;
use App\Models\Portfolio;
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
	Route::prefix('service')
		->name('service.')
		->group(function () {

		// Список удобств
		Route::get('/',
			[ServiceController::class, 'index']
		)->name('index');

		// Форма для редактирования записи
		Route::get('/edit/{service}',
			// указание на контроллер и метод
			[ServiceController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('service')
		// наименование маршрута
		->name('edit');

		// Обработка данных, полученных от формы
		Route::post('/update/{service}',
			// указание на контроллер и метод
			[ServiceController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('service')
		// наименование маршрута
		->name('update');
	
		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[ServiceController::class, 'create']
		)
		// наименование маршрута
		->name('create');
	
		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[ServiceController::class, 'store']
		)
		// наименование маршрута
		->name('store');
	
		// Удаление записи
		Route::get('/destroy/{service}',
			// указание на контроллер и метод
			[ServiceController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('service')
		// наименование маршрута
		->name('destroy');
	});

	// Добавляем префикс 'about'. Блок "о нас".
	Route::prefix('about')
		->name('aboutBlock.')
		->group(function () {
	
		// Список удобств
		Route::get('/',
			[AboutBlockController::class, 'index']
		)->name('index');
	
		// Форма для редактирования записи
		Route::get('/edit/{aboutBlock}',
			// указание на контроллер и метод
			[AboutBlockController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('aboutBlock')
		// наименование маршрута
		->name('edit');
	
		// Обработка данных, полученных от формы
		Route::post('/update/{aboutBlock}',
			// указание на контроллер и метод
			[AboutBlockController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('aboutBlock')
		// наименование маршрута
		->name('update');
	
		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[AboutBlockController::class, 'create']
		)
		// наименование маршрута
		->name('create');
	
		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[AboutBlockController::class, 'store']
		)
		// наименование маршрута
		->name('store');
	
		// Удаление записи
		Route::get('/destroy/{aboutBlock}',
			// указание на контроллер и метод
			[AboutBlockController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('aboutBlock')
		// наименование маршрута
		->name('destroy');
	});

	// Добавляем префикс 'amenities'. Блок с занятиями.
	Route::prefix('amenities')
		->name('amenity.')
		->group(function () {

		// Список удобств
		Route::get('/',
			[AmenityController::class, 'index']
		)->name('index');

		// Форма для редактирования записи
		Route::get('/edit/{amenity}',
			// указание на контроллер и метод
			[AmenityController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('amenity')
		// наименование маршрута
		->name('edit');

		// Обработка данных, полученных от формы
		Route::post('/update/{amenity}',
			// указание на контроллер и метод
			[AmenityController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('amenity')
		// наименование маршрута
		->name('update');

		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[AmenityController::class, 'create']
		)
		// наименование маршрута
		->name('create');

		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[AmenityController::class, 'store']
		)
		// наименование маршрута
		->name('store');

		// Удаление записи
		Route::get('/destroy/{amenity}',
			// указание на контроллер и метод
			[AmenityController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('amenity')
		// наименование маршрута
		->name('destroy');
	});

	// Добавляем префикс 'portfolio/filter'. Блок с группами портфолио.
	Route::prefix('portfolio/filter')
		->name('portfolio.filter.')
		->group(function () {

		// Список удобств
		Route::get('/',
			[PortfolioFilterController::class, 'index']
		)->name('index');

		// Форма для редактирования записи
		Route::get('/edit/{portfolioFilter}',
			// указание на контроллер и метод
			[PortfolioFilterController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('portfolioFilter')
		// наименование маршрута
		->name('edit');

		// Обработка данных, полученных от формы
		Route::post('/update/{portfolioFilter}',
			// указание на контроллер и метод
			[PortfolioFilterController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('portfolioFilter')
		// наименование маршрута
		->name('update');

		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[PortfolioFilterController::class, 'create']
		)
		// наименование маршрута
		->name('create');

		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[PortfolioFilterController::class, 'store']
		)
		// наименование маршрута
		->name('store');

		// Удаление записи
		Route::get('/destroy/{portfolioFilter}',
			// указание на контроллер и метод
			[PortfolioFilterController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('portfolioFilter')
		// наименование маршрута
		->name('destroy');
	});

	// Блок с портфолио (фотографиями)
	Route::prefix('portfolio')
		->name('portfolio.')
		->group(function () {

		// Список удобств
		Route::get('/',
			[PortfolioController::class, 'index']
		)->name('index');

		// Форма для редактирования записи
		Route::get('/edit/{portfolio}',
			// указание на контроллер и метод
			[PortfolioController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('portfolio')
		// наименование маршрута
		->name('edit');

		// Обработка данных, полученных от формы
		Route::post('/update/{portfolio}',
			// указание на контроллер и метод
			[PortfolioController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('portfolio')
		// наименование маршрута
		->name('update');

		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[PortfolioController::class, 'create']
		)
		// наименование маршрута
		->name('create');

		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[PortfolioController::class, 'store']
		)
		// наименование маршрута
		->name('store');

		// Удаление записи
		Route::get('/destroy/{portfolio}',
			// указание на контроллер и метод
			[PortfolioController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('portfolio')
		// наименование маршрута
		->name('destroy');
	});

	// Добавляем префикс 'employees'. Блок с сотрудниками.
	Route::prefix('employees')
		->name('employee.')
		->group(function () {

		// Список удобств
		Route::get('/',
			[EmployeeController::class, 'index']
		)->name('index');

		// Форма для редактирования записи
		Route::get('/edit/{employee}',
			// указание на контроллер и метод
			[EmployeeController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('employee')
		// наименование маршрута
		->name('edit');

		// Обработка данных, полученных от формы
		Route::post('/update/{employee}',
			// указание на контроллер и метод
			[EmployeeController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('employee')
		// наименование маршрута
		->name('update');

		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[EmployeeController::class, 'create']
		)
		// наименование маршрута
		->name('create');

		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[EmployeeController::class, 'store']
		)
		// наименование маршрута
		->name('store');

		// Удаление записи
		Route::get('/destroy/{employee}',
			// указание на контроллер и метод
			[EmployeeController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('employee')
		// наименование маршрута
		->name('destroy');
	});

	// Добавляем префикс 'exercises'. Блок с удобствами.
	Route::prefix('exercises')
		->name('exercise.')
		->group(function () {

		// Список удобств
		Route::get('/',
			[ExerciseController::class, 'index']
		)->name('index');

		// Форма для редактирования записи
		Route::get('/edit/{exercise}',
			// указание на контроллер и метод
			[ExerciseController::class, 'edit']
		)
		// фильтр по входящему параметру
		->whereNumber('exercise')
		// наименование маршрута
		->name('edit');

		// Обработка данных, полученных от формы
		Route::post('/update/{exercise}',
			// указание на контроллер и метод
			[ExerciseController::class, 'update']
		)
		// фильтр по входящему параметру
		->whereNumber('exercise')
		// наименование маршрута
		->name('update');

		// Форма для создания новой записи
		Route::get('/create',
			// указание на контроллер и метод
			[ExerciseController::class, 'create']
		)
		// наименование маршрута
		->name('create');

		// Обработка данных, полученных от формы создания
		Route::post('/store',
			// указание на контроллер и метод
			[ExerciseController::class, 'store']
		)
		// наименование маршрута
		->name('store');

		// Удаление записи
		Route::get('/destroy/{exercise}',
			// указание на контроллер и метод
			[ExerciseController::class, 'destroy']
		)
		// фильтр по входящему параметру
		->whereNumber('exercise')
		// наименование маршрута
		->name('destroy');
	});

	// Добавляем префикс 'testimonials'. Блок с отзывами.
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
