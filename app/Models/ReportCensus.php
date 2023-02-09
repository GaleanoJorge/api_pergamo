<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ReportCensus as BaseReportCensus;

class ReportCensus extends BaseReportCensus
{
protected $fillable = [
	'initial_report',
	'final_report',
	'location_id',
	'status_id',
	'user_id',
	];
}
