<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\MedicalCitation as BaseMedicalCitation;

class MedicalCitation extends BaseMedicalCitation
{
  protected $fillable = [
    'title',
    'note',
    'start_time',
    'finish_time',
    'start_date',
    'finish_date',
    'patient_id',
    'assistance_id',
    'user_id',
    'status_id',
  ];
}
