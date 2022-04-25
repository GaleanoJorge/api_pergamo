<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChDietsEvo as BaseChDietsEvo;

class ChDietsEvo extends BaseChDietsEvo
{
  protected $fillable = [
    'diet_component_id',
    'diet_consistency_id',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}