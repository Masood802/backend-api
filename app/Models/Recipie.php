<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'instruction',
        'picture',
        'category',
        'ingredients',
        'link'   
    ];
}
