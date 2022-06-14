<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScalePps as BaseChScalePps;

class ChScalePps extends BaseChScalePps
{
  protected $fillable = [
    'score_title',
    'score_value',
    'type_record_id',
    'ch_record_id',
  ];
}
