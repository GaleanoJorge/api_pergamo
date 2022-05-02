<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleCam as BaseChScaleCam;

class ChScaleCam extends BaseChScaleCam
{
  protected $fillable = [
    'state_mind',
    'attention',
    'thought',
    'awareness',
    'type_record_id',
    'ch_record_id',
  ];
}
