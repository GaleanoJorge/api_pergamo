<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\SwRightsDuties as BaseSwRightsDuties;

class SwRightsDuties extends BaseSwRightsDuties
{
    protected $fillable = [
        'code',
        'name'
	];
}
