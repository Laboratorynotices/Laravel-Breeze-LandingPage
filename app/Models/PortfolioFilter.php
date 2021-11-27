<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioFilter extends Model
{
	use HasFactory;
	
	protected $fillable = ['short_name', 'full_name'];

	/**
	 * Отношение ко многим портфолио
	 */
	public function portfolios ()
	{
		return $this->hasMany(Portfolio::class);
	}
}
