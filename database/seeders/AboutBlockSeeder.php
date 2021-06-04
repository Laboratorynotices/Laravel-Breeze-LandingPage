<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutBlock;

class AboutBlockSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Создадим две записи
		AboutBlock::factory()
			->count(2)
			->create();
	}
}
