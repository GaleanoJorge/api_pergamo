<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\OrofacialTl as BaseOrofacialTl;

class OrofacialTl extends BaseOrofacialTl
{
  protected $fillable = [
    'right_hermiface_symmetry',
    'right_hermiface_tone',
    'right_hermiface_sensitivity',
    'left_hermiface_symmetry',
    'left_hermiface_tone',
    'left_hermiface_sensitivity',
    'type_record_id',
    'ch_record_id',
  ];
}
