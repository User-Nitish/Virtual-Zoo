<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'name', 'category_id', 'habitat', 'food_type', 'lifespan', 'description', 'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
