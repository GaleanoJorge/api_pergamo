<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEMSThermalOT as BaseChEMSThermalOT;

class ChEMSThermalOT extends BaseChEMSThermalOT
{
  protected $fillable = [
    'heat',
    'cold',
    
    'type_record_id',
    'ch_record_id',

  ];
}
