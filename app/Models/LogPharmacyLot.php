<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\LogPharmacyLot as BaseLogPharmacyLot;

class LogPharmacyLot extends BaseLogPharmacyLot
{
    protected $fillable = [
		'lot',
    'actual_amount',
    'sample',
    'expiration_date',
    'billing_stock_id',
    'pharmacy_lot_stock_id',
	];
}
