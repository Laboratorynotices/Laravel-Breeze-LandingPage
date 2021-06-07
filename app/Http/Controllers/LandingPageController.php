<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\AboutBlock;
use App\Models\Amenity;
use App\Models\Portfolio;
use App\Models\PortfolioFilter;
use App\Models\Employee;
use App\Models\Exercise;
use App\Models\Testimonial;
use Mail;

class LandingPageController extends Controller
{
	/**
	 * Считывает данные из базы данных и вызывает вид страницы приземления.
	 */
	public function view($data = array()) {
		// Считываем все данные из таблицы "Сервисы".
		$services = Service::all();

		// Считываем все данные из таблицы "AboutBlock".
		$about = AboutBlock::all();

		// Считываем все данные из таблицы "Удобства".
		$amenities = Amenity::all();

		// Считываем все данные из таблицы "Portfolio".
		$portfolios = Portfolio::all();

		// Считываем все данные из таблицы "Portfolio".
		$portfolioFilters = PortfolioFilter::all();

		// Считываем все данные из таблицы "Employee".
		$employees = Employee::all();

		// Считываем все данные из таблицы "Занятия".
		$exercises = Exercise::all();

		// Считываем все данные из таблицы "Отзывы".
		$testimonials = Testimonial::all();

		return view('main', $data)
			// пересылаем переменные в вид
			->with('services', $services)
			->with('about', $about)
			->with('amenities', $amenities)
			->with('portfolios', $portfolios)
			->with('portfolioFilters', $portfolioFilters)
			->with('employees', $employees)
			->with('exercises', $exercises)
			->with('testimonials', $testimonials);
	}

	/**
	 * Обрабатывает данные от формы, а потом передаёт управление в обычный метод.
	 */
	public function contact(Request $request) {
		/*
		* Валидация данных, полученных из формы.
		* Если валидация не проходится, то возвращается к прошлой странице с формой.
		*/
		$result = $this->validate($request, [
			'name' => 'required|max:255',
			'email' => 'required|email',
			'message' => 'required|min:5'
		]);

		/*
		* Отправка почты
		*/
		Mail::send(
			'layouts\mail',
			['data'=>$result],
			function($message) use ($result) {
				$mail_admin = $result['email']; //env('MAIL_ADMIN');
				$message->from($result['email'], $result['name']);
				$message->to($mail_admin)->subject('Question');
			}
		);

		// Собираем данные, чтобы передать их в шаблон
		$data = array(
			'name' => $result['name'],
			'email' => $result['email'],
			'message' => $result['message'],
			'status' => ($result) ? 'Email is send' : ''
		);

		// Передаём данные в метод для отображения страницы по умолчанию
		return $this->view($data);
	}

}
