<?php

namespace App\Models;

use App\Models\Base\Contract as BaseContract;

class Contract extends BaseContract
{
	protected $fillable = [
		'number_contract',
        'name',
        'company_id',
        'type_contract_id',
        'occasional',
        'amount',
        'start_date',
        'finish_date',
        'contract_status_id',
        'regime_id',
        'firms_contractor_id',
        'firms_contracting_id',
        'start_date_invoice',
        'finish_date_invoice',
        'expiration_days_portafolio',
        'discount',
        'observations',
        'objective',
        'min_attention',
        'max_attention',
        'discount_rate',
            
	];
}
