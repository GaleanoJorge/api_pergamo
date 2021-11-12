<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Bed as BaseBed;

class Bed extends BaseBed
{
    protected $fillable = [
    'code',
    'name',
    

	];
}
