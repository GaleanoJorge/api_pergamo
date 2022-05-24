<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChFormulation as BaseChFormulation;

class ChFormulation extends BaseChFormulation
{
    protected $fillable = [
    'management_plan_id',
    'administration_route_id',
    'hourly_frequency_id',
    'medical_formula',
    'treatment_days',
    'outpatient_formulation',
    'dose',
    'observation',
    'type_record_id',
    'ch_record_id',
	];
}
