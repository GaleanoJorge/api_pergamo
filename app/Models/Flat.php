<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Flat as BaseFlat;

class Flat extends BaseFlat
{
    protected $fillable = [
    'code',
    'name',
    'pavilion_id',
    

	];
}

