<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleFac as BaseChScaleFac;

class ChScaleFac extends BaseChScaleFac
{
  protected $fillable = [
    'level',
    'definition',
    'type_record_id',
    'ch_record_id',
  ];
}
