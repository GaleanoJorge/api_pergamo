<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\SourceRetention as BaseSourceRetention;

class SourceRetention extends BaseSourceRetention
{
    protected $fillable = [
        'file',
        'value',
        'account_receivable_id',
        'source_retention_type_id',
	];
}
