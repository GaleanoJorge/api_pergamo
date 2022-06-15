<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChAuscultation as BaseChAuscultation;

class ChAuscultation extends BaseChAuscultation
{
  protected $fillable = [
    'murmur',
    'crepits',
    'rales',
    'stridor',
    'pleural',
    'roncus',
    'wheezing',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
