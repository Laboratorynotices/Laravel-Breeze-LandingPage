<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;

class LandingPageController extends Controller
{
	public function view() {
		// Считываем все данные из таблицы "Сервисы".
		$services = Service::all();

		return view('main')
			// пересылаем переменные в вид
			->with('services', $services);
	}
}
