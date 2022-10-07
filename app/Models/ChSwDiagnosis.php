<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwDiagnosis as BaseChSwDiagnosis;

class ChSwDiagnosis extends BaseChSwDiagnosis
{
    protected $fillable = [
    'ch_diagnosis_id',
    'sw_diagnosis',
    'type_record_id',
    'ch_record_id',
	];
}
