<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = ['icon', 'title', 'description'];

    use HasFactory;
}
