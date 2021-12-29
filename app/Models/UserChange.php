<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\UserChange as BaseUserChange;

class UserChange extends BaseUserChange
{
    protected $fillable = [
    'wrong_user_id',
    'right_user_id',
    'observation_novelty',
	
	];
}
