<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\InputMaterialsUsedTl as BaseInputMaterialsUsedTl;

class InputMaterialsUsedTl extends BaseInputMaterialsUsedTl
{
  protected $fillable = [
    'biosecurity_elements',
    'didactic_materials',
    'liquid_food',
    'stationery',
    'type_record_id',
    'ch_record_id',
  ];
}
