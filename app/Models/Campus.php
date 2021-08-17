<?php

namespace App\Models;

use App\Models\Base\Campus as BaseCampus;

class Campus extends BaseCampus
{
	protected $fillable = [
		'name',
		'region_id'
	];

	public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
