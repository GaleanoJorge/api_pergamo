<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEValorationOT as BaseChEValorationOT;

class ChEValorationOT extends BaseChEValorationOT
{
  protected $fillable = [
    'recomendations',
    'ch_diagnosis_id',
    'type_record_id',
    'ch_record_id',
  ];
}
