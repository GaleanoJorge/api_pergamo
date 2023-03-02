<?php

namespace App\Models;

use App\Models\Base\ReportGloss as BaseReportReportGloss;

class ReportGloss extends BaseReportReportGloss
{
protected $fillable = [
	'initial_report',
	'final_report',
	'campus_id',
	'user_id',
	];
}