<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEMSFunPatOT as BaseChEMSFunPatOT;

class ChEMSFunPatOT extends BaseChEMSFunPatOT
{
  protected $fillable = [
    'head_right',
    'head_left',
    'mouth_right',
    'mouth_left',
    'shoulder_right',
    'shoulder_left',
    'back_right',
    'back_left',
    'waist_right',
    'waist_left',
    'knee_right',
    'knee_left',
    'foot_right',
    'foot_left',
    
    'type_record_id',
    'ch_record_id',

  ];
}
