<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEMSTestOT as BaseChEMSTestOT;

class ChEMSTestOT extends BaseChEMSTestOT
{
  protected $fillable = [
    'appearance',
    'consent',
    'Attention',
    'humor',
    'language',
    'sensory_perception',
    'grade',
    'contents',
    'orientation',
    'sleep',
    'memory',

    'type_record_id',
    'ch_record_id',

  ];
}
