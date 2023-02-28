<?php

namespace App\Models;

use App\Models\Base\ReportExternalQuery as BaseReportExternalQuery;

class ReportExternalQuery extends BaseReportExternalQuery
{
protected $fillable = [
	'initial_report',
	'final_report',
	'campus_id',
	'status',
	'user_id',
	];
}
