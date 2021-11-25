<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\StatusBed as BaseStatusBed;

class StatusBed extends BaseStatusBed
{
    protected $fillable = [
            'name',
	];
}
