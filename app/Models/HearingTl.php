<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\HearingTl as BaseHearingTl;

class HearingTl extends BaseHearingTl
{
  protected $fillable = [
    'external_ear',
    'middle_ear',
    'inner_ear',
    'observations',
    'type_record_id',
    'ch_record_id',
  ];
}
