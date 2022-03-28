<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BillUserActivity as BaseBillUserActivity;

class BillUserActivity extends BaseBillUserActivity
{
    protected $fillable = [
	
    'user_id',
    'procedure_id',
    'gloss_ambit_id',
  
         
	
	];
}
