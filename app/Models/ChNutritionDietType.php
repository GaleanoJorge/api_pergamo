<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChNutritionDietType as BaseChNutritionDietType;

class ChNutritionDietType extends BaseChNutritionDietType
{
  protected $fillable = [
    'name',
    'ch_nutrition_food_history_id',
  ];
}
