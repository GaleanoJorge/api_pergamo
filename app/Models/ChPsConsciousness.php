<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsConsciousness as BaseChPsConsciousness;

class ChPsConsciousness extends BaseChPsConsciousness
{
  protected $fillable = [
    'watch',
    'hypervigilant',
    'obtundation',
    'confusion',
    'delirium',
    'oneiroid',
    'twilight',
    'stupor',
    'shallow',
    'deep',
    'appearance',
    'attitude',
    'type_record_id',
    'ch_record_id'
  ];
}
