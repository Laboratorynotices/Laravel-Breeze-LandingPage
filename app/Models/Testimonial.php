<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model {
	protected $fillable = ['image', 'name', 'position', 'text'];

	use HasFactory;
}
 