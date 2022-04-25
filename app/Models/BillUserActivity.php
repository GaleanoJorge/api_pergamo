<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BillUserActivity as BaseBillUserActivity;

class BillUserActivity extends BaseBillUserActivity
{
    protected $fillable = [
		'num_activity',
    'user_id',
    'full_value',
    'account_receivable_id',
    'observation',
         
	
	];
}
