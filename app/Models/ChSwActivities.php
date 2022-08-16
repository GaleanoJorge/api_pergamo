<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwActivities as BaseChSwActivities;

class ChSwActivities extends BaseChSwActivities
{
  protected $fillable = [
    'name',
  ];
}
