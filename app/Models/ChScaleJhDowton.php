<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleJhDowton as BaseChScaleJhDowton;

class ChScaleJhDowton extends BaseChScaleJhDowton
{
  protected $fillable = [
    'falls',
    'medication',
    'deficiency',
    'mental',
    'wandering',
    'total',
    'risk',
    'type_record_id',
    'ch_record_id',
  ];
}
