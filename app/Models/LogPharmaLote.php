<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\LogPharmaLote as BaseLogPharmaLote;

class LogPharmaLote extends BaseLogPharmaLote
{
  protected $fillable = [
    'actual_amount',
    'amount',
    'sign',
    'pharmacy_adjustment_id',
    'pharmacy_lot_stock_id',
    'observation',
  ];
}
