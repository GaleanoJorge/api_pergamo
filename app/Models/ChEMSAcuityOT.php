<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEMSAcuityOT as BaseChEMSAcuityOT;

class ChEMSAcuityOT extends BaseChEMSAcuityOT
{
  protected $fillable = [
    'follow_up',
    'object_identify',
    'figures',
    'color_design',
    'categorization',
    'special_relation',

    'type_record_id',
    'ch_record_id',

  ];
}
