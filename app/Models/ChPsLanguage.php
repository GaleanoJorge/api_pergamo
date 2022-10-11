<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsLanguage as BaseChPsLanguage;

class ChPsLanguage extends BaseChPsLanguage
{
  protected $fillable = [
    'ch_ps_expressive_id',
    'ch_ps_comprehensive_id',
    'ch_ps_others_id',
    'ch_ps_paraphasias_id',
    'observations',
    'type_record_id',
    'ch_record_id'
  ];
}
