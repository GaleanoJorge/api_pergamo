<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChContingencyCode as BaseChContingencyCode;

class ChContingencyCode extends BaseChContingencyCode
{
  protected $fillable = [
    'name'
  
  ];
}
