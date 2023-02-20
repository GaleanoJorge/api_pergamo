<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ReportBilling as BaseReportBilling;

class ReportBilling extends BaseReportBilling
{
protected $fillable = [
	'initial_report',
	'final_report',
	'billing',
	'status',
	'user_id',
	];
}
