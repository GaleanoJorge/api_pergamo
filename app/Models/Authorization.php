<?php

namespace App\Models;

use App\Models\Base\Authorization as BaseAuthorization;

class Authorization extends BaseAuthorization
{
	protected $fillable = [
		'id',
		'services_briefcase_id',
		'admissions_id',
		'auth_number',
		'state_auth_id',
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
