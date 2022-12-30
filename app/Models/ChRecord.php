<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRecord as BaseChRecord;

class ChRecord extends BaseChRecord
{
  protected $fillable = [
    'status',
    'date_attention',
    'firm_file',
    'admissions_id',
    'assigned_management_plan_id',
    'user_id',
    'ch_type_id',
    'date_finish',
    'ch_interconsultation_id',
  ];
}
