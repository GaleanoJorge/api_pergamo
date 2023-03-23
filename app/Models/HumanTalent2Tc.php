<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\HumanTalent2Tc as BaseHumanTalent2Tc;

class HumanTalent2Tc extends BaseHumanTalent2Tc
{
  protected $fillable = [
    'full_name',
    'identification',
    'document_type',
    'gender',
    'age',
    'honorary',
    'type_of_contract',
    'type_of_job',
    'ambit',
    'cost_center',
    'cost_center_code',
    'position',
    'area',
    'month',
    'year',
  ];
}
