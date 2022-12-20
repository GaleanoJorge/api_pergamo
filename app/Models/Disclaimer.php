<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Disclaimer as BaseDisclaimer;

class Disclaimer extends BaseDisclaimer
{
  protected $fillable = [
    'observation',
    'ch_record_id'
  ];
}
