<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleGlasgow as BaseChScaleGlasgow;

class ChScaleGlasgow extends BaseChScaleGlasgow
{
  protected $fillable = [
    'ocular',
    'verbal',
    'motor',
    'total',
    'type_record_id',
    'ch_record_id',
  ];
}
