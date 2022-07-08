<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChNutritionFoodHistory as BaseChNutritionFoodHistory;

class ChNutritionFoodHistory extends BaseChNutritionFoodHistory
{
  protected $fillable = [
    'description',
    'is_allergic',
    'allergy',
    'appetite',
    'intake',
    'swallowing',
    'diet_type',
    'parenteral_nutrition',
    'intake_control',
  ];
}
