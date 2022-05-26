<?php

namespace App\Models;

use App\Models\Base\Authorization as BaseAuthorization;

class Authorization extends BaseAuthorization
{
	protected $fillable = [
		'auth_number',
		'observation',
		'file_auth',
		'services_briefcase_id',
		'assigned_management_plan_id',
		'admissions_id',
		'authorized_amount',
		'auth_status_id',
		'auth_package_id',
		'manual_price_id',
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
