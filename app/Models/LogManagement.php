<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\LogManagement as BaseLogManagement;

class LogManagement extends BaseLogManagement
{
    protected $fillable = [
		'user_id',
    'status',
    'management_plan_id',
	
	];
}
