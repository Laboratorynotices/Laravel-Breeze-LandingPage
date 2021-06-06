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

class LandingPageController extends Controller
{
	public function view() {
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

		// Считываем все данные из таблицы "Employee".
		$exercises = Exercise::all();

		return view('main')
			// пересылаем переменные в вид
			->with('services', $services)
			->with('about', $about)
			->with('amenities', $amenities)
			->with('portfolios', $portfolios)
			->with('portfolioFilters', $portfolioFilters)
			->with('employees', $employees)
			->with('exercises', $exercises);
	}
}
