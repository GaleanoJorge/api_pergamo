<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwActivity as BaseChSwActivity;

class ChSwActivity extends BaseChSwActivity
{
  protected $fillable = [
    'name',
  ];
}
