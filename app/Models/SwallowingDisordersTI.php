<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\SwallowingDisordersTI as BaseSwallowingDisordersTI;

class SwallowingDisordersTI extends BaseSwallowingDisordersTI
{
  protected $fillable = [
    'solid_dysphagia',
    'clear_liquid_dysphagia',
    'thick_liquid_dysphagia',
    'nasogastric_tube',
    'gastrostomy',
    'nothing_orally',
    'observations',
    'type_record_id',
    'ch_record_id',
  ];
}
