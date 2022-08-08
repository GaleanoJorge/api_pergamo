<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwServices as BaseChSwServices;

class ChSwServices extends BaseChSwServices
{
  protected $fillable = [
    'name',
  ];
}
