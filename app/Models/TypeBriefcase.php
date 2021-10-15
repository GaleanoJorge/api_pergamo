<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\TypeBriefcase as BaseTypeBriefcase;

class TypeBriefcase extends BaseTypeBriefcase
{
    protected $fillable = [
		'name',
		
	];
}
