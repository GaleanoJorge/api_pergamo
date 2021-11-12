<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ScopeOfAttention as BaseScopeOfAttention;

class ScopeOfAttention extends BaseScopeOfAttention
{
    protected $fillable = [
    'name',
    'program_id',
    

	];
}
