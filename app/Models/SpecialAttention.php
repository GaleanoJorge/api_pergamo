<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\SpecialAttention as BaseSpecialAttention;

class SpecialAttention extends BaseSpecialAttention
{
    protected $fillable = [  
    'name',

	];
}
