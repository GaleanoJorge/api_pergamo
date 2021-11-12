<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\MaritalStatus as BaseMaritalStatus;

class MaritalStatus extends BaseMaritalStatus
{
    protected $fillable = [
    'name',
    

	];
}
