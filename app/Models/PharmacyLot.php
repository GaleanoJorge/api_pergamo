<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PharmacyLot as BasePharmacyLot;

class PharmacyLot extends BasePharmacyLot
{
protected $fillable = [
	'subtotal',
	'vat',
	'total',
	'receipt_date',
	'pharmacy_stock_id',
	];
}
