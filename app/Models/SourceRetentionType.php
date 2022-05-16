<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\SourceRetentionType as BaseSourceRetentionType;

class SourceRetentionType extends BaseSourceRetentionType
{
    protected $fillable = [
        'name',
        'value',
	];
}
