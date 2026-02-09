<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'image', 'date', 'location', 'is_active'];

    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
    ];
}
