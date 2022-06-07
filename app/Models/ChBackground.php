<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChBackground as BaseChBackground;

class ChBackground extends BaseChBackground
{
  protected $fillable = [
    'ch_type_background_id',
    'revision',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
