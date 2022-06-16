<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChNutritionInterpretation as BaseChNutritionInterpretation;

class ChNutritionInterpretation extends BaseChNutritionInterpretation
{
  protected $fillable = [
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
