<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPatientExit as BaseChPatientExit;

class ChPatientExit extends BaseChPatientExit
{
    protected $fillable = [
    'exit_status',
    'legal_medicine_transfer',
    'date_time',
    'death_diagnosis_id',
    'medical_signature',
    'death_certificate_number',
    'ch_diagnosis_id',
    'exit_diagnosis_id',
    'relations_diagnosis_id',
    'reason_exit_id',
    'type_record_id',
    'ch_record_id',
	];
}
