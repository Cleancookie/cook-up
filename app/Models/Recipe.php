<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public const SOURCE_GOUSTO = 1;

    public $guarded = []; // todo: explicitly choose fillable instead
}
