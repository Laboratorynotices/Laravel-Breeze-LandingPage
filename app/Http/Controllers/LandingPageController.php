<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\AboutBlock;
use App\Models\Amenity;
use App\Models\Portfolio;

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

		return view('main')
			// пересылаем переменные в вид
			->with('services', $services)
			->with('about', $about)
			->with('amenities', $amenities)
			->with('portfolios', $portfolios);
	}
}
