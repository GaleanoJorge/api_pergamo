<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Bank as BaseBank;

class Bank extends BaseBank
{
    protected $fillable = [

    'code',
    'name',
    
	];
}
