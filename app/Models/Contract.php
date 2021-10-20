<?php

namespace App\Models;

use App\Models\Base\Contract as BaseContract;

class Contract extends BaseContract
{
	protected $fillable = [
		'number_contract',
        'campus_id',
        'type_contract_id',
        'occasional',
        'amount',
        'start_date',
        'finish_date',
        'status_id',
        'firms_contractor_id',
        'firms_contracting_id',
        'civil_policy_insurance_id',
        'value_civil_policy',
        'start_date_civil_policy',
        'finish_date_civil_policy',
        'contractual_policy_insurance_id',
        'value_contractual_policy',
        'start_date_contractual_policy',
        'finish_date_contractual_policy',
        'start_date_invoice',
        'finish_date_invoice',
        'time_delivery_invoice',
        'expiration_days_portafolio',
        'discount',
        'observations',
        'objective',
            
	];
}
