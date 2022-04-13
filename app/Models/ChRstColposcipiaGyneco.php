<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRstColposcipiaGyneco as BaseChRstColposcipiaGyneco;

class ChRstColposcipiaGyneco extends BaseChRstColposcipiaGyneco
{
  protected $fillable = [
    'name',
  ];
}
