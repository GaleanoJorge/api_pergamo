<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Pavilion as BasePavilion;

class Pavilion extends BasePavilion
{
    protected $fillable = [
    'code',
    'name',
    'bed_id',
    

	];
}
