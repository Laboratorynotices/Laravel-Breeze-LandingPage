<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
	use HasFactory;

	/**
	 * Отношение к одному фильтру
	 */
	public function filter ()
	{
		return $this->hasOne(PortfolioFilter::class, 'id', 'portfolio_filter_id');
	}
}
