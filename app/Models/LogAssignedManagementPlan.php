<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\LogAssignedManagementPlan as BaseLogAssignedManagementPlan;

class LogAssignedManagementPlan extends BaseLogAssignedManagementPlan
{
    protected $fillable = [
		'user_id',
    'assigned_management_plan_id',
    'status',
    'i_start_date',
    'i_finish_date',
    'i_user_id',
    'i_start_hour',
    'i_finish_hour',
    'f_start_date',
    'f_finish_date',
    'f_user_id',
    'f_start_hour',
    'f_finish_hour'
	
	];
}
