<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ReasonExit as BaseReasonExit;

class ReasonExit extends BaseReasonExit
{
    protected $fillable = [
    'name',
	];
}
