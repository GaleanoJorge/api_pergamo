<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChNutritionGastrointestinal as BaseChNutritionGastrointestinal;

class ChNutritionGastrointestinal extends BaseChNutritionGastrointestinal
{
  protected $fillable = [
    'bowel_habit',
    'vomit',
    'amount_of_vomit',
    'nausea',
    'observations',
  ];
}
