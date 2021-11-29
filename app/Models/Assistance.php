<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Assistance as BaseAssistance;

class Assistance extends BaseAssistance
{
    protected $fillable = [
		'user_id',
    'medical_record',
    'contract_type_id',
    'cost_center_id', 
    'type_professional_id', 
    'medium_signature_file_id', 
    'attends_external_consultation', 
    'serve_multiple_patients', 
    'special_field_id', 
	
	];
}
