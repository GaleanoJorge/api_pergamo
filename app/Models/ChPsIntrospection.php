<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsIntrospection as BaseChPsIntrospection;

class ChPsIntrospection extends BaseChPsIntrospection
{
  protected $fillable = [
    'name',
  ];
}
