<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ReportRips as BaseReportRips;

class ReportRips extends BaseReportRips
{
protected $fillable = [
	'initial_report',
	'final_report',
	'company_id',
	'user_id',
	];
}
