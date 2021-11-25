<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['time', 'class', 'description', 'price'];

	use HasFactory;
}
