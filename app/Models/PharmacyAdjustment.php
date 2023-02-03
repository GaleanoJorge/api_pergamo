<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyAdjustment as BasePharmacyAdjustment;

class PharmacyAdjustment extends BasePharmacyAdjustment
{
protected $fillable = [
	'name',
	];
}
