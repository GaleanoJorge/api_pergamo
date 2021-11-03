<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CampusBriefcase as BaseCampusBriefcase;

class CampusBriefcase extends BaseCampusBriefcase
{
    protected $fillable = [
		'briefcase_id',
		'campus_id',
	];
}
