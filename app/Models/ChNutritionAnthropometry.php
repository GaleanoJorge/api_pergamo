<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChNutritionAnthropometry as BaseChNutritionAnthropometry;

class ChNutritionAnthropometry extends BaseChNutritionAnthropometry
{
  protected $fillable = [
    'is_functional',
    'weight',
    'size',
    'arm_circunferency',
    'calf_circumference',
    'knee_height',
    'abdominal_perimeter',
    'hip_perimeter',
    'geteratedIMC',
    'classification',
    'estimated_weight',
    'estimated_size',
    'total_energy_expenditure',
    'type_record_id',
    'ch_record_id',
  ];
}
