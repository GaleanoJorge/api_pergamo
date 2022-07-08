<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChAuscultation as BaseChAuscultation;

class ChAuscultation extends BaseChAuscultation
{
  protected $fillable = [
    'murmur',
    'obs_murmur',
    'crepits',
    'obs_crepits',
    'rales',
    'obs_rales',
    'stridor',
    'obs_stridor',
    'pleural',
    'obs_pleural',
    'roncus',
    'obs_roncus',
    'wheezing',
    'obs_wheezing',
    'type_record_id',
    'ch_record_id',
  ];
}
