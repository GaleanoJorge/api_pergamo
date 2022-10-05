<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsSynthesis as BaseChPsSynthesis;

class ChPsSynthesis extends BaseChPsSynthesis
{
  protected $fillable = [
    'psychomotricity',
    'observations_psy',
    'introspection',
    'observations_in',
    'ch_ps_judgment_id',
    'observations_jud',
    'ch_ps_prospecting_id',
    'observations_pros',
    'ch_ps_intelligence_id',
    'observations_inte',
    'type_record_id',
    'ch_record_id'
  ];
}
