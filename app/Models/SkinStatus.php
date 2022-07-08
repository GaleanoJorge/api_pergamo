<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\SkinStatus as BaseSkinStatus;

class SkinStatus extends BaseSkinStatus
{
    protected $fillable = [
    'name',
	];
}
