<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChTypeGynecologists as BaseChTypeGynecologists;

class ChTypeGynecologists extends BaseChTypeGynecologists
{
  protected $fillable = [
    'name',
  ];
}
