<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Coverage as BaseCoverage;

class Coverage extends BaseCoverage
{
    protected $fillable = [
		'name',
		'type_briefcase_id',
		
	];
}
