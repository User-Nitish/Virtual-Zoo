<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'name', 'category_id', 'habitat', 'food_type', 'lifespan', 'description', 'image',
        'health_status', 'dietary_needs', 'last_checkup', 'next_checkup'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
