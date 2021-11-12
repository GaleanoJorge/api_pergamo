<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Activities as BaseActivities;

class Activities extends BaseActivities
{
    protected $fillable = [
    'code',
    'name',
    

	];
}
