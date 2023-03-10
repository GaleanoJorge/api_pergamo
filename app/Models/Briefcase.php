<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Briefcase as BaseBriefcase;

class Briefcase extends BaseBriefcase
{
    protected $fillable = [
		'contract_id',
		'name',
		'coverage_id',
		'modality_id',
		'status_id',
	];
}
