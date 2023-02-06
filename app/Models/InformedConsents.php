<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\InformedConsents as BaseInformedConsents;

class InformedConsents extends BaseInformedConsents
{
    protected $fillable = [
		'name',
		'file',
		'ch_record_id',
		
	];
}
