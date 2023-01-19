<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\AccountReceivable as BaseAccountReceivable;

class AccountReceivable extends BaseAccountReceivable
{
    protected $fillable = [
      'file_payment',
      'observation',
      'gross_value_activities',
      'net_value_activities',
      'user_id',
      'status_bill_id',
      'minimum_salary_id',
	];
}
