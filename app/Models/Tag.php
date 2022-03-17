<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $guarded = [];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_ingredient');
    }
}
