<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleCam as BaseChScaleCam;

class ChScaleCam extends BaseChScaleCam
{
  protected $fillable = [
    'mind_title',
    'mind_value',
    'mind_detail',
    'attention_title',
    'attention_value',
    'attention_detail',
    'thought_title',
    'thought_value',
    'thought_detail',
    'awareness_title',
    'awareness_value',
    'awareness_detail',
    'result',
    'type_record_id',
    'ch_record_id',
  ];
}
