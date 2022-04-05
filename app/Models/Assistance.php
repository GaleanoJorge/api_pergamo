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
    // 'cost_center_id',
    'PAD_service', 
    'attends_external_consultation', 
    'serve_multiple_patients', 
    'file_firm', 
	
	];
}
