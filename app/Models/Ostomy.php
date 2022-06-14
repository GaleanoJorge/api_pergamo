<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Ostomy as BaseOstomy;

class Ostomy extends BaseOstomy
{
    protected $fillable = [
    'name',
	];
}
