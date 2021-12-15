<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Inability as BaseInability;

class Inability extends BaseInability
{
    protected $fillable = [

    'name',
    'code'
   
    

	];
}
