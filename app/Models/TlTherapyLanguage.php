<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\TlTherapyLanguage as BaseTlTherapyLanguage;

class TlTherapyLanguage extends BaseTlTherapyLanguage
{
    protected $fillable = [
    'medical_diagnostic_id',
    'therapeutic_diagnosis_id',
    'reason_consultation',
    'type_record_id',
    'ch_record_id',
	];
}
