<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChFlowGynecologists as BaseChFlowGynecologists;

class ChFlowGynecologists extends BaseChFlowGynecologists
{
  protected $fillable = [
    'name',
  ];
}
