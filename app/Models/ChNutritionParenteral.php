<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChNutritionParenteral as BaseChNutritionParenteral;

class ChNutritionParenteral extends BaseChNutritionParenteral
{
  protected $fillable = [
    'protein_contributions',
    'carbohydrate_contribution',
    'lipid_contribution',
    'amino_acid_volume',
    'ce_se',
    'dextrose_volume',
    'lipid_volume',
    'total_grams_of_protein',
    'grams_of_nitrogen',
    'total_carbohydrates',
    'total_grams_of_lipids',
    'total_amino_acid_volume',
    'total_dextrose_volume',
    'total_lipid_volume',
    'total_calories',
  ];
}
