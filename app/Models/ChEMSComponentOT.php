<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEMSComponentOT as BaseChEMSComponentOT;

class ChEMSComponentOT extends BaseChEMSComponentOT
{
  protected $fillable = [
    'dynamic_balance',
    'static_balance',
    'observation_component',

    'type_record_id',
    'ch_record_id',

  ];
}
