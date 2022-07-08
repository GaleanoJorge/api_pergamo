<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChAssSigns as BaseChAssSigns;

class ChAssSigns extends BaseChAssSigns
{
  protected $fillable = [
    'fluter',
    'distal',
    'widespread',
    'peribucal',
    'periorbitary',
    'none',
    'intercostal',
    'aupraclavicular',
    'type_record_id',
    'ch_record_id',
  ];
}
