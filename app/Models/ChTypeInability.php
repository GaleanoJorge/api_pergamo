<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChTypeInability as BaseChTypeInability;

class ChTypeInability extends BaseChTypeInability
{
  protected $fillable = [
    'name'
  
  ];
}
