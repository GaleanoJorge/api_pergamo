<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleKarnofsky as BaseChScaleKarnofsky;

class ChScaleKarnofsky extends BaseChScaleKarnofsky
{
  protected $fillable = [
    'score_title',
    'score_value',
    'type_record_id',
    'ch_record_id',
  ];
}
