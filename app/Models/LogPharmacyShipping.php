<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\LogPharmacyShipping as BaseLogPharmacyShipping;

class LogPharmacyShipping extends BaseLogPharmacyShipping
{
    protected $fillable = [
		'user_id',
    'status',
    'quantity',
    'pharmacy_request_shipping_id',
	];
}
