<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChReason as BaseChReason;

class ChReason extends BaseChReason
{
    protected $fillable = [
    'name',
	];
}
