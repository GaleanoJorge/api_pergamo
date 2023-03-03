<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\RadicationTc as BaseRadicationTc;

class RadicationTc extends BaseRadicationTc
{
  protected $fillable = [
    'invoice',
    'invoice_date',
    'entity',
    'filing_date',
    'status',
    'total_eps',
    'ambit',
    'campus',
    'filing_period',
    'year'
  ];
}
