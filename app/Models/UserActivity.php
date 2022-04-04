<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\UserActivity as BaseUserActivity;

class UserActivity extends BaseUserActivity
{
    protected $fillable = [
	
    'user_id',
    'procedure_id',
    'gloss_ambit_id',
  
         
	
	];
}
