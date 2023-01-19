<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChRstCytologyGyneco as BaseChRstCytologyGyneco;

class ChRstCytologyGyneco extends BaseChRstCytologyGyneco
{
  protected $fillable = [
    'name',
  ];
}
