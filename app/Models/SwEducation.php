<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\SwEducation as BaseSwEducation;

class SwEducation extends BaseSwEducation
{
  protected $fillable = [
    'sw_rights_duties_id',
    'type_record_id',
    'ch_record_id'
  ];
}
