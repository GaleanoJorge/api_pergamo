<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChExternalCause as BaseChExternalCause;

class ChExternalCause extends BaseChExternalCause
{
  protected $fillable = [
    'name'
  ];
}
