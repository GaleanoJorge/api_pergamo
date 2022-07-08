<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChType as BaseChType;

class ChType extends BaseChType
{
    protected $fillable = [
    'name',
	];
}
