<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    public $guarded = [];

    public function recipes()
    {
        $this->belongsToMany(Recipe::class);
    }
}
