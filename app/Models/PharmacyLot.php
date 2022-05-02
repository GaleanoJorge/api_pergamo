<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyLot as BasePharmacyLot;

class PharmacyLot extends BasePharmacyLot
{
protected $fillable = [
	'pharmacy_stock_id',
	'enter_amount',
	'unit_value',
	'lot',
	'expiration_date',
	'billing_id',
	'billing_stock_id',
	];
}
