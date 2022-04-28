<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleNorton as BaseChScaleNorton;

class ChScaleNorton extends BaseChScaleNorton
{
  protected $fillable = [
    'physical_state',
    'state_mind',
    'mobility',
    'activity',
    'incontinence',
    'total',
    'risk',
    'type_record_id',
    'ch_record_id',
  ];
}
