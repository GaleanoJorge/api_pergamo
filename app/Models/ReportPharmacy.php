<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ReportPharmacy as BaseReportPharmacy;

class ReportPharmacy extends BaseReportPharmacy
{
protected $fillable = [
	'initial_report',
	'final_report',
	'pharmacy_stock_id',
	'status',
	'user_id',
	];
}
