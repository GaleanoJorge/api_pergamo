<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChScaleNorton as BaseChScaleNorton;

class ChScaleNorton extends BaseChScaleNorton
{
  protected $fillable = [
    'physical_title',
    'physical_value',
    'physical_detail',
    'mind_title',
    'mind_value',
    'mind_detail',
    'mobility_title',
    'mobility_value',
    'mobility_detail',
    'activity_title',
    'activity_value',
    'activity_detail',
    'incontinence_title',
    'incontinence_value',
    'incontinence_detail',
    'total',
    'risk',
    'type_record_id',
    'ch_record_id',
  ];
}
