<?php

namespace App\Models;

use App\Models\Base\OxigenControl as BaseOxigenControl;

class OxigenControl extends BaseOxigenControl
{
	protected $fillable = [
		'oxigen_flow',
		'duration_minutes',
		'oxigen_administration_way_id',
		'type_record_id',
		'ch_record_id',
	];
}
