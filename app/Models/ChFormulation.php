<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChFormulation as BaseChFormulation;

class ChFormulation extends BaseChFormulation
{
    protected $fillable = [
    'product_generic_id',
    'services_briefcase_id',
    'administration_route_id',
    'hourly_frequency_id',
    'medical_formula',
    'treatment_days',
    'outpatient_formulation',
    'dose',
    'observation',
    'number_mipres',
    'product_dose_id',
    'type_record_id',
    'ch_record_id',
	];
}
