<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PatientData as BasePatientData;

class PatientData extends BasePatientData
{
    protected $fillable = [
    'firstname',
    'middlefirstname',
    'lastname', 
    'middlelastname',   
    'identification',
    'phone',
    'email',
    'residence_address',
    'identification_type_id',
    'affiliate_type_id',
    'special_attention_id',
    'patient_data_type',
    'admissions_id'

	];
}
