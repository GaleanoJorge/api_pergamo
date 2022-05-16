<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyLotStock as BasePharmacyLotStock;

class PharmacyLotStock extends BasePharmacyLotStock
{
protected $fillable = [
	'lot',
	'amount_total',
	'sample',
	'actual_amount',
	'expiration_date',
	'pharmacy_lot_id',
	'billing_stock_id',
	];
}
