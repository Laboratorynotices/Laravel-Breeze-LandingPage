<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PortfolioFilter;

class PortfolioFilterSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Создадим три фильтра, а к каждому по три портфолио
		PortfolioFilter::factory()
			->count(3)
			->hasPortfolios(3)
			->create();
	}
}
