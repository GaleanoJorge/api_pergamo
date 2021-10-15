<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ServicesBriefcase as BaseServicesBriefcase;

class ServicesBriefcase extends BaseServicesBriefcase
{
    protected $fillable = [
		'contract_id',
		'proceduere_id',
		'modality_id',
		
	];
}
