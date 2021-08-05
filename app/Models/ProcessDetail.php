<?php

namespace App\Models;

use App\Models\Base\ProcessDetail as BaseProcessDetail;

class ProcessDetail extends BaseProcessDetail
{
	protected $fillable = [
		'process_detail_type_id',
		'process_detail_state_id',
		'process_id',
		'group_id',
		'user_id'
	];
}
