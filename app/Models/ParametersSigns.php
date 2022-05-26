<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ParametersSigns as BaseParametersSigns;

class ParametersSigns extends BaseParametersSigns
{
    protected $fillable = [
    'name',
	];
}
