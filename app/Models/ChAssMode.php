<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChAssMode as BaseChAssMode;

class ChAssMode extends BaseChAssMode
{
  protected $fillable = [
    'name',
    'type_record_id',
    'ch_record_id',
  ];
}
