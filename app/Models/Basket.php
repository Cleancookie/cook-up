<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    public const BASKET_UPDATED_EVENT = 'basket-updated';

    protected $guarded = [];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class)->withPivot('id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owned_by');
    }

    public function addToBasket(Recipe $recipe)
    {
        $this->recipes()->attach($recipe->id);
    }
}
