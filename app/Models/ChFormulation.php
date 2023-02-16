<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChFormulation as BaseChFormulation;

class ChFormulation extends BaseChFormulation
{
    protected $fillable = [
    'required',
    'product_generic_id',
    'services_briefcase_id',
    'administration_route_id',
    'hourly_frequency_id',
    'product_supplies_id',
    'medical_formula',
    'treatment_days',
    'outpatient_formulation',
    'dose',
    'observation',
    'num_supplies',
    'number_mipres',
    'pharmacy_product_request_id',
    'type_record_id',
    'ch_record_id',
    'oxigen_administration_way_id',
    'suspended',
	];
}
