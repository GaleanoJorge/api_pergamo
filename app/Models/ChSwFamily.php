<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwFamily as BaseChSwFamily;

class ChSwFamily extends BaseChSwFamily
{
  protected $fillable = [
    'firstname',
    'middlefirstname',
    'lastname',
    'middlelastname',
    'range_age',
    'identification',
    'phone',
    'landline',
    'email',
    'residence_address',
    'is_disability',
    'relationship_id',
    'identification_type_id',
    'marital_status_id',
    'academic_level_id',
    'study_level_status_id',
    'activities_id',
    'inability_id',
    'carer',
    'type_record_id',
    'ch_record_id'
  ];
}
