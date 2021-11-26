<?php

namespace App\Models;

use App\Models\Base\ReceivedBy as BaseReceivedBy;

class ReceivedBy extends BaseReceivedBy
{
	protected $fillable = [
		'name'
	];
}
