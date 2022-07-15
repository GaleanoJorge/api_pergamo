<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChAp as BaseChAp;

class ChAp extends BaseChAp
{
  protected $fillable = [
    'analisys',
    'plan',
    'type_record_id',
    'ch_record_id',
  ];
}
