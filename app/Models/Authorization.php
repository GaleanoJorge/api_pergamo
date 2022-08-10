<?php

namespace App\Models;

use App\Models\Base\Authorization as BaseAuthorization;

class Authorization extends BaseAuthorization
{
	protected $fillable = [
		'auth_number',
		'supplies_id',
		'admissions_id',
		'auth_status_id',
		'services_briefcase_id',
		'assigned_management_plan_id',
		'authorized_amount',
		'auth_package_id',
		'manual_price_id',
		'application_id',
		'product_id',
		'observation',
		'file_auth',
	];

	public function residence_municipality()
    {
        return $this->belongsTo(Municipality::class, 'residence_municipality_id');
    }

    public function residence()
    {
        return $this->belongsTo(NeighborhoodOrResidence::class, 'neighborhood_or_residence_id');
    }
}
