<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\SwallowingDisordersTl as BaseSwallowingDisordersTl;

class SwallowingDisordersTl extends BaseSwallowingDisordersTl
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
