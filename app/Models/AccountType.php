<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\AccountType as BaseAccountType;

class AccountType extends BaseAccountType
{
    protected $fillable = [

    'name',
    
	];
}
