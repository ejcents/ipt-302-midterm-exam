<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sportbike extends Model
{
    use HasFactory;

    protected $fillable = ['model', 'brand', 'year', 'engine', 'color'];
}
