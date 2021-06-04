<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\AboutBlock;

class LandingPageController extends Controller
{
	public function view() {
		// Считываем все данные из таблицы "Сервисы".
		$services = Service::all();

		// Считываем все данные из таблицы "AboutBlock".
		$about = AboutBlock::all();

		return view('main')
			// пересылаем переменные в вид
			->with('services', $services)
			->with('about', $about);
	}
}
