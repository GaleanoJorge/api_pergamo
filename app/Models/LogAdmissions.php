<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\LogAdmissions as BaseLogAdmissions;

class LogAdmissions extends BaseLogAdmissions
{
    protected $fillable = [
		'user_id',
    'patient_id',
    'admissions_id',
    'status',
	
	];
}
