<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChOxygenTherapy as BaseChOxygenTherapy;

class ChOxygenTherapy extends BaseChOxygenTherapy
{
  protected $fillable = [
    'revision',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
