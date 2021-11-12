<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\AdmissionRoute as BaseAdmissionRoute;

class AdmissionRoute extends BaseAdmissionRoute
{
    protected $fillable = [
    'patient_data_firstname',
    'patient_data_middlefirstname',
    'patient_data_lastname', 
    'patient_data_middlelastname',   
    'patient_data_identification',
    'patient_data_phone',
    'patient_data_email',
    'patient_data_residence_address',
    'identification_type_id',
    'affiliate_type_id',
    'special_attention_id',



	];
}
