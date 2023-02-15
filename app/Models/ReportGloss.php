<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ReportGloss as BaseReportReportGloss;

class ReportGloss extends BaseReportReportGloss
{
protected $fillable = [
	'initial_report',
	'final_report',
	'gloss',
	'status',
	'user_id',
	];
}
