<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\FixedCode as BaseFixedCode;

class FixedCode extends BaseFixedCode
{
protected $fillable = [
	'name',
	];
}
