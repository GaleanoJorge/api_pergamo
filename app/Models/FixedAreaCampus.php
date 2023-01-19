<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedAreaCampus as BaseFixedAreaCampus;

class FixedAreaCampus extends BaseFixedAreaCampus
{
protected $fillable = [
	'name',
	];
}
