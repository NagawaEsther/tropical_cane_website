<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juice extends Model
{
    use HasFactory;

    // The fillable fields matching the migration columns
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    // Optionally cast the price to float for safety
    protected $casts = [
        'price' => 'float',
    ];
}
