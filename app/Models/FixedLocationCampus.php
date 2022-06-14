<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedLocationCampus as BaseFixedLocationCampus;

class FixedLocationCampus extends BaseFixedLocationCampus
{
protected $fillable = [
	'flat_id',
	'campus_id',
	'fixed_area_campus_id',
	];
}
