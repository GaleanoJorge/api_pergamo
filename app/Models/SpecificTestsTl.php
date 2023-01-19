<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\SpecificTestsTl as BaseSpecificTestsTl;

class SpecificTestsTl extends BaseSpecificTestsTl
{
  protected $fillable = [
    'hamilton_scale',
    'boston_test',
    'termal_merril',
    'prolec_plon',
    'ped_guss',
    'vhi_grbas',
    'pemo_speech',
    'type_record_id',
    'ch_record_id',
  ];
}
