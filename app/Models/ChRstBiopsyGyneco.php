<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRstBiopsyGyneco as BaseChRstBiopsyGyneco;

class ChRstBiopsyGyneco extends BaseChRstBiopsyGyneco
{
  protected $fillable = [
    'name',
  ];
}
