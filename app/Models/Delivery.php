<?php

namespace App\Models;

use App\Models\Base\Delivery as BaseDelivery;

class Delivery extends BaseDelivery
{
	protected $fillable = [
		'activity_id',
		'user_id',
		'group_activity_id',
		'file_name',
		'file_path',
		'sync_id'
	];
}
