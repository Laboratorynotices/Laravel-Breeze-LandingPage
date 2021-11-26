<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutBlock extends Model
{
    protected $fillable = ['image', 'title', 'text'];

    use HasFactory;
}
