<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChFailureMethodGyneco as BaseChFailureMethodGyneco;

class ChFailureMethodGyneco extends BaseChFailureMethodGyneco
{
  protected $fillable = [
    'name',
  ];
}
