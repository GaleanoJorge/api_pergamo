<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChAssCough as BaseChAssCough;

class ChAssCough extends BaseChAssCough
{
  protected $fillable = [
    'name',
    'type_record_id',
    'ch_record_id',
  ];
}
