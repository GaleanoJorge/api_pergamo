<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BillUserActivity as BaseBillUserActivity;

class BillUserActivity extends BaseBillUserActivity
{
    protected $fillable = [
      'procedure_id',
      'admissions_id',
      'ch_record_id',
      'account_receivable_id',
      'tariff_id',
      'status',
      'observation',
	];
}
