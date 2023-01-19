<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Residence as BaseResidence;

class Residence extends BaseResidence
{
    protected $fillable = [
    'name',
	];
}
